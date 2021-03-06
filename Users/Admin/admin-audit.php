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
        include_once '../../layout/header-admin-audit.php';

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
                    <h1><strong>AUDIT&nbsp;TRAIL&nbsp;</strong></h1>
                    <?php 
                    
                    require_once '../../includes/db.php';
                    require_once '../../includes/functions.php';
                
                    $sql = "SELECT * FROM trail_db";
                    $result = mysqli_query($conn, $sql);

                    echo'
                    
                        <div>
                            <input 
                                type="text"
                                name="searchBar_name"
                                id="searchBar_ID"
                                placeholder="Search for any user.."
                                onkeyup="myFunction()"
                            />
                        </div>
                        <br><br>
                    
                    ';

                    echo '<ul id="myUL">';
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo '
                            
                            
                                <li>
                                    <div class="row" style="margin-bottom:5px;">
                                        <div class="col">
                                            <a href="admin-audit.php" style="text-decoration: none">
                                                <div class="card shadow border-left-warning py-2" data-bss-hover-animate="pulse">
                                                    <div class="card-body">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col mr-2">
                                                            <span id="time-date">'.$row['trail_id'].'&nbsp;</span>
                                                                <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                                    <span>User type: '.$row['trail_user_type'].'</span></div>
                                                                <div class="text-dark font-weight-bold h5 mb-0">
                                                                    <span>Name: '.$row['trail_user'].'</span></div>
                                                            </div>
                                                        </div>
                                                        <span>Path: '.$row['trail_path'].'</span>
                                                        <br>
                                                        <span>Action: '.$row['trail_action'].'</span>
                                                        <br><span id="time-date">Date & Time of action: '.$row['trail_date'].'&nbsp;</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                
                                </li>
                            
                            
                            
                            ';
                        }
                    }
                    echo '</ul>';
                    
                    ?>
                    
                    <!-- <div class="row">
                        <div class="col">
                            <a href="admin-audit.php" style="text-decoration: none">
                                <div class="card shadow border-left-warning py-2" data-bss-hover-animate="pulse">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                    <span>USER TYPE</span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0"><span>NAME OF
                                                        USER</span></div>
                                            </div>
                                        </div><span>AUDIT TRAIL UPDATE</span>
                                        <div></div><span id="time-date">TIME AND DATE&nbsp;</span>
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
    <script src="assets-audit/js/jquery.min.js"></script>
    <script src="assets-audit/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-audit/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets-audit/js/theme.js"></script>

    <script src="assets-admin/js/searchbar.js"></script>
</body>

</html>