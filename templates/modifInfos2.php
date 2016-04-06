<?php
/*
 * Nom de fichier : modifInfos.php
 * Description : Fichier PHP contenant la structure et le script JQuery de la partie "Users" pour modifier ses informations personnelles
 * Auteur(s) : Florian Evelette Bédier
*/
    session_start();
?>



<script>
        $(document).ready(function(){
            $idUser = <?php echo $_SESSION["idUser"]; ?>;
           
            /** Au chargement de la page, on récupère les infos sur le client et on les affiche sur la page
              (adresse, email, téléphone,...) */
            $.ajax({
                type:"GET",
                url:"../templates/data.php?action=recupInfoUser&id=" + $idUser,
                success:function(result, htmlStatus, jqXHR) {
                    result = $.parseJSON(result);
                    
                    $(".nom").val(result[0].nom);
                    $(".prenom").val(result[0].prenom);
                    $(".naissJour").val(result[0].dateNaissance.split("/")[0]);
                    $(".naissMois").val(result[0].dateNaissance.split("/")[1]);
                    $(".naissAnnee").val(result[0].dateNaissance.split("/")[2]);
                    $(".telephone").val(result[0].telephone);
                    $(".mail").val(result[0].mail);
                    $(".mdp").val(result[0].mdp);
                    $(".numeroADR").val(result[0].numeroADR);
                    $(".rueADR").val(result[0].rueADR);
                    $(".villeADR").val(result[0].villeADR);
                    $(".codePostal").val(result[0].codePostal);                    
                },
                error : function(jqXHR, htmlStatus, htmlError) {
                    console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                }
            });
            
            $("#envoie").click(function(){
                
                // Changement de l adresse
                numNouvelleAdresse = $(".numeroADR").val();
                rueNouvelleAdresse = $(".rueADR").val();
                villeNouvelleAdresse = $(".villeADR").val();
                codePostalNouvelleAdresse = $(".codePostal").val();
                $("#chargement").show();
                $.ajax({
                    type: "GET",
                    url: "../templates/data.php",
                    data:{action:"updateAdresse",id:$idUser,num:numNouvelleAdresse,rue:rueNouvelleAdresse,ville:villeNouvelleAdresse,codePostal:codePostalNouvelleAdresse},
                    success: function (result, htmlStatus, jqXHR) {
                        if(result.search('erreur:') != -1) {
			    
                            $('#msgErrorMesInfos').text(result.substring(7,result.length));
                            $('#msgErrorMesInfos').css("border-color","red");
                            // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                        }
                        else { // Si pas d'erreurs
                            
                           /* $('#msgErrorMesInfos').text("Adresse modifiée");
                            $('#msgErrorMesInfos').css("border-color","green");*/
                            $(".numeroADR").val(numNouvelleAdresse);
                            $(".rueADR").val(rueNouvelleAdresse);
                            $(".villeADR").val(villeNouvelleAdresse);
                            $(".codePostal").val(codePostalNouvelleAdresse); // On recopie la nouvelle adresse sur la page
                            
                        }
                        $('#msgErrorMesInfos').show(); // On affiche le message
                        $('#msgErrorMesInfos').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                    },
                    error: function (jqXHR, htmlStatus, htmlError) {
                        console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                    }
                });
                
                //Changement de mail
                nouveauMail = $(".mail").val();
                 $.ajax({
                        type: "GET",
                        url: "../templates/data.php?action=updateMail&id=" + $idUser + "&mail=" + nouveauMail,
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
                    
                //Changement de Téléphone
                nouveauTel = $(".telephone").val();
                $.ajax({
                        type: "GET",
                        url: "../templates/data.php?action=updateTel&id=" + $idUser + "&tel=" + nouveauTel,
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
                 
                //Changement de nom
                nouveauNom = $(".nom").val();
                $.ajax({
                        type: "GET",
                        url: "../templates/data.php?action=updateNom&id=" + $idUser + "&nom=" + nouveauNom,
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
                    
                    
                //Changement de prenom
                nouveauPrenom = $(".prenom").val();
                $.ajax({
                        type: "GET",
                        url: "../templates/data.php?action=updatePrenom&id=" + $idUser + "&prenom=" + nouveauPrenom,
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
                    
                //Changement de date de Naissance
                nouveauDateNaiss = $(".naissJour").val() + "/" + $(".naissMois").val() + "/" + $(".naissAnnee").val();
                
                $.ajax({
                        type: "GET",
                        url: "../templates/data.php?action=updateDateNaissance&id=" + $idUser + "&dateNaiss=" + nouveauDateNaiss,
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
                    
                //Changement de Mdp
                nouveauMdp= $(".mdp").val();
                $.ajax({
                        type: "GET",
                        url: "../templates/data.php?action=updateMdp&id=" + $idUser + "&mdp=" + nouveauMdp,
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
                            alert("Modifcations reussies");
                            $("#chargement").hide();
                        }
                        $('#msgErrorMesInfos').show(); // On affiche le message
                        $('#msgErrorMesInfos').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                        },
                        error: function (jqXHR, htmlStatus, htmlError) {
                            console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                        }
                    });
            });
        
        });
        
        
    </script>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modifInfos2.css" rel="stylesheet">

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
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="#planning">Planning</a></li>
            <li><a href="gestionCours.php">Cours</a></li>
            <li class="active"><a href="modifInfos2.php">Modifications</a></li>
			<li><a href="tempsPause.html">Temps de pause</a></li>
			<li><a href="#logout">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Modification des informations</h1>
        <div id="modifs">
    
				 
					<br/>
					<fieldset>
						<legend>Informations générales</legend>
						  <label for="nom">Nom :</label>
						  <input id="nom" placeholder="Dupont" autofocus="" required="" class="nom"><br>
						  <label for="nom">Prénom :</label>
						  <input id="nom"  placeholder="Jean" autofocus="" required="" class="prenom"><br>
						  <label for="naiss">Né le :</label>
							<SELECT id="naiss" name="naiss"  class="naissJour">
							<option value="" disabled selected></option>
							<OPTION>1	
							<OPTION>2
							<OPTION>3
							<OPTION>4
							<OPTION>5
							<OPTION>6
							<OPTION>7
							<OPTION>8
							<OPTION>9
							<OPTION>10
							<OPTION>11
							<OPTION>12
							<OPTION>13
							<OPTION>14
							<OPTION>15
							<OPTION>16
							<OPTION>17
							<OPTION>18
							<OPTION>19
							<OPTION>20
							<OPTION>21
							<OPTION>22
							<OPTION>23
							<OPTION>24
							<OPTION>25
							<OPTION>26
							<OPTION>27
							<OPTION>28
							<OPTION>29
							<OPTION>30
							<OPTION>31
							</SELECT>
							
							
							
							<SELECT id="naiss" name="naiss" size="1" class="naissMois">
							<option value="" disabled selected></option>
							<OPTION>01	
							<OPTION>02
							<OPTION>03
							<OPTION>04
							<OPTION>05
							<OPTION>06
							<OPTION>07
							<OPTION>08
							<OPTION>09
							<OPTION>10
							<OPTION>11
							<OPTION>12
							</SELECT>
							
							
							
							<SELECT id="naiss" name="naiss" size="1" class="naissAnnee">
							<option value="" disabled selected></option>
							<OPTION>1998	
							<OPTION>1997
							<OPTION>1996
							<OPTION>1995
							<OPTION>1994
							<OPTION>1993
							<OPTION>1992
							<OPTION>1991
							<OPTION>1990
							<OPTION>1989
							<OPTION>1988
							<OPTION>1987
							</SELECT></br>
							
						  
						  <label for="email">Email :</label>
						  <input id="email" type="textarea" placeholder="exemple@gmail.com" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu" class="mail"><br>
						  <label for="telephone">Portable :</label>
							  <input id="telephone" type="tel" placeholder="06xxxxxxxx" pattern="06[0-9]{8}" class="telephone"><br>
					</fieldset>
					  
					  
					  <fieldset>
						<legend>Modification de mot de passe</legend>
						   <label for="pseudo">Entrez le nouveau mot de passe :</label>
						   <input type="password" name="pass1" id="pass" class="mdp"/> </br>
						   
						   
						   <label for="pass">Confirmation du mot de passe :</label>
						   <input type="password" name="pass2" id="pass" class="mdp"/>
						   
					  </fieldset>
					  
					  
					 
					  <fieldset>
						<legend>Adresse</legend>
						   <label for="champs">N° : </label>
						   <input type="number" name="num" id="champs" class="numeroADR"/></br>
						   
						   <label for="champs">Rue : </label>
						   <input type="text" name="rue" id="champs" class="rueADR"/></br>
						   
						   <label for="champs">Ville : </label>
						   <input type="text" name="ville" id="champs" class="villeADR"/></br>
						
						   <label for="champs">Code Postal : </label>
						   <input type="text" name="post" id="champs" class="codePostal"/></br>
					  </fieldset>
					  
					   <p><input type="button" value="Soummettre" id="envoie"> <img src="../images/ajax-loader.gif" alt="chargement" id="chargement"/></p>

					
			</div>
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
</html>