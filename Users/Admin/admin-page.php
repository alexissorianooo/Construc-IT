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

            require_once '../../includes/db.php';
            require_once '../../includes/functions.php';
            // session_start();

            // TRAIL PHP SEGMENT

            // $trail_user = $_SESSION["user_fullname"];
            // $trail_user_type = $_SESSION["usertype_fk"];
            // $trail_path = "User Management";
            // $trail_action = "Viewing all the users registered in the system";
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
                    <div style="display: inline-block; width:100%;">
                        <span class="text-lg" style="font-size: 40px;"><strong>USER PROFILES</strong></span>
                        <button style="float:right;" data-toggle="modal" data-target="#reg-modal">Add user</button> 
                        <!-- <button style="float:right;" data-toggle="modal" data-target="#edituserModal">Add user</button>  -->
                        
                    </div>
                    <div style="display: inline-block; width:100%; text-align:center;">
                    <span class="text-lg" style="font-size: 20px;"><strong>Display Options</strong></span>
                        <form action="admin-page.php" method="post">
                            <button  type="submit" name="display_all">Display All</button> 
                            <button  type="submit" name="display_architect">Architect</button> 
                            <button  type="submit" name="display_PM">Foreman</button> 
                            <button  type="submit" name="display_client">Client</button> 
                        </form>
                        <div>
                            <input 
                                type="text"
                                name="searchBar_name"
                                id="searchBar_ID"
                                placeholder="Search for any user.."
                                onkeyup="myFunction()"
                            />
                        </div>
                    </div>
                    <?php 
                    
                    require_once '../../includes/db.php';
                    require_once '../../includes/functions.php';
                
                    $sql = "SELECT * FROM user_db ORDER BY user_fullname ASC";
                    $result = mysqli_query($conn, $sql);

                    if(isset($_POST['display_architect'])){
                        $sql = "SELECT * FROM user_db WHERE usertype_fk = 'architect' ORDER BY user_fullname ASC";
                        $result = mysqli_query($conn, $sql);
                    }
                    if(isset($_POST['display_PM'])){
                        $sql = "SELECT * FROM user_db WHERE usertype_fk = 'projectmanager' ORDER BY user_fullname ASC";
                        $result = mysqli_query($conn, $sql);
                    }
                    if(isset($_POST['display_client'])){
                        $sql = "SELECT * FROM user_db WHERE usertype_fk = 'client' ORDER BY user_fullname ASC";
                        $result = mysqli_query($conn, $sql);
                    }
                    if(isset($_POST['display_all'])){
                        $sql = "SELECT * FROM user_db ORDER BY user_fullname ASC";
                        $result = mysqli_query($conn, $sql);
                    }
                    echo '<ul id="myUL">';
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo '
                            
                            
                                <li>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col">
                                        <form method="post" action="edituserMODAL.php">
                                            <!--<button style="text-decoration: none; border: 0; width:100%; text-align:left;" type="button" role="button" data-toggle="modal" data-target="#edituserModal">-->
                                            <button style="text-decoration: none; border: 0; width:100%; text-align:left;" type="submit" >
                                                <input hidden name="userid" value="'.$row['userid'].'">
                                                <a style="text-decoration: none">
                                                    <div class="card shadow border-left-warning py-2" data-bss-hover-animate="pulse">
                                                        <div class="card-body">
                                                            <div class="row align-items-center no-gutters">
                                                                <div class="col mr-2">
                                                                    <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                                    <span>'.$row['usertype_fk'].'</span></div>
                                                                    
                                                                    <div class="text-dark font-weight-bold h5 mb-0"><span>'.$row['user_fullname'].'</span></div>
                                                                    
                                                                </div>
                                                            </div><span style="color: blue;">'.$row['user_email'].'</span>
                                                            <hr>';
                                                            
                                                            //for variables
                                                            $username = $row['user_fullname'];
                                                            $useremail = $row['user_email'];

                                                            if ($row['usertype_fk']=='architect'){

                                                                //for ongoing project
                                                                $sql_arch_ongoing="SELECT * FROM project_db WHERE project_architect = '$username' AND project_status_fk = 'Not Complete'";
                                                                $result_arch_ongoing = mysqli_query($conn, $sql_arch_ongoing);
                                                                $number_arch_ongoing = mysqli_num_rows($result_arch_ongoing);
                                                                // echo $number_arch_ongoing;

                                                                //for completed project
                                                                $sql_arch_complete="SELECT * FROM project_db WHERE project_architect = '$username' AND project_status_fk = 'Complete'";
                                                                $result_arch_complete = mysqli_query($conn, $sql_arch_complete);
                                                                $number_arch_complete = mysqli_num_rows($result_arch_complete);

                                                                //for earliest deadline of project
                                                                $sql_arch_early="SELECT MIN(project_deadline) AS project_e_deadline FROM project_db WHERE project_architect = '$username' AND project_status_fk = 'Not Complete'";
                                                                $result_arch_early = mysqli_query($conn, $sql_arch_early);
                                                                $row_early = mysqli_fetch_assoc($result_arch_early);

                                                                if (!empty($row_early['project_e_deadline'])) {
                                                                    $early_deadline = $row_early['project_e_deadline'];
                                                                }
                                                                else{
                                                                    $early_deadline = 'None';
                                                                }
                                                                // echo $row_early['project_e_deadline'];

                                                                //for latest deadline of project
                                                                $sql_arch_late="SELECT MAX(project_deadline) AS project_l_deadline FROM project_db WHERE project_architect = '$username' AND project_status_fk = 'Not Complete'";
                                                                $result_arch_late = mysqli_query($conn, $sql_arch_late);
                                                                $row_late = mysqli_fetch_assoc($result_arch_late);

                                                                if (!empty($row_late['project_l_deadline'])) {
                                                                    $late_deadline = $row_late['project_l_deadline'];
                                                                }
                                                                else{
                                                                    $late_deadline = 'None';
                                                                }

                                                                date_default_timezone_set('Asia/Manila');
                                                                $dateToday = date("Y-m-d");
                                                                

                                                                echo'
                                                                <div style="display:flex;">
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Ongoing Projects</span>
                                                                        <br>
                                                                        <span>'.$number_arch_ongoing.'</span>
                                                                        <br>

                                                                    </div>
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Completed Projects</span>
                                                                        <br>
                                                                        <span>'.$number_arch_complete.'</span>
                                                                        <br>
                                                                    </div>
                                                                </div>';
                                                                
                                                                
                                                                echo'

                                                                <div style="display:flex;">
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Earliest Deadline of Project</span>
                                                                        <br>
                                                                        <span>'.$early_deadline.'</span>
                                                                        <br>

                                                                    </div>
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Project Status</span>
                                                                        <br>
                                                                        '; 
                                                                        if(!empty($row_early['project_e_deadline']) && $row_early['project_e_deadline']<$dateToday){
                                                                            echo '<span style="color:red;">  Delayed</span> '; 
                                                                        }
                                                                        elseif(!empty($row_late['project_l_deadline'])){
                                                                            echo '<span style="color:green;">Not  Delayed</span> ';
                                                                        }
                                                                        elseif($early_deadline=='None'){
                                                                            echo '<span style="color:Orange;">No Project</span> ';
                                                                        }
                                                                        echo'
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                                <div style="display:flex;">
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Latest Deadline of Project</span>
                                                                        <br>
                                                                        <span>'.$late_deadline.'</span>
                                                                        <br>

                                                                    </div>
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Project Status</span>
                                                                        <br>
                                                                        '; 
                                                                        if(!empty($row_late['project_l_deadline']) && $row_late['project_l_deadline']<$dateToday){
                                                                            echo '<span style="color:red;">  Delayed</span> '; 
                                                                        }
                                                                        elseif(!empty($row_late['project_l_deadline'])){
                                                                            echo '<span style="color:green;">Not  Delayed</span> ';
                                                                        }
                                                                        elseif($early_deadline=='None'){
                                                                            echo '<span style="color:Orange;">No Project</span> ';
                                                                        }
                                                                        echo'
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                ';
                                                            }
                                                            if ($row['usertype_fk']=='client'){

                                                                date_default_timezone_set('Asia/Manila');
                                                                $dateToday = date("Y-m-d");

                                                                //for earliest deadline of project
                                                                $sql_client_early="SELECT MIN(project_deadline) AS project_e_deadline FROM project_db WHERE project_client = '$username' AND project_status_fk = 'Not Complete'";
                                                                $result_client_early = mysqli_query($conn, $sql_client_early);
                                                                $row_early = mysqli_fetch_assoc($result_client_early);

                                                                if (!empty($row_early['project_e_deadline'])) {
                                                                    $early_deadline = $row_early['project_e_deadline'];
                                                                }
                                                                else{
                                                                    $early_deadline = 'None';
                                                                }
                                                                // echo $row_early['project_e_deadline'];

                                                                //for latest deadline of project
                                                                $sql_client_late="SELECT MAX(project_deadline) AS project_l_deadline FROM project_db WHERE project_client = '$username' AND project_status_fk = 'Not Complete'";
                                                                $result_client_late = mysqli_query($conn, $sql_client_late);
                                                                $row_late = mysqli_fetch_assoc($result_client_late);

                                                                if (!empty($row_late['project_l_deadline'])) {
                                                                    $late_deadline = $row_late['project_l_deadline'];
                                                                }
                                                                else{
                                                                    $late_deadline = 'None';
                                                                }

                                                                //for ongoing project
                                                                $sql_client_ongoing="SELECT project_counter FROM user_db WHERE user_fullname = '$username' AND user_email = '$useremail'";
                                                                $result_client_ongoing = mysqli_query($conn, $sql_client_ongoing);
                                                                $row_ongoing = mysqli_fetch_assoc($result_client_ongoing);
                                                                if (!empty($row_ongoing['project_counter'])) {
                                                                    $ongoing_client = $row_ongoing['project_counter'];
                                                                }
                                                                else{
                                                                    $ongoing_client = 'None';
                                                                }

                                                                echo'
                                                                <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Ongoing Projects</span></div>
                                                                <div class="text-dark font-weight-bold h5 mb-0"><span>'.$ongoing_client.'</span></div>
                                                                
                                                                <div style="display:flex;">
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Earliest Deadline of Project</span>
                                                                        <br>
                                                                        <span>'.$early_deadline.'</span>
                                                                        <br>

                                                                    </div>
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Project Status</span>
                                                                        <br>
                                                                        '; 
                                                                        if(!empty($row_early['project_e_deadline']) && $row_early['project_e_deadline']<$dateToday){
                                                                            echo '<span style="color:red;">  Delayed</span> '; 
                                                                        }
                                                                        elseif(!empty($row_late['project_l_deadline'])){
                                                                            echo '<span style="color:green;">Not  Delayed</span> ';
                                                                        }
                                                                        elseif($early_deadline=='None'){
                                                                            echo '<span style="color:Orange;">No Project</span> ';
                                                                        }
                                                                        echo'
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                                <div style="display:flex;">
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Latest Deadline of Project</span>
                                                                        <br>
                                                                        <span>'.$late_deadline.'</span>
                                                                        <br>

                                                                    </div>
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px;">
                                                                        <span style="font-size: 14px;">Project Status</span>
                                                                        <br>
                                                                        '; 
                                                                        if(!empty($row_late['project_l_deadline']) && $row_late['project_l_deadline']<$dateToday){
                                                                            echo '<span style="color:red;">  Delayed</span> '; 
                                                                        }
                                                                        elseif(!empty($row_late['project_l_deadline'])){
                                                                            echo '<span style="color:green;">Not  Delayed</span> ';
                                                                        }
                                                                        elseif($early_deadline=='None'){
                                                                            echo '<span style="color:Orange;">No Project</span> ';
                                                                        }
                                                                        echo'
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                                ';
                                                            }
                                                            if ($row['usertype_fk']=='projectmanager'){

                                                                //for ongoing project
                                                                $sql_pm_ongoing="SELECT * FROM project_db WHERE project_pm = '$username' AND project_status_fk_PM = 'Not Complete'";
                                                                $result_pm_ongoing = mysqli_query($conn, $sql_pm_ongoing);
                                                                $number_pm_ongoing = mysqli_num_rows($result_pm_ongoing);
                                                                // echo $number_arch_ongoing;

                                                                //for completed project
                                                                $sql_pm_complete="SELECT * FROM project_db WHERE project_pm = '$username' AND project_status_fk_PM = 'Complete'";
                                                                $result_pm_complete = mysqli_query($conn, $sql_pm_complete);
                                                                $number_pm_complete = mysqli_num_rows($result_pm_complete);

                                                                //for user status
                                                                $sql_pm_complete="SELECT user_status FROM user_db WHERE user_fullname = '$username' AND user_email = '$useremail'";
                                                                $result_pm_complete = mysqli_query($conn, $sql_pm_complete);
                                                                $row_status = mysqli_fetch_assoc($result_pm_complete);

                                                                //for deadline of project
                                                                $sql_pm_deadline="SELECT project_deadline FROM project_db WHERE project_pm = '$username' AND project_status_fk_PM = 'Not Complete'";
                                                                $result_pm_deadline = mysqli_query($conn, $sql_pm_deadline);
                                                                $row_deadline = mysqli_fetch_assoc($result_pm_deadline);

                                                                // for project status
                                                                date_default_timezone_set('Asia/Manila');
                                                                $dateToday = date("Y-m-d");
                                                                if(!empty($row_deadline['project_deadline'])){
                                                                    $deadline = $row_deadline['project_deadline']; 
                                                                }
                                                                else{
                                                                    $deadline = 'None';
                                                                }


                                                                echo'
                                                                <div style="display:flex;">
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px; padding-top:15px;">
                                                                        <span style="font-size: 14px;">Employee Status</span>
                                                                        <br>
                                                                        <span style="';
                                                                        
                                                                        if($row_status['user_status']=='Busy'){
                                                                            echo'color: red;';
                                                                        }
                                                                        else{
                                                                            echo'color: green;';
                                                                        }
                                                                        
                                                                        echo'
                                                                        
                                                                        ">'.$row_status['user_status'].'</span>
                                                                        <br>

                                                                    </div>
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px; padding-top:15px;">
                                                                        <span style="font-size: 14px;">Project Status</span>
                                                                        <br>
                                                                        <span style="';
                                                                        if ($deadline<$dateToday){
                                                                            echo'color: red';
                                                                        }
                                                                        elseif($dateToday<$deadline && $number_pm_ongoing>0){
                                                                            echo' color: green;';
                                                                        }
                                                                        elseif($deadline=='None'){
                                                                            echo'color: orange;';
                                                                        }
                                                                        
                                                                        echo'">'; 
                                                                            if ($deadline<$dateToday){
                                                                                echo'Delayed';
                                                                            }
                                                                            elseif($dateToday<$deadline && $number_pm_ongoing>0){
                                                                                echo'Not Delayed';
                                                                            }
                                                                            elseif($deadline=='None'){
                                                                                echo'No Project';
                                                                            }
                                                                        echo'</span>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div style="display:flex;">
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px; padding-top:15px;">
                                                                        <span style="font-size: 14px;">Ongoing Projects</span>
                                                                        <br>
                                                                        <span>'.$number_pm_ongoing.'</span>
                                                                        <br>

                                                                    </div>
                                                                    <div class="text-dark font-weight-bold h5 mb-0" style="display:inline; margin-right:30px; padding-bottom:15px; padding-top:15px;">
                                                                        <span style="font-size: 14px;">Completed Projects</span>
                                                                        <br>
                                                                        <span>'.$number_pm_complete.'</span>
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                                <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 14px;">Deadline of the Ongoing Project</span></div>
                                                                <div class="text-dark font-weight-bold h5 mb-0"><span>'. $deadline.'</span></div>
                                                                ';
                                                            }

                                                            echo'

                                                        </div>
                                                    </div>
                                                </a>
                                            </button>
                                        </form>
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


  <!-- SIGN UP MODAL -->
  <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="reg-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">   
                <div class="container" >
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <button data-dismiss="modal" class="close">
                                    <span aria-hidden="true">×</span>
                                </button>

                                <h4 style="background: url(&quot;assets/img/logo3.png&quot;) center / contain no-repeat, transparent;width: 123px;height: 65px;"></h4>
                                <h2 class="text-uppercase">REGISTER CLIENT</h2>
                                <div class="d-inline-block">

                                    
                                        
                                        <div id="usertype2">
                                            <form action="../../includes/admin_adduser.php" method="post" >

                                                <input hidden name="usertypeSELECT" value="client"></input>
                                                <br><br>                    
                                                <input type="email" id="email" placeholder="Email" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="email" required="required">
                                                <br> <br>  
                                                <input type="text" id="fullname" placeholder="Full Name" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="fullname" required="required">
                                                <br> <br>                                 
                                                <input type="password" id="password" placeholder="Password" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="password" required="required">                                                                 
                                                <br> <br>                                
                                                <input type="password" id="confirm-password" placeholder="Confirm Password" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="confirm-password" required="required">                                                                 
                                                <br> <br>
                                                
                                                <!-- FOR ASSIGNING ARCHITECT  -->
                                                <!-- <select style="width: 90%;height: 38px; border-width: 2px; border-color: darkslategray;" id="archi-select" name="archi-select" required>
                                                <option disabled selected value="">--Architects--</option> -->
                                                <?php
                                                    
                                                    // $servername = "localhost";
                                                    // $dbusername = "root";
                                                    // $dbpassword = "";
                                                    // $dbname = "capstone";

                                                    // $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

                                                    // if (!$conn){
                                                    //     die("connection failed: " . mysqli_connect_error());

                                                    // }

                                                    // $sql = "SELECT user_fullname, userid, user_status FROM user_db WHERE usertype_fk = 'architect';";
                                                    // $stmt = mysqli_stmt_init($conn);

                                                    // if (!mysqli_stmt_prepare($stmt, $sql)){
                                                    // echo "<script type='text/javascript'>alert('ERROR STATEMENT');</script>";
                                                    // }

                                                    // $records = mysqli_query($conn, $sql);

                                                    // while($data = mysqli_fetch_array($records)){
                                                    //     if($data['user_status']!="Busy"){
                                                    //         echo "<option value='". $data['user_fullname']."|". $data['userid']."'>" .$data['user_fullname']."</option>";
                                                    //     }
                                                    // }
                                                    // mysqli_close($conn);
                                                ?>
                                                <!-- </select> -->










                                                <br> <br>
                                                
                                                <!-- FOR ARCHITECT AND PM (code at js)-->

                                                <div style="display: none;" id="usertype1" ><input type="text" id="user-code" placeholder="User Code" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="usercode">                                                                 
                                                </div>
                                                <br> <br>   

                                                <button class="btn bg-info" type="submit" name="registerButton">Register</button>
                                            </form>
                                        </div>
                                    
                                    
                                    

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    




<!-- FOR REGISTER SCRIPT -->
    
<script src="../../assets/js/register.js"></script>






    
    <script src="assets-admin/js/jquery.min.js"></script>
    <script src="assets-admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-admin/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets-admin/js/theme.js"></script>

    <script src="assets-admin/js/searchbar.js"></script>
</body>


</html>