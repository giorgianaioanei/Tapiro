<!DOCTYPE html>
<html lang="it">
<head>
  <title>Richiesta Password</title>
  <?php // require 'components/header.php'; ?>
  <?php session_start(); require 'secure/notForLog.php'; ?>
  <!--<link rel="stylesheet" type="text/css" href="css/form.css">-->
  <script src="js/validateEmail.js"></script>
</head>
<body>
	  
	<?php// $menu="Richiesta"; require 'components/menu.php'; ?>

	<h1>Recupera Password</h1>
	<form name="richiestaForm" id="richiestaForm" onsubmit="return validateForm()" action="mod_email.php" method="post">
		<span <?php if(isset($_SESSION['erro'])){
	          			echo "style='color:#cc0000'";//echo "class='erro'";
	          		}
	          	?> id="res"><?php if(isset($_SESSION['erro'])){ echo $_SESSION['erro']; } ?></span>
	    <?php 
	    	if(isset($_SESSION['erro'])){ echo "<script>setTimeout(function(){ document.getElementById('res').removeAttribute('class') }, 5000);</script>"; }
	     	unset($_SESSION['erro']);
	    ?>
	    <br>
	    <input type="email" name="email" placeholder="Email:" required>
	    <br>
	    <input type="submit" name="submit" value="Invia" class="button" rel="noopener noreferrer">
	</form>
	<br>
	<span>Hai trovato la password? <a href="login.php" rel="noopener noreferrer">Accedi</a>.</span>

	<?php //include 'components/footer.php'; ?>

</body>
</html>