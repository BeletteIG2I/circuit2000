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
                //var $idUser = 4;

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

                    document.forsec.secc.value = " " + centi;
                    document.forsec.seca.value = " " + secon;
                    document.forsec.secb.value = " " + minu;

                }


                $(document).ready(function () {

                // ICI FONCTION POUR LE DEVELOPPEMENT
                    /*function gestionErreurs(err) {
                        alert('Erreur' + err);
                        console.log('Erreur' + err);
                        return true;
                    }

                    window.onerror = gestionErreurs;*/


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
                        url: "../templates/data.php?action=recupInfoCours&idUser=" + $idUser,
                        success: function (result, htmlStatus, jqXHR) {
                            
                            result = $.parseJSON(result);
                            var laDate = new Date();
                            console.log(laDate);
                            $.each(result, function (i, value) {

                                var obj = value;
                                joursCours = obj.date.split('-')[2].substring(0,2);
                                moisCours = obj.date.split('-')[1];
                                anneeCours = obj.date.split('-')[0];
                                
                                if(joursCours.substring(0,1)==="0")
                                {
                                    joursCours = joursCours.replace("0","");
                                }
                                
                                if(moisCours.substring(0,1)==="0")
                                {
                                    moisCours = moisCours.replace("0","");
                                }
                                $("#infosCours").prepend('<div id=' + i + '>'+'</div>');
                                if(joursCours == laDate.getDate() && moisCours == (laDate.getMonth()+1) && anneeCours == laDate.getFullYear()){
                                    $.each(obj, function (key, value2) {

                                       $("#"+i).append('     <div class="info">' + key + ' : ' + value2 + '</div></br>');

                                    });

                                    $("#"+i).append('<input type="button" class ="btn" value="Lancer le cours" id="' + result[i].id + '" onclick="getId(this)" />');
                                }        
                            });


                        },
                        error: function (jqXHR, htmlStatus, htmlError) {
                            console.log("Status :" + htmlStatus + "\nError : " + htmlError);
                        }

                    });

                    // Quand on clique sur le bouton "Commencer pause", on mets bool � 1 ce qui permettra � la fonction maj() de lancer le chrono
                    $("#chrono").click(function () {
                        if (bool != 1){
                            bool = 1;
                            maj();
                        }
                        
                    });


                    // Quand on clique sur le bouton "Arreter pause", on mets bool � 0 ce qui permettra � la fonction maj() d'arr�ter le chrono
                    $("#finChrono").click(function () {
                        if (bool != 0){
                            bool = 0;
                            maj();
                        }
                        
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

                                    alert(result.substring(7, result.length));
                                    

                                }
                                else { //si pas d'erreurs

                                    $(".newTpsPause").val(nouveauTpsPause);
                                    alert("Temps bien enregistré");
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
                    
                }

    </script>

</head>



<html lang="en">
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/icon.png">

    <title>Circuit 2000</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/gestionCours.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php"><img id="logo" src="../images/logosf.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="accueil.html">Menu</a></li>
            <li><a href="calendar.php">Planning</a></li>
			<li class="active"><a href="gestionCours.php">Cours</a></li>
            <li><a href="infoEleve2.php">Informations</a></li>
			<li><a href="modifInfos2.php">Modifications</a></li>
            <li><a href="tempsPause.html">Temps de pause</a></li>
			<li><a href="#logout">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

		<div class="starter-template">
		<h1>Gestion cours</h1>
		<div id="cours">
			</br>

            <div id="infosCours">

            </div>
		
			<fieldset class="formu">
			<legend>Compteur</legend>
                <form name="forsec">
                    <input type="hidden" name="id" class="idCours">
                    <input readonly type="text" size="1" name="secb" placeholder="00"> minute(s)
                    <input readonly type="text" size="1" name="seca" placeholder="00" class="newTpsPause"> secondes
                    <input readonly type="text" size="1" name="secc" placeholder="00"> dixiemes
					<br/><br/>
                    <input type="button" value="Commencer pause" id="chrono" >
                    <input type="button" value="Arreter pause" id="finChrono">
                    <input type="button" value="Sauver temps de pause" id="save">
                </form> 
			</fieldset>
			
		</div>


    </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 </body>
 	



