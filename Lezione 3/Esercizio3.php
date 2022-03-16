<?php 
// titoolo esercizio: conteggio parole ripetizione parole
 
$frase =(String)readline('Inserisci parola: ');

$parole = explode(' ',$frase);

$ripetizioniParole =[];

foreach($parole as $parola){
    $parola = strtolower($parola);

    if(!isset($ripetizioniParole[$parola])){
        $ripetizioniParole[$parola]=0;

    }
 $ripetizioniParole++;

    
    
}
var_dump($ripetizioniParole);

foreach($parole as $parola => $ripetizioni){
    echo 'La Parola'.$parola.' è ripetuta'. $ripetizioni.' volte'.PHP_EOL;
}


?>