<?php
	session_start();
	// session_destroy();
	$_SESSION['status'] = false;
	
	header('location: login.php');
?>