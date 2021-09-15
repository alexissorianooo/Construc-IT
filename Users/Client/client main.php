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

    <section style="height: 650px;margin: 0px;margin-top: 62px;background: white;">

    </section>

    <!-- MODAL WHEN INSERTING PROJECT ID -->
    <div class="modal fade" role="dialog" tabindex="-1" id="client-id-modal" style="border-radius: 24px;margin-top:10%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header bg-dark" style="color: rgb(255,255,255);">
                        <h4 class="modal-title" style="background: url(&quot;../../assets/img/logo3-white.png&quot;) center / contain no-repeat, transparent;width: 123px;height: 65px;"></h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background:white;width:30px;margin-top:17px;"> x </button>                        
                    </div>
                <div class="modal-body text-center bg-dark">
                    <label class="form-label" style="color: white;">Enter Project ID:</label>
                    <input id="projectID" type="text" name=viewProject style="background: rgb(128,145,160);border-radius: 125px;width:200px;">
                </div>
                <div class="modal-footer justify-content-center bg-dark"><button class="btn btn-primary" type="button">Search</button></div>
            </div>
        </div>
    </div>



    <!-- FOOTER -->
    <?php include '../../layout/footer.php' ?>


    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../../assets/js/agency.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="../../assets/js/Simple-Slider.js"></script>
    
</body>
</html>

