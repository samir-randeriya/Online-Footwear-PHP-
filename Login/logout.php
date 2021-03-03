<?php
	session_start(); 
	unset($_SESSION["userid"]);
	// unset($_SESSION["name"]); 
	// unset($_SESSION["email_id"]); 
	header("Location:../home.php");
?>