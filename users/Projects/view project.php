<?php include '../../layout/header-estimator.php' ?>
<?php 
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';

    
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>project view</title>
    <link rel="stylesheet" href="assetsForViewProject/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assetsForViewProject/bootstrap/css/bootstrap.css"> -->
    <link rel="stylesheet" href="assetsForViewProject/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assetsForViewProject/css/styles.css">
    <link rel="stylesheet" href="assetsForViewProject/css/view.css">    
</head>

<body class="body-image">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<?php 
    // $forprojectID = $_POST["projectView"]; // for getting specific project, from project_arch
    // $forprojectName = $_POST["projectViewName"];

    if(!empty( $_POST["projectView"])){ //for backing purposes, if empty it will refer to the session variables
        $forprojectID = $_POST["projectView"]; // for getting specific project, from project_arch
        $_SESSION['forprojectID']= $forprojectID;
    }else{
        $forprojectID = $_SESSION['forprojectID'];
    }
   
    if(!empty( $_POST["projectViewName"])){
        $forprojectName = $_POST["projectViewName"]; 
        $_SESSION['projectViewName']= $forprojectName;
    }else{
        $forprojectName = $_SESSION['projectViewName'];
    }

    // TRAIL PHP SEGMENT

    $trail_user = $_SESSION["user_fullname"];
    $trail_user_type = $_SESSION["usertype_fk"];
    $trail_path = "Project View";
    $trail_action = "view project ".$forprojectID.": ".$forprojectName;
    $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT

    $sql = "SELECT * FROM project_db WHERE project_id = $forprojectID;";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_assoc($result)){
        //NEEDED FOR DELAY OF ACTIVITY FEATURE
        date_default_timezone_set('Asia/Manila');
        $dateToday = date("Y-m-d");
        // $dateToday = "2021-12-09";
        $deadline = $row['project_deadline']; 

        $project_id = $row["project_id"];

        $select1 = $row["project_status_Architect_1"];
        $select2 = $row["project_status_Architect_2"];
        $select3 = $row["project_status_Architect_3"];
        $select4 = $row["project_status_Architect_4"];
        $select5 = $row["project_status_Architect_5"];
        $select6 = $row["project_status_Architect_6"];
        $select7 = $row["project_status_Architect_7"];
        $select8 = $row["project_status_Architect_8"];
        $select9 = $row["project_status_additional_Architect_1"];
        $select10 = $row["project_status_additional_Architect_2"];
        $select11 = $row["project_status_additional_Architect_3"];
        $select12 = $row["project_status_additional_Architect_4"];
        $select13 = $row["project_status_additional_Architect_5"];


        if($deadline<$dateToday){
            // echo "$deadline is more older than $dateToday"; //sould be delayed
            // echo "<br><br><br>";
            changeActivities_architect($conn, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);
        }else{
            // echo "$deadline is more rcent than $dateToday"; //HENCE DO NOTHING
        }
        //END OF DELAY OF ACTIVITY FEATURE
    }

    $sql = "SELECT project_id, project_name, project_status_fk, project_startdate, project_deadline, project_architect, project_pm, project_client, project_progress_architect, project_activity_Architect_1, project_status_Architect_1, project_activity_Architect_2, project_status_Architect_2, project_activity_Architect_3, project_status_Architect_3, project_activity_Architect_4, project_status_Architect_4, project_activity_Architect_5, project_status_Architect_5, project_activity_Architect_6, project_status_Architect_6, project_activity_Architect_7, project_status_Architect_7, project_activity_Architect_8, project_status_Architect_8, project_activity_additional_Architect_1, project_status_additional_Architect_1, project_activity_additional_Architect_2, project_status_additional_Architect_2, project_activity_additional_Architect_3, project_status_additional_Architect_3, project_activity_additional_Architect_4, project_status_additional_Architect_4, project_activity_additional_Architect_5, project_status_additional_Architect_5 FROM project_db WHERE project_id = $forprojectID;";
    $result = mysqli_query($conn, $sql);

    $numerator = 0;
    $denominator = 8;
    
    

    if(mysqli_num_rows($result)>0){

        

        while($row=mysqli_fetch_assoc($result)){

            $status1 = "Pending";
            $status2 = "Completed";
            $status3 = "Delayed";
            

            if($_SESSION["user_fullname"] == $row["project_client"] || $_SESSION["user_fullname"] == $row["project_architect"]){
                
                
                
                echo '
                <form method="post" action="../../includes/viewprojectdb.php" enctype="multipart/form-data">


                    <section class="headerbox container" id="header-section" style="padding-top: 20px;">
                        <div style="width: 100%;">
                            <div class="text-center" style="width: 100%;">
                                <h2><b>'.$row["project_name"].'</b></h2>
                            </div>
                            <input hidden name="project_id" value="'.$row["project_id"] .'">
                            <input hidden name="project_name" value="'.$row["project_name"] .'">
                            <input hidden name="counter" value="0">
                            <div style="margin-top: 20px; margin-bottom: -10px">
                                <div class="container" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-md-6 info-h">
                                            <p class="infotext">Start Date:</p><p class="info-text">    '.$row["project_startdate"] .'</p>
                                        </div>
                                        <div class="col-md-6 info-h">
                                            <p class="infotext">Deadline:</p><p class="info-text">    '.$row["project_deadline"] .'</p>
                                        </div>
                                        <div class="col-md-6 info-h">
                                            <p class="infotext">Architect:</p><p class="info-text">   '.$row["project_architect"] .'</p>
                                        </div>
                                        <div class="col-md-6 info-h">
                                            <p class="infotext">Project Manager:</p><p class="info-text">    '.$row["project_pm"] .'</p>
                                        </div>
                                        <div class="col-md-6 info-h">
                                            <p class="infotext">Client:</p><p class="info-text">    '.$row["project_client"] .'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



                    <section id="body-section" style="padding-bottom: 30px">
                        <h4 class="text-center viewact">Activities</h4>
                        <div class="d-inline-flex" style="width: 100%;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 borderbox psm1">
                                        <div class="text-center" style="width: 100%;">
                                            <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_1"] .'</p>
                                            <select class="selectColor  ';

                                                if($status1 == $row['project_status_Architect_1']){
                                                    echo ' pending-class ';
                                                }
                                                elseif($status2 == $row['project_status_Architect_1']){
                                                    echo ' completed-class ';
                                                }
                                                elseif($status3 == $row['project_status_Architect_1']){
                                                    echo ' delayed-class ';
                                                }
                                            
                                            //; showDiv(\'hidden_div\', this);
                                            echo '
                                            " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div1\', this);" name="SELECT1">
                                                
                                                <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_Architect_1']){
                                                        echo ' selected="" ';
                                                         
                                                    }
                                                    
                                                echo '>Pending</option>
                                                <option value="Completed" class="completed-class" ';
                                                
                                                    if($status2 == $row['project_status_Architect_1']){
                                                        echo ' selected="" ';
                                                        $numerator++;
                                                        
                                                    }

                                                echo '>Completed</option>
                                                <option value="Delayed" class="delayed-class" ';

                                                    if($status3 == $row['project_status_Architect_1']){
                                                        echo ' selected="" ';
                                                         
                                                    }
                                                
                                                echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_1']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div1">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE1" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD1">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE1'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD1">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    <div class="col-md-3 borderbox psm2">
                                        <div style="width: 100%;">
                                            <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_2"] .'</p>
                                            <select class="selectColor';

                                            if($status1 == $row['project_status_Architect_2']){
                                                echo ' pending-class ';
                                            }
                                            elseif($status2 == $row['project_status_Architect_2']){
                                                echo ' completed-class ';
                                            }
                                            elseif($status3 == $row['project_status_Architect_2']){
                                                echo ' delayed-class ';
                                            }
                                        
                                        
                                        echo '
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div2\', this);" name="SELECT2">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_2']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_2']){
                                                    echo ' selected="" ';
                                                    $numerator++;
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_2']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_2']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div2">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE2" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD2">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE2'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD2">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    <div class="col-md-3 borderbox psm3">
                                        <div style="width: 100%;">
                                            <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_3"] .'</p>
                                            <select class="selectColor';

                                            if($status1 == $row['project_status_Architect_3']){
                                                echo ' pending-class ';
                                            }
                                            elseif($status2 == $row['project_status_Architect_3']){
                                                echo ' completed-class ';
                                            }
                                            elseif($status3 == $row['project_status_Architect_3']){
                                                echo ' delayed-class ';
                                            }
                                        
                                        
                                        echo '
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div3\', this);" name="SELECT3">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_3']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_3']){
                                                    echo ' selected="" ';
                                                    $numerator++;
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_3']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_3']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div3">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE3" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD3">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE3'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD3">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    <div class="col-md-3 borderbox psm4">
                                        <div class="text-center" style="width: 100%;">
                                            <p class="text-center text-muted viewfixds">'.$row["project_activity_Architect_4"] .'</p>
                                            <select class="selectColor';

                                            if($status1 == $row['project_status_Architect_4']){
                                                echo ' pending-class ';
                                            }
                                            elseif($status2 == $row['project_status_Architect_4']){
                                                echo ' completed-class ';
                                            }
                                            elseif($status3 == $row['project_status_Architect_4']){
                                                echo ' delayed-class ';
                                            }
                                        
                                        
                                        echo '
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div4\', this);" name="SELECT4">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_4']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_4']){
                                                    echo ' selected="" ';
                                                    $numerator++;
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_4']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_4']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div4">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE4" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD4">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE4'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD4">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    <div class="col-md-3 borderbox psm5">
                                        <div class="text-center" style="width: 100%;">
                                            <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_5"] .'</p>
                                            <select class="selectColor';

                                            if($status1 == $row['project_status_Architect_5']){
                                                echo ' pending-class ';
                                            }
                                            elseif($status2 == $row['project_status_Architect_5']){
                                                echo ' completed-class ';
                                            }
                                            elseif($status3 == $row['project_status_Architect_5']){
                                                echo ' delayed-class ';
                                            }
                                        
                                        
                                        echo '
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div5\', this);" name="SELECT5">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_5']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_5']){
                                                    echo ' selected="" ';
                                                    $numerator++;
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_5']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_5']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div5">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE5" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD5">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE5'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD5">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    <div class="col-md-3 borderbox psm6">
                                        <div class="text-center" style="width: 100%;">
                                            <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_6"] .'</p>
                                            <select class="selectColor';

                                            if($status1 == $row['project_status_Architect_6']){
                                                echo ' pending-class ';
                                            }
                                            elseif($status2 == $row['project_status_Architect_6']){
                                                echo ' completed-class ';
                                            }
                                            elseif($status3 == $row['project_status_Architect_6']){
                                                echo ' delayed-class ';
                                            }
                                        
                                        
                                        echo '
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div6\', this);" name="SELECT6">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_6']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_6']){
                                                    echo ' selected="" ';
                                                    $numerator++;
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_6']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_6']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div6">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE6" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD6">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE6'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD6">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    <div class="col-md-3 borderbox psm7">
                                        <div class="text-center" style="width: 100%;">
                                            <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_7"] .'</p>
                                            <select class="selectColor';

                                            if($status1 == $row['project_status_Architect_7']){
                                                echo ' pending-class ';
                                            }
                                            elseif($status2 == $row['project_status_Architect_7']){
                                                echo ' completed-class ';
                                            }
                                            elseif($status3 == $row['project_status_Architect_7']){
                                                echo ' delayed-class ';
                                            }
                                        
                                        
                                        echo '
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div7\', this);" name="SELECT7">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_7']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_7']){
                                                    echo ' selected="" ';
                                                    $numerator++;
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_7']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_7']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div7">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE7" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD7">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE7'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD7">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    <div class="col-md-3 borderbox psm8">
                                        <div style="width: 100%;">
                                            <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_8"] .'</p>
                                            <select class="selectColor';

                                            if($status1 == $row['project_status_Architect_8']){
                                                echo ' pending-class ';
                                            }
                                            elseif($status2 == $row['project_status_Architect_8']){
                                                echo ' completed-class ';
                                            }
                                            elseif($status3 == $row['project_status_Architect_8']){
                                                echo ' delayed-class ';
                                            }
                                        
                                        
                                        echo '
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div8\', this);" name="SELECT8">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_8']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_8']){
                                                    echo ' selected="" ';
                                                    $numerator++;
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_8']){
                                                    echo ' selected="" ';
                                                     
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>';


                                            

                                            echo'
                                            <div style="display:';
                                            
                                                if($status2 == $row['project_status_Architect_8']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div8">
                                                
                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                    <input type="file" name="FILE8" style="color: black; width:100%;">
                                                </div>
                                                <div style="margin-top: 10px;text-align: center;">
                                                    
                                                    <button name="UPLOAD8">Upload</button>';

                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE8'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD8">Download</button>
                                                        ';
                                                        
                                                    }

                                                    echo'
                                                </div>
                                            </div>
                                            ';

                                        echo'
                                        </div>
                                    </div>
                                    ';

                                    if($row["project_activity_additional_Architect_1"] == "empty"){
                                        echo '
                                        <input hidden name="additional_name_1" value="'.$row["project_activity_additional_Architect_1"].'">
                                        <select hidden name="SELECT_additional_1"></select>
                                        ';
                                    }
                                    elseif($row["project_activity_additional_Architect_1"] != "empty"){
                                        $denominator++;
                                        echo'
                                            <div class="col-md-3 borderbox psm9">
                                                <div style="width: 100%;">
                                                    <input hidden name="additional_name_1" value="'.$row["project_activity_additional_Architect_1"].'">
                                                    <input hidden name="counter" value="1">
                                                    <p class="text-center text-muted viewfix">'.$row["project_activity_additional_Architect_1"] .'</p>
                                                    <select class="selectColor';

                                                    if($status1 == $row['project_status_additional_Architect_1']){
                                                        echo ' pending-class ';
                                                    }
                                                    elseif($status2 == $row['project_status_additional_Architect_1']){
                                                        echo ' completed-class ';
                                                        
                                                    }
                                                    elseif($status3 == $row['project_status_additional_Architect_1']){
                                                        echo ' delayed-class ';
                                                    }
                                                
                                                
                                                echo '
                                                " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div9\', this);" name="SELECT_additional_1">
                                                    
                                                    <option value="Pending" class="pending-class" ';

                                                        if($status1 == $row['project_status_additional_Architect_1']){
                                                            echo ' selected="" ';
                                                             
                                                        }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_additional_Architect_1']){
                                                            echo ' selected="" ';
                                                            $numerator++;
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_additional_Architect_1']){
                                                            echo ' selected="" ';
                                                             
                                                        }
                                                    
                                                    echo '>Delayed</option>
                                                    </select>';


                                            

                                                    echo'
                                                    <div style="display:';
                                                    
                                                        if($status2 == $row['project_status_additional_Architect_1']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                     echo ';" id="hidden_div9">
                                                        
                                                        <div style="text-align: center; margin: 20px; width:100%;">
                                                            <input type="file" name="FILE9" style="color: black; width:100%;">
                                                        </div>
                                                        <div style="margin-top: 10px;text-align: center;">
                                                            
                                                            <button name="UPLOAD9">Upload</button>';
        
                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE9'";
                                                            $result2 = mysqli_query($conn, $sql2);
        
                                                            if(mysqli_num_rows($result2)>0){
                                                                
                                                                echo'
                                                                    <button name="DOWNLOAD9">Download</button>
                                                                ';
                                                                
                                                            }
        
                                                            echo'
                                                        </div>
                                                    </div>
                                                    ';
        
                                                echo'
                                                </div>
                                            </div>';
                                        }
                                        if($row["project_activity_additional_Architect_2"] == "empty"){
                                            echo '
                                            <input hidden name="additional_name_2" value="'.$row["project_activity_additional_Architect_2"].'">
                                            <select hidden name="SELECT_additional_2"></select>
                                            ';
                                        }
                                        elseif($row["project_activity_additional_Architect_2"] != "empty"){
                                            $denominator++;
                                            echo'
                                                <div class="col-md-3 borderbox psm10">
                                                    <div style="width: 100%;">
                                                        <input hidden name="additional_name_2" value="'.$row["project_activity_additional_Architect_2"].'">
                                                        <input hidden name="counter" value="2">
                                                        <p class="text-center text-muted viewfix">'.$row["project_activity_additional_Architect_2"] .'</p>
                                                        <select class="selectColor';

                                                        if($status1 == $row['project_status_additional_Architect_2']){
                                                            echo ' pending-class ';
                                                        }
                                                        elseif($status2 == $row['project_status_additional_Architect_2']){
                                                            echo ' completed-class ';
                                                            
                                                        }
                                                        elseif($status3 == $row['project_status_additional_Architect_2']){
                                                            echo ' delayed-class ';
                                                        }
                                                    
                                                    
                                                    echo '
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div10\', this);" name="SELECT_additional_2">
                                                        
                                                        <option value="Pending" class="pending-class" ';

                                                            if($status1 == $row['project_status_additional_Architect_2']){
                                                                echo ' selected="" ';
                                                                 
                                                            }
                                                            
                                                        echo '>Pending</option>
                                                        <option value="Completed" class="completed-class" ';
                                                        
                                                            if($status2 == $row['project_status_additional_Architect_2']){
                                                                echo ' selected="" ';
                                                                $numerator++;
                                                            }

                                                        echo '>Completed</option>
                                                        <option value="Delayed" class="delayed-class" ';

                                                            if($status3 == $row['project_status_additional_Architect_2']){
                                                                echo ' selected="" ';
                                                                 
                                                            }
                                                        
                                                        echo '>Delayed</option>
                                                        </select>';


                                            

                                                        echo'
                                                        <div style="display:';
                                                        
                                                            if($status2 == $row['project_status_additional_Architect_2']){
                                                                echo ' block ';
                                                            }else{
                                                                echo ' none';
                                                            }
                                                        
                                                         echo ';" id="hidden_div10">
                                                            
                                                            <div style="text-align: center; margin: 20px; width:100%;">
                                                                <input type="file" name="FILE10" style="color: black; width:100%;">
                                                            </div>
                                                            <div style="margin-top: 10px;text-align: center;">
                                                                
                                                                <button name="UPLOAD10">Upload</button>';
            
                                                                $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE10'";
                                                                $result2 = mysqli_query($conn, $sql2);
            
                                                                if(mysqli_num_rows($result2)>0){
                                                                    
                                                                    echo'
                                                                        <button name="DOWNLOAD10">Download</button>
                                                                    ';
                                                                    
                                                                }
            
                                                                echo'
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                                    </div>
                                                </div>';
                                            }
                                        if($row["project_activity_additional_Architect_3"] == "empty"){
                                            echo '
                                            <input hidden name="additional_name_3" value="'.$row["project_activity_additional_Architect_3"].'">
                                            <select hidden name="SELECT_additional_3"></select>
                                            ';
                                        }
                                        elseif($row["project_activity_additional_Architect_3"] != "empty"){
                                            $denominator++;
                                            echo'
                                                <div class="col-md-3 borderbox psm11">
                                                    <div style="width: 100%;">
                                                        <input hidden name="additional_name_3" value="'.$row["project_activity_additional_Architect_3"].'">
                                                        <input hidden name="counter" value="3">
                                                        <p class="text-center text-muted viewfix">'.$row["project_activity_additional_Architect_3"] .'</p>
                                                        <select class="selectColor';

                                                        if($status1 == $row['project_status_additional_Architect_3']){
                                                            echo ' pending-class ';
                                                        }
                                                        elseif($status2 == $row['project_status_additional_Architect_3']){
                                                            echo ' completed-class ';
                                                            
                                                        }
                                                        elseif($status3 == $row['project_status_additional_Architect_3']){
                                                            echo ' delayed-class ';
                                                        }
                                                    
                                                    
                                                    echo '
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div11\', this);" name="SELECT_additional_3">
                                                        
                                                        <option value="Pending" class="pending-class" ';

                                                            if($status1 == $row['project_status_additional_Architect_3']){
                                                                echo ' selected="" ';
                                                                 
                                                            }
                                                            
                                                        echo '>Pending</option>
                                                        <option value="Completed" class="completed-class" ';
                                                        
                                                            if($status2 == $row['project_status_additional_Architect_3']){
                                                                echo ' selected="" ';
                                                                $numerator++;
                                                            }

                                                        echo '>Completed</option>
                                                        <option value="Delayed" class="delayed-class" ';

                                                            if($status3 == $row['project_status_additional_Architect_3']){
                                                                echo ' selected="" ';
                                                                 
                                                            }
                                                        
                                                        echo '>Delayed</option>
                                                        </select>';


                                            

                                                        echo'
                                                        <div style="display:';
                                                        
                                                            if($status2 == $row['project_status_additional_Architect_3']){
                                                                echo ' block ';
                                                            }else{
                                                                echo ' none';
                                                            }
                                                        
                                                         echo ';" id="hidden_div11">
                                                            
                                                            <div style="text-align: center; margin: 20px; width:100%;">
                                                                <input type="file" name="FILE11" style="color: black; width:100%;">
                                                            </div>
                                                            <div style="margin-top: 10px;text-align: center;">
                                                                
                                                                <button name="UPLOAD11">Upload</button>';
            
                                                                $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE11'";
                                                                $result2 = mysqli_query($conn, $sql2);
            
                                                                if(mysqli_num_rows($result2)>0){
                                                                    
                                                                    echo'
                                                                        <button name="DOWNLOAD11">Download</button>
                                                                    ';
                                                                    
                                                                }
            
                                                                echo'
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                                    </div>
                                                </div>';
                                            }
                                            if($row["project_activity_additional_Architect_4"] == "empty"){
                                                echo '
                                                <input hidden name="additional_name_4" value="'.$row["project_activity_additional_Architect_4"].'">
                                                <select hidden name="SELECT_additional_4"></select>
                                                ';
                                            }
                                            elseif($row["project_activity_additional_Architect_4"] != "empty"){
                                                $denominator++;
                                                echo'
                                                    <div class="col-md-3 borderbox psm12">
                                                        <div style="width: 100%;">
                                                            <input hidden name="additional_name_4" value="'.$row["project_activity_additional_Architect_4"].'">
                                                            <input hidden name="counter" value="4">
                                                            <p class="text-center text-muted viewfix">'.$row["project_activity_additional_Architect_4"] .'</p>
                                                            <select class="selectColor';

                                                            if($status1 == $row['project_status_additional_Architect_4']){
                                                                echo ' pending-class ';
                                                            }
                                                            elseif($status2 == $row['project_status_additional_Architect_4']){
                                                                echo ' completed-class ';
                                                                
                                                            }
                                                            elseif($status3 == $row['project_status_additional_Architect_4']){
                                                                echo ' delayed-class ';
                                                            }
                                                        
                                                        
                                                    echo '
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div12\', this);" name="SELECT_additional_4">
                                                        
                                                        <option value="Pending" class="pending-class" ';

                                                            if($status1 == $row['project_status_additional_Architect_4']){
                                                                echo ' selected="" ';
                                                                 
                                                            }
                                                            
                                                            echo '>Pending</option>
                                                            <option value="Completed" class="completed-class" ';
                                                            
                                                                if($status2 == $row['project_status_additional_Architect_4']){
                                                                    echo ' selected="" ';
                                                                    $numerator++;
                                                                }

                                                            echo '>Completed</option>
                                                            <option value="Delayed" class="delayed-class" ';

                                                                if($status3 == $row['project_status_additional_Architect_4']){
                                                                    echo ' selected="" ';
                                                                     
                                                                }
                                                            
                                                            echo '>Delayed</option>
                                                            </select>';


                                            

                                                            echo'
                                                            <div style="display:';
                                                            
                                                                if($status2 == $row['project_status_additional_Architect_4']){
                                                                    echo ' block ';
                                                                }else{
                                                                    echo ' none';
                                                                }
                                                            
                                                             echo ';" id="hidden_div12">
                                                                
                                                                <div style="text-align: center; margin: 20px; width:100%;">
                                                                    <input type="file" name="FILE12" style="color: black; width:100%;">
                                                                </div>
                                                                <div style="margin-top: 10px;text-align: center;">
                                                                    
                                                                    <button name="UPLOAD12">Upload</button>';
                
                                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE12'";
                                                                    $result2 = mysqli_query($conn, $sql2);
                
                                                                    if(mysqli_num_rows($result2)>0){
                                                                        
                                                                        echo'
                                                                            <button name="DOWNLOAD12">Download</button>
                                                                        ';
                                                                        
                                                                    }
                
                                                                    echo'
                                                                </div>
                                                            </div>
                                                            ';
                
                                                        echo'
                                                        </div>
                                                    </div>';
                                                }
                                                if($row["project_activity_additional_Architect_5"] == "empty"){
                                                    echo '
                                                    <input hidden name="additional_name_5" value="'.$row["project_activity_additional_Architect_5"].'">
                                                    <select hidden name="SELECT_additional_5"></select>
                                                    ';
                                                }
                                                elseif($row["project_activity_additional_Architect_5"] != "empty"){
                                                    $denominator++;
                                                    echo'
                                                        <div class="col-md-3 borderbox psm13">
                                                            <div style="width: 100%;">
                                                                <input hidden name="additional_name_5" value="'.$row["project_activity_additional_Architect_5"].'">
                                                                <input hidden name="counter" value="5">
                                                                <p class="text-center text-muted viewfix">'.$row["project_activity_additional_Architect_5"] .'</p>
                                                                <select class="selectColor';
            
                                                                if($status1 == $row['project_status_additional_Architect_5']){
                                                                    echo ' pending-class ';
                                                                }
                                                                elseif($status2 == $row['project_status_additional_Architect_5']){
                                                                    echo ' completed-class ';
                                                                    
                                                                }
                                                                elseif($status3 == $row['project_status_additional_Architect_5']){
                                                                    echo ' delayed-class ';
                                                                }
                                                    echo '
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className; showDiv(\'hidden_div13\', this);" name="SELECT_additional_5">
                                                        
                                                        <option value="Pending" class="pending-class" ';
    
                                                            if($status1 == $row['project_status_additional_Architect_5']){
                                                                echo ' selected="" ';
                                                                 
                                                            }
                                                            
                                                        echo '>Pending</option>
                                                        <option value="Completed" class="completed-class" ';
                                                        
                                                            if($status2 == $row['project_status_additional_Architect_5']){
                                                                echo ' selected="" ';
                                                                $numerator++;
                                                            }
    
                                                        echo '>Completed</option>
                                                        <option value="Delayed" class="delayed-class" ';
    
                                                            if($status3 == $row['project_status_additional_Architect_5']){
                                                                echo ' selected="" ';
                                                                 
                                                            }
                                                                
                                                        echo '>Delayed</option>
                                                        </select>';


                                            

                                                        echo'
                                                        <div style="display:';
                                                        
                                                            if($status2 == $row['project_status_additional_Architect_5']){
                                                                echo ' block ';
                                                            }else{
                                                                echo ' none';
                                                            }
                                                        
                                                         echo ';" id="hidden_div13">
                                                            
                                                            <div style="text-align: center; margin: 20px; width:100%;">
                                                                <input type="file" name="FILE13" style="color: black; width:100%;">
                                                            </div>
                                                            <div style="margin-top: 10px;text-align: center;">
                                                                
                                                                <button name="UPLOAD13">Upload</button>';
            
                                                                $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE13'";
                                                                $result2 = mysqli_query($conn, $sql2);
            
                                                                if(mysqli_num_rows($result2)>0){
                                                                    
                                                                    echo'
                                                                        <button name="DOWNLOAD13">Download</button>
                                                                    ';
                                                                    
                                                                }
            
                                                                echo'
                                                            </div>
                                                        </div>
                                                        ';
            
                                                    echo'
                                                    </div>
                                                </div>';
                                            }
                                    echo'  
                                </div>
                            </div>
                        </div>
                    </section>';
                   
                    $progressbar = ($numerator / $denominator)*100;
                    $roundvalue = round($progressbar);
                    
                    echo'
                    <input hidden name="progressbarUPDATE" value="'.$roundvalue.'">
                    <input hidden name="numeratorUPDATE" value="'.$numerator.'">
                    <input hidden name="denominatorUPDATE" value="'.$denominator.'">
                    
                    <div class="bg-dark container borderbox">
                        <div class="progress progressdesign">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '.$roundvalue.'%;">'.$roundvalue .'</div>
                        </div>
                        <section class="text-center" id="footer-section">
                            <button class="btn btn-primary" style="background: rgb(229,234,239);color: rgb(0,0,0);margin: 10px;border-color: rgb(229,234,239);" type="button" onclick="goBack()">
                                <i class="fa fa-arrow-circle-left"></i>&nbsp; Back</button>
                            <button class="btn btn-primary" type="submit" style="margin: 10px;" name="saveButton">
                                <i class="fa fa-save"></i>&nbsp; Save</button>
                        </section>
                    </div>
                
                </form>';

            }
        }
    }


?>
    
    <script src="assetsForViewProject/js/jquery.min.js"></script>
    <script src="assetsForViewProject/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetsForViewProject/js/forProjectView.js"></script>

    <script src="assetsForViewProject/js/forUpload.js"></script>
</body>

</html>