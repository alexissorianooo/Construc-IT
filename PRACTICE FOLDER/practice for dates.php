<?php

$dateToday = date("Y-m-d");
$dateSample1 = "2021-12-10";
$dateSample2 = "2020-12-09";


if($dateToday>$dateSample2){
    echo "$dateToday is latest than $dateSample2";
}else{
    echo "$dateToday is older than $dateSample2";
}


?>