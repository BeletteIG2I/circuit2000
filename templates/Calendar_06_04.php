<?php session_start(); ?>
<style>
body {
    background: #eeeeee none repeat scroll 0 0;
    font-family: Helvetica;
    letter-spacing: 1px;
    padding: 10px;
}
.year {
    color: #d90000;
    font-size: 85px;
}
.relative {
    position: relative;
}

.month {
    margin-top: 30px;
}
.months ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.months ul li a {
    color: #888888;
    float: left;
    font-size: 20px;
    font-weight: bold;
    margin: -1px;
    padding: 0 15px 0 0;
    text-decoration: none;
    text-transform: uppercase;
}
.months ul li a:hover, .months ul li a.active {
    color: #d90000;
}


.week {
    margin-top: 30px;

}
.week ul {
    list-style: outside none none;
 
}
.week ul li a {
    color: #888888;
    float: left;
    font-size: 20px;
    font-weight: bold;
    margin: -1px;
    padding: 24px 10px;
    text-decoration: none;
    text-transform: uppercase;
}
.week ul li a:hover, .week ul li a.active {
    color: #d90000;
}



h2{	
float:left;
}


table {
    border-collapse: collapse;
}
table td {
    border: 1px solid #a3a3a3;
    height: 80px;
    width: 80px;
}
table td.today {
    border: 2px solid #d90000;
    height: 80px;
    width: 80px;
}
table td.padding {
    border: medium none;
}
table td:hover {
    background: #dfdfdf none repeat scroll 0 0;
    cursor: pointer;
}
table th {
    color: #a8a8a8;
    font-weight: normal;
}
table td .day {
    bottom: -40px;
    color: #8c8c8c;
    font-size: 24.3pt;
    font-weight: bold;
    position: absolute;
    right: 5px;
}
table td .events {
    height: 0;
    margin: -39px 0 0;
    padding: 0;
    position: relative;
    width: 79px;
}
table td .events li {
    background: #000 none repeat scroll 0 0;
    border-radius: 10px;
    float: left;
    height: 10px;
    margin-left: 6px;
    overflow: hidden;
    text-indent: -3000px;
    width: 10px;
}
table td:hover .events {
    left: 582px;
    list-style: outside none none;
    margin: 0;
    padding: 11px 0 0;
    position: absolute;
    top: 66px;
    width: 442px;
}
table td:hover .events li {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border-bottom: 1px solid #d6d6d6;
    font-weight: bold;
    height: 40px;
    line-height: 40px;
    padding-left: 41px;
    text-indent: 0;
    width: 500px;
}
table td:hover .events li:first-child {
    border-top: 1px solid #d6d6d6;
}
table td .daytitle {
    display: none;
}
table td:hover .daytitle {
    color: #d90000;
    display: block;
    font-size: 41px;
    font-weight: bold;
    left: 582px;
    list-style: outside none none;
    margin: 0 0 0 16px;
    padding: 0;
    position: absolute;
    top: 21px;
    width: 442px;
}
.clear {
    clear: both;
}




</style>
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
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
			
	
	
	
	/*	
	
//Récupération des cours de la BDD et affichage dans le planning			
	$(document).ready( function() {
	
		$.ajax({
            type:"GET",
            url:"data.php?action=recupInfoCours&id=<?php if($_SESSION['connecte']) echo $_SESSION['id'];?> ",
            success:function(result, htmlStatus, jqXHR) {
				result = $.parseJSON(result);
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
						
						nbWeek= getWeekNumber(laDate);
						nbDay = laDate.getDay();
						var defID = "Sem" + nbWeek + "jour" + nbDay + "heure" + heure;
						$("." + defID).html(description);
					} 
				}
            },
            error : function(jqXHR, htmlStatus, htmlError) {
                console.log("Status :" + htmlStatus + " \nError : " + htmlError);
            }
        });
	});


$('NOMDUBOUTON').click(fuction(){ //on le fait quand on appui sur le bouton VALIDER du PopUp
		$.ajax({
            type:"POST",
            url:"data.php?action=ajouterPlanning&id=<?php if($_SESSION['connecte']) echo $_SESSION['id'];?> ",
            success:function(result, htmlStatus, jqXHR) {
				if(!result) console.log("Resultats Null");	
				
				else {
					????				
				}
			},
            error : function(jqXHR, htmlStatus, htmlError) {
			console.log("Status :" + htmlStatus + " \nError : " + htmlError);
			}
        });
	});
*/


	function Popup(page,largeur,hauteur,options) {
	  var top=(screen.height-hauteur)/2;
	  var left=(screen.width-largeur)/2;
	  window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+","+options);
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

<?php
require('date.php');
$date = new Date();
$year = date('Y');
$dates = $date->getAll($year);
$flag = 0;
$nbSem = 0;
?>

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
                            <?php for($i=8;$i<=19;$i++) :?>
                                    <tr>
                                        <td><?php echo $i."H00";?></td>
                                        <?php for($j=1;$j<=7;$j++) :?>
                                            <td class="<?php echo "Sem".$nbSem."jour".$j."heure".$i;?>" onClick='Popup("popUpCalendar.php",1000,700,"menubar=no,scrollbars=no,statusbar=no")'>
											<?php echo '' ;?></td>
                                        <?php endfor;?>  
                                    </tr>
                            <?php endfor;?>   
                                
                        </table>
                    </div>
					
                    
                    
               <?php endforeach; ?> 
               
               
                   
        	</ul> <!-- Fin de la liste des numeros de semaines propre a un mois	   		
		<?php endforeach;?> <!-- FIN foreach qui recupere les mois -->		
	</div> <!-- FIN AFFICHAGE DES SEMAINES --> 
</div> <!-- FIN AFFFICHAGE PERIODS -->

       
    








