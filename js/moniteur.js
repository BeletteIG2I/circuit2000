/*
 * Nom de fichier : moniteur.js
 * Description : Fichier JQuery de la partie "Moniteur" dans l'espace perso
 * Auteur(s) : Florian Evelette Bédier
*/

$(document).ready(function() {
	
	function actualiserListeMoniteur() {
        $.ajax({
            type: "GET",
            url:"templates/data.php?action=recupMoniteurs",
            success: function (result, textStatus, jqXHR) {
                //TODO mettre dans une fonction qui va AJOUTER LES MONITEURS DANS UNE LISTE DEROULANTE (voir adminClient.js/function actualiserListeMoniteur() {) pour exemple
            },
            error: function (jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        });
    }

	$.ajax({
            type:"GET",
            url:"templates/data.php?action=recupInfoMoniteur&id=" + $(this).val(),
            success:function(result, textStatus, jqXHR) {
					
                result = $.parseJSON(result);
					//TODO mettre dans une fonction qui va INSERER LES INFORMATIONS ISSUE DE LA REQUETE DANS VOS OBJETS CORRESPONDANTS (voir adminClient.js/$(document).on("change", "#listeClients",function(){ pour  exemple)
            },
            error : function(jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
    });
	
	function actualiserListeVehicule() {
        $.ajax({
            type: "GET",
            url:"templates/data.php?action=recupVehicules",
            success: function (result, textStatus, jqXHR) {
                //TODO mettre dans une fonction qui va AJOUTER LES Vehicules DANS UNE LISTE DEROULANTE (voir adminClient.js/function actualiserListeMoniteur() {) pour exemple
            },
            error: function (jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        });
    }

	
});