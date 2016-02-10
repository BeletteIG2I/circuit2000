<?php

include_once ('maLibSQL.php');

/*
 * @file login.php
 * Fichier contenant des fonctions de vérification de logins
 */

/*
 * Cette fonction vérifie si le login/passe passés en paramètre sont légaux
 * Elle stocke le pseudo de la personne dans des variables de session : session_start doit avoir été appelé...
 * Elle enregistre aussi une information permettant de savoir si l'utilisateur qui se connecte est administrateur ou non
 * Elle enregistre l'état de la connexion dans une variable de session "connecte" = true
 * @pre login et passe ne doivent pas être vides
 * @param string $login
 * @param string $password
 * @return false ou true ; un effet de bord est la création de variables de session
 */
function verifUser($login /*= ''*/, $password/* = ''*/) {
	$SQL = "SELECT id FROM client WHERE mail='" . $login . "' AND mdp='" . $password . "'";
	$idUser = SQLGetChamp($SQL); // renvoie la valeur de id ou false

	if($idUser) {
			$_SESSION["login"] = $login;
			$_SESSION["connecte"] = true;
			
			

			$SQL = "SELECT fonction FROM client WHERE id=$idUser";
			$admin = SQLGetChamp($SQL);
			
			if($admin)
				//echo "<script> console.log('test') </script>";
				$_SESSION["admin"] = $admin;
			//echo "<script> console.log('test2') </script>";
			return true; 
	}

	return false;
}

?>