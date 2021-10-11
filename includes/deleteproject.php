<?php
session_start();

if(isset($_POST['deleteProject'])){
    echo $project_ID = $_POST['projectView'];
    echo $project_name = $_POST['projectViewName'];
    echo $project_pm_id = $_POST['pmincharge'];
    echo $project_client_id = $_POST['clientincharge'];

    require_once 'db.php';
    require_once 'functions.php';

    deleteproject($conn, $project_ID);
    changePMstatus($conn, $project_pm_id);
    changeCLIENTstatus($conn, $project_client_id);


    // TRAIL PHP SEGMENT

    echo $trail_user = $_SESSION["user_fullname"];
    echo $trail_user_type = $_SESSION["usertype_fk"];
    echo $trail_path = "Project View";
    echo $trail_action = "Delete project ".$project_ID.": ".$project_name;
    echo $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT

    header("location: ../users/Projects/project_arch.php?error=projectDeleted");
    exit();

}else{
    echo'what?';
}

?>
