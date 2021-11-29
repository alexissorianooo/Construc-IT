<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets-audit/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets-audit/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets-audit/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets-audit/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets-audit/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php 
        include_once '../../layout/header-admin-userreport.php';

        require_once '../../includes/db.php';
        require_once '../../includes/functions.php';
        // session_start();

        // TRAIL PHP SEGMENT

        // $trail_user = $_SESSION["user_fullname"];
        // $trail_user_type = $_SESSION["usertype_fk"];
        // $trail_path = "Audit Trail";
        // $trail_action = "Viewing the path and action taken of the users";
        // $trail_date = date('Y-m-d H:i:s');

        // recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

        // END OF TRAIL PHP SEGMENT
    ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"></div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    <h1><strong>USER&nbsp;REPORT&nbsp;</strong></h1>
                    <?php 
                    
                    require_once '../../includes/db.php';
                    require_once '../../includes/functions.php';
                
                    echo'

                    <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2" style="width: 265px;">
                            <div class="card-body" style="width: 265px;">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="font-size: 21.2px;color: var(--blue);">Name</span></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="font-size: 15.2px;color: var(--blue);">Type of user</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Ongoing Projects</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Completed Projects</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Earliest Deadline of Project</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Latest Deadline of Project</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2" style="width: 265px;">
                            <div class="card-body" style="width: 265px;">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="font-size: 21.2px;color: var(--blue);">Name</span>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="font-size: 15.2px;color: var(--blue);">Type of user</span></div>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Status</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Ongoing Projects</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Completed Projects</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Deadline of the Ongoing Project</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2" style="width: 265px;">
                            <div class="card-body" style="width: 265px;">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="font-size: 21.2px;color: var(--blue);">Name</span>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="font-size: 15.2px;color: var(--blue);">Type of user</span></div>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Ongoing Projects</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Completed Projects</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Earliest Deadline of the Project</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Latest Deadline of the Project</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>#</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    ';
                    
                    ?>
                    
             

                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php include '../../layout/footer.php' ?>
    <script src="assets-audit/js/jquery.min.js"></script>
    <script src="assets-audit/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-audit/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets-audit/js/theme.js"></script>

    <script src="assets-admin/js/searchbar.js"></script>
</body>

</html>