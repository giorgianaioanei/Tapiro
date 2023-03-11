<!DOCTYPE html>
<html lang="it">
<head>
  <title>Sign up</title>
  <?php // require 'components/header.php'; ?>
  <?php session_start(); require 'secure/notForLog.php'; ?>
  <!--<link rel="stylesheet" type="text/css" href="css/form.css">-->
  <script src="js/validateRegister.js"></script>
</head>
<body>
	  
	<?php// $menu="SignUp"; require 'components/menu.php'; ?>

	<h1>Sign up</h1>
	<form name="signupForm" id="signupForm" onsubmit="return validateForm()" action="mod_signup.php" method="post">
		<span <?php if(isset($_SESSION['erro'])){
	          			echo "style='color:#cc0000'";//echo "class='erro'";
	          		}
	          	?> id="res"><?php if(isset($_SESSION['erro'])){ echo $_SESSION['erro']; } ?></span>
	    <?php 
	    	if(isset($_SESSION['erro'])){ echo "<script>setTimeout(function(){ document.getElementById('res').removeAttribute('class') }, 5000);</script>"; }
	     	unset($_SESSION['erro']);
	    ?>
	    <br>
	    <input type="text" name="firstname" placeholder="Nome:" required>
	    <br>
			<input type="text" name="lastname" placeholder="Cognome:" required>
	    <br>
	    <input type="email" name="email" placeholder="Email:" required>
	    <br>
	    <input type="password" name="pass" placeholder="Password:" required>
	    <br>
	    <input type="password" name="confirm" placeholder="Conferma Password:" required>
			<br>
	    <input type="submit" name="submit" value="Registrati" rel="noopener noreferrer">
	</form>
	<br>
	<span>Sei già registrato? <a href="login.php" rel="noopener noreferrer">Accedi</a>.</span>

	<?php //include 'components/footer.php'; ?>

</body>
</html>