<?php
/* Calucalation "brute force" */
$riskorn = 1;
for( $i=1; $i<=63; $i++ )
{
    $riskorn = $riskorn * 2;
}

echo "Etter 64 ruter har det blitt <br />";
printf( '%0.0f', $riskorn );
echo " riskorn tilsammen! <br /><br />";

/* Using exponents */
echo "Etter 64 ruter har det blitt <br />";
printf( '%0.0f', pow( 2, 63 ) );
echo " riskorn tilsammen!";
?>