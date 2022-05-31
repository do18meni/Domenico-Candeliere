<?php

// titolo esercizio: Ricerca dicotomica

ricercaBinaria($array, $estInf, $estSup, $num){

    $posMed = (($posInf + $posSup)/2);

    if($array[posMed] == $num){
        return $posMed;
    }
    else if($array[posMed] > $num){
        return ricercaBinaria($array, $estInf, $posMed-1, $num);
    }
    else{
        return ricercaBinaria($array, $posMed+1, $estSup, $num);
    }

}

$array = [2,3,5,6,9,10,11,12,15,16,19,20,22,24,26,27,29];
$num = readline("che numero vuoi cercare tra 1 e 30?");

$posizione = ricercaBinaria($array, 0, 30, $num);

?>