<?php
session_start();
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
    
    if(emptyInputSignup($email, $fullname, $password, $password2) !== false){
        echo '
            <script>
                alert("EMPTY INPUT");
                var page = window.history.go(-1);
                window.location.reload(page)
            </script>
            ';
        exit();
    }
    if (pwdMatch($password, $password2) !== false) {
        echo '
            <script>
                alert("PASSWORDS DO NOT MATCH");
                var page = window.history.go(-1);
                window.location.reload(page)
            </script>
            ';
        exit();
        
    }
    if (emailExist($conn, $email) !== false) {
        echo '
            <script>
                alert("Email Already taken");
                var page = window.history.go(-1);
                window.location.reload(page)
            </script>
            ';
        exit();
    }
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo '
            <script>
                alert("Password must contain atleast 8 characters with one number, special character, small and capital letters.");
                var page = window.history.go(-1);
                window.location.reload(page)
            </script>
            ';
        exit();
    }

    // FOR ARCHTIECT AND PROJECT MANAGER

    // if ($usertype === "architect" || $usertype === "projectmanager" || $usertype === "admin"){
        

    //     $usercode = $_POST["usercode"];

    //     if(empAccount($usercode, $usertype) === true){
    //         createUser($conn, $usertype, $email, $fullname, $password);
    //     }
    //     else{
    //         header("location: ../landing-page.php?error=invalidusercode");
    //         exit();
    //     }

    // }

 
    createUserforClient($conn, $usertype, $email, $fullname, $password, $project_archiSELECT);
    
    // TRAIL PHP SEGMENT

    echo $trail_user = $_SESSION["user_fullname"];
    echo $trail_user_type = $_SESSION["usertype_fk"];
    echo $trail_path = "User Management";
    echo $trail_action = "Created an account";
    echo $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT

    echo '<script type="text/javascript">
    alert("CLIENT SUCCESSFULLY CREATED");
    
    location.replace(document.referrer);
    </script>';
    
}
else{
    header("location: ../landing-page.php?error=batkaya");
    
}

