<?php
/*
 * Nom de fichier : bdd.php
 * Description : Fichier PHP contenant les fonctions de base pour accéder aux informations de la base de données
 * Auteur(s) : Clément RUFFIN, Maxime DE COSTER, Maxence DELATTRE
*/

include("maLibSQL.php");

function InsertClient($nom, $prenom, $mail) {
    // On génère un mot de passe aléatoire de 8 caractères
    $mdp = chaine_aleatoire(8);

    // On insère l'utilisateur dans 'client' avec le champ 'fonction' à 0
    $sql = "INSERT INTO client(nom,prenom,mail, mdp, admin) VALUES ('$nom','$prenom','$mail', '$mdp', '0')";
    $res = SQLInsert($sql);
   

    return $res;
}

function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789') {
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++) {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}

function getClients() {
    $sql = "SELECT client.id, client.nom, client.prenom FROM client";
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getInfosClient($id) {
	$sql = "SELECT * FROM client WHERE client.id=" . $id;
	$res = SQLSelect($sql);

	return parcoursRs($res);
}

function UpdateMail($id, $new_mail) {
	$SQL = "UPDATE client SET mail='" . $new_mail . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateMdp($id, $new_mdp) {
	$SQL = "UPDATE client SET mdp='" . $new_mdp . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateAdresse($id, $new_adresse) {
	$SQL = "UPDATE client SET adresse='" . $new_adresse . "' WHERE idUser=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateTel($id, $new_tel) {
	$SQL = "UPDATE client SET telephone='" . $new_tel . "' WHERE idUser=" . $id;
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