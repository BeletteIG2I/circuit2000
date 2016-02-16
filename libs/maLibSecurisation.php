<?php

include_once ('maLibSQL.php');

/*
 * @file login.php
 * Fichier contenant des fonctions de v�rification de logins
 */

/*
 * Cette fonction v�rifie si le login/passe pass�s en param�tre sont l�gaux
 * Elle stocke le pseudo de la personne dans des variables de session : session_start doit avoir �t� appel�...
 * Elle enregistre aussi une information permettant de savoir si l'utilisateur qui se connecte est administrateur ou non
 * Elle enregistre l'�tat de la connexion dans une variable de session "connecte" = true
 * @pre login et passe ne doivent pas �tre vides
 * @param string $login
 * @param string $password
 * @return false ou true ; un effet de bord est la cr�ation de variables de session
 */
function verifUser($login /*= ''*/, $password/* = ''*/) {
	$SQL = "SELECT id FROM user WHERE mail='" . $login . "' AND mdp='" . $password . "'";
	$idUser = SQLGetChamp($SQL); // renvoie la valeur de id ou false

	if($idUser) {
			$_SESSION["login"] = $login;
			$_SESSION["connecte"] = true;
			
			

			$SQL = "SELECT fonction FROM user WHERE user.id = ". $idUser;
			$admin = SQLGetChamp($SQL);
			
			if($admin)
				$_SESSION["admin"] = $admin;
			
			return true; 
	}

	return false;
}

?>