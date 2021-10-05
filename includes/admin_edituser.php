<?php

if(isset($_POST['saveButton_admin'])){
    echo $user_fullname = $_POST['user_fullname'];
    echo $user_email = $_POST['user_email'];
    echo $userid = $_POST['userid'];

    require_once 'db.php';
    require_once 'functions.php';

    edituser_admin($conn,  $user_fullname, $user_email, $userid);
}else{
    echo 'what is wrong brother?';
}

