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
       <div class="month" id="<?php echo $m;?>">
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
					<?php foreach ($days as $d=>$w):?>
                            <td><?php echo $d;?></td>
                            <?php if($w == 7): ?>
                            </tr><tr>
                            <?php endif; ?>
                    <?php endforeach;?>
                </tr>
                </tbody>
            </table>
       </div>      
    <?php endforeach;?>
</div>


<pre><?php print_r($dates);?></pre>








