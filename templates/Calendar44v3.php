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
              
			   $('.months a:first').addClass('active');								//sélectionne le mois courant (la c'est janvier pcq par défaut)
			   $('.sem').hide();													//cache tous les tableaux
               $('.sem:first').show();												//affiche le 1er tableau (par défaut semaine 0)
               $('.sem a:first').addClass('active');								//le sélectionne comme actif
               var current = 0;
			   
               $('.months a').click(function(){									//quand on clique sur un mois	   
                    var month = $(this).attr('id').replace('linkMonth','');		//récup l'id du mois
					console.log("Month:"+month);								//petit affichage
                    if(month != current){										//si on clique sur un autre que celui sélectionné
						//$('.nbS').hide();
						
						/*console.log("Mois précédent"+$('#month')+current);
						console.log("Mois actuel"+$('#month')+month);
						console.log("current:"+current);
                        $("#month"+current).hide();
                        $("#month"+month).show();*/
                        
						$('.months a').removeClass('active'); 					//déselectionne l'ancien mois (CSS)
                        $('.months a#linkMonth'+month).addClass('active'); 		//sélectionne le mois choisi (CSS)
                        current = month;										//nouveau mois choisi
                    }
                    return false; 
               });
			   
			   $('.week a').click(function(){									//quand on clique sur une semaine
					var we = $(this).attr('id').replace('linkWeek','');			//récup id semaine
					console.log("Week:"+we);									//petit affichage
						
                    if(we != current){											//si on clique sur une autre que celle selectionné
						
						console.log("semaine précédente"+$('#sem')+current);	//affichages
						console.log("semaine actuelle"+$('#sem')+we);
						console.log("current:"+current);
						
                        $('.sem').eq(current).hide();							//on cache le tableau sélectionné avant
                        $('.sem').eq(we).show();								//on affiche le tableau sélectionné 
                        $('.week a').removeClass('active'); 					//deselectionne ancienne semaine (CSS)
                        $('.week a#linkWeek'+we).addClass('active'); 			//selectionne semaine choisi (CSS)
                        current = we;											//nouvelle semaine
					} return false;
				 
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
						//console.log(result[i]["date"]);
						//console.log(i);
						var laDate = result[i]["date"];
						var description = result[i]["description"];
						var Commentaire = result[i]["Commentaire"];
						var annee = laDate.substring(0,4);
						var mois = laDate.substring(5,7);	
						var jour = laDate.substring(8,10);
						var heure = parseFloat(laDate.substring(11,13));
						//console.log("Le " + jour + "/" + mois + "/" + annee + " à " + heure + "H00 il y aura : " + description + ". Il portera sur : " + Commentaire);	
						laDate = new Date(mois+'/'+jour+'/'+annee);
						
						nbWeek= getWeekNumber(laDate);
						nbDay = laDate.getDay();
						//nbDay = decaleJour(nbDay);
						//console.log("-->" + nbDay);
						
						var defID = "Sem" + nbWeek + "jour" + nbDay + "heure" + heure;
						//console.log(defID);
						$("." + defID).html(description);
					} 
				}
            },
            error : function(jqXHR, htmlStatus, htmlError) {
                console.log("Status :" + htmlStatus + " \nError : " + htmlError);
            }
        });
	});
*/
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
<?php# echo "Connecte".$_SESSION['connecte']; echo "ID".$_SESSION['idUser']; echo "Admin".$_SESSION['admin'];?>
<?php 
function debug_to_console( $data ) {

	if ( is_array( $data ) )
		$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	else
		$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	echo $output;
}


?>
<?php
require('date.php');
$date = new Date();
$year = date('Y');
$dates = $date->getAll($year);
$flag = 0;
$nbSem = 0;
?>

<!-- div pour l'affichage des cours (pour les tests) --> 
<div id="divDeTest"></div>
<!-- ###################  -->

<div class="periods">
    <div class="year"><?php echo $year;?></div>
    
    <!-- On affiche la liste des mois de l'année -->
    <div class="months"> 
        <ul>
            <?php foreach ($date->months as $id=>$m):?>
                <li><a href="#" id="linkMonth<?php echo $id+1;?>"><?php echo utf8_encode(substr(utf8_decode($m),0,3));?></a></li>
            <?php endforeach;?>
        </ul>
	</div>
   
   <!-- Affichage des semaines -->
	<div class="week">	
		<h2>Semaine</h2>
 
		<?php 
		
		$dates = current($dates);
		 foreach ($dates as $m=>$days):?>		
				
			<ul> <!-- listage des numéros de semaines (en y ajoutant des liens vers les semaines -->
				
				
				<?php 
				/*echo "<script> console.log('".$m."');</script>";*/
                
				
				$end = end($days);
				
				foreach ($days as $d=>$semaine):
					
					
                   foreach ($semaine as $s=>$day):
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
							 //echo "J:".$s;
							
                       
                    endforeach;?>
                    
                    <?php //echo "Sem:".$nbSem;?>
	
					<li class="nbS"><a href="#" id="linkWeek<?php echo $nbSem;?>">
					<?php echo $nbSem;?> </a></li>	
                    
                    <!-- Affichage de chaque tableau pour chaque semaine -->
                    <div class="sem" id="<?php echo $nbSem;?>"> </br></br>	
                    <table id="TableWeek<?php echo $nbSem;?>">
                        <tr>
                            <td colspan= 1 class="padding"></td>
                            <?php foreach ($date->days as $d):?>
                                <th>
                                <?php echo substr($d,0,3);?>
                                </th>
                            <?php endforeach;?>    
                        </tr>
                        <?php for($i=8;$i<=19;$i++) :?>
                                <tr>
                                    <td><?php echo $i."H00";?></td>
                                    <?php for($j=1;$j<=7;$j++) :?>
                                        <td class="<?php echo "Sem".$nbSem."jour".$j."heure".$i;?>"><?php echo '' ;?></td>
                                    <?php endfor;?>  
                                </tr>
                        <?php endfor;?>   
                            
                    </table>
                    </div>				
				<?php 
				//debug_to_console($semaine);
				endforeach;?>
			
			</ul>


</div>






</br></br></br></br>
<!--
			<table>
				<tr>
					<td colspan= 1 class="padding"></td>
					<?php foreach ($date->days as $d):?>
						<th>
						<?php echo substr($d,0,3);?>
						</th>
					<?php endforeach;?>    
				</tr>
				<?php for($i=8;$i<=19;$i++) :?>
						<tr>
							<td><?php echo $i."H00";?></td>
							<?php for($j=1;$j<=7;$j++) :?>
								<td><?php echo '' ;?></td>
							<?php endfor;?>  
						</tr>
				<?php endfor;?>   
					
			</table>
				 
		<?php endforeach;?>
	</div>
       
       --> 
       
       
       
       

    
    
    
    
    
    
    
    
    <!-- NE pas modifier ce qu'il y a en dessous !!!! 
    
    <?php $dates = current($dates);?>
    <?php foreach ($dates as $m=>$days):?>
       <div class="month relative" id="month<?php echo $m;?>">
       		<table>
            	<thead>
                	<tr>
                    <?php foreach ($date->days as $d):?>
                    	<th>
                        <?php echo substr($d,0,3);?>
                        </th>
                     <?php endforeach;?>
                    </tr>
                </thead>
                <tbody>
                <tr>
					<?php $end = end($days); foreach ($days as $d=>$w):?>
                    		<?php if($d ==1 && $w>1):?>
                            	<td colspan="<?php echo $w-1;?> "class="padding">
                                </td>
							<?php endif;?>
                            <td>
                                <div class="relative">
                                    <div class="day"><?php echo $d;?></div>
                                </div>
                                <ul class="events">
                                <?php if($d ==2):?>
                            	<li>Evènement le 2eme jour</li>
								<?php endif;?>
                                <li>Mon évènement </li>
                                <li>Mon deuxième évènement</li>
                                </ul>
                            </td>
                            <?php if($w == 7): ?>
                                </tr><tr>
                            <?php endif; ?>
                    <?php endforeach;?>
                    <?php if($end != 7): ?>
                    	<td colspan="<?php echo 7-$end;?> "class="padding"></td>
                    <?php endif;?>
                </tr>
                </tbody>
            </table>
       </div>-->      
    <?php endforeach;?>
</div>








