<?php

// titolo esercizio: somma e prodotto in un array:

$Lunghezza = (int)readline('Inserisci lunghezza array: ');
$somma= 0;
$prodotto = 1;

for($i=0; $i<$Lunghezza; $i++){
    $Numeri[]=(int)readline('Inserisci valori: ');
}
   // stampa quanti elementi ci sono nell'array:
echo "l'array ha: ".count($Numeri).' valori'.PHP_EOL;
//stampa array:
foreach($Numeri as $Chiave =>$Valore ){ 
    echo $Chiave .'=>'. $Valore.PHP_EOL ;
}
//calcola la somma:

foreach($Numeri as $Valore ){ 
    $somma +=$Valore;

}
echo 'La somma è: ' .$somma.PHP_EOL;
//calcola il prodotto:
foreach($Numeri as $Valore ){ 
    $prodotto *=$Valore;

}
echo 'Il prodotto è: ' .$prodotto.PHP_EOL;








?>
