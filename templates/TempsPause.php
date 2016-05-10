﻿    <?php session_start();?>
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
     <script src="../js/jquery.min.js" type="text/javascript"></script>
     <script>
        function afficheMenu(){
                            
            $fonctionUser = <?php echo("'".$_SESSION["admin"]."'"); ?>;
            $("#menuClient").hide();
            $("#menuAdmin").hide();
            $("#menuMoniteur").hide();
            if($fonctionUser || $fonctionUser=='0')
            {
            switch($fonctionUser){
                                        case '0':
                                            $("#menuClient").show();
                                            
                                        break;
                                        
                                        case '1':
                                            $("#menuAdmin").show();
                                            
                                        break;
                                        
                                        case '2':
                                            $("#menuMoniteur").show();
                                            
                                        break;
                                    }
                                
                        }
                  }

        $(document).ready(function () {
            afficheMenu();
            /*function gestionErreurs(err) {
                alert('Erreur' + err);
                console.log('Erreur' + err);
                return true;
            }

            window.onerror = gestionErreurs;*/

            $.ajax({

                type: "GET",
                url: "../templates/data.php?action=recupTpsPauseMoniteurs",
                success: function (result1, htmlStatus, jqXHR) {

                    result1 = $.parseJSON(result1);
                    

                    $.each(result1, function (i, value) {

                        var obj = value;

                        $("#tab").append('<tr id=' + i + '></tr>');

                        $.each(obj, function (key, value2) {

                            $("#"+i).append('<td>' + value2 + '</td>');

                        });

                    });

                },
                error: function (jqXHR, htmlStatus, htmlError) {

                    console.log("Status :" + htmlStatus + "\nError : " + htmlError);

                }

            });

            

        });

     </script>




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
    <link href="../css/tempsPause.css" rel="stylesheet">

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
          <div id="menuClient">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>
                    <li><a href="calendar.php">Planning</a></li>
                    <li><a href="infoEleve2.php">Informations</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>                   
                    
                </ul>
            </div >
            <div id="menuAdmin">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueil.php">Menu</a></li>

                    <li><a href="infoEleve2.php">Informations</a></li>
                    <li><a href="modifInfos2.php">Modifications</a></li>
                    <li><a href="tempsPause.php">Temps de pause</a></li>
                   
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
		<h1>Temps de pause</h1>
		<div id="pause">
			<table id="tab">
						   <tr>
                                                           <th>Id</th>
							   <th>Nom</th>
							   <th>Prénom</th>
							   <th>Immatriculation</th>
							   <th>Temps de pause</th>
						   </tr>
							<tr>								

                </table>
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
 
 


	


