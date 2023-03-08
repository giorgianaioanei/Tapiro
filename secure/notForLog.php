<?php
	if(isset($_SESSION['Email']) || isset($_COOKIE['logid'])){
		header("Location: index.php");
	}
?>