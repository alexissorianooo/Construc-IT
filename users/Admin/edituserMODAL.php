

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css"> -->
</head>

<body id="page-top">
    <div id="wrapper">
        <?php if(isset($error_msg)){ echo $error_msg; } ?>
        <?php 
            include_once '../../layout/header-admin-userdata.php';

            require_once '../../includes/db.php';
            require_once '../../includes/functions.php';



             // TRAIL PHP SEGMENT

            // $trail_user = $_SESSION["user_fullname"];
            // $trail_user_type = $_SESSION["usertype_fk"];
            // $trail_path = "Edit User page";
            // $trail_action = "Viewing existing name and email information";
            // $trail_date = date('Y-m-d H:i:s');

            // recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

            // END OF TRAIL PHP SEGMENT
            
        ?>
        <?php 
            $userID = $_POST['userid'];
            $sql = "SELECT * FROM user_db WHERE userid=$userID";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    echo '
                    <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                            <div class="container-fluid"></div>
                        </nav>
                        <form method="post" action="../../includes/admin_edituser.php">
                            <div class="container-fluid">
                                <div style="height: 100%;width: 80%;margin: auto;">
                                    <div style="height: 100%;">
                                        <h1 class="text-lg" style="text-align: center;"><strong>EDIT USER</strong></h1>
                                    </div>
                                    <input name="userid" value="'.$row['userid'].'" hidden>
                                    <input name="user_fullname_old" value="'.$row['user_fullname'].'" hidden>
                                    <div><label>Full Name</label><input class="float-right" type="text" style="width: 70%;" value="'.$row['user_fullname'].'" name="user_fullname" required="required"></div>
                                    <div><label>Email</label><input class="float-right" type="email" style="width: 70%;" value="'.$row['user_email'].'" name="user_email" required="required"></div>
                                    <div class="text-center" style="margin-top: 10px;"><button class="btn btn-primary" type="button" data-toggle="modal" role="button" data-target="#changepassModal" data-dismiss="modal">Change Password</button></div>
                                    <div class="text-right">
                                        <button class="btn btn-danger" style="margin-right: 5px;margin-left: 5px;margin-top: 10px; float:left;" type="submit" name="deleteButton_admin">Delete</button>
                                        <button class="btn btn-light" type="button" style="margin-right: 5px;margin-left: 5px;margin-top: 10px;" onclick="location.replace(document.referrer)">Back</button>
                                        <button class="btn btn-primary" type="submit" style="margin-right: 5px;margin-left: 5px;margin-top: 10px;" name="saveButton_admin">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>



                    <!-- MODAL FOR PASSWORD -->

                    <div class="modal fade" role="dialog" tabindex="-1" id="changepassModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>Edit Password</h2><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <form method="post" action="../../includes/admin_edituserPASSWORD.php">
                                    <div class="modal-body">
                                        <div class="container">

                                            <input name="userid" value="'.$row['userid'].'" hidden>


                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Enter Current Password</label></div>
                                                <div class="col-md-6"><input type="password" style="width: 100%;height: 100%;" name="oldpass" required="required"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Password</label></div>
                                                <div class="col-md-6"><input type="password" style="width: 100%;height: 100%;" name="newpass" required="required"></div>
                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Confirm Password</label></div>
                                                <div class="col-md-6"><input type="password" style="width: 100%;height: 100%;" name="newpass_confirm" required="required"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                                        <button class="btn btn-primary" type="submit" name="saveButton_admin_password">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL FOR ERROR -->

                    <div class="modal fade" role="dialog" tabindex="-1" id="errorModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>Password Error 1</h2><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                
                                    <div class="modal-body">
                                        <div class="container">

                                            <input name="userid" value="'.$row['userid'].'" hidden>


                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                                        
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    ';

                }
            }
        
        
        ?>
        <?php if(isset($script)){ echo $script; } ?>
       
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>



    <!-- <div class="modal fade" role="dialog" tabindex="-1" id="changepassModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Password</h2><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Enter Current Password</label></div>
                            <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Password</label></div>
                            <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Confirm Password</label></div>
                            <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div> -->


    <!-- <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script> -->

    <!-- <script src="assets/js/edituserMODAL.js"></script> -->
</body>

</html>