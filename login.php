<?php
require_once'fonction.php';
$bdd = connect();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Index </title>
	<meta charset="utf_8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link href="css/custom.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
	<div class="row">

<?php
	?>
			<div class="col-md-10">
			<h2> Connexion</h2>
			<br />
					<div class="col-md-2">
					</div>
					<div class="col-md-10">
					<form method="POST" action="connexion.php">
					<div class="form-group">
						<div class="input-group">
							<label>Login</label>
							<input type="text" class="form-control" id="login" name="login" placeholder="Login" />
						</div>
						<?php if(isset($_SESSION['result']) && $_SESSION['result']=="Login inconnu" ) { ?>
						<?php  echo $_SESSION['result']; ?>
						<?php unset($_SESSION['result']); 
					 } ?>
					</div>

					<div class="form-group">
						<div class="input-group">
							<label>Mot de passe</label>
							<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password" >
						</div> 
								<?php if(isset($_SESSION['result']) && $_SESSION['result']=="Mot de passe incorrect" ) { ?>
										<span class="help-block"> <?php  echo $_SESSION['result']; ?></span>
										<?php unset($_SESSION['result']); 
								 } ?>
					</div> 
							<?php if(isset($_SESSION['result']) && $_SESSION['result']=="Champ(s) vide(s)" ) { ?>
										<span class="help-block"><?php  echo $_SESSION['result']; ?></span>
										<?php unset($_SESSION['result']); 
								} ?>
						<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="submit" ></input>
						<a href="inscription.php" class="btn btn-primary" >Inscription</a>
					</div> 
				</form>
				</div>
	</div>
</div>
</div>
</body>
</html>