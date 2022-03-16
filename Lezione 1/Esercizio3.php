<?php
// titolo esercizio: stampa i multipli di 3 o 5:
$Numero = (int)readline('Inserisci numero: ');
$somma = 0;
for ($i= 0; $i<= $Numero; $i++){
        if($Numero%3 === 0 || $Numero%5 === 0){
            $somma += $i;

        }
    
}


echo 'Il totale della somma è: ' . $somma;
?>