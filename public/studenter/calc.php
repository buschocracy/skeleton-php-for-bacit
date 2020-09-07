<!DOCTYPE html>
<html>
<head>
	<title>Utregning</title>
</head>
<body>
	<?php $first = $_POST['first']?>
	<?php $second = $_POST['second']?>
	<p>Svar:
	<?php 
	if (isset($_POST['submit'] )){
		$result1 = $_POST['first'];
		$result2 = $_POST['second'];
		$operator = $_POST['operator'];

		switch ($operator) {
			case 'None':
				echo "You need to select an operator";
				break;
			case 'Pluss':
				echo $result1 + $result2;
				break;
			case 'Minus':
				echo $result1 - $result2;
				break;
			case 'Gange':
				echo $result1 * $result2;
				break;
			case 'Dele':
				echo $result1 / $result2;
				break;
			case 'Gjennomsnitt':
				echo ($result1 + $result2) / 2;
				break;
		}
	} ?> 
	</p>
</body>
</html>