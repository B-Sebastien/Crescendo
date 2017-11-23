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
            <div class="col-md-12">
			<h2>Crescendo ! Un site E-commerce d'instrument de musique !</h2>
			<p>Ce site entièrement factice réalisé en BTS SIO au lycée Maximilien Sorre à Cachan.</p>
 
                <div id="main-slider">
                    <div class="item"><center><img src="img/slider1.jpg" alt="" class="img-responsive"></center></div>
                    <div class="item"><center><img class="img-responsive" src="img/slider2.jpg" alt=""></center></div>
                    <div class="item"><center><img class="img-responsive" src="img/slider3.jpg" alt=""></center></div>
                </div>
            </div>
        </div>

        <div id="hot">
            <div class="box">
                <div class="container">
                    <div class="col-md-12"><h2>Nos Produits</h2></div>
                </div>
            </div>
				
            <div class="container">
                <div class="product-slider">
					<?php
						$sql="select * from instrument";
						$res=$bdd->query($sql);
			
						while($produit = $res -> fetch(PDO::FETCH_OBJ)) 
						{
					?>
                    <div class="item">
                    <div class="product">
                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front">
                                    <a name="idInstru"><img src="<?php echo $produit->IMAGEINSTRU ?>" alt="" class="img-responsive"></a>
                                </div>
                                <div class="back">
                                    <a name="idInstru"><img src="<?php echo $produit->IMAGEINSTRU ?>" alt="" class="img-responsive"></a>
                                </div>
                            </div>
                        </div>
						
						<a href="detailprod.php" class="invisible"><img src="<?php echo $produit->IMAGEINSTRU ?>" alt="" class="img-responsive"></a>
                        <div class="text">
                            <h3><?php echo $produit->NOMINSTRU ?></h3>
                            <p class="price"><?php echo $produit->PRIXINSTRU." €" ?> </p>
									
							<form class="buttons" action="detailprod.php" method="POST">
								<input type="hidden" name="idInstru" value="<?php echo $produit->IDINSTRU; ?>" />
								<button class="btn btn-primary" >Détails</button>
							</form>
                        </div>
                    </div>
                    </div>
					<?php
					}
					?> 
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
</body>
</html>