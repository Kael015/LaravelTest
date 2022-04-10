<?php


function jumlahHurufKecil($str)
{
    # code...
    $nilai = $str;
    $arr = str_split($nilai);
    $marks = range(97,122);
    $hurufKecil = 0;
    for ($i=0; $i < count($arr) ; $i++) { 
        $cek = ord($arr[$i]);
        // echo "-$cek";
        if (in_array($cek, $marks))
        {
            $hurufKecil++;
        }
    }
    $hasil = "$nilai mengandung $hurufKecil buah huruf kecil.";

    return $hasil;
}

echo jumlahHurufKecil("TranSISI");

?>