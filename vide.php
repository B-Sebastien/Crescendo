<?php
session_start();
require_once'fonction.php';
$bdd = connect();

		unset($_SESSION['panier']);
		$_SESSION['vidage'] = "Le panier a été correctement vidé !";
		header('Location: index.php');  
?>
