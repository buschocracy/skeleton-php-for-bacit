<?php
$i = 17;
if(  $i < 10 )  
{
    echo $i . ' er under 10';
}
elseif( $i < 20 )
{
    echo $i . ' er mellom 10 og 20';
}
else
{
    echo $i . ' er ikke under 10';
}



if ($i == 0) {
    echo "i equals 0";
} elseif ($i == 1) {
    echo "i equals 1";
} elseif ($i == 2) {
    echo "i equals 2";
}

switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    default:
        echo "i equals 2";
        break;
}



















?>