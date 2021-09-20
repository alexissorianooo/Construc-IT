<?php

if(isset($_POST["loginButton"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'db.php';
    require_once 'functions.php';

    if (emptyInputlogin($email,$password) !== false){
        header("location: ../landing-page.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $password);
}
else{
    header("location: ../landing-page.php");
    exit();
}