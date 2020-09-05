<select>
<?php
$ty = date( 'Y' );
for( $y=$ty; $y>=1950; $y-- )
{
    echo '<option>' . $y . '</option>';
}
?>
</select>