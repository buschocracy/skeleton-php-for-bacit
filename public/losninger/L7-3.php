<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Connect to database */
	require_once 'db.inc.php';

	/* Include required classes */
	require_once 'L7-user.lib.php';

    /**
     * Dette er et eksempel på en egendefinert funksjon. Denne sjekker om e-post validerer iht. forventet format.
	 * Det er ikke(!) forventet at dere skal kunne lage slike funksjoner som dette (preg_match er ganske komplisert), så her er det bare å kopiere andres arbeid med mindre dere synes dette er interessant ;)
     * @param string $email   			Email to be validated.
     * @return boolean        			Returns true on success and false on failure.
     */
    function validate( $email )
    {
		/* Preg match string */
		$result = preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email);

		return $result;
    }

	/* Er skjemaet sendt? Vi ønsker kun å kjøre koden etter at skjemaet er sendt. */
	if ( isset( $_POST['reg-send'] ) )
	{
		/* Definér matrise for feilmeldinger */
		$feilmeldinger = array();
		
		/* Tomme felt? */
		if ( empty( $_POST['fornavn'] ) )
		{
			$feilmeldinger[] = "Fornavn mangler";
		}
		if ( empty( $_POST['etternavn'] ) )
		{
			$feilmeldinger[] = "Etternavn mangler";
		}
		if ( empty( $_POST['epost'] ) )
		{
			$feilmeldinger[] = "E-post mangler";
		}
		
		/* Feil i e-postformat? */
		if ( !validate( $_POST['epost'] ) )
		{
			$feilmeldinger[] = "E-post har ugyldig format";
		}
		
		if ( !empty( $feilmeldinger ) )
		{
			echo "Følgende må rettes .. <br>";
			foreach( $feilmeldinger as $key => $feilmelding )
			{
				echo $feilmelding . "<br />";
			}
		}
		else
		{
			/* Data lagres i databasen */
			$user->firstname = $_POST['fornavn']; 
			$user->lastname = $_POST['etternavn']; 
			$user->email = $_POST['epost']; 
			$user->gender = $_POST['kjonn'];
			$stmt = $user->padd( $fieldslog, $connection ); 
			$result = $user->add( $fieldslog, $stmtlog );

			/* Sluttbeskjed */
			echo "<br /> Det nye medlemmet er registrert!";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L7-3</title>
</head>

<body>
	<!-- Følgende informasjon skal registreres: fornavn, etternavn, adresse, mobilnummer, e-post, fødselsdato, kjønn, interesser, kursaktiviteter, medlem siden dato og kontingentstatus.
	Noen av disse skal ikke registreres i dette skjemaet. I denne løsningen har jeg for enkelthets skyld utelukket en del av de andre opplysningene. -->
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>
			<div>
				<input type="text" name="fornavn" value="<?php if( !empty( $_POST['fornavn'] ) ) { echo $_POST['fornavn']; } ?>" placeholder="Fornavn" />
			</div>
			<div>
				<input type="text" name="etternavn" value="<?php if( !empty( $_POST['etternavn'] ) ) { echo $_POST['etternavn']; } ?>" placeholder="Etternavn" />
			</div>
			<div>
				<input type="email" name="epost" value="<?php if( !empty( $_POST['epost'] ) ) { echo $_POST['epost']; } ?>" placeholder="E-post" />
			</div>
			<div>
				<select name="kjonn">
				  <option value="F">Kvinne</option>
				  <option value="M">Mann</option>
				</select>
			</div>
		</div>
		<div>
			<input type="submit" name="reg-send" class="button" value="Registrér">
		</div>
	</form>
</body>
</html>
