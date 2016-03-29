<?php
/*
 * Nom de fichier : admintClients.php
 * Description : Fichier PHP contenant la structure de la partie "Client" pour l'administrateur de l'espace perso
 * Auteur(s) : Clément RUFFIN
*/

$clients = getClients(); 

?>
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="../css/client.css">
<script type="text/javascript" src="../js/datepicker-fr.js"></script>
<script type="text/javascript" src="../js/adminClient.js"></script>
<div id="client">
    <div id="infoClient">
        <h1>Informations Clients</h1>
        <select id="listeClients"></select>
        <table id="infosDuClient">
            <tr>
                <td class="gauche"> <h2> Adresse :  </h2> </td>
                <td class="droite" id="adresseDuClient"></td>
            </tr>
            <tr>
                <td class="gauche"> <h2> E-mail : </h2> </td>
                <td class="droite" id="mailDuClient"></td>
            </tr>
            <tr>
                <td class="gauche"> <h2> Téléphone : </h2> </td>
                <td class="droite" id="telDuClient"></td>
            </tr>
            <tr>
                <td class="gauche"> <h2> Date Code : </h2> </td>
                <td class="droite">
                    <input type="text" class="datepicker" id="dateCode">
                   <input type="submit" id="validerDateCode" value="Valider Date Code">
                </td>
            </tr>
            <tr>
                <td class="gauche"> <h2> Date Permis : </h2> </td>
                <td class="droite">
                    <input type="text" class="datepicker" id="datePermis">
                    <input type="submit" id="validerDatePermis" value="Valider Date Permis">
                </td>
            </tr>
        </table>
        <div id="messageModification"></div>
    </div>
    <div class="separateur"></div>
    <div id="creerClient">
        <h1>Créer un nouveau client</h1>
        <form id="formCreerClient" action="../templates/data.php" method="post">
                <label for="nomClient">Nom : </label>
                <input type="text" name="nomClient" /><br/><br/>
                <label for="prenomClient">Prénom : </label>
                <input type="text" name="prenomClient"><br/><br/>
                <label for="mailClient">E-Mail : </label>
                <input type="text" name="mailClient" ><br/>
            <br/>
            <input type="button" id="ajouterClient" value="Ajouter">
        </form>
        <div id="messageCreation"></div>
    </div>
</div>