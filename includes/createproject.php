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
    $project_pmSELECT = $_POST['project_pmSELECT'];

    $project_input1 = $_POST['project_input1'];
    $project_input2 = $_POST['project_input2'];
    $project_input3 = $_POST['project_input3'];
    $project_input4 = $_POST['project_input4'];
    $project_input5 = $_POST['project_input5'];
    $project_input6 = $_POST['project_input6'];
    $project_input7 = $_POST['project_input7'];
    $project_input8 = $_POST['project_input8'];


    if($counter!=0){ //checks if there is an additional activities
        $project = 8;
        for ($i=0; $i<5;$i++){
            $project++;

            // echo $project_input["project_input".$project] = $_POST['additional_name'. $i+1]; WORKING!!

            if(!empty($_POST['additional_name'. $i+1])){
                $project_input["project_input".$project] = $_POST['additional_name'. $i+1];
            } else{
                $project_input["project_input".$project] = "empty";
            }
            extract($project_input);


        }
        echo $project_input9 .'<br>';
        echo $project_input10 .'<br>';
        echo $project_input11 .'<br>';
        echo $project_input12 .'<br>';
        echo $project_input13 .'<br>';
        //PUT NORMAL ACTIVITIES HERE WITH ADDITIONAL?
    }else{
        echo 'there is no additional activities';
        //PUT NORMAL ACTIVITIES HERE?
    }
    
    
    

    // require_once 'db.php';
    // require_once 'functions.php';

    // if(emptyInputcreate($project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8) !==false){
    //     header("location: ../users/Projects/project_arch.php?error=emptyinput");
    //     exit();
    // } 
   

    // createProject($conn, $project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8);
    


}
else{
    header("location: ../users/Projects/project_arch.php");
    exit();
}