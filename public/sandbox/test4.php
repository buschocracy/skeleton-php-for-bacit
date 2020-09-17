<?php
$medlemmer = array('Silje','Johan');
foreach( $medlemmer as $key => $value) 
{
    echo $key . ' ' . $value . '<br /> ';
}

?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>HTML Table</h2>

<table border="1">
  <tr>
    <th>Key</th>
    <th>Value</th>
  </tr>

  <?php foreach( $medlemmer as $key => $value) { ?>
  <tr>
    <td><?php echo $key; ?></td>
    <td><?php echo $value; ?></td>
  </tr>
  <?php } ?>

</table>

</body>
</html>