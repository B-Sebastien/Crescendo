<?php
	session_start();
	
	include_once('fonction.php');
	$bdd = connect();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <title>Crescendo : E-commerce Instruments</title>
    <!-- styles -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <!-- theme stylesheet -->
    <link href="css/style.blue.css" rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="css/sbcustom.css" rel="stylesheet">
    <script src="js/respond.min.js"></script>
    <link rel="shortcut icon" href="favicon.png">
</head>

<body>
<?php include_once("header.php"); ?>

<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-9" id="basket">
                <div class="box">
                    <form method="post" >
                        <h1>Panier</h1>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Produit</th>
										<th>Prix Unitaire</th>
                                        <th>Quantité</th>
                                        <th>Montant</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									$total=0;
									$frais=5;
									$totalttc=0;
									$id = $_SESSION['idInstru'];
									
									foreach($_SESSION['panier'] as $id=>$quantite) //recupere la quantite
									{
									$sql = "select * from INSTRUMENT where IDINSTRU='$id'";
									$res = $bdd->query($sql);
									while($produit = $res->fetch(PDO::FETCH_OBJ))
									{
									
								?>	
								<tr>
                                    <td><img src="<?php echo $produit->IMAGEINSTRU ?>" alt="f"></td>
                                    <td><a href="catalogue.php"><?php echo $produit->NOMINSTRU ?></a></td>
									<td><?php echo $produit->PRIXINSTRU ?> €</td>
                                    <td><?php echo $_SESSION['panier'][$id] ?></td>
                                    <td><?php echo $_SESSION['panier'][$id]*$produit->PRIXINSTRU ?> €</td>
                                    <td><a href="ajout_panierPanier.php?idInstru=<?php echo $produit->IDINSTRU ?>"><img src='img/ajouterPanier.png'></a></td>
									<td><a href='retrait_panier.php?idInstru=<?php echo $produit->IDINSTRU ?>'><img src='img/retirerPanier.png'></a></td>
								</tr>
								<?php
								$total+=$_SESSION['panier'][$id]*$produit->PRIXINSTRU;
									
                                                                        }
                                                                        
                                                                        }
								?>									
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2"><?php echo number_format($total/1.2,2,',','')?> €</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="catalogue.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continuer les achats</a>
                                </div>
                                <div class="pull-right">
									<a href="vide.php" class="btn btn-primary">Vider le panier</a>
                                    <button type="submit" class="btn btn-primary">Procéder à la commande <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

               <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Récapitulatif de payement</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Total HT</td>
                                        <th><?php echo number_format($total/1.2,2,',','')?> €</th>
                                    </tr>
                                    <tr>
                                        <td>TVA (20%)</td>
                                        <th><?php echo number_format($total-($total/1.2),2,',','')?> €</th>
                                    </tr>
                                    <tr>
                                        <td>Frais de port</td>
                                        <th><?php echo $frais?> €</th>
                                    </tr>									
                                    <tr class="total">
                                        <td>Total TTC</td>
                                        <th><?php echo number_format($total,2,',','')?> €</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

<?php include_once("footer.php"); ?>

        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="http://bootstrapious.com/e-commerce-templates">Bootstrapious</a> with support from <a href="https://kakusei.cz">Kakusei</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->

    </div>
    <!-- /#all -->

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
</body>
</html>