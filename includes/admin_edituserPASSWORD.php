
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
                    location.replace(document.referrer);
                    window.location.reload(page)
                </script>
                ';
            }else{
                edituser_admin_password($conn, $newpass, $userid);

                // TRAIL PHP SEGMENT

                echo $trail_user = $_SESSION["user_fullname"];
                echo $trail_user_type = $_SESSION["usertype_fk"];
                echo $trail_path = "Edit User page";
                echo $trail_action = "Updated password information of user: ".$userid;
                echo $trail_date = date('Y-m-d H:i:s');

                recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

                // END OF TRAIL PHP SEGMENT

                echo '<script type="text/javascript">
                alert("PASSWORD SUCCESSFULLY UPDATED");
                location.replace(document.referrer);
                // window.location.reload(page);
                // location.replace(document.referrer);
                </script>';
            
            }
        }
        else{
            echo '<br>new PASWORDS DO NOT MATCH';
            echo '
            <script>
                alert("NEW PASSWORDS DOES NOT MATCH");
                location.replace(document.referrer);
                
            </script>
            ';
        }
    }else{
        // header("location: ../users/Admin/edituserMODAL.php?error=OldPassDoNotMatch");
        // exit();
        echo '
        <script>
            alert("OLD PASSWORD DOES NOT MATCH");
            location.replace(document.referrer);
            
        </script>
        ';
        
    }
    


    
    


}
