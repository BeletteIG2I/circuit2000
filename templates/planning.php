<?php
/*
 * Nom de fichier : planning.php
 * Description : Fichier PHP chargeant un fichier spécifique si l'utilisateur est administrateur et un autre fichier sinon (pour la partie "Planning")
 * Auteur(s) : Maxime DE COSTER
*/

if ($_SESSION["admin"] == true)
    include "./planningAdmin.html";
else if ($_SESSION["admin"] == false)
    include "./planningClient.html";
?>