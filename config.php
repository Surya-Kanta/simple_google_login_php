<?php
	session_start();
	require_once "vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("");
	$gClient->setClientSecret("");
	$gClient->setApplicationName("Simple Login");
	$gClient->setRedirectUri("http://glogin.com/index.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
