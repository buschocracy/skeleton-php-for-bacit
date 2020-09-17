<?php
//print_r( $_POST );

if ( $_POST['submit'] == 'Submit' )
{
    //echo 'Ditt navn er: ' . $_POST['fname'] . ' ' . $_POST['lname']; 

    if ( empty( $_POST['fname'] ) )
    {
        echo 'Du har ikke oppgitt fornavn <br />';
    }
    if ( empty( $_POST['lname'] ) )
    {
        echo 'Du har ikke oppgitt etternavn';
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form method="post" action="/test5.php">
  <label for="fname">First name*:</label><br>
  <input type="text" id="fname" name="fname" value="<?php echo $_POST['fname']; ?>"><br>
  <label for="lname">Last name*:</label><br>
  <input type="text" id="lname" name="lname" value="<?php echo $_POST['l name']; ?>"><br><br>
  <input type="submit" name="submit" value="Submit">
</form> 

</body>
</html>