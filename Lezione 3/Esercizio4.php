<?php 
// titoolo esercizio: parola più corta e parola più lunga
 
$frase = (String)readline('Inserisci testo: ');
$parole = explode(' ',$frase);
$lunga = null;
$corta = null;

foreach($parole as $parola){
    if($corta === null || strlen($parola)<strlen($corta)){
        $corta = $parola;
    }
    if($lunga === null || strlen($parola)<strlen($lunga)){
        $lunga = $parola;
    }
}
echo 'La Parola corta è: '.$corta.PHP_EOL;
echo 'La Parola lunga è: '.$lunga.PHP_EOL;



?>