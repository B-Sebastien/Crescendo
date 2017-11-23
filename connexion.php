<?php
session_start();
include'utilisateur.class.php';

if(isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['mdp']) )
{
		utilisateur::logUtilisateur($_POST['login'], $_POST['mdp']);
		header('location:C:\wamp\www\php\ppe-2016-05-23\E-commerce\Crescendo\index.php');
	
}
else
{
	$_SESSION['result']="Champ(s) vide(s)";
	header('location:connexion.php');
}