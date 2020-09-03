<body>

	<form style="text-align: center; margin-top: 50px;">
		<input type="text" name="num1" style="margin: 40px;" placeholder="tall1">
		<input type="text" name="num2" style="margin: 40px;" placeholder="tall2">
		<select name="operator">
            <option>Ingen</option>
			<option>Pluss</option>
			<option>Minus</option>
            <option>Gjennomsnitt</option>
		</select>
		<br>
		<button type="submit" name="submit" value="submit">Kalkulér!</button>
	</form>
	<p style="text-align: center;">Svaret er:</p>
    <?php
if (isset($_GET['submit'])) {
    $tall1  = (float) $_GET['num1'];
    $tall2  = (float) $_GET['num2'];
    $operator = $_GET['operator'];
    if ($operator == 'Ingen') {
        echo "Ingen metode valgt";
    } else {
        switch ($operator) {
            case "Pluss":
                $kalkResultat = $tall1 + $tall2;
                break;
            
            case "Minus":
                $kalkResultat = $tall1 - $tall2;
                break;

            case "Gjennomsnitt":
                $kalkResultat = ($tall1 + $tall2)/2;
                break;
        }
        echo '<p style="text-align: center; border: 1px solid black; padding: 10px; width: 100px; margin: 0 auto;">' . $kalkResultat . '</p>';
    }
}
?>

</body>