<?php 
session_start();

if(isset($_SESSION['username'])){
	header('location:index.php');
}else{
	if(isset($_COOKIE['username']) ||  isset($_COOKIE['password'])){
		
		header('location:index.php');
	}	
}
?>