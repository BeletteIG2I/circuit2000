/*
 * Nom de fichier : cours.js
 * Description : Fichier JQuery de la partie "cours"
 * Auteur(s) : Florian Evelette Bédier
*/


	function actualiserListeMoniteur() {
        $.ajax({
            type: "GET",
            url:"templates/data.php?action=recupCours",
            success: function (result, textStatus, jqXHR) {
                //TODO implementer les cours recu dans le planning, ADMIN, il pourra voir tout les cours
            },
            error: function (jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        });
    }
	
	$.ajax({
            type:"GET",
            url:"templates/data.php?action=recupInfoCours&id=" + $(this).val(),
            success:function(result, textStatus, jqXHR) {
					
                result = $.parseJSON(result);
				//TODO implementer les cours recu dans le planning
            },
            error : function(jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
    });
	