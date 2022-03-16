<?php

// titolo esercizio: trova il massimo e il minimo in un array:
//array:
$Numeri = [];

for ($i = 0; $i < 20; $i++) {
    $Numeri[] = (int)readline('Inserisci valori: ');
}



// stampa quanti elementi ci sono nell'array:
echo "l'array ha: " . count($Numeri) . 'valori' . PHP_EOL;
//stampa array:
foreach ($Numeri as $Chiave => $Valore) {
    echo $Chiave . '=>' . $Valore . PHP_EOL;
}
//inizilizzo massimo e minimo:
$Massimo = null;
$Minimo = null;

//verifica il valore più piccolo e più grande contenuto nell'array:
foreach ($Numeri as $Valore) {
    // massimo:
    if ($Massimo === null || $Valore > $Massimo) {
        $Massimo = $Valore;
    }    
    // minimo:
    if ($Minimo === null || $Valore < $Minimo) {
        $Minimo = $Valore;
    }
}
// stampo i due valori
echo 'Il numero più piccolo è ' . $Minimo . PHP_EOL;
echo 'Il numero più grande è' . $Massimo . PHP_EOL;






?>
