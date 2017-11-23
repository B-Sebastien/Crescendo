<?php
	require_once'fonction.php';
	$bdd = connect();
	session_start();

	if(!empty($_POST))
	{
		extract($_POST);
		$valid = true;
		include('utilisateurFactory.class.php');
	
	if(!empty($login) && utilisateurFactory::userExiste($login))
	{
		$valid = false;
		$erreurLoginExiste = true;
	}
	if(!empty($email) && utilisateurFactory::emailExiste($email))
	{
		$valid = false;
		$erreurEmailExiste = true;
	}
	if(!empty($mdp) && !empty($mdp2) && $mdp!=$mdp2)
	{
		$valid = false;
		$erreurmdpdiff = true;
	}
	
	if(!empty($email) && !empty($email2) && $email!=$email2)
	{
		$valid = false;
		$erreuremaildiff = true;
	}
	if($valid) 
	{
		$type = "membre";
		$crypt = sha1($mdp);
		utilisateurFactory::sauvegardeUtilisateur($login, $crypt, $type, $email);
			$crea_valide = true;
			if($crea_valide)
			{
				$_SESSION['Auth']=array('login'=>$login,'mdp'=>sha1($mdp),'type'=>$type );
				header('location:connecter.php');
			}
	}
	}
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
    <title>
        Crescendo : E-commerce Instruments
    </title>
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <!-- styles -->
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
                <div class="col-md-6">
                    <div class="box">
                        <h1>Nouveau compte</h1>
                        <hr>
                        <form action="index.php" method="post">
							<div class="form-group">
                               <div class="input-group">
									<label>Login</label>
									<input type="text" class="form-control" id="login" name="login" placeholder="Login"  />
								</div>
                            </div>
							
                            <div class="form-group">
                                <div class="input-group">
									<label>E-mail</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="E-mail" />
								</div>
                            </div>
							
                            <div class="form-group">
                                <div class="input-group">
									<label>Mot de passe</label>
									<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password" >
								</div> 
                            </div>
							
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> S'enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Connexion</h1>
                        <hr>
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Se connecter</button>
                            </div>
                        </form>
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