<?php

/*
 * Nom de fichier : client.php
 * Description : Fichier PHP chargeant un fichier spécifique si l'utilisateur est administrateur et un autre fichier sinon (pour la partie "Client")
 * Auteur(s) : Clément RUFFIN
*/


if($_SESSION["admin"] == 1)
    include "./adminClients.php";
else if ($_SESSION["admin"] == 0)
    include "./clientFormation.php";

?>