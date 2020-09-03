<?php
$players = 2;
$rounds = 10;

$dice_b1 = rand(1, 6);
$dice_b2 = rand(1, 6);
$b_sum = $dice_b1 + $dice_b2;

$dice_p11 = rand(1, 6);
$dice_p12 = rand(1, 6);
$p1_sum = $dice_p11 + $dice_p12;

$dice_p21 = rand(1, 6);
$dice_p22 = rand(1, 6);
$p2_sum = $dice_p21 + $dice_p22;

/* First check: players 1 and 2 equal sum? */
if( $p1_sum == $p2_sum )
{

}
else
{
    /* Check results - rule 1: same result as box dices? */
    if( $p1_sum == $b_sum || $p2_sum == $b_sum )
    {
        
    }
}








?>