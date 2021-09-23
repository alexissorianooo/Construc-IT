<?php
session_start();

if(isset($_POST['createButton'])){



    $project_name = $_POST['project_name'];

    $project_startdate = $_POST['project_startdeadline'];
    $project_deadline = $_POST['project_enddeadline'];

    $project_architect = $_SESSION['user_fullname'];
    $project_pmSELECT = $_POST['project_pmSELECT'];

    $project_input1 = $_POST['project_input1'];
    $project_input2 = $_POST['project_input2'];
    $project_input3 = $_POST['project_input3'];
    $project_input4 = $_POST['project_input4'];
    $project_input5 = $_POST['project_input5'];
    $project_input6 = $_POST['project_input6'];
    $project_input7 = $_POST['project_input7'];
    $project_input8 = $_POST['project_input8'];

    require_once 'db.php';
    require_once 'functions.php';

    if(emptyInputcreate($project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8) !==false){
        header("location: ../users/Projects/project_arch.php?error=emptyinput");
        exit();
    } 
   

    createProject($conn, $project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8);
    


}
else{
    header("location: ../users/Projects/project_arch.php");
    exit();
}