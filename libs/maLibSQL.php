<?php

include_once "config.php";

/*
 * @file maLibSQL.php
 * Ce fichier définit les fonctions de requêtage
 * Il nécessite d'avoir défini les variables $BDD_login, $BDD_password $BDD_chaine dans config.php, qui est chargé au moment de l'appel de la librairie
 * @note Pour accélérer les traitements, les requêtes aux bases de données seront persistantes : on ne les fermera pas à chaque fin de requête. 
 * On utilise pour cela la fonction pconnect
 * @todo On pourrait tracer les requêtes dans une table de logs
 */


/*
 * Exécuter une requête UPDATE. Renvoie le nb de modifs ou faux si pb
 * On testera donc avec === pour différencier faux de 0 
 * @return le nombre d'enregistrements affectés, ou false si pb...
 * @param string $sql
 * @pre Les variables  $BDD_login, $BDD_password $BDD_chaine doivent exister
 */
function SQLUpdate($sql) {
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;

	$link = mysqli_connect($BDD_host, $BDD_user,$BDD_password) or die("<font color=\"red\">Erreur de connexion : " . mysqli_error($link) . "</font>");
	mysqli_select_db($link,$BDD_base) or die ("<font color=\"red\">Erreur select db : " . mysqli_error($link) . "</font>");
	mysqli_query($link,"SET NAMES UTF8" ); 
	mysqli_query($link,$sql) or die("Erreur sur la requete : <font color=\"red\">$sql</font>");
	
	$nb = mysqli_affected_rows($link);
	if ($nb != -1) return $nb;
	else return false;
	
}

function SQLDelete($sql) {
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;

	$link = mysqli_connect($BDD_host, $BDD_user,$BDD_password) or die("<font color=\"red\">Erreur de connexion : " . mysqli_error($link) . "</font>");
	mysqli_select_db($link,$BDD_base) or die ("<font color=\"red\">Erreur select db : " . mysqli_error($link) . "</font>");
	mysqli_query($link,"SET NAMES UTF8" ); 
	$rs = mysqli_query($link,$sql) or die("Erreur sur la requete : <font color=\"red\">$sql</font>");

	if($rs) return $rs;
	else return false;
}


/*
 * Exécuter une requête INSERT 
 * @param string $sql
 * @pre Les variables  $BDD_login, $BDD_password $BDD_chaine doivent exister
 * @return Renvoie l'insert ID ... utile quand c'est un numéro auto
 */
function SQLInsert($sql) {
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;
	
	$link = mysqli_connect($BDD_host,$BDD_user,$BDD_password) or die("<font color=\"red\">Erreur de connexion : " . mysqli_error($link) . "</font>");
	mysqli_select_db($link,$BDD_base) or die ("<font color=\"red\">Erreur select db : " . mysqli_error($link) . "</font>");
	mysqli_query($link,"SET NAMES UTF8" ); 
	
	$rs = mysqli_query($link,$sql) or die("Erreur sur la requete : <font color=\"red\">$sql" . "|". mysqli_error($link) . "</font>");
	
	if ($rs) return mysqli_insert_id($link);
	else return false;
}



/*
* Effectue une requete SELECT dans une base de données SQL SERVER, pour récupérer uniquement un champ (la requete ne doit donc porter que sur une valeur)
* Renvoie FALSE si pas de resultats, ou la valeur du champ sinon
* @pre Les variables  $BDD_login, $BDD_password $BDD_chaine doivent exister
* @param string $SQL
* @return false|string
*/
function SQLGetChamp($sql) {
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;

	$link = mysqli_connect($BDD_host,$BDD_user,$BDD_password) or die("<font color=\"red\">Erreur de connexion : " . mysqli_error($link) . "</font>");
	mysqli_select_db($link,$BDD_base) or die ("<font color=\"red\">Erreur select db : " . mysqli_error($link) . "</font>");
	mysqli_query($link,"SET NAMES UTF8" ); 
	
	$rs = mysqli_query($link,$sql) or die("Erreur sur la requete : <font color=\"red\">$sql</font>");
	$num = mysqli_num_rows($rs);
	
	// On pourrait utiliser mysqli_fetch_field() ??
	
	if ($num==0) return false;
	
	$ligne = mysqli_fetch_row($rs);
	if ($ligne == false) return false;
	else return $ligne[0];

}

/*
 * Effectue une requete SELECT dans une base de données SQL SERVER
 * Renvoie FALSE si pas de resultats, ou la ressource sinon
 * @pre Les variables  $BDD_login, $BDD_password $BDD_chaine doivent exister
 * @param string $SQL
 * @return boolean|resource
 */
function SQLSelect($sql) {
 	global $BDD_host;
	global $BDD_base;
 	global $BDD_user;
 	global $BDD_password;
	
 	$link = mysqli_connect($BDD_host,$BDD_user,$BDD_password) or die("<font color=\"red\">Erreur de connexion : " . mysqli_error($link) . "</font>");
 	mysqli_select_db($link,$BDD_base) or die ("<font color=\"red\">Erreur select db : " . mysqli_error($link) . "</font>");
	mysqli_query($link,"SET NAMES UTF8" ); 
	
	$rs = mysqli_query($link,$sql) or die("Erreur sur la requete : <font color=\"red\">$sql" . "|" .  mysqli_error($link) . "</font>");
	$num = mysqli_num_rows($rs);
	if ($num==0) return false;
	else return $rs;
}

/*
* Parcours les enregistrements d'un résultat mysqli et les renvoie sous forme de tableau associatif
* On peut ensuite l'afficher avec la fonction print_r, ou le parcourir avec foreach
* @param resultat_mysqli $result
*/
function parcoursRs($result) {
	if  ($result == false) return array();

	while ($ligne = mysqli_fetch_assoc($result)) 
		$tab[]= $ligne;

	return $tab;
}

?>