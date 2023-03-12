<?php
session_start();
require 'secure/notForLog.php';
if((isset($_GET['C']) && isset($_COOKIE['logid'])) || (isset($_POST['email']) && isset($_POST['pass']))){

	if(isset($_GET['C'])){
		$jCookie = json_decode($_COOKIE['logid']);
		$logid = trim((string)$jCookie->data, " ");
		$expiry = (string)$jCookie->expiry;
	} else{
		$email = trim($_POST['email'], " ");
		$password = trim($_POST['pass'], " ");
	}
	$savePasw = false;
	if(isset($_POST['savePasw'])) $savePasw = true;

	if( (isset($email) && isset($password) && strlen($email)!=0 && strlen($password)!=0 && filter_var($email, FILTER_VALIDATE_EMAIL)) ||
		(isset($_COOKIE['logid']) && isset($logid) && isset($expiry)) ){
		require "components/connection.php";
		$connection = new mysqli($hostData, $userData, $paswData, $database);

		/*PER EVITARE L'SQL INJECTION UTILIZZIAMO LA FUNZIONE prepare() e execute()*/
		if(isset($email) && isset($password)){
			$sql = $connection->prepare('SELECT * FROM utenti WHERE email = ?');
			$sql->bind_param('s', $email);
		}else{
			$sql = $connection->prepare('SELECT * FROM utenti WHERE cookie = ? AND endcookie = ?');
			$sql->bind_param('ss', $logid, $expiry);
		}
		
		$sql->execute();

		$result = $sql->get_result();
		if($result->num_rows != 0){
			$row = $result->fetch_array();
			if((isset($email) && isset($password) && password_verify($password, $row['password'])) ||
			   (isset($logid) && isset($expiry)) ){

				$_SESSION['Email']=$row['email'];
				$_SESSION['Nome']=$row['nome'];
				$_SESSION['Cognome']=$row['cognome'];

				if($savePasw){
					/* ----------------- CREAZIONE COOKIE -------------------- */
					$userID	 = md5(str_shuffle(uniqid('tapiro_', true))); //genera una stringa alfanumerica con prefisso 'tapiro_', mischia i caratteri e la cripta in md5
					$endTime = time() + (3600*24*10); // time + 10 giorni
					$endDate = new DateTime("@$endTime");  // conversione UNIX timestamp in PHP DateTime
					$endDate = (string)$endDate->format('Y-m-d H:i:s'); // conversione in stringa della data

					$cookieData = (object) array( "data" => $userID, "expiry" => $endDate ); // dato cookie in json = dato . data_di_scadenza
					/* ----------------- END COOKIE -------------------- */

					$sql = $connection->prepare("UPDATE utenti SET cookie=?, endcookie=? WHERE email=?");
					$sql->bind_param('sss', $userID, $endDate, $row['email']);

					if($sql->execute()){

						if(setcookie('logid', json_encode($cookieData), $endTime, "/")){
							header("Location: index.php");
						} else{
							$_SESSION['erroL'] = "Qualcosa è andato storto!";
							header("Location: form.php#login");
						}					
					} else{
						$_SESSION['erroL'] = "Qualcosa è andato storto!";
						header("Location: form.php#login");
					}
				}else{
					header("Location: index.php");
				}

			} else{
				$_SESSION['erroL'] = "L’email o la password sono sbagliati.";
				header("Location: form.php#login");
			}
		} else{
			if(isset($logid) && isset($expiry)){
				header("Location: logout.php?out");
			}else{
				$_SESSION['erroL'] = "L’email o la password sono sbagliati.";
				header("Location: form.php#login");
			}
		}
		$sql->close();
		$result->free();
		$connection->close();
	} else{
		$_SESSION['erroL'] = "Attenzione! Inserire i dati richiesti.";
		header("Location: form.php#login");
	}
} else{
	header("Location: logout.php?out");
}