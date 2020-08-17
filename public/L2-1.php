<?php
$navn = "Edvard Grieg";
$alder = 177;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L2-1</title>
</head>

<body>
<h2>HTML-tabell</h2>
<p>Se oppgave L1-5</p>
	
<h2>En nummerert HTML-liste</h2>
<ol>
  <li><?php echo $navn; ?></li>
  <li><?php echo $alder; ?></li>
</ol> 
	
<h2>En unummerert HTML-liste</h2>
<ul>
  <li><?php echo $navn; ?></li>
  <li><?php echo $alder; ?></li>
</ul>
	
<h2>Inne i en paragraf-tag</h2>
<p>Hei! Jeg heter <?php echo $navn; ?> og hadde vært <?php echo $alder; ?> år om jeg levde i dag :)</p>
	
	
</body>
</html>