<?php 
// titoolo esercizio: conteggio vocali presenti 

$Stringa = (String)readline('Inserisci testo: ');

$conta  =0;
for ($i = 0; $i<strlen($Stringa);$i++){
    $carattere = strtolower($Stringa[$i]);
    if(in_array($carattere,['a','e','i','o','u'])){
        $conta++;
    }
}



echo 'Il numero totale delle vocali presenti è:'. $conta;




?>