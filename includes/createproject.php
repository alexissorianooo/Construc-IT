<?php
session_start();

if(isset($_POST['createButton'])){

    // echo '
    //     <script src="../users/Create Project/assetsCP/js/createprojectCP.js">
    //         // document.writeln(delbuttonnum2);

    //         var para = document.createElement("p");
    //         para.name = "delbuttonnum2";
        
    //     </script>
    
    // ';

    $counter = $_POST['counter'];


    $project_name = $_POST['project_name'];

    $project_startdate = $_POST['project_startdeadline'];
    $project_deadline = $_POST['project_enddeadline'];

    $project_architect = $_SESSION['user_fullname'];

    //FOR PM SELECT DOUBLE VALUE
    $result = $_POST['project_pmSELECT'];
    $result_explode = explode('|', $result);
    $project_pmSELECT = $result_explode[0]; //NAME
    $project_pmSELECTid = $result_explode[1]; //user ID

    $result2 = $_POST['project_clientSELECT'];
    $result2_explode = explode('|', $result2);
    echo "<br>".$project_clientSELECT = $result2_explode[0]; //NAME
    echo "<br>".$project_clientSELECTid = $result2_explode[1]; //user ID




    // echo $project_pmSELECT = $_POST['project_pmSELECT'];

    $project_input1 = $_POST['project_input1'];
    $project_input2 = $_POST['project_input2'];
    $project_input3 = $_POST['project_input3'];
    $project_input4 = $_POST['project_input4'];
    $project_input5 = $_POST['project_input5'];
    $project_input6 = $_POST['project_input6'];
    $project_input7 = $_POST['project_input7'];
    $project_input8 = $_POST['project_input8'];


    // if($counter!=0){ //checks if there is an additional activities
    // SHORTCUT FOR PC
    // $project = 8;
    // for ($i=0; $i<5;$i++){
    //     $project++;

    //     // echo $project_input["project_input".$project] = $_POST['additional_name'. $i+1]; WORKING!!

    //     if(!empty($_POST['additional_name'. $i+1])){
    //         $project_input["project_input".$project] = $_POST['additional_name'. $i+1];
    //     } else{
    //         $project_input["project_input".$project] = "empty";
    //     }
    //     extract($project_input);


    // }

    //LONG VERSION
    if(!empty($_POST['additional_name1'])){
        $project_input9 = $_POST['additional_name1'];
    }else{
        $project_input9 = "empty";
    }
    if(!empty($_POST['additional_name2'])){
        $project_input10 = $_POST['additional_name2'];
    }else{
        $project_input10 = "empty";
    }
    if(!empty($_POST['additional_name3'])){
        $project_input11 = $_POST['additional_name3'];
    }else{
        $project_input11 = "empty";
    }
    if(!empty($_POST['additional_name4'])){
        $project_input12 = $_POST['additional_name4'];
    }else{
        $project_input12 = "empty";
    }
    if(!empty($_POST['additional_name5'])){
        $project_input13 = $_POST['additional_name5'];
    }else{
        $project_input13 = "empty";
    }



    // echo $project_input9 .'<br>';
    // echo $project_input10 .'<br>';
    // echo $project_input11 .'<br>';
    // echo $project_input12 .'<br>';
    // echo $project_input13 .'<br>';
        //PUT NORMAL ACTIVITIES HERE WITH ADDITIONAL?
    // }else{
    //     echo 'there is no additional activities';
    //     //PUT NORMAL ACTIVITIES HERE?
    // }
    
    
    

    require_once 'db.php';
    require_once 'functions.php';

    if(emptyInputcreate($project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_clientSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8) !==false){
        header("location: ../users/Projects/project_arch.php?error=emptyinput");
        exit();
    } 
   

    createProject($conn, $project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_clientSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8, $project_input9, $project_input10, $project_input11, $project_input12, $project_input13);
    pmStatus($conn, $project_pmSELECTid);
    clientStatus($conn, $project_clientSELECTid);


}
else{
    header("location: ../users/Projects/project_arch.php");
    exit();
}