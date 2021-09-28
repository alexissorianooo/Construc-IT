<?php


if(isset($_POST["saveButton"])){

    $project_id = $_POST['project_id'];
    $select1 = $_POST['SELECT1'];
    $select2 = $_POST['SELECT2'];
    $select3 = $_POST['SELECT3'];
    $select4 = $_POST['SELECT4'];
    $select5 = $_POST['SELECT5'];
    $select6 = $_POST['SELECT6'];
    $select7 = $_POST['SELECT7'];
    $select8 = $_POST['SELECT8'];
    $progressbar =  $_POST['progressbarUPDATE'];
    // $numerator = $_POST['numeratorUPDATE'];
    // $denominator = $_POST['denominatorUPDATE'];

    // echo "<br><br><br>";
    // // echo $select9 = $_POST['SELECT_additional_1'];
    // // echo $select10 = $_POST['SELECT_additional_2'];
    // // echo $select11 = $_POST['SELECT_additional_3'];
    // // echo $select12 = $_POST['SELECT_additional_4'];
    // // echo $select13 = $_POST['SELECT_additional_5'];
    
    

    
    $selectnum = 8;
    for ($i=0; $i<5;$i++){
        $selectnum++;


        if(($_POST['additional_name_'. $i+1])!="empty"){
            $select["select".$selectnum] = $_POST['SELECT_additional_'. $i+1];
        } else{
            $select["select".$selectnum] = "Pending";
        }
        extract($select);
    }
        
    // echo "<br>".$select9;
    // echo "<br>".$select10;
    // echo "<br>".$select11;
    // echo "<br>".$select12;
    // echo "<br>".$select13;
    
    $counter = $_POST['counter'];
    $denominator = $counter+8;
    $numerator=0;

    
        
    if($select1=="Completed"){
        $numerator++;
    }
    if($select2=="Completed"){
        $numerator++;
    }
    if($select3=="Completed"){
        $numerator++;
    }
    if($select4=="Completed"){
        $numerator++;
    }
    if($select5=="Completed"){
        $numerator++;
    }
    if($select6=="Completed"){
        $numerator++;
    }
    if($select7=="Completed"){
        $numerator++;
    }
    if($select8=="Completed"){
        $numerator++;
    }
    if($select9=="Completed"){
        $numerator++;
    }
    if($select10=="Completed"){
        $numerator++;
    }
    if($select11=="Completed"){
        $numerator++;
    }
    if($select12=="Completed"){
        $numerator++;
    }
    if($select13=="Completed"){
        $numerator++;
    }



    require_once 'db.php';
    require_once 'functions.php';

    // if($select1=="Completed" && $select2=="Completed" && $select3=="Completed" && $select4=="Completed" && $select5=="Completed" && $select6=="Completed" && $select7=="Completed" && $select8=="Completed" && $select9=="Completed" && $select10=="Completed" && $select11=="Completed" && $select12=="Completed" && $select13=="Completed"){
    //     completeProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);
    // } 

    if($numerator/$denominator==1){
        completeProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);
    } 



    updateProjectINC($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);

}else{
    echo 'what is wrong brother?';
}