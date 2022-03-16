<?php 
// titoolo esercizio: stinga palindroma
 
$String =(String)readline('Inserisci parola: ');
$parola= str_replace( ' ',"",$String);
$StringInversa = strrev($String);
$parolaInversa= str_replace( ' ',"",$StringInversa);
if ($parola === $parolaInversa){

    echo 'La stringa è palindroma'.PHP_EOL;
    echo 'Originale:'.$parola.PHP_EOL;
    echo 'Invertita:'.$parolaInversa.PHP_EOL;
}
else{

    echo 'La stringa non è palindroma'.PHP_EOL;
    echo 'Originale:'.$parola.PHP_EOL;
    echo 'Invertita:'.$parolaInversa.PHP_EOL;
}





?>