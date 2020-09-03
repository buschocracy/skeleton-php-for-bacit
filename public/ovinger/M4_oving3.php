<?php
    function shuffle_assoc(&$array) {
        $keys = array_keys($array);

        shuffle($keys);

        foreach($keys as $key) {
            $new[$key] = $array[$key];
        }

        $array = $new;

        return true;
    }

echo '<p>Monty Hall problemet stammer fra et amerikansk TV show. Konseptet gikk ut på at en deltaker skulle velge en av tre dører. Bak en av dørene skjulte det seg en Mercedes og bak de to andre skjulte det
seg en geit. Deltakeren visste naturligvis ikke hva som skjulte seg bak hvilken dør. Når deltakeren hadde valgt seg en dør, men før døren ble åpnet, så åpnet programlederen en annen dør. Døren som
ble åpnet skjulte alltid en geit. Spørsmålet til deltakeren nå er om han fremdeles ønsket innholdet bak døren han opprinnelig hadde valgt, eller om han ønsket å bytte dør. En enkel og intuitiv
forklaring på hva som er lurt å gjøre er beskrevet her:</p>';
echo '<p><a href="https://no.wikipedia.org/wiki/Monty_Hall-problemet">https://no.wikipedia.org/wiki/Monty_Hall-problemet</a></p>';
echo '<p>Vi skal lage et program som simulerer hvordan TV showet foregikk. Vi skal etterpå lage en simulering som kjører et valgfritt antall show automatisk og samtidig teller opp antall ganger vi vinner Mercedes
ved å bytte dør og ved å stå i ro. </p>';

echo '<p>Dette programmet lager en simulering av Monty Hall-problemet. <br />';
echo 'Vi kjører ' . $_GET['s'] . ' simuleringer. </p>';

/* Tellere */
$switches = 0;
$non_switches = 0;
$price_switches = 0;
$price_non_switches = 0;

/* Vi kjører simuleringene */
for( $i=1; $i<=$_GET['s']; $i++ )
{
    /* Annonserer runde */
    echo 'RUNDE ' . $i . '<br />';
    
    /* Lager nytt døroppsett for hver simulering og flytter Mercedesen bak tilfeldig dør */
    $doors = array( 1 => 'M', 2 => 'G', 3 => 'G' ); 
    shuffle_assoc( $doors );
    ksort( $doors );

    /* Viser oss hvor Mercedesen er og hvor geitene er */
    echo 'Dørene inneholder: ';
    foreach( $doors as $door => $gift )
    {
        echo 'dør ' . $door . ': ' . $gift . ' | ';
    }

    /* Hva velger deltakeren? Automatisk trekning */
    $selected_door = rand( 1, 3 );
    echo '<br /> Deltakeren: jeg velger dør nr. ' . $selected_door . ' | ';

    /* Programlederen åpner en dør med en geit */
    foreach( $doors as $door => $gift )
    {
        if( $door !== $selected_door )
        {
            if( $gift == 'G' && !isset( $opened_door ) )
            {
                $opened_door = $door;
                echo 'Programlederen: Åpner dør ' . $opened_door . ' og der skjuler det seg en geit | ';
            }
        }
    }

    /* Bytter deltakeren? */
    $switch = rand( 1, 2 ); // 1 = nei. 2 = ja.
    if( $switch == 2 )
    {
        /* Deltakeren bytter dør */
        for( $j=1; $j<=3; $j++ )
        {
            if( $j !== $selected_door && $j !== $opened_door )
            {
                $new_door = $j;
            }
        }

        $selected_door = $new_door;
        echo 'Deltakeren har byttet dør og velger nå dør nr. ' . $selected_door . ' | ';
        $switches++;
    }
    else
    {
        echo 'Deltakeren bytter ikke dør og beholder dør nr. ' . $selected_door . ' | ';
        $non_switches++;
    }

    /* Vant deltakeren? */
    if( $doors[$selected_door] == 'M' )
    {
        echo 'Deltakeren vant en Mercedes! <br /><br />';
        if( $switch == 2 )
        {
            $price_switches++;
        }
        else
        {
            $price_non_switches++;
        }
    }
    else
    {
        echo 'Deltakeren vant en geit <br /><br />';
    }

    /* Nullstiller variabler */
    unset( $opened_door );
    unset( $selected_door );
}

    /* Oppsummering av premiefangst */
    echo 'Deltakerne vant ' . $price_switches . ' Mercedes(er) ved å bytte dør og ' . $price_non_switches . ' Mercedes(er) ved ikke å bytte dør.';
?>