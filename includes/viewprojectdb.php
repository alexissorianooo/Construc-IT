<?php


if(isset($_POST["saveButton"])){

    echo $project_id = $_POST['project_id'];
    echo $select1 = $_POST['SELECT1'];
    echo $select2 = $_POST['SELECT2'];
    echo $select3 = $_POST['SELECT3'];
    echo $select4 = $_POST['SELECT4'];
    echo $select5 = $_POST['SELECT5'];
    echo $select6 = $_POST['SELECT6'];
    echo $select7 = $_POST['SELECT7'];
    echo $select8 = $_POST['SELECT8'];

    // echo "<br><br><br>";
    // // echo $select9 = $_POST['SELECT_additional_1'];
    // // echo $select10 = $_POST['SELECT_additional_2'];
    // // echo $select11 = $_POST['SELECT_additional_3'];
    // // echo $select12 = $_POST['SELECT_additional_4'];
    // // echo $select13 = $_POST['SELECT_additional_5'];
    // echo "<br>".$counter = $_POST['counter'];
    // echo "hello";

    
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

    require_once 'db.php';
    require_once 'functions.php';


    updateProject($conn, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);

}else{
    echo 'what is wrong brother?';
}