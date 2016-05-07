<!-- ***** CE QU'IL RESTE A FAIRE *****
**
** -> Récupérer l'id de l'utilisateur
** -> Modifier toutes les fonctions où l'id est utilisé
**
-->

<?php
/*
 * Nom de fichier : clientFormation.php
 * Description : Fichier PHP contenant la structure et le script JQuery de la partie "Client" pour le client de l'espace perso
 * Auteur(s) : Clément RUFFIN
*/
    //$_SESSION["idUser"] = 2;
    //$id=1;
    //$leClient = getInfosClient($_SESSION["idUser"]);
?>
<link rel="stylesheet" type="html/css" href="../css/client2.css">
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script type="html/javascript">
    
    $(document).ready( function() {
        $idUser = <?php echo $_SESSION["idUser"]; ?>;

        /** Au chargement de la page, on récupère les infos sur le client et on les affiche sur la page
          (adresse, email, téléphone, dates d'obtention du code et du permis) */
        $.ajax({
            type:"GET",
            url:"templates/data.php?action=recupInfoUser&id=" + $idUser,
            success:function(result, htmlStatus, jqXHR) {
				result = $.parseJSON(result);
                var adresse = result[0].numeroADR + " - " + result[0].rueADR + " - " + result[0].villeADR + " - " + result[0].codePostal;
                $("#htmlAdresseClient").html(adresse.replace(/(\r\n|\n\r|\r|\n)/g, "<br/>"));
                $("#htmlMailClient").html(result[0].mail);
                $("#htmlTelClient").html(result[0].telephone);
            },
            error : function(jqXHR, htmlStatus, htmlError) {
                console.log("Status :" + htmlStatus + " \nError : " + htmlError);
            }
        });

        $.ajax({
            type:"GET",
            url:"templates/data.php?action=recupDatesUser2&id="+ $idUser,
            success:function(result, htmlStatus, jqXHR) {
                result = $.parseJSON(result);
                $("#dateCode").html(result[0]);
                $("#datePermis").html(result[1]);
            },
            error : function(jqXHR, htmlStatus, htmlError) {
                console.log("Status :" + htmlStatus + " \nError : " + htmlError);
            }
        });

        // Le client peut modifier son adresse, son email et son numéro de téléphone
        modifAdresse = 0;
        modifMail = 0;
        modifTel = 0;

        $("#modifierAdresse").val("Modifier");
        $("#modifierMail").val("Modifier");
        $("#modifierTel").val("Modifier");

        $("#modifierAdresse").click(function() {
            if (modifAdresse == 0) {
                $adresseClient = $("#htmlAdresseClient").html().replace(/<br>/g, "\n"); // On récupère l'adresse actuelle

                /** On place un champ input htmle à la place de l'adresse pour laisser le client entrer
                 *  sa nouvelle adresse (on met l'adresse actuelle comme valeur par défaut de l'input */
                $("#htmlAdresseClient").html(" <textarea id='inputAdresseClient'></textarea>");
                $("#inputAdresseClient").val($adresseClient);

                $("#modifierAdresse").val("Valider");
                modifAdresse = 1;

            }
            else if (modifAdresse == 1) {
                $("#inputAdresseClient").hide(); // On cache l'input
                numNouvelleAdresse = $("#inputAdresseClient").val().split(" - ")[0]; // On récupère la nouvelle adresse numero
                rueNouvelleAdresse = $("#inputAdresseClient").val().split(" - ")[1]; // On récupère la nouvelle adresse rue
                villeNouvelleAdresse = $("#inputAdresseClient").val().split(" - ")[2]; // On récupère la nouvelle adresse ville
                codePostalNouvelleAdresse = $("#inputAdresseClient").val().split(" - ")[3]; // On récupère la nouvelle adresse codePostal
				
                $.ajax({
                    type: "GET",
                    url: "templates/data.php",
                    data:{action:"updateAdresse",id:$idUser,num:numNouvelleAdresse,rue:rueNouvelleAdresse,ville:villeNouvelleAdresse,codePostal:codePostalNouvelleAdresse},
                    success: function (result, htmlStatus, jqXHR) {
                        if(result.search('erreur:') != -1) {
							
                            $('#msgErrorMesInfos').text(result.substring(7,result.length));
                            $('#msgErrorMesInfos').css("border-color","red");
                            // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                        }
                        else { // Si pas d'erreurs
							alert(result);
                            $('#msgErrorMesInfos').text("Adresse modifiée");
                            $('#msgErrorMesInfos').css("border-color","green");
                            $("#htmlAdresseClient").html(result.replace(/(\r\n|\n\r|\r|\n)/g, "<br/>")); // On recopie la nouvelle adresse sur la page
                        }
                        $('#msgErrorMesInfos').show(); // On affiche le message
                        $('#msgErrorMesInfos').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                    },
                    error: function (jqXHR, htmlStatus, htmlError) {
                        console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                    }
                });

                $("#modifierAdresse").val("Modifier");
                modifAdresse = 0;
            }
        });

        $("#modifierMail").click(function() {
            if (modifMail == 0) {
                $mailClient = $("#htmlMailClient").html(); // On récupère l'email actuel

                /** On place un champ input htmle à la place de l'email pour laisser le client entrer
                 *  son nouvel email (on met l'email actuel comme valeur par défaut de l'input */
                $("#htmlMailClient").html(" <input type='email' id='inputMailClient' /> ");
                $("#inputMailClient").val($mailClient);

                $("#modifierMail").val("Valider");
                modifMail = 1;
            }

            else if (modifMail == 1) {
                $("#inputMailClient").hide(); // On cache l'input
                nouveauMail = $("#inputMailClient").val(); // On récupère le nouvel email

                if ($mailClient != nouveauMail) {
                    // On met à jour l'email en base
                    $.ajax({
                        type: "GET",
                        url: "templates/data.php?action=updateMail&id=" + $idUser + "&mail=" + nouveauMail,
                        success: function (result, htmlStatus, jqXHR) {
                        if(result.search('erreur:') != -1) {
                            $('#msgErrorMesInfos').text(result.substring(7,result.length));
                            $('#msgErrorMesInfos').css("border-color","red");
                            // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                        }
                        else { // Si pas d'erreurs
                            $('#msgErrorMesInfos').text("E-mail modifié");
                            $('#msgErrorMesInfos').css("border-color","green");
                            $("#htmlMailClient").html(result);
                        }
                        $('#msgErrorMesInfos').show(); // On affiche le message
                        $('#msgErrorMesInfos').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                        },
                        error: function (jqXHR, htmlStatus, htmlError) {
                            console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                        }
                    });
                }
                else {
                    $("#htmlMailClient").html($mailClient);
                }

                $("#modifierMail").val("Modifier");
                modifMail = 0;
            }
        });

        $("#modifierTel").click(function() {
            if (modifTel == 0) {
                $telClient = $("#htmlTelClient").html(); // On récupère le téléphone actuel

                /** On place un champ input htmle à la place du téléphone pour laisser le client entrer
                 *  son nouveau téléphone (on met le numéro actuel comme valeur par défaut de l'input */
                $("#htmlTelClient").html(" <input type='html' id='inputTelClient' /> ");
                $("#inputTelClient").val($telClient);

                $("#modifierTel").val("Valider");
                modifTel = 1;
            }

            else if (modifTel == 1) {
                $("#inputTelClient").hide(); // On cache l'input
                nouveauTel = $("#inputTelClient").val(); // On récupère le nouveau téléphone

                if ($telClient != nouveauTel) {

                    // On met à jour le numéro de téléphone en base
                    $.ajax({
                        type: "GET",
                        url: "templates/data.php?action=updateTel&id=" + $idUser + "&tel=" + nouveauTel,
                        success: function (result, htmlStatus, jqXHR) {
                        if(result.search('erreur:') != -1) {
                            $('#msgErrorMesInfos').text(result.substring(7,result.length));
                            $('#msgErrorMesInfos').css("border-color","red");
                            // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                        }
                        else { // Si pas d'erreurs
                            $('#msgErrorMesInfos').text("Téléphone modifié");
                            $('#msgErrorMesInfos').css("border-color","green");
                            $("#htmlTelClient").html(result); // On recopie la nouvelle adresse sur la page
                        }
                        $('#msgErrorMesInfos').show(); // On affiche le message
                        $('#msgErrorMesInfos').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                        },
                        error: function (jqXHR, htmlStatus, htmlError) {
                            console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                        }
                    });
                }

                else {
                    $("#htmlTelClient").html($telClient);
                }
                $("#modifierTel").val("Modifier");
                modifTel = 0;
            }
        });

        // Le client peut envoyer des requêtes via mail par clic sur les trois boutons dédiés
        $("#requete1").click( function() {
            // "Où en suis-je dans ma formation ?"
            $.ajax({
                type : "POST",
                url: "templates/data.php?action=envoyerMail&requete=1&id=" + $idUser,
                success : function(result, htmlStatus, jqXHR){
                    if(result.search('erreur:') != -1) {
                        $('#msgErrorSuivi').text(result.substring(7,result.length));
                        $('#msgErrorSuivi').css("border-color","red");
                        // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                    }
                    else { // Si pas d'erreurs
                        $('#msgErrorSuivi').text(result);
                        $('#msgErrorSuivi').css("border-color","green");
                    }
                    $('#msgErrorSuivi').show(); // On affiche le message
                    $('#msgErrorSuivi').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                },
                error: function(jqXHR, htmlStatus, htmlError){
                    console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                }
            });
        });

        $("#requete2").click( function() {
            // "Combien me reste-t-il à payer ?"
            $.ajax({
                type : "POST",
                url: "templates/data.php?action=envoyerMail&requete=2&id=" + $idUser,
                success : function(result, htmlStatus, jqXHR){
                    if(result.search('erreur:') != -1) {
                        $('#msgErrorSuivi').text(result.substring(7,result.length));
                        $('#msgErrorSuivi').css("border-color","red");
                        // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                    }
                    else { // Si pas d'erreurs
                        $('#msgErrorSuivi').text(result);
                        $('#msgErrorSuivi').css("border-color","green");
                    }
                    $('#msgErrorSuivi').show(); // On affiche le message
                    $('#msgErrorSuivi').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                },
                error: function(jqXHR, htmlStatus, htmlError){
                    console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                }
            });
        });

        $("#requete3").click( function() {
            // "Pouvez-vous me transmettre ma dernière facture ?"
            $.ajax({
                type : "POST",
                url: "templates/data.php?action=envoyerMail&requete=3&id=" + $idUser,
                success : function(result, htmlStatus, jqXHR){
                    if(result.search('erreur:') != -1) {
                        $('#msgErrorSuivi').text(result.substring(7,result.length));
                        $('#msgErrorSuivi').css("border-color","red");
                        // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                    }
                    else { // Si pas d'erreurs
                        $('#msgErrorSuivi').text(result);
                        $('#msgErrorSuivi').css("border-color","green");
                    }
                    $('#msgErrorSuivi').show(); // On affiche le message
                    $('#msgErrorSuivi').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                },
                error: function(jqXHR, htmlStatus, htmlError){
                    console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                }
            });
        });
    })
</script>
<!-- <script type="html/javascript" src="js/clientFormation.min.js"></script> -->
<div id="infosFormation">
    <h1>Mes Informations</h1>
    <table id="infos">
        <tr>
            <td class="gauche"> <h2> Adresse :  </h2> </td>
            <td class="milieu" id="htmlAdresseClient"></td>
            <td class="droite">
                <input type="submit" id="modifierAdresse" />
            </td>
        </tr>

        <tr>
            <td class="gauche"> <h2> E-mail : </h2> </td>
            <td class="milieu" id="htmlMailClient"></td>
            <td class="droite">
                <input type="submit" id="modifierMail" value="Modifier" />
            </td>
        </tr>

        <tr>
            <td class="gauche"> <h2> Téléphone : </h2> </td>
            <td class="milieu" id="htmlTelClient"></td>
            <td class="droite">
                <input type="submit" id="modifierTel" value="Modifier" />
            </td>
        </tr>
    </table>
    <div id="msgErrorMesInfos"></div>
</div>
<div class="separateur"></div>
<div id="suiviFormation">
    <h1> Suivi de ma Formation </h1> 

    <table id="suivi">
        <tr>
            <td class="gauche"> <h2> Date d'obtention du code : </h2> </td>
            <td class="droite" id="dateCode"></td>
        </tr>
        <tr>
            <td class="gauche"> <h2> Date d'obtention du permis : </h2> </td>
            <td class="droite" id="datePermis"></td>
        </tr>
    </table>
	<br/>
    <div id="requetes">
        <input type="button" id="requete1" value="Où en suis-je dans ma formation ?" /> 
        <input type="button" id="requete2" value="Combien me reste-t-il à payer ?" /> <br/><br/>
        <input type="button" id="requete3" value="Pouvez-vous me transmettre ma dernière facture ?" />
    </div>

    <div id="msgErrorSuivi"></div>
</div>