<?php
session_start();
require 'secure/notForLog.php';
if(isset($_POST['email'])&&isset($_POST['id'])&&isset($_POST['pass'])&&isset($_POST['confirm'])){

	$email = trim($_POST['email']," ");
	$id = trim($_POST['id']," ");
	$password = trim($_POST['pass']," ");
	$confirm = trim($_POST['confirm']," ");

	if (strlen($email)!=0 && $id!=0 && strlen($password)!=0 && strlen($confirm)!=0 && filter_var($email, FILTER_VALIDATE_EMAIL)){
		if($password!=$confirm){
			$_SESSION['erro'] = "Password non uguali!";
			header("Location: changePasw.php");
		} else{
			require "components/connection.php";
			$connection = new mysqli($hostData, $userData, $paswData, $database);

			/*PER EVITARE L'SQL INJECTION UTILIZZIAMO LA FUNZIONE prepare() e execute()*/
			$sql = $connection->prepare("SELECT * FROM utenti WHERE id = ? AND email = ?");
			$sql->bind_param('ss', $id, $email);
			$sql->execute();

			$result = $sql->get_result();
			if ($result->num_rows != 0){
				$row = $result->fetch_array();

				$passwordHash=password_hash($password, PASSWORD_BCRYPT);
				
				$sql = $connection->prepare("UPDATE utenti SET password = ? WHERE id = ? AND email = ?");
				$sql->bind_param('sss', $passwordHash, $id, $email);

				if($sql->execute()){
					$_SESSION['erro'] = "Password resettata!";
					header("Location: login.php");					
				} else{
					$_SESSION['erro'] = "Errore reset Password!";
					header("Location: changePasw.php");
				}
			} else{
				$_SESSION['erro'] = "Errore reset Password!";
				header("Location: login.php");	
			}
			$sql->close();
			$result->free();
			$connection->close();
		}
	} else{
		$_SESSION['erro'] = "Password non valide!";
		header("Location: changePasw.php");
	}
} else{
	$_SESSION['erro'] = "Password non valide!";
	header("Location: logout.php?out");
}