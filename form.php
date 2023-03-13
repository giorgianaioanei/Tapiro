<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
  <?php session_start(); require 'secure/notForLog.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <script src="js/validateLogin.js"></script>
  <script src="js/validateRegister.js"></script>
  <script src="js/validateEmail.js"></script>
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
	    <li onclick="formLogin(this)">
	      <a href="#login" id="aLogin" class="active">LOG-IN</a>
	    </li>
	    <li onclick="formSignup()">
	      <a href="#register" id="aSignup" >SIGN-UP</a>
	    </li>
	  </ul>


	  <!--/#login.form-action-->


	  <div id="login" class="form-action show">
	    
	    <form name="loginForm" id="loginForm" onsubmit="return validateLogin()" action="mod_login.php" method="post">
				<span <?php if(isset($_SESSION['erroL']) && ($_SESSION['erroL'] == "Registrazione effettuata!" || $_SESSION['erroL'] == "Email per recupero password inviata!" || $_SESSION['erroL'] == "Password resettata!")){
		          			echo "class='succ'";
		          		} else if(isset($_SESSION['erroL'])){
		          			echo "class='erro'";
		          		}
		          	?> id="resL"><?php if(isset($_SESSION['erroL'])){ echo $_SESSION['erroL']; } ?></span>
		    <?php 
		    	if(isset($_SESSION['erroL'])){ echo "<script>setTimeout(function(){ document.getElementById('resL').removeAttribute('class') }, 5000);</script>"; }
		     	unset($_SESSION['erroL']);
		    ?>
		    <br>
		    <input type="email" name="email" placeholder="Inserisci la tua email" required>
		    <br>
		    <input type="password" id="pasw" name="pass" placeholder="Inserisci la password" required><div id="showPaswL" class="mostra" onclick="showPaswL()">Mostra</div>
		    <br>
				<div id="footerLogin">
					<input type="checkbox" id="savePasw" name="savePasw" value="savePassword"> <label for="savePasw"> Ricordami</label>

					<a onclick="document.getElementById('popup').style.display='block';" rel="noopener noreferrer" class="dimenticata">Password dimenticata?</a>
					<br>
					<input type="submit" name="submit" value="ACCEDI" class="button" rel="noopener noreferrer">
				</div>
				
			</form>
			<!-- ----------- POPUP -------------- -->
					<div id="popup" class="modal">
					    <div class="modal-content">
					    	<form name="richiestaEmail" id="richiestaEmail" onsubmit="return validateEmail()" action="mod_email.php" method="post">
					    	<div id="popClose" class="popClose" onclick="document.getElementById('popup').style.display='none'">X</div>
					      <p class="titlePop">PASSWORD DIMENTICATA?</p>
					      <span <?php if(isset($_SESSION['erroE'])){
						          			echo "class='erro'";
						          		}
						          	?> id="resE"><?php if(isset($_SESSION['erroE'])){ echo $_SESSION['erroE']; } ?></span>
						    <?php 
						    	if(isset($_SESSION['erroE'])){ echo "<script>setTimeout(function(){ document.getElementById('resE').removeAttribute('class') }, 5000);</script>"; }
						     	unset($_SESSION['erroE']);
						    ?>
					      <input type="email" name="email" class="popEmail" placeholder="Inserisci la tua email" required>
					      <br>
					      <input type="submit" name="submit" value="PROSEGUI" class="popButton" rel="noopener noreferrer">
					    </form>
					    </div>
					</div>
					<!-- ----------------------------------- -->
	  </div>


	  <!--/#register.form-action-->


	  <div id="register" class="form-action hide">
	    
	    <form name="signupForm" id="signupForm" onsubmit="return validateRegister()" action="mod_signup.php" method="post">
				<span <?php if(isset($_SESSION['erroR'])){
		          			echo "class='erro'";
		          		}
		          	?> id="resR"><?php if(isset($_SESSION['erroR'])){ echo $_SESSION['erroR']; } ?></span>
		    <?php 
		    	if(isset($_SESSION['erroR'])){ echo "<script>setTimeout(function(){ document.getElementById('resR').removeAttribute('class') }, 5000);</script>"; }
		     	unset($_SESSION['erroR']);
		    ?>
		    <br>
		    <input type="text" name="firstname" placeholder="Nome" required>
		    <br>
		    <input type="text" name="lastname" placeholder="Cognome" required>
		    <br>
		    <input type="email" name="email" placeholder="Inserisci la tua email" required>
		    <br>
		    <input type="password" id="paswR" name="pass" placeholder="Inserisci la password" required><div id="showPaswR" class="mostra" onclick="showPaswR()">Mostra</div>
		    <br>
		    <input type="password" id="conf" name="confirm" placeholder="Conferma la password" required><div id="showConfR" class="mostra" onclick="showConfR()">Mostra</div>
		    <br>
				<div id="footerLogin">
					<input type="checkbox" id="robot" name="robot" required> <label for="robot"> Non sono un robot</label>
					<br><br>
					<input type="checkbox" id="dati" name="dati" required> <label for="dati"> Autorizzo il trattamento dei dati</label>
					<br>
					<input type="submit" name="submit" value="REGISTRATI" class="button reg" rel="noopener noreferrer">
				</div>
				
			</form>
	  </div>
	</div>

	<footer id="footer">@diritti riservati al Gruppo 2</footer>
		
	<script src="js/form.js"></script>
</body>
</html>