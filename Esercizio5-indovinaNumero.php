<?php

$continua = true;

$NumeroVincente = random_int(0, 20);

do {
    $Numero = (int)readline('Inserisci numero: ');
    if ($Numero === $NumeroVincente) {
        echo 'Hai indovinato!!';
        $continua = false;
    }
    else if ($Numero < $NumeroVincente) {
        echo 'Il numero da indovinare è maggiore' . PHP_EOL;
    }
    else if ($Numero > $NumeroVincente) {       
         echo 'Il numero da indovinare è minore' . PHP_EOL;
    }    
    else {
        echo 'Riprova' . PHP_EOL;
    }



} while ($continua);

?>