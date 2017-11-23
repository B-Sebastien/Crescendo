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
    <meta name="keywords" content="">
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
                <div class="col-md-3">
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Instruments</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
								<li><a href="catalogue.php">Tous <span class="badge pull-right"></span></a></li>
                                <li><a href="cat-vent.php">Vents <span class="badge pull-right"></span></a></li>
                                <li><a href="cat-corde.php">Cordes  <span class="badge pull-right"></span></a></li>
								<li><a href="cat-percu.php">Percussions  <span class="badge pull-right"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
				<?php
					if(isset($_POST['idInstru']))
					{
					$idInstru = $_POST['idInstru'];
					}
						else if(isset($_SESSION['idInstru']))
						{
						$idInstru = $_SESSION['idInstru'];
						unset($_SESSION['idInstru']); 
						}
						
					$sql = "select * from INSTRUMENT where IDINSTRU='".$idInstru."'";
					$res = $bdd->query($sql);
					while ($produit=$res->fetch(PDO::FETCH_OBJ))
					{
						$_SESSION['idInstru']=$produit->IDINSTRU;
				?>
                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <center><img src="<?php echo $produit->IMAGEINSTRU ?>" alt="" class="img-responsive"></center>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h2 class="text-center"><?php echo $produit->NOMINSTRU ?></h2>
								<p class="text-right"><strong><?php echo $produit->PRIXINSTRU ?>€</strong></p>
								
							<?php 
								if($produit->NBSTOCKINSTRU >0){ ?>
								<div class="product-stock">En stock</div>
									<hr>
								<p class="text-center buttons">
                                    <a href="ajout_panier.php?idInstru=<?php echo $produit->IDINSTRU ?>&prixInstru=<?php echo $produit->PRIXINSTRU ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Ajouter panier</a> 
                                </p>
							<?php } 
								else{ ?>
									<div class="product-nostock">Rupture de stock</div>
							<?php } ?>
                            </div>
                        </div>
                    </div>
										<?php
					 }
					?> 
					<div class="box" id="details">
					<?php 
					$sql = "select * from INSTRUMENT where IDINSTRU='".$idInstru."'";
					$res=$bdd->query($sql);
			
					$produit = $res -> fetch(PDO::FETCH_OBJ);
			
					?>
                            <h4>Description</h4>
                            <p><?php echo $produit->DESCRIPTIONINSTRU ?></p>

                            <hr>
                    </div>
                </div>
            </div>
        </div>

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
	<script type="text/javascript">
	$(document).ready(function() {
		$('.success').delay(1000).slideUp();
	});
	</script>

</body>
</html>