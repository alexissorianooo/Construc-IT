<?php


if(isset($_POST['saveButton_admin_password'])){

    echo $userid = $_POST['userid'];
    echo $oldpass = $_POST['oldpass'];
    echo $newpass = $_POST['newpass'];
    echo $newpass_confirm = $_POST['newpass_confirm'];

    require_once 'db.php';
    require_once 'functions.php';

    if(passVerify($oldpass, $userid)!==false){
        if(passMatch($newpass, $newpass_confirm)){

        }
        
        edituser_admin_password($conn, $newpass);
    }

    
    


}
