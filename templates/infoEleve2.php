 <?php session_start();?>
<html lang="en">
  
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

    <!-- Custom styles for this template -->
    <link href="../css/infoEleve2.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script>
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
          <div id="menuClient">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>
                    <li><a href="calendar.php">Planning</a></li>
                    <li><a href="infoEleve2.php">Informations</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>
                    
                </ul>
            </div>
            <div id="menuAdmin">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>

                    <li><a href="infoEleve2.php">Informations</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>
                    <li><a href="tempsPause.html">Temps de pause</a></li>
                   
                </ul>
            </div>
            <div id="menuMoniteur">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>
                    <li><a href="calendar.php">Planning</a></li>
                    <li><a href="gestionCours.php">Cours</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>
                    
                  </ul>
            </div>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

		<div class="starter-template">
			<?php include("client.php"); ?>
			<?php include('infos_prat.php')?>
			

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 </body>
 	



