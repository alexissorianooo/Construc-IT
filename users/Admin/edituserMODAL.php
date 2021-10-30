

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

    <!-- FOR TABLE -->
    <link rel="stylesheet" href="../../users/Projects/assetsFORPM_viewproject/css/styles.css">
    <link rel="stylesheet" href="../../users/Projects/assetsFORPM_viewproject/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="../../users/Projects/assetsFORPM_viewproject/css/Table-With-Search.css"> 


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
            

            if(!empty( $_POST["userid"])){
                $userID = $_POST["userid"]; // for getting specific project, from project_arch
                $_SESSION['userid']= $userID;
            }else{
                $userID = $_SESSION['userid'];
            }

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
                                    <input name="userTYPE" value="'.$row['usertype_fk'].'" hidden>
                                    <input name="user_fullname_old" value="'.$row['user_fullname'].'" hidden>
                                    <div><label>Full Name</label><input class="float-right" type="text" style="width: 70%;" value="'.$row['user_fullname'].'" name="user_fullname" required="required"></div>
                                    <div><label>Email</label><input class="float-right" type="email" style="width: 70%;" value="'.$row['user_email'].'" name="user_email" required="required"></div>
                                    <div class="text-center" style="margin-top: 10px;"><button class="btn btn-primary" type="button" data-toggle="modal" role="button" data-target="#changepassModal" data-dismiss="modal">Change Password</button></div>
                                    <div class="text-right">
                                        <button class="btn btn-danger confirm" style="margin-right: 5px;margin-left: 5px;margin-top: 10px; float:left;" type="submit" name="deleteButton_admin">Delete</button>
                                        <button class="btn btn-light" type="button" style="margin-right: 5px;margin-left: 5px;margin-top: 10px;" onclick="goBack_admin()">Back</button>
                                        <button class="btn btn-primary" type="submit" style="margin-right: 5px;margin-left: 5px;margin-top: 10px;" name="saveButton_admin">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script>
                        $(".confirm").on("click", function(event){
                            if(confirm("Are you sure to delete?")){
                            return true;
                            } else {
                                event.preventDefault();
                                return false;
                            }
                        });
                        </script>


                        <br><br>';

                        require_once '../../includes/db.php';
                        require_once '../../includes/functions.php';

                        $ArchiName = $row["user_fullname"];

                        $sql3 = "SELECT project_architect FROM project_db WHERE project_architect = '$ArchiName'";
                        $result3 = mysqli_query($conn, $sql3);

                        $row3=mysqli_fetch_assoc($result3);
                        if(mysqli_num_rows($result3)>0){
                            if($row3["project_architect"]== $row["user_fullname"]){
                                echo'
                                <div style="">
                                    <h1 class="text-lg" style="text-align: center;"><strong>PROJECTS</strong></h1>
                                </div>
                                <br>
                                <table class="table table-bordered table-hover">
                                <thead class="bill-header cs">
                                    <tr>
                                        <th style="max-width: 12.5%;">Project ID</th>
                                        <th id="trs-hd" class="col-lg-1" style="max-width: 12.5%;">Project Name</th>
                                        <th style="max-width: 12.5%;">Status</th>
                                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Architect</th>
                                        <th id="trs-hd" class="col-lg-3" style="max-width: 12.5%;">Foreman</th>
                                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Startdate</th>
                                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Deadline</th>
                                        
                                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ';
                                // echo $row3["project_architect"];
                                // echo $row["user_fullname"];
                            }
                        }

                        

                        
                        require_once '../../includes/db.php';
                        require_once '../../includes/functions.php';
                        
                        
    
                        $sql2 = "SELECT * FROM project_db";
                        $result2 = mysqli_query($conn, $sql2);
                        
                        if(mysqli_num_rows($result2)>0){
                            while($row2=mysqli_fetch_assoc($result2)){
                                // if($row2["project_architect"]== $row["user_fullname"] || $row2["project_pm"] == $row["user_fullname"] || $row2["project_client"] == $row["user_fullname"])
                                if($row2["project_architect"]== $row["user_fullname"]){
                                echo'
                                    <tr>
                                        <td>'.$row2['project_id'].'</td>
                                        <td>'.$row2['project_name'].'</td>
                                        <td>'.$row2['project_status_fk'].'</td>
                                        <td>'.$row2['project_architect'].'</td>
                                        <td>'.$row2['project_pm'].'</td>
                                        <td>'.$row2['project_startdate'].'</td>
                                        <td>'.$row2['project_deadline'].'</td>
                                        
                                        <form method="post" action="../../users/Projects/viewArchiProject_admin.php">
                                        <td>
                                            <button class="btn btn-success" style="margin-left: 5px;background: var(--warning);" type="submit">
                                            <input name="projectView" value="'.$row2["project_id"].'" hidden>
                                            <input name="projectViewName" value="'.$row2["project_name"].'" hidden>
                                                <i class="fa fa-folder-open-o" style="font-size: 15px;"> Open Project
                                                </i>
                                            </button>
                                        </td>
                                        </form>
                                    </tr>
                                ';
                                }
                            }
                        }
    
                        echo'</table>          
                        




                        
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

                    // echo '
                    // <table class="table table-bordered table-hover">
                    // <thead class="bill-header cs">
                    //     <tr>
                    //         <th style="max-width: 12.5%;">Project ID</th>
                    //         <th id="trs-hd" class="col-lg-1" style="max-width: 12.5%;">Project Name</th>
                    //         <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Architect</th>
                    //         <th id="trs-hd" class="col-lg-3" style="max-width: 12.5%;">Foreman</th>
                    //         <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Startdate</th>
                    //         <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Deadline</th>
                    //         <th style="max-width: 12.5%;">Date Completed</th>
                    //         <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Action</th>
                    //     </tr>
                    // </thead>
                    // <tbody>
                    // ';
                    
                    // require_once '../../includes/db.php';
                    // require_once '../../includes/functions.php';
                    

                    // $sql = "SELECT * FROM project_db";
                    // $result = mysqli_query($conn, $sql);
                    
                    // if(mysqli_num_rows($result)>0){
                    //     while($row=mysqli_fetch_assoc($result)){
                            
                    //         echo'
                    //             <tr>
                    //                 <td>'.$row['project_id'].'</td>
                    //                 <td>'.$row['project_name'].'</td>
                    //                 <td>'.$row['project_architect'].'</td>
                    //                 <td>'.$row['project_pm'].'</td>
                    //                 <td>'.$row['project_startdate'].'</td>
                    //                 <td>'.$row['project_deadline'].'</td>
                    //                 <td>'.$row['project_completed_PM'].'</td>
                    //                 <form method="post" action="PM_viewproject_completed.php">
                    //                 <td>
                    //                     <button class="btn btn-success" style="margin-left: 5px;background: var(--warning);" type="submit">
                    //                     <input name="projectView" value="'.$row["project_id"].'" hidden>
                    //                     <input name="projectViewName" value="'.$row["project_name"].'" hidden>
                    //                         <i class="fa fa-folder-open-o" style="font-size: 15px;"> Open Project
                    //                         </i>
                    //                     </button>
                    //                 </td>
                    //                 </form>
                    //             </tr>
                    //         ';
                            
                    //     }
                    // }

                    // echo'</table>';            
                    

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

    <script src="assets-admin/js/forback.js"></script>
</body>

</html>