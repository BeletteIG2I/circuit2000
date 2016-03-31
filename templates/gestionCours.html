<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script>

                var bool = 0;
                var i = 0;
                var id = 0;
                var centi = 0; // initialise les dixi�mes
                var secon = 0;//initialise les secondes
                var minu = 0; //initialise les minutes
                var $idUser = <?php session_start(); echo $_SESSION["idUser"];?>;
                //var $idUser = 3;

                  // JavaScript source code

                function chrono() {
                centi++; //incr�mentation des dixi�mes de 1
                    if (centi > 9) {

                        centi = 0;
                        secon++;

                    } //si les dixi�mes > 9, on les r�initialise � 0 et on incr�mente les secondes de 1
                    if (secon > 59) {

                        secon = 0;
                        minu++;

                    } //si les secondes > 59, on les r�initialise � 0 et on incr�mente les minutes de 1

                    document.forsec.secc.value = " " + centi; //on affiche les dixi�mes
                    document.forsec.seca.value = " " + secon; //on affiche les secondes
                    document.forsec.secb.value = " " + minu; //on affiche les minutes

                    compte = setTimeout('chrono()', 100); //la fonction est relanc�e tous les 10� de secondes

                }

                function rasee() { //fonction qui remet les compteurs � 0

                    clearTimeout(compte); //arr�te la fonction chrono()
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

                    /**Au chargement de la page, on r�cup�re les infos des cours du moniteurs et on les affiche sur la page
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

                    // Quand on clique sur le bouton "Commencer pause", on mets bool � 1 ce qui permettra � la fonction maj() de lancer le chrono
                    $("#chrono").click(function () {
                        bool = 1;
                        maj();
                    });


                    // Quand on clique sur le bouton "Arreter pause", on mets bool � 0 ce qui permettra � la fonction maj() d'arr�ter le chrono
                    $("#finChrono").click(function () {
                        bool = 0;
                        maj();
                    });

                    /**Quand on clique sur le bouton "Sauver temps de pause", on r�cup�re l'id du cours ainsi que le nouveau temps de pause
                        Ensuite on lance la requ�te ajax qui redirige vers data.php qui va s'occuper de l'update*/
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
                                    // On enl�ve la cha�ne de caract�res 'erreur:' pour afficher le message d'erreur

                                }
                                else { //si pas d'erreurs

                                    $(".tpsPause").val(nouveauTpsPause);

                                }

                                $('#msgError').show();// On affiche le message
                                $('#msgError').fadeOut(4000, 'easeInExpo');// On le fait dispara�tre en 4s en easeInExpo

                            },

                            error: function (jqXHR, htmlStatus, htmlError) {
                                console.log("Status :" + htmlStatus + "\nError : " + htmlError);
                            }

                        });

                    });

                });

                //R�cup�re l'id du cours quand on appuie sur "Lancer cours"
                function getId(ele) {
                    id = ele.id;
                    document.forsec.id.value = " " + id;
                    /*alert(id);
                    console.log(id);
                    */
                }

    </script>

</head>



<link rel="stylesheet" type="text/css" href="../css/gestionCours.css"/>

 <body>
<div id="barre_blanche">
	<img id="logo" src="../images/CIRCUIT_2000.png">
	<div id="entete"> 
		<h2>Gestion de cours<h2>
	</div>
</div>	


<div id="cours">
			</br>

            <div id="infosCours">

            </div>

			<p id="p1">Elève: Jean Belette</p>
			<p id="p2">Date: 14/03/2016</p>
			<p id="p1">Leçon n°: 12/25</p>
			<p id="p2">Heure: 10h00</p>
			<p id="p1">Description: Manoeuvres</p>
			
			<fieldset>
			<legend>Compteur</legend>
                <form name="forsec">
                    <input type="hidden" name="id" class="idCours">
                    <input type="text" size="3" name="secb"> minute(s)
                    <input type="text" size="3" name="seca" class="newTpsPause"> secondes
                    <input type="text" size="3" name="secc"> dixiemes

                    <input type="button" value="Commencer pause" id="chrono">
                    <input type="button" value="Arreter pause" id="finChrono">
                    <input type="button" value="Sauver temps de pause" id="save">
                </form> 
			</fieldset>
			
			<div id="gestCompte">
				<p id="gTitre">Gestion compte</p>
				<p id="g1">Modifier les informations</p>
				<p id="g2">Planning</p>
				<p id="g3">Récapitulatif</p>
				<p id="g4">Déconnexion</p>
			</div>
</div>
</body>