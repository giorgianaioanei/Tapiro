<!DOCTYPE html>
<html lang="it">
<head>
	<?php
		session_start();
		require 'secure/notForLog.php';
		if(!isset($_GET['email']) || !isset($_GET['id']))
			header('Location: index.php')
	?>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cambio Password</title>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <script src="js/validatePassword.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body>
	<img loading="lazy" draggable="false" onclick="window.location.href='index.php'" src="img/logo_login.svg" class="logo">
	  
	<div class="box-form">

		<!--form-container-->
	  <ul class="tabs">
	    <li>
	      <a class="active">CAMBIA PASSWORD</a>
	    </li>
	  </ul>


	  <!--form-action-->


	  <div class="form-action show">
	    
	    <form name="resetForm" id="resetForm" onsubmit="return validateForm()" action="mod_reset.php" method="post">
				<p class="ciao">CIAO!</p>
				<p class="textEmail"><?php if (isset($_GET['email'])) echo $_GET['email'] ?></p>
				<span <?php if(isset($_SESSION['erroP']) && ($_SESSION['erroP'] == "Registrazione effettuata!" || $_SESSION['erroP'] == "Email per recupero password inviata!" || $_SESSION['erroP'] == "Password resettata!")){
		          			echo "class='succ'";
		          		} else if(isset($_SESSION['erroP'])){
		          			echo "class='erro'";
		          		}
		          	?> id="resP"><?php if(isset($_SESSION['erroP'])){ echo $_SESSION['erroP']; } ?></span>
		    <?php 
		    	if(isset($_SESSION['erroP'])){ echo "<script>setTimeout(function(){ document.getElementById('resP').removeAttribute('class') }, 5000);</script>"; }
		     	unset($_SESSION['erroP']);
		    ?>
		    <br>
		    <input type="hidden" name="email" value=<?php echo "'".@$_GET['email']."'"; ?>>
	    	<input type="hidden" name="id" 		value=<?php echo "'".@$_GET['id']."'"; ?>>
		    <input type="password" id="paswR" name="pass" placeholder="Inserisci la nuova password" class="newPasw" required><div id="showPaswR" class="mostra" onclick="showPaswR()">Mostra</div>
		    <br>
		    <input type="password" id="conf" name="confirm" placeholder="Conferma la nuova password" required><div id="showConfR" class="mostra" onclick="showConfR()">Mostra</div>
		    <br>
				<input type="submit" name="submit" value="REIMPOSTA" class="button reimposta" style="width:180px!important" rel="noopener noreferrer">
				
			</form>
	  </div>
	</div>

	<footer id="footer">@diritti riservati al Gruppo 2</footer>
		
	<script src="js/form.js"></script>
</body>
</html>