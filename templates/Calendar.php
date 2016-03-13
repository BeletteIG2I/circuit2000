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
.months {
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
h2{
display:inline;	
}
</style>
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

jQuery(function($){
               $('.month').hide();
               $('.month:first').show();
               $('.months a:first').addClass('active');
               var current = 1;
               $('.months a').click(function(){
                    var month = $(this).attr('id').replace('linkMonth','');
					console.log("Month:"+month);
                    if(month != current){
						console.log("Peit Test"+$('#month')+current);
						console.log("Next Month"+$('#month')+month);
						console.log("current:"+current);
                        $("#month"+current).hide();
                        $("#month"+month).show();
                        $('.months a').removeClass('active'); 
                        $('.months a#linkMonth'+month).addClass('active'); 
                        current = month;
                    }
                    return false; 
               });
            });

</script>
<?php
require('date.php');

$date = new Date();
$year = date('Y');
$dates = $date->getAll($year);

?>

<div class="periods">
    <div class="year"><?php echo $year;?> </div>
    <div class="months"> 
        <ul>
            <?php foreach ($date->months as $id=>$m):?>
                <li><a href="#" id="linkMonth<?php echo $id+1;?>"><?php echo utf8_encode(substr(utf8_decode($m),0,3));?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    
    
    
    
    
    
    
    
    </br>
    </br>
    <h2>Semaines</h2>

 
    <?php $dates = current($dates);?>
    <?php foreach ($dates as $m=>$days):?>
       <div class="month relative" id="month<?php echo $m;?>">
       		<table>
            	<thead>
                	
                	<?php 
					$nbSem = 0;
					$end = end($days); 
					foreach ($days as $d=>$w):?>
                            <?php if($w == 7): ?>
                            <td><a href="#" id="linkWeek<?php echo $nbSem+1;?>"><?php echo ($nbSem+=1);?> </a></td>
                                
                            <?php endif; ?>    
                    <?php endforeach;?>
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
       </div>      
    <?php endforeach;?>
</div>
       
       
       
       
       
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- NE pas modifier ce qu'il y a en dessous !!!! --> 
    
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
       </div>      
    <?php endforeach;?>
</div>









