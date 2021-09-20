<?php

// registerButton1 - Architect & Project Manager
// registerButton2 - Client

// Cannot jump to certain pages without signing up
if(isset($_POST["registerButton"])){
        
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];
    $password2 = $_POST["confirm-password"];
    
    $usertype = $_POST["usertypeSELECT"];

    require_once 'db.php';
    require_once 'functions.php'; //FOR ERROR FUNCTIONS

    
    
    if(emptyInputSignup($email, $fullname, $password, $password2) !== false){
        header("location: ../landing-page.php?error=emptyinput");
        exit();
    }
    if (pwdMatch($password, $password2) !== false) {
        header("location: ../landing-page.php?error=passwordnotmatch");
        exit();
    }
    if (emailExist($conn, $email) !== false) {
        header("location: ../landing-page.php?error=emailtaken");
        exit();
    }

    // FOR ARCHTIECT AND PROJECT MANAGER

    if ($usertype === "architect" || $usertype === "projectmanager"){
        

        $usercode = $_POST["usercode"];

        if(empAccount($usercode, $usertype) === true){
            createUser($conn, $usertype, $email, $fullname, $password);
        }
        else{
            header("location: ../landing-page.php?error=invalidusercode");
            exit();
        }

    }

    // THIS IS WHERE REGISTERING HAPPENS
    createUser($conn, $usertype, $email, $fullname, $password);
}
else{
    header("location: ../landing-page.php?error=batkaya");
    
}

