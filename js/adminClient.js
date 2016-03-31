/*
 * Nom de fichier : adminClient.js
 * Description : Fichier JQuery de la partie "Client" dans l'espace perso
 * Auteur(s) : Clément RUFFIN
*/

$(document).ready(function() {
    actualiserListeClients();

    /** Au chargement de la page, on met à jour la liste des clients sélectionnables
     *  On la met également à jour lorsque l'admin inscrit un nouveau client */
    function actualiserListeClients() {
        $.ajax({
            type: "GET",
            url:"templates/data.php?action=recupUsers",
            success: function (result, textStatus, jqXHR) {
                result = $.parseJSON(result);
                
                var chaine = "";

                chaine += "<option value='none'>Sélectionnez votre client</option>"

                // Pour chaque client existant, on ajoute son nom et son prénom dans la liste déroulante
                for (var index = 0; index < result.length; index++) {
                    chaine += "<option value='"
                    chaine += result[index].id;
                    chaine += "'>";
                    chaine += result[index].nom;
                    chaine += " ";
                    chaine += result[index].prenom;
                    chaine += "</option>";
                }

                $("#listeClients").html(chaine);
            },
            error: function (jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        });
    }

    /** Lorsque l'admin sélectionne un nom de client dans la liste déroulante, on actualise les données
     *  affichées en dessous (adresse, email, téléphone, dates d'obtention du code et du permis */
    $(document).on("change", "#listeClients",function(){

        if($(this).val() != "none") { // On vérifie qu'un utilisateur est sélectionné
			//console.log($(this).val());
            // On met à jour les champs textes (adresse, email, téléphone)
            $.ajax({
                type:"GET",
                url:"templates/data.php?action=recupInfoUser&id=" + $(this).val(),
                success:function(result, textStatus, jqXHR) {
					
                    result = $.parseJSON(result);
					var adresse = result[0].numeroADR + " - " + result[0].rueADR + " - " + result[0].villeADR + " - " + result[0].codePostal;
                    $("#adresseDuClient").html(adresse.replace(/(\r\n|\n\r|\r|\n)/g, "<br/>"));
                    $("#mailDuClient").html(result[0].mail);
                    $("#telDuClient").html(result[0].telephone);
                },
                error : function(jqXHR, textStatus, textErreur) {
                    console.log("Status :" + textStatus + " \nErreur : " + textErreur);
                }
            });

            // On met à jour les champs dates (obtention du code et du permis)
            $.ajax({
                type:"GET",
                url:"templates/data.php?action=recupDatesUser&id=" + $(this).val(),
                success:function(result, textStatus, jqXHR) {
					console.log(result);
                    result = $.parseJSON(result);
					console.log(result);
                    $("#dateCode").val(result[0]);
                    $("#datePermis").val(result[1]);
                },
                error : function(jqXHR, textStatus, textErreur) {
                    console.log("Status :" + textStatus + " \nErreur : " + textErreur);
                }
            });
        }

        $("#messageModification").text("");
        $("#messageCreation").text("");

    });

    // Au clic sur le bouton 'Ajouter', on crée un nouvel utilisateur
    $(document).on("click", "input[type=button][value=Ajouter]", function() {
        $("#messageModification").text("");

        var $this = $(this).parent();

        $.ajax({
            url: "templates/data.php?action=ajouterClient",
            type: "POST",
            data: $this.serialize(), // On sérialise les données (On envoie toutes les valeurs présentes dans le formulaire)
            success: function (result, textStatus, jqXHR) {
                if(result.search('erreur:') != -1) {
                    $('#messageCreation').css("border-color","red");
                    $('#messageCreation').text(result.substring(7,result.length));
                    // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                }
                else { // Si pas d'erreurs
                    $('#messageCreation').css("border-color","green");
                    $('#messageCreation').text(result);
                }
                $('#messageCreation').show(); // On affiche le message
                $('#messageCreation').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo

                // Chaque fois que l'admin ajoute un client, on met à jour la liste déroulante des clients
                actualiserListeClients();
            },
            error: function (jqXHR, textStatus, textErreur) {
                alert("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        });
    });

    /** On ajoute des 'datepicker' aux champs de modification des dates d'obtention du code et du permis.
     *  On a d'abord téléchargé et inclut la bibliothèque 'datepicker-fr.js' qui permet d'avoir une interface
     *  en français. On règle ici le format de la date (aaaa-mm-jj) */
    $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd"});

    // L'admin peut modifier les dates d'obtention du code et du permis de ses clients
    $(document).on("click", "#validerDateCode", function() {
        $("#messageCreation").text("");

        console.log($(this));
        id = $("#listeClients").val(); // On récupère l'id du client sélectionné
        console.log("id = " + id);
        date = $("#dateCode").val(); // On récupère la date choisie
        console.log(" date = " + date);
        
        $.ajax({
            type:"GET",
            url:"templates/data.php?action=updateCode&id=" + id + "&date=" + date,
            success:function(result, textStatus, jqXHR) {
                if(result.search('erreur:') != -1) {
                    $('#messageModification').text(result.substring(7,result.length));
                    $('#messageModification').css("border-color","red");
                    // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                }
                else { // Si pas d'erreurs
                    $('#messageModification').text("Date d'obtention du code modifiée");
                    $('#messageModification').css("border-color","green");
                }
                $('#messageModification').show(); // On affiche le message
                $('#messageModification').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
            },
            error : function(jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        });
        
    });

    $(document).on("click", "#validerDatePermis", function() {
        $("#messageCreation").text("");

        id = $("#listeClients").val(); // On récupère l'id du client sélectionné
        date = $("#datePermis").val(); // On récupère la date choisie

        $.ajax({
            type:"GET",
            url:"templates/data.php?action=updatePermis&id=" + id + "&date=" + date,
            success:function(result, textStatus, jqXHR) {
                if(result.search('erreur:') != -1) {
                    $('#messageModification').text(result.substring(7,result.length));
                    $('#messageModification').css("border-color","red");
                    // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                }
                else { // Si pas d'erreurs
                    $('#messageModification').text("Date d'obtention du permis modifiée");
                    $('#messageModification').css("border-color","green");
                }
                $('#messageModification').show(); // On affiche le message
                $('#messageModification').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
            },
            error : function(jqXHR, textStatus, textErreur) {
                console.log("Status :" + textStatus + " \nErreur : " + textErreur);
            }
        });
    });
});