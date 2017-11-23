<?php
require_once'fonction.php';
class utilisateurFactory{
	
static function sauvegardeUtilisateur($login, $mdp, $type, $email)
{
	$bdd= connexion();
	$type="membre";
	$sql="insert into utilisateur(LOGIN, PASSWORD, RANG, MAIL) values(?,?,?,?)";
	$stt=$bdd->prepare($sql);
	$stt->execute(array(
	$login,$mdp,$type,$email) );
	include'utilisateur.class.php';
	utilisateur::logUtilisateur($_POST['login'], $_POST['mdp']);
		header('location:connecter.php');
	
}

static function userExiste($login)
{
	$bdd=connexion();
	$sql="select IDUTIL from utilisateur where LOGIN=?";
	$stt=$bdd->prepare($sql);
	$stt->execute(array($login));
	$nb=$stt->rowcount();
	if($nb!=0)
	{
		return true;
	}
	else
	{
		return false;
	}
	$stt->close();
	$bdd->close();
	
}

static function emailExiste($email)
{
	$bdd=connexion();
	$sql="select IDUTIL from utilisateur where MAIL=?";
	$stt=$bdd->prepare($sql);
	$stt->execute(array($email));
	$nb=$stt->rowcount();
	if($nb!=0)
	{
		return true;
	}
	else
	{
		return false;
	}
	$stt->close();
	$bdd->close();
	
}
}
?>