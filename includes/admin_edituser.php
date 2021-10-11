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
    edituser_admin_userdb($conn, $user_fullname_old, $user_fullname);
    edituser_admin_projectdb($conn, $user_fullname_old, $user_fullname);


    // TRAIL PHP SEGMENT

    echo $trail_user = $_SESSION["user_fullname"];
    echo $trail_user_type = $_SESSION["usertype_fk"];
    echo $trail_path = "Edit User page";
    echo $trail_action = "Updated user name and email information of user: ".$user_fullname;
    echo $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT
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

    // TRAIL PHP SEGMENT

    echo $trail_user = $_SESSION["user_fullname"];
    echo $trail_user_type = $_SESSION["usertype_fk"];
    echo $trail_path = "Edit User page";
    echo $trail_action = "Deleted an account of user: ".$user_fullname;
    echo $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT

    header("location: ../users/Admin/admin-page.php?status=deleteSuccess");
    exit();
}
