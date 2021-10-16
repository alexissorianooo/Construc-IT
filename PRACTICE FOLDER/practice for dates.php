<?php
date_default_timezone_set('Asia/Manila');
echo $dateToday = date("Y-m-d h:i:s'");
$dateSample1 = "2021-12-10";
$dateSample2 = "2020-12-09";


if($dateToday>$dateSample2){
    //echo "$dateToday is latest than $dateSample2";
}else{
    //echo "$dateToday is older than $dateSample2";
}


?>