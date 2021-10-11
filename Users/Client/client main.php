<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construct - IT</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
</head>


<body id="page-top">

    <!-- NAVIGATION TAB -->
    <?php include '../../layout/header-client.php' ?>

    <!-- margin-top: 62px; -->
    <section style="height: 650px;margin: 0px;background: white;">
    <?php 
    session_start();
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';

     // TRAIL PHP SEGMENT

     $trail_user = $_SESSION["user_fullname"];
     $trail_user_type = $_SESSION["usertype_fk"];
     $trail_path = "Project Code";
     $trail_action = "Entering project code.";
     $trail_date = date('Y-m-d H:i:s');
 
     recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);
 
     // END OF TRAIL PHP SEGMENT
    
    ?>
   

        <!-- MODAL WHEN INSERTING PROJECT ID -->
        <!-- REMOVED INLINE CODE FOR MODAL SETTINGS -->
        <!-- class="modal fade" role="dialog" --> 

        <div class="bye" tabindex="-1" id="client-id-modal" style="border-radius: 24px;margin-top:10%;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        
                            <div class="modal-header bg-dark" style="color: rgb(255,255,255); ">
                                <!-- class="modal-title" -->
                                <h4 class="mx-auto" style="background: url(&quot;../../assets/img/logo3-white.png&quot;) center center/ contain no-repeat, transparent;width: 123px;height: 65px;"></h4>
                                <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background:white;width:30px;margin-top:17px;"> x </button>                         -->
                            </div>

                            <form method="post" action="view client project.php">
                            <div class="modal-body text-center bg-dark">                        
                                    <label class="form-label" style="color: white;">Enter Project ID:</label>
                                    <input id="projectID" type="text" name=projectView style="background: rgb(128,145,160);border-radius: 125px;width:200px;">                                                                                    
                            </div>
                            <div class="modal-footer justify-content-center bg-dark">                                
                                <button id="client-search-button" class="btn btn-primary" type="submit">Search</button>
                            </div>

                        </form>

                    </div>
                </div>
        </div>



    <!-- ------------------------------------------------------------------------------------------------------->


    </section>


    <!-- FOOTER -->
    <?php include '../../layout/footer.php' ?>

    <!-- <script src="./assets/js/client.js"></script> -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../../assets/js/agency.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="../../assets/js/Simple-Slider.js"></script>
    
</body>
</html>

