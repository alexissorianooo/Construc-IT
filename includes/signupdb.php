<?php

// Cannot jump to certain pages without signing up
if(isset($_POST["registerButton"])){
        
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];
    $password2 = $_POST["confirm-password"];
    

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    $usertype = $_POST["usertypeSELECT"];

    require_once 'db.php';
    require_once 'functions.php'; //FOR ERROR FUNCTIONS

    echo $_POST['archi-select'];

    $result2 = $_POST['archi-select'];
    $result2_explode = explode('|', $result2);
    echo "<br>".$project_archiSELECT = $result2_explode[0]; //NAME
    echo "<br>".$project_archiSELECTid = $result2_explode[1]; //user ID


    if (pwdMatch($password, $password2) !== false) {  
        header("location: ../landing-page.php?error=passwordnotmatch");        
        exit();
    }
    if (emailExist($conn, $email) !== false) {
        header("location: ../landing-page.php?error=emailtaken");
        exit();
    }
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("location: ../landing-page.php?error=pattern");
        exit(); 
    }
    if(emptyInputSignup($email, $fullname, $password, $password2) !== false){
        header("location: ../landing-page.php?error=emptyinput");
        exit();
    }







    // FOR ARCHTIECT AND PROJECT MANAGER

    if ($usertype === "architect" || $usertype === "projectmanager" || $usertype === "admin"){
        

        $usercode = $_POST["usercode"];

        if(empAccount($usercode, $usertype) === true){
            createUser($conn, $usertype, $email, $fullname, $password);
        }
        else{
            header("location: ../landing-page.php?error=invalidusercode");
            exit();
        }

    }

    if($usertype === "client"){
        createUserforClient($conn, $usertype, $email, $fullname, $password, $project_archiSELECT);
        back();
    }

    // THIS IS WHERE REGISTERING HAPPENS
    createUser($conn, $usertype, $email, $fullname, $password);
    
}
else{
    header("location: ../landing-page.php?error=batkaya");
    
}

