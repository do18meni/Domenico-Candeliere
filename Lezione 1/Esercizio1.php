<?php
 // titolo esercizio: Calcolatrice
$PrimoNumero; 
$SecondoNumero;
$Continua = true;
$Totale;
do {
    $Operazione = (string)readline('Inserisci tipo operazione:');

    if ($Operazione === 'somma') {

        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        
        $Totale = ($PrimoNumero + $SecondoNumero);
        $Continua = false;
        echo 'La somma è: ' .$Totale.PHP_EOL;
    }
    else if ($Operazione === 'differenza') {
       
        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        
        $Totale = ($PrimoNumero - $SecondoNumero);
        $Continua = false;
        echo 'La differenza è: ' .$Totale.PHP_EOL;
    }
    else if ($Operazione === 'moltiplicazione') {
        
        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        for($i = 0; $i<$SecondoNumero; $i++){
            $Totale +=$PrimoNumero;
        }
        echo 'La moltiplicazione è: ' .$Totale.PHP_EOL;
        $Continua = false;

    }
    else if ($Operazione === 'divisione') {
        
        $PrimoNumero = (int)readline('Inserisci primo numero: ');
        $SecondoNumero = (int)readline('Inserisci secondo numero: ');
        while($PrimoNumero >= $SecondoNumero){
        $Totale++;
       $Resto = ($PrimoNumero -= $SecondoNumero);
        }
        echo 'La divisione è: ' .$Totale.PHP_EOL;
        echo 'Il resto è: ' .$Resto.PHP_EOL;
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
            echo 'Il fattoriale è: ' .$Totale.PHP_EOL;
        }
    }
    else {
        echo 'Operazione errata '.PHP_EOL;


    }
} while ($Continua);


?>