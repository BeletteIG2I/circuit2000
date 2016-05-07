<?php
/*
 * Nom de fichier : bdd.php
 * Description : Fichier PHP contenant les fonctions de base pour accéder aux informations de la base de données
 * Auteur(s) : Clément RUFFIN, Maxime DE COSTER, Maxence DELATTRE
*/

include("maLibSQL.php");



	function CreationCoursPlanning($idMoniteur,$idEleve,$description,$date){
		$sql = "INSERT INTO cours (idMoniteur, idEleve, description , date) VALUES ('".$idMoniteur."', '".$idEleve."', '".$description."', '".$date."')";
		$res = SQLInsert($sql); 
		return $res;

	}


	function getNomPrenomMoniteurs(){
		$sql="SELECT id, nom, prenom FROM user WHERE fonction=2";
		$res = SQLSelect($sql);

		return parcoursRs($res);
	}

	function getNomPrenomEleves(){
		$sql="SELECT id, nom, prenom FROM user WHERE fonction=0";
		$res = SQLSelect($sql);

		return parcoursRs($res);
	}



function InsertClientEleve($id) {
    // On insère l'utilisateur dans 'user' avec le champ 'fonction' à 0
    $sql = "INSERT INTO eleve(idEleve) VALUES ('$id')";
    $res = SQLInsert($sql);   

    return $res;
}

function InsertClient($nom, $prenom, $mail,$tel,$dateNaiss,$mdp,$numAdr,$rueAdr,$villeAdr,$codePostal) {

    // On insère l'utilisateur dans 'user' avec le champ 'fonction' à 0
    $sql = "INSERT INTO user(nom,prenom,mail,mdp,telephone,dateNaissance,fonction,numeroADR,rueADR,villeADR,codePostal) VALUES ('$nom','$prenom','$mail', '$mdp', '$tel','$dateNaiss','0','$numAdr', '$rueAdr', '$villeAdr', '$codePostal')";
    $res = SQLInsert($sql);
    return $res;
}   

function getClients() {
    $sql = "SELECT user.id, user.nom, user.prenom FROM user";
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getLastClients() {
    $sql = "SELECT MAX(user.id)FROM user";
    $res = SQLGetChamp($sql);

    return $res;
}

function getInfosClient($id) {
	$sql = "SELECT * FROM user WHERE id=" . $id;
	$res = SQLSelect($sql);

	return parcoursRs($res);
}

function getInfosEleve($id) {
	$sql = "SELECT * FROM eleve WHERE eleve.id=" . $id;
	$res = SQLSelect($sql);

	return parcoursRs($res);
}


function getMoniteurs() {
    $sql = "SELECT user.id, user.nom, user.prenom, moniteur.immatVoiture FROM user,moniteur WHERE user.id = moniteur.id";
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getInfosMoniteur($id) {
	$sql = "SELECT * FROM user,moniteur,vehicule WHERE user.id = moniteur.id AND moniteur.immatVoiture = vehicule.immatriculation AND user.id=" . $id;
	$res = SQLSelect($sql);

	return parcoursRs($res);
}

function getTpsPauseMoniteur(){
    $sql = "SELECT idMoniteur,temps_pause FROM cours";
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getTpsPauseParCours($idCours){

    $sql = "SELECT temps_pause FROM cours WHERE id =".$idCours;
    $res = SQLSelect($sql);

    return parcoursRs($res);

}

function getVehicules() {
    $sql = "SELECT * FROM vehicule";
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getCours() {
    $sql = "SELECT * FROM cours";
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getCoursParEleve($idUser) {
    $sql = "SELECT idEleve FROM cours WHERE id =" . $idUser;
    $idEleve = SQLGetChamp($sql);
    
    $sql = "SELECT * FROM cours WHERE idEleve =" . $idEleve;
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getCoursParMoniteur($idUser) {
    
    $sql = "SELECT idMoniteur FROM moniteur WHERE id =" . $idUser;
    $idMoniteur = SQLGetChamp($sql);
    
    $sql = "SELECT * FROM cours WHERE idMoniteur =" . $idMoniteur;
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getIdUserEleve($idEleve) {
    
    $sql = "SELECT id FROM eleve WHERE idEleve =" . $idEleve;
    $idUser= SQLGetChamp($sql);

    return $idUser;
}


function UpdateTpsPause($id,$newTpsPause){

    $sql = "UPDATE cours SET temps_pause='".$newTpsPause."' WHERE id=".$id ;
    $res=SQLUpdate($sql);

    return $res;

}

function UpdateMail($id, $new_mail) {
	$SQL = "UPDATE user SET mail='" . $new_mail . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateMdp($id, $new_mdp) {
	$SQL = "UPDATE user SET mdp='" . $new_mdp . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateAdresse($id, $num,$rue,$ville,$codePostal) {
	$SQL = "UPDATE user SET numeroADR='" . $num . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);
	
	$SQL = "UPDATE user SET rueADR='" . $rue . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	$SQL = "UPDATE user SET villeADR='" . $ville . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	$SQL = "UPDATE user SET codePostal='" . $codePostal . "' WHERE id=" . $id;
	$res2 = SQLUpdate($SQL);


	return $res;
}

function UpdateTel($id, $new_tel) {
	$SQL = "UPDATE user SET telephone='" . $new_tel . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateDateCode($id, $date_code) {
	$SQL = "UPDATE eleve SET DateCode='" . $date_code . "' WHERE idEleve=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateDatePermis($id, $date_permis) {
	$SQL = "UPDATE eleve SET DatePermis='" . $date_permis . "' WHERE idEleve=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}


?>