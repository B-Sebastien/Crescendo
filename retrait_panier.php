<?php
session_start();
$id = $_GET['idInstru'];

$_SESSION['panier'][$id]--;

if($_SESSION['panier'][$id]==0)
{
	unset($_SESSION['panier'][$id]);
}
		
header("location:panier.php");
?>