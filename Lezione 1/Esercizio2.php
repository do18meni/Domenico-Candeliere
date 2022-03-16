<?php
// titolo Esercizio: stampa la somma di n numeri:
$Numero = (int)readline('Inserisci numero: ');

for ($i= 0; $i<= $Numero; $i++){

    $Numero =$Numero + $i;
    
}


echo 'Il totale della somma è: ' . $Numero;
?>