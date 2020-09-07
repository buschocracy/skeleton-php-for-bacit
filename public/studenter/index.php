<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table, th, tr, td, ol, ul {
			border:1px solid black;
		}
	</style>
</head>
<body>
		<h2><strong> Oppgave 1</strong></h2>
	<?php $navn = "Magnus" ?>
	<?php $alder = 25  ?>
	<?php $navn2 = "Jørgen" ?>
	<?php $alder2 = 24 ?>
<table style="width: 50%">
	<tr>
		<th>Navn</th>
		<th>Alder</th>
	</tr>
	<tr>
		<td><?php echo $navn ?></td>
		<td><?php echo $alder ?></td>
	</tr>
	<tr>
		<td><?php echo $navn2 ?></td>
		<td><?php echo $alder2 ?></td>
	</tr>
</table>
<br>
<ol style="width: 150px", type="1">
	<li><?php echo $navn, " , ",  $alder ?></li>
	<li><?php echo $navn2, " , ", $alder2 ?></li>
</ol>
<br>
<ul style="width: 150px">
	<li><?php echo $navn , " , ", $alder ?></li>
	<li><?php echo $navn2 , " , ", $alder2 ?></li>
</ul>
<br>
<p>
	<?php echo $navn, ", ", $alder ?><br>
	<?php echo $navn2, ", ", $alder2 ?><br>
	</p>
<br><br>


<h2> Oppgave 2</h2>
<p>Enkel kalkulator. Skriv inn to verdier og velg en operator.</p>
<form method="post" action="calc.php">
	<p>Verdi 1:
	<input type="text" name="first">
	Verdi 2:
	<input type="text" name="second">
	<select name="operator" id="">
		<option>-- Velg Operator --</option>
		<option>Pluss</option>
		<option>Minus</option>	
		<option>Gange</option>
		<option>Dele</option>
		<option>Gjennomsnitt</option>
	</select>
	<button type="submit" name="submit" value="submit">Regn ut</button>
	</p>
	</form><br>


<h2> Oppgave 3</h2>
<?php $tid = 4400 ?>
<?php echo $tid, " sekunder = ", (int)($tid /3600), " timer, ", $tid /60 % 60, "minutter og ", $tid % 60, " sekunder."?>
<br><br>


<h2> Oppgave 4</h2>
<!-- Bruker var_export istedenfor var_dump, da dette kun returnerer verdien, ikke hele path-name --> 
<?php 	$medlem1 = 12345;
		$medlem2 = 67890;
		if ($medlem1 == $medlem2) {
			echo "Medlemsnummere matcher.";
		}
		else {
			echo "Medlemsnummer matcher ikke. Medlemsnummer 1: ", var_export($medlem1), ". Medlemsnummer 2: ", var_export($medlem2);
		}?>


</body>
</html>