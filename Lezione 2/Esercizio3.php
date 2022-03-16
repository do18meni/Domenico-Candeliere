<?php

// titolo esercizio: stampa i valori nelle posizioni pari di un array:


$lunghezza = (int)readline('Inserisci lunghezza array: ');
$divisore = 2;
// input array:
for ($i = 0; $i < $lunghezza; $i++) {
    $numeri[] = (int)readline('Inserisci valori: ');
}
// stampa quanti elementi ci sono nell'array:
echo "l'array ha: " . count($numeri) . ' valori' . PHP_EOL;

//stampa i valori nelle posizioni pari di un array: 
    for ($i = 0; $i < count($numeri); $i++) {
        if ($i % $divisore === 0) {
            echo ' I valori in posizione pari sono: ' . $numeri[$i] . PHP_EOL;

        }
    }


?>