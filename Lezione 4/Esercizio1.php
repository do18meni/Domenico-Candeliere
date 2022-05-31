<?php
// titolo esercizio: Calcolatrice con funzioni
function somma($numero1, $numero2)
{

    $totale= $numero1 + $numero2;
return $totale;
}
function differenza($numero1, $numero2)
{
$totale = $numero1 - $numero2;

return $totale;
}
function moltiplicazione($numero1, $numero2)
{
    $totale= $numero1 * $numero2;

    return $totale;
}
function divisione($numero1, $numero2)
{
    $totale = 0;
    
    while($numero1 >= $numero2){
       $totale=($totale+1);
       $resto = ($numero1 -= $numero2);
    }
    $Risultato = array($totale, $resto);


   return  $Risultato;

}
function fattoriale($numero1)
{
    $totale = 1;
    if ($numero1 === 0) {
        $totale = 1;
    }
    else {
        for ($i = 1; $i <= $numero1; $i++) {

            $totale *=$i;


        }
    }
    return $totale;
}

$numero1;
$numero2;
$totale;
$resto;
$continua = true;
do {
    $scelta = (string)readline('Inserisci operazione da svolgere: ');

    if ($scelta === 'somma') {
        $numero1 = (int)readline('Inserisci primo numero: ');
        $numero2 = (int)readline('Inserisci secondo numero: ');
        $totale = somma($numero1, $numero2);
        $continua = false;
        echo 'La somma è: ' . $totale . PHP_EOL;
    }
    else if ($scelta === 'differenza') {
        $numero1 = (int)readline('Inserisci primo numero: ');
        $numero2 = (int)readline('Inserisci secondo numero: ');        
        $totale= differenza($numero1, $numero2);        
        $continua = false;        
        echo 'La differenza è: ' . $totale . PHP_EOL;    
    }    
    else if ($scelta === 'moltiplicazione') {
        $numero1 = (int)readline('Inserisci primo numero: ');
        $numero2 = (int)readline('Inserisci secondo numero: ');
        $totale = moltiplicazione($numero1, $numero2);
        $continua = false;
        echo 'La moltiplicazione è: ' . $totale . PHP_EOL;   
    }
        else if ($scelta === 'divisione') {
            $numero1 = (int)readline('Inserisci primo numero: ');
            $numero2 = (int)readline('Inserisci secondo numero: ');
            $continua = false;
           $Risultato = divisione($numero1, $numero2);
            echo 'Il risultato della divisione è: ' . $Risultato[0] . PHP_EOL;  
            echo 'Il resto è: '.$Risultato[1].PHP_EOL; 
     }
         else if ($scelta === 'fattoriale') {
        $numero1 = (int)readline('Inserisci numero:');
        $totale =fattoriale($numero1);
        $continua = false;
        echo 'Il fattoriale di ' . $numero1 . ' è: ' . $totale . PHP_EOL;    }
} while ($continua);


?>