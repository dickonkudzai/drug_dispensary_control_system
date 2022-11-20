<?php
	$connect = new PDO('mysql:host=localhost;dbname=pharmacy_trial_run', 'root', '');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>