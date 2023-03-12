<?php
session_start();
require 'secure/notForLog.php';
if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['confirm'])){

	$nome = trim($_POST['firstname']," ");
	$cognome = trim($_POST['lastname']," ");
	$email = trim($_POST['email']," ");
	$password = trim($_POST['pass']," ");
	$confirm = trim($_POST['confirm']," ");

	$nome = htmlspecialchars($nome);
	$cognome = htmlspecialchars($cognome);

	if (strlen($email)!=0 && strlen($password)!=0 && filter_var($email, FILTER_VALIDATE_EMAIL)){
		if($password!=$confirm){
			$_SESSION['erroR'] = "Password non uguale!";
			header("Location: form.php#register");
		} else{
			include "components/connection.php";
			$connection = new mysqli($hostData, $userData, $paswData, $database);

			$passwordHash=password_hash($password, PASSWORD_BCRYPT);

			/*PER EVITARE L'SQL INJECTION UTILIZZIAMO LA FUNZIONE prepare() e execute()*/
			$sql = $connection->prepare("INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)");
			$sql->bind_param('ssss', $nome, $cognome, $email, $passwordHash);

			try{
				$respo = $sql->execute();
				if($respo == 1){
					$_SESSION['erroL'] = "Registrazione effettuata!";
					header("Location: form.php#login");
				}
				else{
					$_SESSION['erroR'] = "L’email o la password sono sbagliati.";
					header("Location: form.php#register");
				}
			}catch(Exception $e){
				$_SESSION['erroR'] = "Errore inserimento utente!";
				header("Location: form.php#register");
			}
		}
		$sql->close();
		$result->free();
		$connection->close();
	} else{
		$_SESSION['erroR'] = "L’email o la password sono sbagliati.";
		header("Location: form.php#register");
	}

} else{
	header("Location: logout.php?out");
}