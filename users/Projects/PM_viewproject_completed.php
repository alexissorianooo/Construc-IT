<?php
session_start();
$project_id = $_POST['projectView'];

?>
<?php 
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';

    if(!empty( $_POST["projectView"])){ //for backing purposes, if empty it will refer to the session variables
        $project_id = $_POST["projectView"]; // for getting specific project, from project_arch
        $_SESSION['forprojectID']= $project_id;
    }else{
        $project_id = $_SESSION['forprojectID'];
    }

    if(!empty( $_POST["projectViewName"])){
        $project_name = $_POST["projectViewName"]; 
        $_SESSION['projectViewName']= $project_name;
    }else{
        $project_name = $_SESSION['projectViewName'];
    }

    // TRAIL PHP SEGMENT

    $trail_user = $_SESSION["user_fullname"];
    $trail_user_type = $_SESSION["usertype_fk"];
    $trail_path = "View Completed Project";
    $trail_action = "viewing project ".$project_id.": ".$project_name;
    $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="../Project Manager/assets-act/css/select.css">
    <link rel="stylesheet" href="../Project Manager/assets-act/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../Project Manager/assets-act/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../Project Manager/assets-act/css/smoothproducts.css">
    <link rel="stylesheet" href="../Project Manager/assets-act/css/Projects-Horizontal.css">    
    <link rel="stylesheet" href="../Project Manager/assets-act/css/pmstyle.css">
    <link rel="stylesheet" href="../Project Manager/assets-act/css/styles.css">
</head>

<body>
<?php include '../../layout/header-pm.php';?>
<br><br><br>
    <main class="page landing-page">
        <!-- <section class="clean-block">
            <div class="container" style="margin-top: -100px; margin-bottom: 30px;"> -->
                
                <?php 
                // session_start();

                
                $sql = "SELECT * FROM project_db WHERE project_id = '$project_id';";
                $resultforprojectID = mysqli_query($conn, $sql);

                $numerator = 0;
                $denominator = 21;

                if(mysqli_num_rows($resultforprojectID)>0){
                    while($row=mysqli_fetch_assoc($resultforprojectID)){

                        $status1 = "Pending";
                        $status2 = "Completed";
                        $status3 = "Delayed";

                        echo //project_id and counter inside this echo
                        '
                        <form method="post" action="../../includes/viewproject_projectmanager.php" enctype="multipart/form-data">
    
                        <br><br>
                        <br><br>
                    <div class="container">    
                        <div>
                            <div style="width: 100%;">
                                <div class="text-center" style="width: 100%;">
                                    <h1 style="height: 50px;font-size: 50px;">'.$row["project_name"].'</h1>
                                    
                                </div>
                                <input hidden name="project_id" value="'.$row["project_id"].'">
                                <input hidden name="project_name" value="'.$row["project_name"].'">
                                <input hidden name="counter" value="0"> 
                                <div style="margin-top: 20px;">
                                    <div class="container" style="margin-bottom: 20px;">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <p>Start Date:   <br> '.$row["project_startdate"] .'</p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p>Deadline:    <br>'.$row["project_deadline"] .'</p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p>Architect:   <br> '.$row["project_architect"] .'</p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p>Project Manager:    <br>'.$row["project_pm"] .'</p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p>Client:    <br>'.$row["project_client"] .'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    ';

                    echo 
                    '
                    
                    
                        <div class="progress" style="width: 80%;height: 30px;margin: auto;">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["project_progress_PM"].'%;">'.$row["project_progress_PM"].'</div>
                        </div>
                    </div>
                    <br><br>
                    <br><br>

                    <div id="body-section" class="sectionPADDING bgmain2 masthead">
                        <div class="bg-dark spacing" style="margin-bottom: 30px; padding-top: 110px; padding-bottom:110px">
                            <h4 class="text-center darktext">Mobilization</h4>
                            <div class="d-inline-flex" style="width: 100%;">
                                <div class="container">
                                    <div class="row">

                                        <!--FIRST DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_1'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_1']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_1']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_1']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div1\', this);" name="SELECTPM1">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_1']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_1']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_1']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_1']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div1">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_1" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_1">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_1'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_1">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                

                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile1">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--SECOND DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_2'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_2']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_2']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_2']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div2\', this);" name="SELECTPM2">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_2']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_2']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_2']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_2']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div2">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_2" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_2">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_2'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_2">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile2">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--3rd DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_3'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_3']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_3']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_3']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM3">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_3']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_3']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_3']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_3']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div3">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_3" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_3">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_3'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_3">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile3">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spacing" style="margin-bottom: 50px;">
                            <br><br><br>
                            <h4 class="text-center" style="height: 35px;font-size: 34px;">FOUNDATION WORKS</h4>
                            <div class="d-inline-flex" style="width: 100%;">
                                <div class="container">
                                    <div class="row">

                                        <!--4th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_4'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_4']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_4']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_4']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM4">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_4']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_4']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_4']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_4']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div4">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_4" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_4">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_4'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_4">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile4">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--5th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_5'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_5']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_5']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_5']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM5">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_5']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_5']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_5']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_5']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div5">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_5" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_5">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_5'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_5">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile5">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--6th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_6'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_6']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_6']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_6']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM6">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_6']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_6']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_6']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_6']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div6">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_6" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_6">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_6'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_6">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile6">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--7th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_7'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_7']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_7']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_7']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM7">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_7']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_7']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_7']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_7']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div7">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_7" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_7">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_7'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_7">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile7">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--8th DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_8'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_8']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_8']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_8']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM8">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_8']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_8']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_8']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_8']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div8">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_8" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_8">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_28'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_8">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile8">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--9th DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_9'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_9']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_9']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_9']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM9">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_9']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_9']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_9']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_9']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div9">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_9" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_9">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_9'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_9">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile9">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--10th DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_10'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_10']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_10']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_10']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM10">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_10']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_10']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_10']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_10']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div10">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_10" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_10">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_10'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_10">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile10">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark spacing" style="padding-top:15px;">
                            <br><br><br>
                            <h4 class="text-center darktext">Architectural/Structural works</h4>
                            <div class="d-inline-flex" style="width: 100%;">
                                <div class="container">
                                    <div class="row">

                                        <!--11th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_11'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_11']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_11']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_11']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM11">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_11']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_11']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_11']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_11']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div11">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_11" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_11">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_11'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_11">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile11">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>
                                        
                                        <!--12th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_12'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_12']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_12']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_12']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM12">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_12']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_12']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_12']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_12']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div12">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_12" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_12">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_12'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_12">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile12">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--13th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_13'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_13']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_13']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_13']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM13">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_13']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_13']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_13']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_13']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div13">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_13" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_13">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_13'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_13">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile13">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--14th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_14'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_14']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_14']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_14']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM14">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_14']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_14']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_14']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_14']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div14">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_14" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_14">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_14'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_14">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile14">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--15th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_15'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_15']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_15']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_15']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM15">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_15']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_15']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_15']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_15']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div15">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_15" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_15">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_15'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_15">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile15">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--16th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_16'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_16']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_16']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_16']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM16">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_16']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_16']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_16']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_16']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div16">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_16" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_16">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_16'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_16">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile16">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--17th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_17'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_17']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_17']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_17']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM17">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_17']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_17']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_17']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_17']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div17">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_17" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_17">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_17'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_17">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile17">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--18th DIV-->
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow darkbox">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_18'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_18']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_18']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_18']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM18">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_18']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_18']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_18']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_18']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div18">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_18" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_18">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_18'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_18">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile18">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spacing" style="margin-bottom: 50px;">
                            <br><br><br>
                            <h4 class="text-center" style="height: 35px;font-size: 34px;">Finishing works</h4>
                            <div class="d-inline-flex" style="width: 100%;">
                                <div class="container">
                                    <div class="row">

                                        <!--19th DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_19'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_19']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_19']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_19']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM19">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_19']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_19']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_19']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_19']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div19">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_19" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_19">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_19'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_19">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile19">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--20th DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_20'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_20']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_20']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_20']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM20">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_20']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_20']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_20']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_20']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div20">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_20" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_20">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_20'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_20">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile20">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                        <!--21th DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_21'].'</p>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_21']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_21']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_21']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM21">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_21']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_21']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_21']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_21']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div21">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_21" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_21">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_21'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_21">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile21">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div style=" ';
                                        
                                    if (($row['project_activity_PM_22'] == "empty" || $row['project_activity_PM_22'] == null) && ($row['project_activity_PM_23'] == "empty" || $row['project_activity_PM_23'] == null) && ($row['project_activity_PM_24'] == "empty" || $row['project_activity_PM_24'] == null) && ($row['project_activity_PM_25'] == "empty" || $row['project_activity_PM_25'] == null) && ($row['project_activity_PM_26'] == "empty" || $row['project_activity_PM_26'] == null)){
                                        echo ' display: none;';
                                    }else{
                                        echo ' display: block;';
                                    }
                            
                            echo ' " id="DIVforAdditionalActivity">
                            <h4 class="text-center" style="height: 35px;font-size: 34px;">Additional Actictivities</h4>
                            <div class="d-inline-flex" style="width: 100%;">
                                <div class="container">
                                    <div class="row" id="divforAddActivity">

                                        <!--22nd DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <input class="text-center" style="height: 38px;font-size: 20px;" name="inputPM22" value="'.$row['project_activity_PM_22'].'"></input>
                                                <input hidden name="counter" value="1"></input>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_22']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_22']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_22']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM22">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_22']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_22']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_22']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_22']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div22">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_22" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_22">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_22'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_22">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile22">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div> <!-- END OF SPECIFIC DIV-->

                                        <!--23rd DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <input class="text-center text-muted" style="height: 38px;font-size: 20px;" name="inputPM23" value="'.$row['project_activity_PM_23'].'"></input>
                                                <input hidden name="counter" value="2"></input>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_23']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_23']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_23']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM23">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_23']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_23']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_23']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_23']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div23">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_2" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_23">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_23'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_23">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile23">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div> <!-- END OF SPECIFIC DIV-->

                                        <!--24th DIV-->
                                        <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <input class="text-center text-muted" style="height: 38px;font-size: 20px;" name="inputPM24" value="'.$row['project_activity_PM_24'].'"></input>
                                                <input hidden name="counter" value="3"></input>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_24']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_24']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_24']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM24">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_24']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_24']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_24']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_24']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div24">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_24" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_24">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_24'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_24">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile24">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div> <!-- END OF SPECIFIC DIV-->

                                        <!--25th DIV-->
                                        <div class="col-md-6" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <input class="text-center text-muted" style="height: 38px;font-size: 20px;" name="inputPM25" value="'.$row['project_activity_PM_25'].'"></input>
                                                <input hidden name="counter" value="4"></input>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_25']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_25']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_25']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM25">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_25']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_25']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_25']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_25']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div25">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_25" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_25">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_25'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_25">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile25">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div> <!-- END OF SPECIFIC DIV-->

                                        <!--26th DIV-->
                                        <div class="col-md-6" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <input class="text-center text-muted" style="height: 38px;font-size: 20px;" name="inputPM26" value="'.$row['project_activity_PM_26'].'"></input>
                                                <input hidden name="counter" value="5"></input>
                                                <br><br>
                                                <select class="selectColor form-control ';

                                                    if($status1 == $row['project_status_PM_26']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_PM_26']){
                                                        echo ' completed-class ';
                                                    }
                                                    elseif($status3 == $row['project_status_PM_26']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                    echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM26">

                                                    <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_PM_26']){
                                                        echo ' selected="" ';
                                                        
                                                    }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_PM_26']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                            
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_PM_26']){
                                                            echo ' selected="" ';
                                                            
                                                        }
                                                    
                                                    echo '>Delayed</option>

                                                </select>
                                                ';
                                                echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_PM_26']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                    echo ';" id="hidden_div26">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE_PM_26" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD_PM_26">Upload</button>';

                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_26'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD_PM_26">Download</button>
                                                                    <br>
                                                                    <br>
                                                                    <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                    <br>
                                                                    <label style="margin-top:20px;">'.$row2['files_name'].'</label><br>
                                                                    <button class="btn btn-danger confirm" style="font-size: 20px;margin: 10px;border-color: rgb(0, 0, 0);"
                                                                    type="submit" name="deleteFile26">
                                                                        <i class="fa fa-trash-o" style="font-size: 20px;">  Delete</i>
                                                                    </button> 
                                                                ';
                                                                
                                                            }

                                                            echo'   
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                            </div>
                                        </div> <!-- END OF SPECIFIC DIV-->

                                    </div>
                                </div>
                            </div> <!-- END OF ADDITIONAL ACTIVITIES DIV -->
                            </div>
                        </div>
                    </div>

                            <div class="text-center">
                                <button class="btn btn-primary" type="button" style="margin: 10px;" name="addBUTTON" onclick="addActivityDIV()">
                                    <i class="fa fa-plus-circle"></i>&nbsp; Add Activities
                                </button>
                                <button class="btn btn-primary" type="submit" style="margin: 10px;" name="saveBUTTON">
                                    <i class="fa fa-save"></i>&nbsp; Save
                                </button>
                            </div>

                        </form>
                        
                        ';
                    }
                }


                ?>
                
    </main>
    <script src="../Project Manager/assets-act/js/select-prog.js"></script>
    <script src="../Project Manager/assets-act/js/jquery.min.js"></script>
    <script src="../Project Manager/assets-act/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../Project Manager/assets-act/js/smoothproducts.min.js"></script>
    <script src="../Project Manager/assets-act/js/theme.js"></script>
    <script src="../Project Manager/assets-act/js/create-act.js"></script>

    <script src="assetsForViewProject/js/forUpload.js"></script>
</body>

</html>