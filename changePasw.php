<!DOCTYPE html>
<html lang="it">
<head>
  <title>Reset Password</title>
  <?php // require 'components/header.php'; ?>
  <?php
  	session_start();
  	require 'secure/notForLog.php';
  	if(!isset($_GET['email']) && !isset($_GET['id'])) header("Location: logout.php?out");
  ?>
  <!--<link rel="stylesheet" type="text/css" href="css/form.css">-->
  <script src="js/validatePassword.js"></script>
</head>
<body>

	<?php// $menu="Reset"; require 'components/menu.php'; ?>

	<h1>Reset Password</h1>
	<form name="resetForm" id="resetForm" onsubmit="return validateForm()" action="mod_reset.php" method="post">
		<span <?php if(isset($_SESSION['erro'])){
	          			echo "style='color:#cc0000'";//echo "class='erro'";
	          		}
	          	?> id="res"><?php if(isset($_SESSION['erro'])){ echo $_SESSION['erro']; } ?></span>
	    <?php
	    	if(isset($_SESSION['erro'])){ echo "<script>setTimeout(function(){ document.getElementById('res').removeAttribute('class') }, 5000);</script>"; }
	     	unset($_SESSION['erro']);
	    ?>
	    <br>
	    <input type="hidden" name="email" value=<?php echo "'".$_GET['email']."'"; ?>>
	    <input type="hidden" name="id" 		value=<?php echo "'".$_GET['id']."'"; ?>>
	    <input type="password" name="pass" placeholder="Password:" required>
	    <br>
	    <input type="password" name="confirm" placeholder="Conferma Password:" required>
	    <br>
	    <input type="submit" name="submit" value="Modifica" class="button" rel="noopener noreferrer">
	</form>
	<br>

	<?php //include 'components/footer.php'; ?>

</body>
</html>