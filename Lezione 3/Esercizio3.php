<?php 
// titoolo esercizio: conteggio parole ripetizione parole
 

$frase = readline('Inserisci una frase: ');
$parole = explode(' ', $frase);



$ripetizioniParole = [];

foreach ($parole as $parola) {
    $parola = strtolower($parola);

    if (!isset($ripetizioniParole[$parola])) {
        $ripetizioniParole[$parola] = 0;
    }

    $ripetizioniParole[$parola]++;
}



foreach ($ripetizioniParole as $parola => $ripetizioni) {
    echo 'La parola ' . $parola . ' è ripetuta ' . $ripetizioni . ' volte.' . PHP_EOL;
}
?>