<?php

function hitung($input){
    $nilai = $input;
    $arr = explode(" ",$nilai);
    $maxsArr = $arr;
    $minsArr = $arr;
    
    rsort($maxsArr);
    for ($i=0; $i < 7; $i++) { 
        $maxs[$i] = $maxsArr[$i];
    }
    
    sort($minsArr);
    for ($i=0; $i < 7; $i++) { 
        $mins[$i] = $minsArr[$i];
    }
    
    $hasilMax = "7 Nilai tertinggi = ";
    foreach( $maxs as $max ) {
        // action to perform
        $hasilMax .= "[$max] ";
    }
    
    $hasilMin = "7 Nilai terendah = ";
    foreach( $mins as $min ) {
        // action to perform
        $hasilMin .= "[$min] ";
    }
    
    $avg = array_sum($arr)/count($arr);
    
    echo $avg;
    echo "<br>";
    echo $hasilMax;
    echo "<br>";
    echo $hasilMin;
}

hitung("72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86");
?>