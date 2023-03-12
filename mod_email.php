<?php
session_start();
require 'secure/notForLog.php';
if(isset($_POST['email'])){

	$email = trim($_POST['email'], " ");

	if(isset($email) && strlen($email)!=0 && filter_var($email, FILTER_VALIDATE_EMAIL)){
		require "components/connection.php";
		$connection = new mysqli($hostData, $userData, $paswData, $database);

		/*PER EVITARE L'SQL INJECTION UTILIZZIAMO LA FUNZIONE prepare() e execute()*/
		$sql = $connection->prepare('SELECT * FROM utenti WHERE email = ?');
		$sql->bind_param('s', $email);
		
		$sql->execute();

		$result = $sql->get_result();
		if($result->num_rows != 0){
			$row = $result->fetch_array();
			$_SESSION['Email']	= $row['email'];
			$_SESSION['ID']		= $row['id'];

			require 'components/sendEmail.php';
		} else{
			$_SESSION['erroE'] = "Email non esistente!";
			header("Location: form.php#email");
		}
		$sql->close();
		$result->free();
		$connection->close();
	} else{
		$_SESSION['erroE'] = "Email non valida!";
		header("Location: form.php#email");
	}
} else{
	header("Location: logout.php?out");
}