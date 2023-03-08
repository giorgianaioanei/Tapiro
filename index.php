<?php
	session_start();
	if(!isset($_SESSION['Email']) && !isset($_COOKIE['logid'])){
		header("Location: login.php");
	}else if(!isset($_SESSION['Email']) && isset($_COOKIE['logid'])){
		header("Location: login.php?C");
	}
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>
	<center>
		<h1>Complimenti, benvenuto <?php if (isset($_SESSION['Nome'])) echo $_SESSION['Nome']; ?></h1>
		<br>
		<button onclick="window.location.replace('logout.php?out')">Logout</button>
	</center>
</body>
</html>