<?php

$PrimoNumero; 
$SecondoNumero;
$Continua = true;
$Totale = 1;
do {
    $Operazione = (string)readline('Inserisci tipo operazione:');

    if ($Operazione === 'somma') {

        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        
        $Totale = ($PrimoNumero + $SecondoNumero);
        $Continua = false;

    }
    else if ($Operazione === 'differenza') {
       
        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        
        $Totale = ($PrimoNumero - $SecondoNumero);
        $Continua = false;

    }
    else if ($Operazione === 'moltiplicazione') {
        
        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        
        $Totale = ($PrimoNumero * $SecondoNumero);
        $Continua = false;

    }
    else if ($Operazione === 'divisione') {
        
        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        
        $Totale = ($PrimoNumero / $SecondoNumero);
        $Continua = false;

    }
    else if ($Operazione === 'fattoriale') {
       
        $Numero = (int)readline('Inserisci numero: ');
        
        if ($Numero === 0) {
            $Totale = 1;
            $Continua = false;

        }
        else {

            for ($i = 1; $i <= $Numero; $i++) {

                $Totale *= $i;
                $Continua = false;

            }
        }
    }
    else {
        echo 'Operazione errata '.PHP_EOL;


    }
} while ($Continua);

echo 'Il totale è: ' . $Totale;

?>