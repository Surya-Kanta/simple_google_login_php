<?php
	require_once "config.php";

	$_SESSION = [];
	// $gClient->revokeToken();
	session_destroy();
	header('Location: login.php');
	exit();
?>