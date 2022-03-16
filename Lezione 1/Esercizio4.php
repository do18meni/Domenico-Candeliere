<?php
// titolo esercizio : stampa gli anni bisestili:
$anno = date('Y')+1;
$contatore =0;

while($contatore <20){
    $casoA =($anno %100) !== 0 && ($anno %4) ===0;
    $casoB =($anno %100) ===0 && ($anno %400) ===0;

    if($casoA || $casoB){
        echo $anno .PHP_EOL;
        $contatore++;
    }
$anno++;
}



?>