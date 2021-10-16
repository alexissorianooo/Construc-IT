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


    <!-- FORGET PASSWORD -->
    <section>
    <div class="portfolio-modal text-center" id="fpass-modal" style="margin-top:-8%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark">
                    <div class="container" >
                        <div class="row">
                            <div class="col-lg-8 mx-auto">

                                <div class="text-center" style="color: rgb(255,255,255); "> 
                                    <!-- <h4 style="background: url(&quot;assets/img/logo3-white.png&quot;) center / contain no-repeat, transparent;width: 123px;height: 65px;"></h4>                                 -->
                                    <h2 class="text-uppercase">FORGET PASSWORD</h2>
                                </div>

                                <br>
                                <!-- action="forget_pass.php" -->
                                <div class="modal-body">                                                                
                                    <form method="post">
                                        <div class="d-inline-block">                                    
                                            <input required type="email" id="email" placeholder="Email" style="border-radius:10px; max-width:100%;" name="email">
                                            <br><br>                                          
                                            <button class="btn bg-warning" id="submit-email-otp" name="fpassButton">Submit</button>                                                                                                                                                                                                                                                                             
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

        <?php require_once '../layout/footer.php' ?>



<?php 
    if(isset($_POST["fpassButton"])){
        $email = $_POST["email"];

        $sql = "SELECT * FROM user_db WHERE user_email='$email'";
        // $query = mysqli_num_rows($sql);
  	    // $fetch = mysqli_fetch_assoc($sql);
        // THOMAS ADDED
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else{
            while($row=mysqli_fetch_assoc($result)){
                // generate token by binaryhexa 
                $token = bin2hex(random_bytes(50));

                // session_start ();
                $_SESSION['token'] = $token;          
                $_SESSION['email'] = $email;

                require "../Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                // h-hotel account
                $mail->Username= 'heneral.loons01@gmail.com';
                $mail->Password= 'lunaheneral01';

                // send by h-hotel email
                $mail->setFrom('email', 'Password Reset');
                // get email from input
                $mail->addAddress($_POST["email"]);
                //$mail->addReplyTo('lamkaizhe16@gmail.com');

                // HTML body
                $mail->isHTML(true);
                $mail->Subject="Recover your password";
                $mail->Body="<b>Dear User</b>
                <h3>We received a request to reset your password.</h3>
                <p>Kindly click the below link to reset your password</p>
                <!-- http://localhost/Github%20Files/Construc-IT/forgetPassword/reset_password.php -->
                http://localhost/GitHub%20Files/forgetPassword/reset_password.php
                <br><br>
                <p>With regrads,</p>
                <b>Construc - IT</b>";
            }

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Can't send to email, please check email security settings. "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("<?php echo " Email sent "?>");                        
                    </script>                   
                <?php      
            }
        }
    }


?>                  

    
</body>
</html>