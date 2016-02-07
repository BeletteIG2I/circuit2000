<?php

/*
 * Nom de fichier : client.php
 * Description : Fichier PHP chargeant un fichier spécifique si l'utilisateur est administrateur et un autre fichier sinon (pour la partie "Client")
 * Auteur(s) : Clément RUFFIN
*/
include_once ('../libs/maLibSecurisation.php');

if($_SESSION["fonction"] == 1)
    include "./adminClients.php";
else if ($_SESSION["fonction"] == 0)
    include "./clientFormation.php";

?>