<?php
//connexion
require 'config.php';

function connect() {
	try {
		$bdd = new PDO ('mysql:host='.HOTE.';dbname='.BASE,USER,PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $bdd;
	}
	catch(PDOException $e) {
		echo "Pb de connexion". $e->getMessage();
		return false;
	}
}
?>