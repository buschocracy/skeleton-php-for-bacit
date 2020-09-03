<?php
date_default_timezone_set( 'Europe/Oslo' );
switch ( date( 'G' ) ) 
{
    case date( 'G' ) >= 21:
        $color = 'yellow';
        $greeting = 'God kveld!';
        break;
    case date( 'G' ) >= 16:
        $color = 'green';
        break;
    case date( 'G' ) >= 11:
        $color = '#f8fc03';
        $greeting = 'God ettermiddag!';
        break;
    case date( 'G' ) >= 0:
        $color = 'red';
        break;
    default:
        $color = 'grey';
        break;
}

?>
<!DOCTYPE html>
<html>
   <head>
      <title>HTML Background Color</title>
   </head>
   <body style="background-color:<?php echo $color; ?>;">
      <h1><?php echo $greeting; ?></h1>
      <p>Dette er bare en tullete tekst som står her. Blir så tomt uten noe som helst.</p>
   </body>
</html>