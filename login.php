<!DOCTYPE html>
<html lang="it">
<head>
  <title>Login</title>
  <?php // require 'components/header.php'; ?>
  <?php session_start(); require 'secure/notForLog.php'; ?>
  <!--<link rel="stylesheet" type="text/css" href="css/form.css">-->
  <script src="js/validateLogin.js"></script>
</head>
<body>
	  
	<?php// $menu="Login"; require 'components/menu.php'; ?>

	<h1>Login</h1>
	<form name="loginForm" id="loginForm" onsubmit="return validateForm()" action="mod_login.php" method="post">
		<span <?php if(isset($_SESSION['erro']) && ($_SESSION['erro'] == "Registrazione effettuata!" || $_SESSION['erro'] == "Email inviata!" || $_SESSION['erro'] == "Password resettata!")){
	          			echo "style='color:#4bb543'";//echo "class='succ'";
	          		} else if(isset($_SESSION['erro'])){
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
	    <input type="password" name="pass" placeholder="Password:" required>
	    <br>
			<input type="checkbox" id="savePasw" name="savePasw" value="savePassword"> <label for="savePasw"> Ricorda password</label>
			<br>
	    <input type="submit" name="submit" value="Accedi" class="button" rel="noopener noreferrer">
	</form>
	<a href="richiestaPasw.php" rel="noopener noreferrer">password dimenticata</a>
	<br>
	<span>Non sei ancora registrato? <a href="signup.php" rel="noopener noreferrer">Registrati</a>.</span>

	<?php //include 'components/footer.php'; ?>

</body>
</html>