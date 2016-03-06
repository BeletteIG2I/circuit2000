<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	jQuery(function($){
		$('.month').hide();
		$('.month:first').show();
		$('.months a:first').addClass('active');
		var current = 1;
		$('.months a').click(function(){
			var month = $(this).attr('id').replace('linkMonth','');
			if(month != current){
			$('#month'+current).slideUp();
			$('#month'+month).slideDown();
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
    <?php $dates = current($dates);?>
    <?php foreach ($dates as $m=>$days):?>
       <div class="month relative" id="<?php echo $m;?>">
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
                            	
                            	<td colspan="<?php echo $w-1;?> "class="padding"></td>
                            <?php endif;?>
                            <td>
                            	<div class="relative">
									<div class="day"><?php echo $d;?></div>
                                </div>
                                <ul class="events">
                                <li>Mon évènement </li>
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


<pre><?php print_r($dates);?></pre>








