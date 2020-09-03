<?php
/* Black Jack for player */
$sum = rand( 1, 10 );
echo 'PLAYER <br />';
echo 'First card has value ' . $sum . '.<br /><br />';
$continue = 'yes';

while( $continue == 'yes' )
{
    $this_round = rand( 1, 10 );
    echo 'Next card has value ' . $this_round;  
    $sum = $sum + $this_round;
    echo '. Total amount is now ' . $sum . '. ';

    /* Continue? Risk assessment */
    if( abs( 21 - $sum ) < 4 || $sum > 21 ) // with four or more up to 21, this player will continue to play
    {
        $continue = 'no';
        echo 'Player stops. <br /><br />';
    }
    else
    {
        $continue = 'yes';
        echo 'Player continues. <br />';
    }
}

/* Black Jack for bankier */
$sum2 = rand( 1, 10 );
echo 'BANKIER <br />';
echo 'First card has value ' . $sum2 . '.<br /><br />';
$continue = 'yes';

while( $continue == 'yes' )
{
    $this_round = rand( 1, 10 );
    echo 'Next card has value ' . $this_round;  
    $sum2 = $sum2 + $this_round;
    echo '. Total amount is now ' . $sum2 . '. ';

    /* Continue? Risk assessment */
    if( abs( 21 - $sum2 ) < 3 || $sum2 > 21 ) // with three or more up to 21, the bankier will continue to play
    {
        $continue = 'no';
        echo 'Bankier stops. <br /><br />';
    }
    else
    {
        $continue = 'yes';
        echo 'Bankier continues. <br />';
    }
}

/* Who won? */
if( $sum > 21 && $sum2 > 21 )
{
    /* Both lost */
    echo 'Player and bankier both lost! Player got ' . $sum . ' and bankier got ' . $sum2 . '. <br />'; 
}
elseif( $sum > 21 )
{
    /* Player lost */
    if( $sum2 == 21 )
        $sum2 = '21 (Black Jack!)';
    echo 'Player lost! Player got ' . $sum . ' and was too risky. Bankier got ' . $sum2 . '.<br />'; 
}
elseif( $sum2 > 21 )
{
    /* Bankier lost */
    if( $sum == 21 )
        $sum = '21 (Black Jack!)';
    echo 'Bankier lost! Bankier got ' . $sum2 . ' and was too risky. Player got ' . $sum . '.<br />'; 
}
elseif( $sum == $sum2 )
{
    if( $sum == 21 )
    {
        $sum = '21 (Black Jack!)';
        $sum2 = '21 (Black Jack!)';
    }
    echo 'Both won with ' . $sum2 . '.<br />'; 
}
else
{
    /* None went above 21 */
    if( $sum > $sum2 )
    {
        if( $sum == 21 )
            $sum = '21 (Black Jack!)';
        echo 'Player won with ' . $sum . ' against the bankier who had ' . $sum2 . '.';
    }
    else
    {
        if( $sum2 == 21 )
            $sum2 = '21 (Black Jack!)';
        echo 'Bankier won with ' . $sum2 . ' against the player who had ' . $sum . '.';
    }
}


?>