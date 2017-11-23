<?php
session_start();

	$id = $_GET['idInstru'];
	$_SESSION['idInstru'] = $id;
	
		if (!isset($_SESSION['panier'])) 
		{
			$_SESSION['panier'] = array();
			
		}
		if (isset($_SESSION['panier'][$id])) 
		{
			$_SESSION['panier'][$id]++;
		}
			else 
			{
				$_SESSION['panier'][$id]=1;
			}
			
	$_SESSION['success'] = "Le produit a été ajouté au panier !";
	
	header("location:detailprod.php");
?>