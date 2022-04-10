<?php


function jumlahHurufKecil($str)
{
    # code...
    $nilai = $str;
    $arr = explode(" ",$nilai);
    $total = count($arr);
    // $unigram = 0;
    // $bigram = 0;
    // $trigram = 0;
    echo "Unigram : ";
    for ($i=0; $i < $total; $i++) { 
        $unigram[$i] = $arr[$i];
        echo "$unigram[$i],";
    }

    echo "<br>";
    echo "Bigram : ";

    for ($i=0; $i < $total; $i+=2) { 
        // echo "[$i]";
        if ($i + 1 < $total) {
            # code...
            $bigram[$i] = $arr[$i]." ".$arr[$i+1];        
        } else {
            $bigram[$i] = $arr[$i];
        }

        echo "$bigram[$i], ";
    }
    
    
    echo "<br>";
    echo "igram : ";

    for ($i=0; $i < $total; $i+=3) { 
        // echo "[$i]";
        if ($total == 1) {
            $trigram[$i] = $arr[$i];
        }
        if ($i + 1 < $total) {
            # code...
            $trigram[$i] = $arr[$i]." ".$arr[$i+1];        
        }
        if ($i + 2 < $total) {
            # code...
            $trigram[$i] .= " ". $arr[$i+2];        
        } 

        echo "Trigram :$trigram[$i], ";     
    }

    // print_r($trigram)    ;

     
}

echo jumlahHurufKecil("Jakarta adalah ibukota negara Republik Indonesia");

?>