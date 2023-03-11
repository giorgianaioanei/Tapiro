<?php
	if(isset($_GET['out'])){
		if(isset($_COOKIE['logid'])){
			setcookie('logid', '', -1, "/");
			unset($_COOKIE['logid']);
		}
		if(isset($_COOKIE['splash'])){
			setcookie('splash', '', -1, "/");
			unset($_COOKIE['splash']);
		}

		session_start();
		$_SESSION = array();
		session_destroy();
	}

	header("Location: index.php");
?>