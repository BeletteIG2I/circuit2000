<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/icon.png">
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <title>Circuit 2000</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../css/accueil.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function() {
            afficheMenu();
        });
        function afficheMenu(){
                            
            $fonctionUser = <?php echo("'".$_SESSION["admin"]."'"); ?>;
            $("#menuClient").hide();
            $("#menuAdmin").hide();
            $("#menuMoniteur").hide();
            $("#menuClientLog").hide();
            $("#menuAdminLog").hide();
            $("#menuMoniteurLog").hide();
            if($fonctionUser || $fonctionUser=='0')
            {
            switch($fonctionUser){
                                        case '0':
                                            $("#menuClient").show();
                                            $("#menuClientLog").show();
                                        break;
                                        
                                        case '1':
                                            $("#menuAdmin").show();
                                            $("#menuAdminLog").show();
                                        break;
                                        
                                        case '2':
                                            $("#menuMoniteur").show();
                                            $("#menuMoniteurLog").show();
                                        break;
                                    }
                                
                        }
                  }
                
    </script>
  </head>
<!-- NAVBAR
================================================== -->
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
            <div id="menuClient">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>
                    <li><a href="calendar.php">Planning</a></li>
                    <li><a href="infoEleve2.php">Informations</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>
                    
                    <li id="deco"><a href="#logout">Déconnexion</a></li>
                </ul>
            </div >
            <div id="menuAdmin">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>

                    <li><a href="infoEleve2.php">Informations</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>
                    <li><a href="tempsPause.php">Temps de pause</a></li>
                    <li id="deco"><a href="#logout">Déconnexion</a></li>
                </ul>
            </div>
            <div id="menuMoniteur">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>
                    <li><a href="calendar.php">Planning</a></li>
                    <li><a href="gestionCours.php">Cours</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>
                    <li id="deco"><a href="#logout">Déconnexion</a></li>
                  </ul>
            </div>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>

     

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing" id="menuClientLog">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <a href="calendar.php"><img class="img-circle" src="../images/logos/calendar.png" alt="Generic placeholder image"  width="140" height="140"></a>
          <h2>Planning</h2>
          <p>Accedez à votre planning</p>
        </div><!-- /.col-lg-4 -->
        
	<div class="col-lg-4">
          <a href="infoEleve2.php"><img class="img-circle" src="../images/logos/list.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Informations</h2>
          <p>Informations concernant l'éléve, et la conduite</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <a href="modifInfos2.php"><img class="img-circle" src="../images/logos/gear-rotation.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Modifications</h2>
          <p>Modifiez les informations d'un élève</p>
        </div><!-- /.col-lg-4 -->
		
		<div class="col-lg-4">
          <a href="../index.php"><img class="img-circle" src="../images/logos/house.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Retour à l'accueil</h2>
          <p>Revenir à la page vitrine du site</p>
        </div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
          <a href="#"><img id="deco" class="img-circle" src="../images/logos/power.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Déconnexion</h2>
          <p>Déconnectez vous et retourner à la page d'accueil</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

    </div><!-- /.container -->

     <div class="container marketing" id ="menuAdminLog">

      <!-- Three columns of text below the carousel -->
      <div class="row">

		<div class="col-lg-4">
          <a href="infoEleve2.php"><img class="img-circle" src="../images/logos/list.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Informations</h2>
          <p>Informations concernant l'éléve, et la conduite</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <a href="modifInfos2.php"><img class="img-circle" src="../images/logos/gear-rotation.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Modifications</h2>
          <p>Modifiez les informations d'un élève</p>
        </div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
          <a href="tempsPause.php"><img class="img-circle" src="../images/logos/clock.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Temps de Pause</h2>
          <p>Visualisez le temps de pause des moniteurs </p>
        </div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
          <a href="../index.php"><img class="img-circle" src="../images/logos/house.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Retour à l'accueil</h2>
          <p>Revenir à la page vitrine du site</p>
        </div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
          <a href="#"><img class="img-circle" id="deco" src="../images/logos/power.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Déconnexion</h2>
          <p>Déconnectez vous et retourner à la page d'accueil</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

    </div><!-- /.container -->
    
     <div class="container marketing" id ="menuMoniteurLog">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <a href="calendar.php"><img class="img-circle" src="../images/logos/calendar.png" alt="Generic placeholder image"  width="140" height="140"></a>
          <h2>Planning</h2>
          <p>Accedez à votre planning</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <a href="gestionCours.php"><img class="img-circle" src="../images/logos/play.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Cours</h2>
          <p>Lancez un cours</p>
        </div><!-- /.col-lg-4 -->
		
        <div class="col-lg-4">
          <a href="modifInfos2.php"><img class="img-circle" src="../images/logos/gear-rotation.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Modifications</h2>
          <p>Modifiez les informations d'un élève</p>
        </div><!-- /.col-lg-4 -->
		
		<div class="col-lg-4">
          <a href="../index.php"><img class="img-circle" src="../images/logos/house.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Retour à l'accueil</h2>
          <p>Revenir à la page vitrine du site</p>
        </div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
          <a href="#"><img class="img-circle" id="deco" src="../images/logos/power.png" alt="Generic placeholder image" width="140" height="140"></a>
          <h2>Déconnexion</h2>
          <p>Déconnectez vous et retourner à la page d'accueil</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

    </div><!-- /.container -->
 
    <script type="text/javascript">
			function downloadJSAtOnload() {
				var element = document.createElement("script");
				var element1 = document.createElement("script");
				element.src = "../js/script.js";
				document.body.appendChild(element);
				element1.src = "../js/jquery-ui.min.js";
				document.body.appendChild(element1);
			}

			if (window.addEventListener)
				window.addEventListener("load", downloadJSAtOnload, false);
			else if (window.attachEvent)
				window.attachEvent("onload", downloadJSAtOnload);
			else window.onload = downloadJSAtOnload;
		</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
