<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php if(!isset($_SESSION['Email'])&&!isset($_COOKIE['splash'])){ ?>
		<div class="splash">
			<img draggable="false" src="img/Alieno.png" id="alien">
			<img draggable="false" src="img/logo_login.svg" id="logo">
			<div id="text">
				<p class="title">Hey, benvenuto nella pagina test del log-in!</p>
				<p class="subTitle">Tu sai accedere ai sitiweb senza intoppi?<br>Mettiti alla prova.</p>
				<div class="logOsign">
					<button onclick="toLogin()">LOG-IN</button> <span>O</span> <button onclick="toSignup()">SIGN-UP</button>
				</div>
			</div>
			<p id="footer">@diritti riservati al Gruppo 2</p>
		</div>
	<?php }else if(!isset($_SESSION['Email'])&&isset($_COOKIE['splash'])){ ?>
		<div class="splash Ssplash">
			<img draggable="false" src="img/Alieno.gif" id="alien" class="Salien" style="padding-left:20px!important;width: 210px!important;">
			<img draggable="false" src="img/logo_login.svg" id="logo" class="Slogo">
			<div id="text" class="Stext">
				<p class="title">Hey, benvenuto nella pagina test del log-in!</p>
				<p class="subTitle">Tu sai accedere ai sitiweb senza intoppi?<br>Mettiti alla prova.</p>
				<div class="logOsign">
					<button onclick="toLogin()">LOG-IN</button> <span>O</span> <button onclick="toSignup()">SIGN-UP</button>
				</div>
			</div>
			<p id="footer" class="Sfooter">@diritti riservati al Gruppo 2</p>
		</div>
	<?php }else{ ?>
		<img draggable="false" class="logo" src="img/logo_login.svg" alt="logo login">
		<div class="text1">
			<p class="p1">Complimenti!</p>
			<p class="p2">Sei in grado di accedere ad un sito</p>
		</div>
		<img draggable="false" class="tapiro" src="img/Tapiro.gif" alt="tapiro">
		<p class="text2">Sai anche uscire senza problemi?</p>
		<button class="bottone" onclick="document.getElementById('popup').style.display='block';">ESCI</button>
		<!-- ----------------------------------- -->
		<div id="popup" class="modal">
		    <div class="modal-content">
		      <img draggable="false" src="img/AlienoRosso.png" alt="Alieno rosso" class="mostro">
		      <p class="text2">Sei sicuro di voler uscire?</p>
		      <div class="clearfix">
		        <button onclick="window.location.replace('logout.php?out')" class="btnSi">SI</button>
		        <button onclick="document.getElementById('popup').style.display='none'" class="btnNo">NO</button>
		      </div>
		    </div>
		</div>
		<!-- ----------------------------------- -->
		<footer id="foot">@diritti riservati al Gruppo 2</footer>
	<?php } ?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
	<script src="js/splash.js"></script>
</body>
</html>