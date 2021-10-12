<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../assets/img/logo3-white.png">
</head>


<body class="bg-dark text-light">

    <?php 
        require_once '../layout/header-fpass.php';
        require_once '../includes/db.php'; 
        session_start();
    ?>


    <!-- OTP -->
    <section>
    <div class="portfolio-modal text-center" id="reset-pass-modal" style="margin-top:-8%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark">
                    <div class="container" >
                        <div class="row">
                            <div class="col-lg-8 mx-auto">

                                <div class="text-center" style="color: rgb(255,255,255); "> 
                                    <h2 class="text-uppercase">RESET PASSWORD</h2>
                                </div>

                                <br>
                                <div class="modal-body">                                                                
                                    <form  method="post">
                                        <div class="d-inline-block">                                    
                                            <input required type="password" id="new-pass" placeholder="New Password" style="border-radius:10px; max-width:100%;" name="new-pass">
                                            <br><br>       
                                            <input required type="password" id="confirm-new-pass" placeholder="Confirm New Password" style="border-radius:10px; max-width:100%;" name="confirm-new-pass">
                                            <br><br>                                     
                                            <button class="btn bg-warning" id="submit-new-pass" name="submit-new-pass">Submit</button>                                                                                                                                                                                                                                                                             
                                        </div>  
                                    </form>                                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        

<?php 
    if(isset($_POST["submit-new-pass"])){
        $psw = $_POST["new-pass"];
        $confirm_psw = $_POST["confirm-new-pass"];

        $uppercase = preg_match('@[A-Z]@', $psw);
        $lowercase = preg_match('@[a-z]@', $psw);
        $number    = preg_match('@[0-9]@', $psw);
        $specialChars = preg_match('@[^\w]@', $psw);

        if($psw != $confirm_psw){
            ?>
            <script>
                alert("<?php echo "Passwords do not match"?>");
            </script>
            <?php
        } 
        elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($psw) < 8) {
            ?>
            <script>
                alert("<?php echo "Password must be atleast (8) characters and must contain (1) small, capital letter and (1) number. " ?>");
            </script>
            <?php
        }
        
        else{
            $token = $_SESSION['token'];
            $Email = $_SESSION['email'];
            
            $hash = password_hash( $psw , PASSWORD_DEFAULT );

            // $sql = mysqli_query($connect, "SELECT * FROM login WHERE email='$Email'");
            $sql = "SELECT * FROM user_db WHERE user_email='$Email'";
            $result = mysqli_query($conn, $sql);

            if($Email){
                $new_pass = $hash;
                // mysqli_query($connect, "UPDATE login SET password='$new_pass' WHERE email='$Email'");

                $sql = "UPDATE user_db SET user_password='$new_pass' WHERE user_email='$Email'";
                $stmt = mysqli_stmt_init($conn);
                mysqli_query($conn, $sql);              

                ?>
                <script>
                    window.location.replace("../landing-page.php");
                    alert("<?php echo "your password has been succesful reset"?>");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("<?php echo "Please try again"?>");
                </script>
                <?php
            }
        }
    }

?>

    <?php require_once '../layout/footer.php' ?>


</body>
</html>