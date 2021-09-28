<!-- NAVIGATION TAB -->
<!-- PROBLEM: LINKS DISPLAY AT LEFT
FIX: change .navbar-collapse flex-flow: 1 to flex-flow:0
CHANGED IT AT assets/bootstrap/css/bootstrap.min.css -->

<?php include '../../layout/header-estimator.php' ?>
<?php 
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';

?>



<!DOCTYPE html>
<html lang="en" class="text-center">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Projects for Architect</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <section class="projects-horizontal">
        <div class="container" style="background: rgba(191,143,0,0.18);border-color: var(--bs-red);">
            <div class="intro">
                <h2 class="text-center"
                    style="color: var(--bs-dark);font-family: Montserrat, sans-serif;font-weight: bold;font-style: normal;font-size: 35.128px;">
                    PROJECTS</h2>
            </div>
            <div class="row">
                <div class="col">
                    <h1 style="font-family: Montserrat, sans-serif;text-align: center;">ON-GOING PROJECTS</h1>
                </div>
            </div>
            <div class="row projects" style="background: #ffffff;">
                <!-- DISPLAY PROJECTS HERE -->

                <?php 
                    $sql = "SELECT project_id, project_name, project_status_fk, project_startdate, project_deadline, project_architect, project_pm, project_progress FROM project_db";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            if($row["project_status_fk"]=="Not Complete" && $_SESSION["user_fullname"] == $row["project_architect"]){
                                echo '
                                    <div class="col-sm-6 item" style="border-style: none;border-color: var(--bs-gray-dark);">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-5"><a href="#"><img class="img-fluid"
                                                        src="assets/img/desk.jpg"></a></div>
                                            <div class="col text-end" style="background: #f9eeca;">
                                                <h3 class="text-start name" style="color: var(--bs-dark);"> '. $row["project_name"] . '&nbsp;</h3>
                                                <p class="text-start"
                                                style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;padding: 0px;height: 36px;">
                                                <strong>Foreman incharged: <br>'.$row["project_pm"] .'</strong></p>
                                                <p class="text-start"
                                                    style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;padding: 0px;height: 36px;">
                                                    <strong>START DATE: <br>'.$row["project_startdate"] .'</strong></p>
                                                <p class="text-start"
                                                    style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;padding: 0px;height: 36px;">
                                                    <strong>DEADLINE: <br>'.$row["project_deadline"] .'</strong></p>
                                                <p class="text-start"
                                                    style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;">
                                                    <strong>PROGRESS:</strong></p>
                                                <div class="progress" style="height: 28px;border: 2px solid var(--bs-dark) ;">
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:'.$row["project_progress"] .' %;">'.$row["project_progress"] .'
                                                    </div>
                                                </div>
                                                <form method="post" action="view project.php">
                                                    <input name="projectView" value="'.$row["project_id"].'" hidden>
                                                    <button class="btn btn-warning" data-bs-toggle="tooltip" data-bss-tooltip=""
                                                        data-bs-placement="bottom" data-bss-hover-animate="pulse" type="submit"
                                                        data-toggle="modal" href="#myModal" 
                                                        style="font-size: 28px;background: rgb(248,197,44);margin: 13px;border-color: rgb(0, 0, 0);" name="openProject">
                                                        
                                                        <i class="fa fa-folder-open-o" style="font-size: 20px;">  Open Project</i>
                                                    </button> 
                                                </form>
                                                <p class="description"></p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                    }


                    


                
                
                ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <h1
                    style="font-family: Montserrat, sans-serif;text-align: center;margin: 0px;padding: 15px;background: #f9eeca;">
                    COMPLETED PROJECTS</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <?php 
                    $sql = "SELECT project_id, project_name, project_status_fk, project_startdate, project_deadline, project_architect, project_pm, project_progress FROM project_db";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            if($row["project_status_fk"]=="Complete" && $_SESSION["user_fullname"] == $row["project_architect"]){
                                echo '
                                <div class="col-sm-6 item" style="padding-bottom: 40px;">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-5"><a href="#"><img class="img-fluid"
                                                    src="assets/img/minibus.jpeg"></a></div>
                                        <div class="col text-end" style="background: #f9eeca;">
                                            <h3 class="text-start name" style="color: var(--bs-dark);">'. $row["project_name"] . '&nbsp;</h3>
                                            <p class="text-start"
                                            style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;padding: 0px;height: 36px;">
                                            <strong>Foreman incharged: <br>'.$row["project_pm"] .'<br></strong></p>
                                            
                                            <p class="text-start"
                                                style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;padding: 0px;height: 36px;">
                                                <strong>START DATE: <br>'.$row["project_startdate"] .'</strong></p>
                                            <p class="text-start"
                                                style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;padding: 0px;height: 36px;">
                                                <strong>DEADLINE: <br>'.$row["project_deadline"] .'</strong></p>
                                            <p class="text-start"
                                                style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-style: normal;text-align: left;height: 47px;">
                                                <strong>DATE&nbsp;COMPLETED:</strong></p>
                                            
                                            <h1></h1><button class="btn btn-warning" data-bs-toggle="tooltip" data-bss-tooltip=""
                                                data-bs-placement="bottom" data-bss-hover-animate="pulse" type="button"
                                                title="Open Project"
                                                style="font-size: 28px;background: rgb(248,197,44);margin: 13px;border-color: rgb(0, 0, 0);" name="openProject'.$row["project_id"].'"><i
                                                    class="fa fa-folder-open-o" title="Open Project" style="font-size: 20px;" data-toggle="modal" href="#myModal" role="button">  Open Project</i></button>
                                            <p class="description"></p>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <?php include '../../users/Create Project/createprojectMODAL.php'; ?>
        
        
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    
</body>

</html>