<?php 
require_once'fonction.php';
class utilisateur
{
	
private $id;
private $login;
private $mdp;
private $type;
private $email;
	

public function getId()
{
	return id;
}

public function getLogin()
{
	return login;
}

public function getMdp()
{
	return mdp;
}

public function getType()
{
	return type;
}
public function getEmail()
{
	return email;
}

public function setId()
{
	$this->id = $id;
}
public function setLogin()
{
	$this->login = $login;
}
public function setMdp()
{
	$this->mdp = $mdp;
}
public function setType()
{
	$this->type = $type;
}
public function setEmail()
{
	$this->email = $email;
}

static function logUtilisateur($log, $pass){
	session_start();
	$bdd=connexion();
	$sql="select * from utilisateur where LOGIN=?";
	$stt= $bdd->prepare($sql);
	$stt->execute(array($log));
	$nb= $stt->rowcount();
	if($nb!=0){
		while($ligne=$stt->fetch(PDO::FETCH_OBJ)){
			if($ligne->PASSWORD==sha1($pass)){
				$_SESSION['Auth']=array(
					'id'=>$ligne->IDUTIL,
					'login'=>$ligne->LOGIN,
					'mdp'=>$ligne->PASSWORD,
					'type'=>$ligne->RANG );
					 unset($_SESSION['result']);
				}
			else {
			return $_SESSION['result']="Mot de passe incorrect";
			}
		}
	}
	else {
		return $_SESSION['result']="Login inconnu";
	}
}

static function estLog(){
	if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']) && isset($_SESSION['Auth']['mdp'])){
		$bdd=connexion();
		$sql="select LOGIN, PASSWORD from utilisateur where LOGIN=:login";
		$stt=$bdd->prepare($sql);
		$stt->bindParam('login', $_SESSION['Auth']['login'], PDO::PARAM_STR);
		$stt->execute();
		$nb=$stt->rowcount();
			if($nb!=0){
				while($ligne=$stt->fetch(PDO::FETCH_OBJ)){
					if($ligne->PASSWORD==$_SESSION['Auth']['mdp']){
						$_SESSION['ok'] = 0;
						return true;
					}
					else{ 
					$_SESSION['ok'] = 1;
					return false; }
				}
			}
			else { 
			$_SESSION['ok'] = 1;
			return false; }
	}
}
	
	
	
}
?>