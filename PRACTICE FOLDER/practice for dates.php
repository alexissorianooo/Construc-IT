<?php

echo $dateToday = date("Y-m-d");
echo $dateSample1 = "2021-12-10";
echo $dateSample2 = "2021-12-09";


if($dateToday>$dateSample2){
    echo "$dateToday is latest than $dateSample2";
}else{
    echo "$dateToday is older than $dateSample2";
}


?>