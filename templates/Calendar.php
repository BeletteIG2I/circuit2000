<?php session_start(); ?>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

	jQuery(function($){	

        var now = new Date();
		var current = now.getMonth() + 1;      							//on récupère le numéro mois courant
		var current2= getWeekNumber(now);								//on récupère le numéro semaine courante
		for (i=1; i<13 ; i++)											//parcours de tous les mois pour cacher les numeros de semaines et tab
		  {
			$('.nosMois'+i).hide();
		  }
		  
		$('.nosMois'+current).show();									//on affiche les num semaine mois courant
		$('#linkMonth'+current).addClass('active');						//sélectionne le mois courant (CSS)
		for (j=0; j<55 ; j++)											//parcours de toutes les semaines pour cacher les tab
		  {
			$('.tableSem'+j).hide();
		  }					
		$('.tableSem'+current2).show();									//affichage du tableau de la semaine courante
		$('#linkWeek'+current2).addClass('active');						//sélectionne la semaine courante (CSS)         
			   
		$('.months a').click(function(){								//quand on clique sur un mois	   
			var month = $(this).attr('id').replace('linkMonth','');		//récup l'id du mois
			
			if(month != current){										//si on clique sur un autre que celui sélectionné
				$('.nosMois'+current).hide(); 							//cache la liste de l'ancien mois
				current = month;										//le nouveau mois devient le mois courant
				$('.nosMois'+current).show();							//affichage du mois sélectionné
				$('.months a').removeClass('active'); 					//déselectionne l'ancien mois (CSS)
				$('.months a#linkMonth'+month).addClass('active'); 		//sélectionne le mois choisi (CSS)
			}
				return false; 
		});
			   
		$('.week a').click(function(){									//quand on clique sur une semaine
			var we = $(this).attr('id').replace('linkWeek','');			//récup id semaine

			if(we != current2){											//si on clique sur une autre que celle selectionné						
				$('.tableSem'+current2).hide();							//on cache le tableau sélectionné avant
				current2 = we;											//la nouvelle semaine devient la semaine courante
				$('.tableSem'+current2).show();							//on affiche le tableau sélectionné 
				$('.week a').removeClass('active'); 					//deselectionne ancienne semaine (CSS)
				$('.week a#linkWeek'+we).addClass('active'); 			//selectionne semaine choisi (CSS)															
			} 
				return false;
				 
		});  
    });
	


	
	
	
//Récupération des cours de la BDD et affichage dans le planning			
	$(document).ready( function() {
            var now = new Date();
            var year = now.getFullYear();
            var mois = "";
            var jour = "";
            var heure = "";
            var datebdd = "";
            var heurebdd = "";
            $.ajax({
            type:"GET",
            url:"data.php?action=recupInfoCours&id=<?php if($_SESSION['connecte']) echo $_SESSION['idUser'];?> ",
            success:function(result, htmlStatus, jqXHR) {
				result = $.parseJSON(result);
                               // console.log(result);
				if(!result) console.log("Resultats Null");
				else {
					for(i=0 ; i < result.length; i++)
					{
						var laDate = result[i]["date"];
						var description = result[i]["description"];
						var Commentaire = result[i]["Commentaire"];
						var annee = laDate.substring(0,4);
						var mois = laDate.substring(5,7);	
						var jour = laDate.substring(8,10);
						var heure = parseFloat(laDate.substring(11,13));
						laDate = new Date(mois+'/'+jour+'/'+annee);
                                                
                                                
                                                
                                                
                                               
                                                var idEleve =  result[i]["idEleve"];
                                                
                                                
						
						nbWeek= getWeekNumber(laDate);
						nbDay = laDate.getDay();
						var defID = "Sem" + nbWeek + "jour" + nbDay + "heure" + heure;
                                                
                                                $.ajax({
                                                    type:"GET",
                                                    url:"../templates/data.php?action=recupIdUserEleve&idEleve=" +idEleve,
                                                    success:function(result, htmlStatus, jqXHR) {
                                                        
                                                        idUserEleve = result; 
                                                        
                                                        $.ajax({
                                                            type:"GET",
                                                            url:"../templates/data.php?action=recupInfoUserPlanning&idUs=" + idUserEleve,
                                                            success:function(result2, htmlStatus, jqXHR) {
                                                                console.log(result2);
                                                                result2 = $.parseJSON(result2);
                                                                
                                                                var nom = result2[0]["nom"];
                                                                var prenom = result2[0].prenom;
                                                                var telephone = result2[0].telephone;


                                                                var numADR = result2[0].numeroADR;
                                                                var rueADR = result2[0].rueADR;
                                                                var villeADR = result2[0].villeADR;
                                                                var codePostal = result2[0].codePostal;
                                                                
                                                                $("." + defID).html(nom +"-"+prenom +"-"+ telephone +"<br/>"+ numADR +" "+ rueADR +" "+ villeADR +" "+ codePostal +"<br/>"+description);
                                                            },
                                                            error : function(jqXHR, htmlStatus, htmlError) {
                                                                console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                                                            }
                                                        });
                                                    },
                                                    error : function(jqXHR, htmlStatus, htmlError) {
                                                        console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                                                    }
                                                });
                                                
                                                
                                                
					} 
				}
            },
            error : function(jqXHR, htmlStatus, htmlError) {
                console.log("Status :" + htmlStatus + " \nError : " + htmlError);
            }
        });
        
      
          $(document).on("click","td",function(){
            now = new Date();
            year = now.getFullYear();
            mois = this.id.split("/")[0];
            jour = this.id.split("/")[1];
            heure = this.id.split("/")[2].replace(" ","");
            datebdd = year + '-' + mois + '-' + jour;
            heurebdd = heure + ':00:00';
            console.log(heure);
            heurebdd.replace(" ","");
            console.log(datebdd + heurebdd);
            
        });
        
        $("#boutonValider").click(function(){ 
                moniteur = $("#moniteur").val();
                eleve = $("#eleve").val();
                description = $("#description").val();
		
                
                $.ajax({
                        type:"POST",
                        url:"data.php?action=ajouterPlanning",
                                    data:'idMoniteur=' + moniteur + '&idEleve=' + eleve + '&description=' + description + '&date=' + datebdd + " " + heurebdd,

                        success : function(result, htmlStatus, jqXHR) {
                                            alert("Ajout réussi ! ");
                                    },
                        error : function(jqXHR, htmlStatus, htmlError) {
                                            alert("Echec !");
                        }
                });
	});
        
        

    });

        
        
	


	var bool=false;
	function cacher(id){
		if(bool==true){
			document.getElementById(id).style.display='none';
			bool=false;
		} 
		else{
			document.getElementById(id).style.display='block';
			
		}
	}

	function getWeekNumber(uneDate) {
		var d = new Date(uneDate);
		var DoW = d.getDay();
		d.setDate(d.getDate() - (DoW + 6) % 7 + 3); // Nearest Thu
		var ms = d.valueOf(); // GMT
		d.setMonth(0);
		d.setDate(4); // Thu in Week 1
		return Math.round((ms - d.valueOf()) / (7 * 864e5)) + 1;
	}
	
	function decaleJour(numero){
		if (numero > 0)
		{
			numero--; 	
		}
		else if (numero == 0)
		{
			numero = 7;	
		}
		else numero = -1;
		return 	numero;
	}
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
    <link href="../css/Calendar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

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
            <li class="active"><a href="calendar.php">Planning</a></li>
            <li><a href="gestionCours.php">Cours</a></li>
            <li><a href="modifInfos2.php">Modifications</a></li>
			<li><a href="tempsPause.html">Temps de pause</a></li>
			<li><a href="#logout">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
    <?php
        require('date.php');
        $date = new Date();
        $year = date('Y');
        $dates = $date->getAll($year);
        $flag = 0;
        $nbSem = 0;

        include('../libs/bdd.php');
        $moniteur=getNomPrenomMoniteurs();  
        $eleve=getNomPrenomEleves();
		
    ?>

   
   
	

    <div class="container">

      <div class="starter-template">
        <h1>Planning</h1>
		<div id="body">
			<div class="periods">
			<form>Creer cour (provisoire) : 
				<input type='button' value='Pop Up' onClick='PopupCentrer("popUpCalendar.php",1000,700,"menubar=no,scrollbars=no,statusbar=no")'>
			</form>

				<!-- #### AFFICHE L'annee courante #### -->
				<div class="year"><?php echo $year;?></div>
				<!-- ################################## -->
				
				
				<!-- On affiche la liste des mois de l'année -->
				<div class="months"> 
					<ul>
						<?php foreach ($date->months as $id=>$m):?>
							<li><a href="#" id="linkMonth<?php echo $id+1;?>"><?php echo utf8_encode(substr(utf8_decode($m),0,3));?></a></li>
						<?php endforeach;?>
					</ul>
				</div>
			   <!-- ######################################## -->
	   
	   
	   <!-- Affichage des semaines -->
		<div class="week">	

		<h2>Semaine</h2>
 
		<?php 
		$dates = current($dates);//On récupère les dates actuelles
		foreach ($dates as $m=>$days):?> <!--On parcourt toutes les dates pour récupérer les mois -->
			<ul class="nosMois<?php echo $m;?>"> <!-- listage des numéros de semaines (en y ajoutant des liens vers les semaines) -->
			<?php $end = end($days);
			foreach ($days as $d=>$semaine): /* On parcourt tous les jours pour sortir des semaines*/
			
					/* On parcourt les semaines pour sortir les jours et ainsi définir le numéro de la semaine correspond au numéro du jour*/
                   foreach ($semaine as $s=>$day): 
				   		/*On regade les premiers jours pour savoir comment on doit compter les semaines d'une année*/
					    if($s==1  && !$flag){
                                    //Si le premier jour du premier mois est <5 c'est à dire est lundi ou mardi ou mercredi ou jeudi
                                    //Alors la numérotation des semaine commence le 1 Janvier
                                    //Sinon on attend le premier lundi de Janvier
                                    if ($day < 5){
                                        $nbSem = 1;
                                    }
                                    else $nbSem = 0;
									$flag = 1;
                             }
							 if($s >= 1){
								 //Si on change de semaine, on regarde si c'est un lundi
								 //Si oui alors on incrémente le numéro de la semaine
								if ($day == 1){
									$nbSem += 1;	
								}
							 } 
                    endforeach;?>
                    
                    
					<li><a href="#" id="linkWeek<?php echo $nbSem;?>"><?php echo $nbSem;?></a></li>	
                   
                   
                    <!-- Affichage de chaque tableau pour chaque semaine -->
                    
					<div class="tableSem<?php echo $nbSem;?>"> </br></br>	
                        <table id="TableWeek<?php echo $nbSem;?>">
                            <tr>
                                <td colspan= 1 class="padding"></td>
                                <?php foreach ($date->days as $nomJour):?>
                                    <th>
                                    <?php echo substr($nomJour,0,3);?>
                                    </th>
                                <?php endforeach;?>    
                            </tr>
                            <?php for($i=8;$i<=19;$i++):?>
                                    <tr>
                                        <td><?php echo $i."H00";?></td>
                                        <?php for($j=1;$j<=7;$j++) :?>
                                        <td class="<?php echo "Sem".$nbSem."jour".$j."heure".$i;?>" id="<?php echo $m."/".$j."/".$i; ?> "
												onClick="cacher('AjouterCours')">
					</td>
                                        <?php endfor;?>  
                                    </tr>
                            <?php endfor;?>   
                                
                        </table>
                    </div>
					
                    
                    
               <?php endforeach; ?> 
               
               
                   
        	</ul> <!-- Fin de la liste des numeros de semaines propre a un mois	   		
		<?php endforeach;?> <!-- FIN foreach qui recupere les mois -->		
	</div> <!-- FIN AFFICHAGE DES SEMAINES --> 
	
	<!-- FORMULAIRE AJOUT COURS -->

	 

	<div id="AjouterCours" class="oModal">			
				 

			<label for="moniteur">Moniteur</label><br />			
				<select name="moniteur" id="moniteur">
				<optgroup label="Sélectionnez le moniteur">				
					<?php foreach ($moniteur as $data):?>		
                                            <option value="<?php echo $data['id']; ?>"> <?php echo $data['nom'] .' '. $data['prenom']; ?></option>
					<?php endforeach;?>	
				</optgroup>
				</select>
		
			</br></br>

		
			<label for="eleve">Eleve</label><br />			
			<select name="eleve" id="eleve">
				<optgroup label="Sélectionnez l'eleve">
					<?php foreach ($eleve as $donnees):?>
                                            <option value="<?php echo $donnees['id']; ?>"> <?php echo $donnees['nom'] .' '. $donnees['prenom']; ?></option>
					<?php endforeach;?>
				</optgroup>	
			</select>
		
			</br></br>
		

			<label for="description">Description :</label>
			<input type="text" name="description" id="description" />

			

			</br></br>
			<input id="boutonValider" type="button" value="Valider" />
					
		
	</div>	<!-- FIN FORMULAIRE AJOUT COURS -->
		
</div> <!-- FIN AFFFICHAGE PERIODS -->


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