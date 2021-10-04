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
                        <span class="text-lg"><strong>USER PROFILES</strong></span>
                        <button style="float:right;" data-toggle="modal" data-target="#reg-modal">Add user</button> 
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
                                    <form>
                                        <button style="text-decoration: none; border: 0; width:100%; text-align:left;" type="submit">
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
                                        </button>
                                    </form>
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
                                <h2 class="text-uppercase">REGISTER</h2>
                                <div class="d-inline-block">

                                    
                                        
                                        <div id="usertype2">
                                            <form action="includes/signupdb.php" method="post" >

                                                <!-- FOR USER TYPE OPTIONS -->
                                                <select style="width: 280px;height: 38px;" id="usertype" name="usertypeSELECT">
                                                    <option value="client" selected>Client</option>
                                                    <option value="architect">Architect</option>
                                                    <option value="projectmanager">Project Manager</option>
                                                    <option value="admin">Admin</option>
                                                </select>

                                                <br><br>
                                
                                                <input type="email" id="email" placeholder="Email" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="email">
                                                <br> <br>  
                                                <input type="text" id="fullname" placeholder="Full Name" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="fullname">
                                                <br> <br>                                 
                                                <input type="password" id="password" placeholder="Password" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="password">                                                                 
                                                <br> <br>                                
                                                <input type="password" id="confirm-password" placeholder="Confirm Password" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="confirm-password">                                                                 
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






    <?php include '../../layout/footer.php' ?>
    <script src="assets-admin/js/jquery.min.js"></script>
    <script src="assets-admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-admin/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets-admin/js/theme.js"></script>
</body>


</html>