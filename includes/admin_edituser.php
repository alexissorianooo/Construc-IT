<?php
session_start();
if(isset($_POST['saveButton_admin'])){
    echo "<br>".$user_fullname = $_POST['user_fullname'];
    echo "<br>".$user_email = $_POST['user_email'];
    echo "<br>".$userid = $_POST['userid'];
    echo "<br>".$user_fullname_old = $_POST['user_fullname_old'];


    require_once 'db.php';
    require_once 'functions.php';

    edituser_admin($conn,  $user_fullname, $user_email, $userid);
    edituser_admin_projectdb($conn, $user_fullname_old, $user_fullname);
}else{
    echo "<br>".'what is wrong brother?1';
}

if(isset($_POST['deleteButton_admin'])){
    echo $user_fullname = $_POST['user_fullname'];
    echo $user_email = $_POST['user_email'];
    echo $userid = $_POST['userid'];

    require_once 'db.php';
    require_once 'functions.php';

    
    deleteuser_admin($conn, $user_fullname, $user_email, $userid);
}
