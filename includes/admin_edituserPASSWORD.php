
<?php
session_start();

if(isset($_POST['saveButton_admin_password'])){

    echo $userid = $_POST['userid'];
    echo $oldpass = $_POST['oldpass'];
    echo $newpass = $_POST['newpass'];
    echo $newpass_confirm = $_POST['newpass_confirm'];


    $uppercase = preg_match('@[A-Z]@', $newpass);
    $lowercase = preg_match('@[a-z]@', $newpass);
    $number = preg_match('@[0-9]@', $newpass);
    $specialChars = preg_match('@[^\w]@', $newpass);

    require_once 'db.php';
    require_once 'functions.php';



    if(passVerify($conn, $oldpass, $userid)!==false){
        if(passMatch($conn, $newpass, $newpass_confirm)!==false){
            echo "<br> new password is matched";
            
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpass) < 8) {
                echo '
                <script>
                    alert("Password must contain atleast 8 characters with one number, special character, small and capital letters.");
                    var page = window.history.go(-1);
                    window.location.reload(page)
                </script>
                ';
            }else{
                edituser_admin_password($conn, $newpass, $userid);
            }
        }
        else{
            echo '<br>new PASWORDS DO NOT MATCH';
            echo '
            <script>
                alert("NEW PASSWORDS DOES NOT MATCH");
                var page = window.history.go(-1);
                window.location.reload(page)
            </script>
            ';
        }
    }else{
        // header("location: ../users/Admin/edituserMODAL.php?error=OldPassDoNotMatch");
        // exit();
        echo '
        <script>
            alert("OLD PASSWORD DOES NOT MATCH");
            var page = window.history.go(-1);
            window.location.reload(page)
        </script>
        ';
        
    }
    


    
    


}
