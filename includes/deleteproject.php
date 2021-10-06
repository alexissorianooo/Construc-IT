<?php

if(isset($_POST['deleteProject'])){
    echo $project_ID = $_POST['projectView'];
    echo $project_pm_id = $_POST['pmincharge'];
    echo $project_client_id = $_POST['clientincharge'];

    require_once 'db.php';
    require_once 'functions.php';

    deleteproject($conn, $project_ID);
    changePMstatus($conn, $project_pm_id);
    changeCLIENTstatus($conn, $project_client_id);
}else{
    echo'what?';
}

?>
