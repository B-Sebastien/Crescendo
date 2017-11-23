	<div id="top">
        <div class="container">
            <div class="col-md-12" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Se connecter</a>
                    </li>
                    <li><a href="inscription.php">S'inscrire</a>
                    </li>
                    <li><a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Se connecter</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="mot de passe">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Connexion</button>
                            </p>
                        </form>

                        <p class="text-center text-muted">Non enregistré ?</p>
                        <p class="text-center text-muted"><a href="inscription.php"><strong>Enregistrez vous maintenant !</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Accueil Crescendo</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="panier.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Panier <?php if(isset($_SESSION['panier'])){ echo "(".count($_SESSION['panier']).")"; }?></span>
                    </a>
                </div>
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Accueil</a></li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Instruments<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
										<div class="col-sm-3">
											<h5><a href="catalogue.php">Tous les produits</a></h5>
                                        </div>
										<div class="col-sm-3">
                                            <h5><a href="cat-vent.php">Vents</a></h5>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5><a href="cat-corde.php">Cordes</a></h5>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5><a href="cat-percu.php">Percussions</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    </li>
						</ul>
            </div>

            <div class="navbar-buttons">
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="panier.php" class="btn btn-primary navbar-btn">
						<i class="fa fa-shopping-cart"></i><span class="hidden-sm">Panier <?php if(isset($_SESSION['panier'])){ echo "(".count($_SESSION['panier']).")"; }?></span></a>
                </div>

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="collapse clearfix" id="search">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
						</span>
                    </div>
                </form>
            </div>
        </div>
    </div>