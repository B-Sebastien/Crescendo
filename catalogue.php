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
    <link href="css/custom.css" rel="stylesheet">
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
							<li><a href="catalogue.php">Tous </a></li>
							<li><a href="cat-vent.php">Vents <span class="badge pull-right"></span></a></li>
							<li><a href="cat-corde.php">Cordes  <span class="badge pull-right"></span></a></li>
							<li><a href="cat-percu.php">Percussions  <span class="badge pull-right"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		
			<div class="col-md-9">
				<div class="row products">
				<?php
					$sql="select * from instrument";
					$res=$bdd->query($sql);
			
					while($produit = $res -> fetch(PDO::FETCH_OBJ)) 
					{
				?>
					<div class="col-md-3 col-sm-4">
					<div class="product">
						<div class="flip-container">
                            <div class="flipper">
                                <div class="front"><img src="<?php echo $produit->IMAGEINSTRU ?>" alt="" class="img-responsive"></div>
                                <div class="back"><img src="<?php echo $produit->IMAGEINSTRU ?>" alt="" class="img-responsive"></div>
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