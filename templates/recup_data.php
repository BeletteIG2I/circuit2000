<?php
/*
 * Nom de fichier : recup_data.php
 * Description : Fichier PHP contenant les fonctionnalités de connexion et de déconnexion
 * Auteur(s) : Maxence DELATTRE
*/

session_start();

if(!isset($_SESSION['connecte']))
	$_SESSION['connecte'] = false;

include('../libs/bdd.php');
include('../libs/maLibUtils.php');
include('../libs/maLibSecurisation.php');

foreach($_POST as $key => $value) {
    $postkeyname = "POST".$key;
	if(ctype_digit($value)) {
		$value = intval($value);
	}
	else {
		// $value = mysql_real_escape_string($value);
		$value = addcslashes($value, '%_');
	}
    $$postkeyname = htmlentities($value,ENT_QUOTES,"UTF-8");
}

foreach($_GET as $key => $value) {
    $getkeyname = "GET".$key;
	if(ctype_digit($value)) {
		$value = intval($value);
	}
	else {
		// $value = mysql_real_escape_string($value);
		$value = addcslashes($value, '%_');
	}
    $$getkeyname = htmlentities($value,ENT_QUOTES,"UTF-8");
}

if(isset($_POST['action'])) {
	if($_POST['action'] == 'getEspacePerso') {
		$login = $_POST['login'];
		if(($login && $login != "") || $_SESSION['connecte']) {
			$passe = sha1(md5(sha1($_POST['password']))); // voir maLibUtils.php
			if(($passe && $_POST['password'] != "") || $_SESSION['connecte']) {
				if(verifUser($login,$passe) || $_SESSION['connecte']) { // voir maLibSecurisation.php
					if($_SESSION['connecte'])
						include('espace_clients.php');
					else
						echo('problem:problem de connexion');
					die("");
				}
				else {
					echo('problem:Identifiants incorrects');
					die("");
				}
			}
			else {
				echo('problem:Mot de passe non valide');
				die("");
			}
		}
		else {
			echo('problem:Identifiant non valide');
			die("");
		}
	}
	else if($_POST['action'] == 'deconnecter') {
		session_destroy();
	}
}
else {
	echo('problem:Méthode non supportée');
}

?>