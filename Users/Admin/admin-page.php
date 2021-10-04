<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets-admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets-admin/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets-admin/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets-admin/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets-admin/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php 
        include_once '../../layout/header-admin-userdata.php';
    ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"></div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    <div style="display: inline-block; width:100%;">
                        <h1 style="max-width:50%;" class="mx-0"><strong>USER PROFILES</strong></h1>
                        <button style="float:right;">Add user</button>
                    </div>
                    
                    <?php 
                    require_once '../../includes/db.php';
                    require_once '../../includes/functions.php';
                
                    $sql = "SELECT * FROM user_db";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo '
                            <div class="row">
                                <div class="col">
                                    <a href="admin-page.php" style="text-decoration: none">
                                        <div class="card shadow border-left-warning py-2" data-bss-hover-animate="pulse">
                                            <div class="card-body">
                                                <div class="row align-items-center no-gutters">
                                                    <div class="col mr-2">
                                                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                            <span>'.$row['usertype_fk'].'</span></div>
                                                        <div class="text-dark font-weight-bold h5 mb-0"><span>'.$row['user_fullname'].'</span></div>
                                                    </div>
                                                </div><span>'.$row['user_email'].'</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <br>
                            
                            ';
                        }
                    }
                    
                    ?>
                    <!-- <div class="row">
                        <div class="col">
                            <a href="admin-page.php" style="text-decoration: none">
                                <div class="card shadow border-left-warning py-2" data-bss-hover-animate="pulse">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                    <span>USER TYPE</span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0"><span>NAME OF
                                                        USER</span></div>
                                            </div>
                                        </div><span>EMAIL ADDRESS</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php include '../../layout/footer.php' ?>
    <script src="assets-admin/js/jquery.min.js"></script>
    <script src="assets-admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-admin/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets-admin/js/theme.js"></script>
</body>

</html>