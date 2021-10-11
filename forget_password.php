<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light">



<?php require_once 'layout/header-fpass.php' ?>

<br><br>
<br><br>


<!-- FORGET PASSWORD MODAL -->
 <div class="portfolio-modal text-center" role="dialog" tabindex="-1" id="fpass-modal">
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

                            <div class="modal-body">                                                                
                                <form action="includes/logindb.php" method="post">
                                    <div class="d-inline-block">                                    
                                        <input required type="email" id="email" placeholder="Email" style="border-radius:10px; max-width:100%;" name="email">
                                        <br><br>                                               
                                        <button class="btn bg-warning" type="submit" name="fpassButton">Submit</button>                                    
                                    </div>  
                                </form>                          
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    <br><br>
    <br><br>

        <?php require_once 'layout/footer.php' ?>



</body>
</html>