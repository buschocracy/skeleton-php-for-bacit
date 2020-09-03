<?php
$i = 1;
while( $i < 10 )
{
    echo $i . ' <br />';

    for( $j=1; $j < 10; $j++ )
    {
        echo $j . ' | ';
    }

    $i++; // $i = $i + 1;
}

echo '<br /><br />';
for( $i=1; $i < 10; $i++ )
{
    echo $i . '<br />';
}


?>