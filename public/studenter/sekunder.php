<?php
 
$tot_sekunder = 4400;
 
$timer = (int)($tot_sekunder / 3600);
$minutter = (int)(($tot_sekunder - 3600 * $timer )/60);
$sekunder = $tot_sekunder % 60;
 
echo 'I 4400 sekunder er det '.'Timer:'.$timer.' Minutter:'.$minutter.' Sekunder:'.$sekunder.'';
 
?>