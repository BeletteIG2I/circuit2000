<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <title></title>

        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script>
            
                var bool = 0;
                var i = 0;
                var id = 0;
                var centi = 0; // initialise les dixièmes
                var secon = 0;//initialise les secondes
                var minu = 0; //initialise les minutes
                //var $idUser = <?php echo $_SESSION["idUser"]?>;
                var $idUser = 3;

                // JavaScript source code

                function chrono() {

                    centi++; //incrémentation des dixièmes de 1
                    if (centi > 9) {

                        centi = 0;
                        secon++;

                    } //si les dixièmes > 9, on les réinitialise à 0 et on incrémente les secondes de 1

                    if (secon > 59) {

                        secon = 0;
                        minu++;

                    } //si les secondes > 59, on les réinitialise à 0 et on incrémente les minutes de 1

                    document.forsec.secc.value = " " + centi; //on affiche les dixièmes
                    document.forsec.seca.value = " " + secon; //on affiche les secondes
                    document.forsec.secb.value = " " + minu; //on affiche les minutes

                    compte = setTimeout('chrono()', 100); //la fonction est relancée tous les 10° de secondes

                }

                function rasee() { //fonction qui remet les compteurs à 0

                    clearTimeout(compte); //arrête la fonction chrono()
                    /*alert(secon);
                    console.log(secon);
                    console.log(id);*/

                    document.forsec.secc.value = " " + centi;
                    document.forsec.seca.value = " " + secon;
                    document.forsec.secb.value = " " + minu;

                }


                $(document).ready(function () {

                    function gestionErreurs(err) {
                        alert('Erreur' + err);
                        console.log('Erreur' + err);
                        return true;
                    }

                    window.onerror = gestionErreurs;


                    function maj() {

                        if (bool == 0) {
                            rasee();
                        }
                        else if (bool == 1) {
                            chrono();
                        }

                    }

                    /**Au chargement de la page, on récupère les infos des cours du moniteurs et on les affiche sur la page
                        (numero du cours, date de debut, date de fin, temps de pause, date, description, commentaire)*/
                    $.ajax({

                        type: "GET",
                        url: "../templates/data.php?action=recupInfoCours&id=" + $idUser,
                        success: function (result, htmlStatus, jqXHR) {

                            result = $.parseJSON(result);
                            alert($idUser);
                            $.each(result, function (i, value) {

                                var obj = value;

                                $("#infosCours").prepend('<div id=' + i + '>'+ +'</div>');

                                $.each(obj, function (key, value2) {

                                   $("#"+i).append('     <div>' + key + ' : ' + value2 + '</div></br>');

                                });

                                $("#"+i).append('<input type="button" class ="btn" value="Lancer le cours" id="' + result[i].id + '" onclick="getId(this)" />');

                            });


                        },
                        error: function (jqXHR, htmlStatus, htmlError) {
                            console.log("Status :" + htmlStatus + "\nError : " + htmlError);
                        }

                    });

                    // Quand on clique sur le bouton "Commencer pause", on mets bool à 1 ce qui permettra à la fonction maj() de lancer le chrono
                    $("#chrono").click(function () {
                        bool = 1;
                        maj();
                    });


                    // Quand on clique sur le bouton "Arreter pause", on mets bool à 0 ce qui permettra à la fonction maj() d'arrêter le chrono
                    $("#finChrono").click(function () {
                        bool = 0;
                        maj();
                    });

                    /**Quand on clique sur le bouton "Sauver temps de pause", on récupère l'id du cours ainsi que le nouveau temps de pause
                        Ensuite on lance la requête ajax qui redirige vers data.php qui va s'occuper de l'update*/
                    $("#save").click(function () {
                        idDuCours = $(".idCours").val();
                        nouveauTpsPause = $(".newTpsPause").val();

                        //MODIFICATION DU TEMPS DE PAUSE
                        $.ajax({

                            type: "GET",
                            url: "../templates/data.php",
                            data: { action: "updateTpsPause", id: $idUser, idCours: idDuCours, newTpsPause: nouveauTpsPause },
                            success: function (result, htmlStatus, jqXHR) {

                                if (result.search('erreur:') != -1) {

                                    $('#msgError').text(result.substring(7, result.length));
                                    $('#msgError').css("border-color", "red");
                                    // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur

                                }
                                else { //si pas d'erreurs

                                    $(".tpsPause").val(nouveauTpsPause);

                                }

                                $('#msgError').show();// On affiche le message
                                $('#msgError').fadeOut(4000, 'easeInExpo');// On le fait disparaître en 4s en easeInExpo

                            },

                            error: function (jqXHR, htmlStatus, htmlError) {
                                console.log("Status :" + htmlStatus + "\nError : " + htmlError);
                            }

                        });

                    });

                });

                //Récupère l'id du cours quand on appuie sur "Lancer cours"
                function getId(ele) {
                    id = ele.id;
                    document.forsec.id.value = " " + id;
                    /*alert(id);
                    console.log(id);
                    */
                }
            
        </script>

    </head>

    <body>

        <div id="infosCours">

        </div>

        <div id="pause">
                <form name="forsec">
                    <input type="hidden" name="id" class="idCours">
                    <input type="text" size="3" name="secb"> minute(s)
                    <input type="text" size="3" name="seca" class="newTpsPause"> secondes
                    <input type="text" size="3" name="secc"> dixiemes

                    <input type="button" value="Commencer pause" id="chrono">
                    <input type="button" value="Arreter pause" id="finChrono">
                    <input type="button" value="Sauver temps de pause" id="save" >
                </form> 
        </div>

    </body>

</html>