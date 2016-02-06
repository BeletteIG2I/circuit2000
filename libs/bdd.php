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

    // On insère l'utilisateur dans 'users' avec le champ 'admin' à 0
    $sql = "INSERT INTO users(mail, mdp, admin) VALUES ('$mail', '$mdp', '0')";
    $res = SQLInsert($sql);

    // On l'insère dans 'client' avec son nom et son prénom
    $sql = "INSERT INTO client(idUser, nom, prenom) VALUES ('$res', '$nom', '$prenom')";
    $rep = SQLInsert($sql);

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
    $sql = "SELECT client.idUser, client.nom, client.prenom FROM client,users WHERE client.idUser = users.id";
    $res = SQLSelect($sql);

    return parcoursRs($res);
}

function getInfosClient($id) {
	$sql = "SELECT * FROM client,users WHERE users.id=" . $id . " AND client.idUser = users.id";
	$res = SQLSelect($sql);

	return parcoursRs($res);
}

function UpdateMail($id, $new_mail) {
	$SQL = "UPDATE users SET mail='" . $new_mail . "' WHERE id=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateMdp($id, $new_mdp) {
	$SQL = "UPDATE users SET mdp='" . $new_mdp . "' WHERE id=" . $id;
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
	$SQL = "UPDATE client SET DateCode='" . $date_code . "' WHERE idUser=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

function UpdateDatePermis($id, $date_permis) {
	$SQL = "UPDATE client SET DatePermis='" . $date_permis . "' WHERE idUser=" . $id;
	$res = SQLUpdate($SQL);

	return $res;
}

?>