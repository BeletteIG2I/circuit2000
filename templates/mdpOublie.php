
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script>
        $(document).ready(function(){
           //recupération du user connecté
           $idUser = <?php echo $_SESSION["idUser"]; ?>;
           
           
           $("#envoie").click( function() {
            
            //Envoie du mail avec le mdp
            if($("#mail").val() === $("#mail2").val()){
                $("#chargement").show();
                $.ajax({
                    type : "POST",
                    url: "templates/data.php?action=envoyerMailMdpOublie&id=" + $idUser,
                    success : function(result, htmlStatus, jqXHR){
                        if(result.search('erreur:') != -1) {
                            $('#msgErrorSuivi').text(result.substring(7,result.length));
                            $('#msgErrorSuivi').css("border-color","red");
                            // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                        }
                        else { // Si pas d'erreurs
                            $('#msgErrorSuivi').text(result);
                            $('#msgErrorSuivi').css("border-color","green");
                            alert("Message envoyé.");
                            $("#chargement").hide();
                        }
                        $('#msgErrorSuivi').show(); // On affiche le message
                        $('#msgErrorSuivi').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                    },
                    error: function(jqXHR, htmlStatus, htmlError){
                        console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                    }
                });
            }
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
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

		<div class="starter-template">
		<h1>Mot de passe oublié</h1>
        <div id="modifs">
		<br/>					
		<fieldset>	  
			<legend>Veuillez entrer votre e-mail</legend>
		<label for="email">Email :</label>
		<input id="email" type="textarea" placeholder="exemple@gmail.com"  class="mail"><br>
		<label for="email2">Confirmer votre e-mail :</label>
		<input id="email2" type="textarea" placeholder="exemple@gmail.com"  class="mail"><br>					  
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
	





