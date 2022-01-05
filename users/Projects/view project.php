<?php include '../../layout/header-estimator.php' ?>
<?php 
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';
    session_start();
    
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

        //for foreman 
        $formanName = $row["project_pm"];


        if($deadline<$dateToday){
            // echo "$deadline is more older than $dateToday"; //sould be delayed
            // echo "<br><br><br>";
            changeActivities_architect($conn, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);
        }else{
            // echo "$deadline is more rcent than $dateToday"; //HENCE DO NOTHING
        }
        //END OF DELAY OF ACTIVITY FEATURE
    }

    $sql = "SELECT project_id, project_name, project_status_fk, project_startdate, project_deadline, project_architect, project_pm, project_client, project_client_id, project_progress_architect, project_activity_Architect_1, project_status_Architect_1, project_activity_Architect_2, project_status_Architect_2, project_activity_Architect_3, project_status_Architect_3, project_activity_Architect_4, project_status_Architect_4, project_activity_Architect_5, project_status_Architect_5, project_activity_Architect_6, project_status_Architect_6, project_activity_Architect_7, project_status_Architect_7, project_activity_Architect_8, project_status_Architect_8, project_activity_additional_Architect_1, project_status_additional_Architect_1, project_activity_additional_Architect_2, project_status_additional_Architect_2, project_activity_additional_Architect_3, project_status_additional_Architect_3, project_activity_additional_Architect_4, project_status_additional_Architect_4, project_activity_additional_Architect_5, project_status_additional_Architect_5 FROM project_db WHERE project_id = $forprojectID;";
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
                            <input hidden name="project_client" value="'.$row["project_client_id"] .'">
                            <input hidden name="project_pm" value="'.$row["project_pm"] .'">
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD1">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_1'] || $status3 == $row['project_status_Architect_1']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div1">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes">Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content1 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch1" value="">'.$row3['notes_content1'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD2">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_2'] || $status3 == $row['project_status_Architect_2']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div2">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes">Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content2 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch2" value="">'.$row3['notes_content2'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD3">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_3'] || $status3 == $row['project_status_Architect_3']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div3">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes" >Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content3 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch3" value="">'.$row3['notes_content3'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD4">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_4'] || $status3 == $row['project_status_Architect_4']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div4">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes">Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content4 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch4" value="">'.$row3['notes_content4'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD5">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_5'] || $status3 == $row['project_status_Architect_5']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div5">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes">Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content5 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch5" value="">'.$row3['notes_content5'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD6">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_6'] || $status3 == $row['project_status_Architect_6']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div6">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes">Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content6 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch6" value="">'.$row3['notes_content6'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD7">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_7'] || $status3 == $row['project_status_Architect_7']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div7">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes">Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content7 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch7" value="">'.$row3['notes_content7'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        echo'
                                                            <button name="DOWNLOAD8">Download</button>
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
                                            <div style="display:';
                                            
                                                if($status1 == $row['project_status_Architect_8'] || $status3 == $row['project_status_Architect_8']){
                                                    echo ' block ';
                                                }else{
                                                    echo ' none';
                                                }
                                            
                                             echo ';" id="hidden_div8">
                                                
                                             
                                                <br>
                                                <h5 class="fixnotes">Notes: </h5>';
                                                
                                                $sql3 = "SELECT notes_content8 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                $result3 = mysqli_query($conn, $sql3);

                                                

                                                    if(mysqli_num_rows($result3)>0){
                                                        $row3=mysqli_fetch_assoc($result3);
                                                        echo'
                                                        <textarea class="fixtextarea" name="notes_arch8" value="">'.$row3['notes_content8'].'</textarea>
                                                        
                                                        ';

                                                    }

                                                echo'
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
                                                                $row2=mysqli_fetch_assoc($result2);
                                                                echo'
                                                                    <button name="DOWNLOAD9">Download</button>
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
                                                    <div style="display:';
                                                    
                                                        if($status1 == $row['project_status_additional_Architect_1'] || $status3 == $row['project_status_additional_Architect_1']){
                                                            echo ' block ';
                                                        }else{
                                                            echo ' none';
                                                        }
                                                    
                                                     echo ';" id="hidden_div9">
                                                        
                                                     
                                                        <br>
                                                        <h5 class="fixnotes">Notes: </h5>';
                                                        
                                                        $sql3 = "SELECT notes_content9 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                        $result3 = mysqli_query($conn, $sql3);
        
                                                        
        
                                                            if(mysqli_num_rows($result3)>0){
                                                                $row3=mysqli_fetch_assoc($result3);
                                                                echo'
                                                                <textarea class="fixtextarea" name="notes_arch9" value="">'.$row3['notes_content9'].'</textarea>
                                                                
                                                                ';
        
                                                            }
        
                                                        echo'
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
                                                                    $row2=mysqli_fetch_assoc($result2);
                                                                    echo'
                                                                        <button name="DOWNLOAD10">Download</button>
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
                                                        <div style="display:';
                                                        
                                                            if($status1 == $row['project_status_additional_Architect_2'] || $status3 == $row['project_status_additional_Architect_2']){
                                                                echo ' block ';
                                                            }else{
                                                                echo ' none';
                                                            }
                                                        
                                                         echo ';" id="hidden_div10">
                                                            
                                                         
                                                            <br>
                                                            <h5 class="fixnotes">Notes: </h5>';
                                                            
                                                            $sql3 = "SELECT notes_content10 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                            $result3 = mysqli_query($conn, $sql3);
            
                                                            
            
                                                                if(mysqli_num_rows($result3)>0){
                                                                    $row3=mysqli_fetch_assoc($result3);
                                                                    echo'
                                                                    <textarea class="fixtextarea" name="notes_arch10" value="">'.$row3['notes_content10'].'</textarea>
                                                                    
                                                                    ';
            
                                                                }
            
                                                            echo'
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
                                                                    $row2=mysqli_fetch_assoc($result2);
                                                                    echo'
                                                                        <button name="DOWNLOAD11">Download</button>
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
                                                        <div style="display:';
                                                        
                                                            if($status1 == $row['project_status_additional_Architect_3'] || $status3 == $row['project_status_additional_Architect_3']){
                                                                echo ' block ';
                                                            }else{
                                                                echo ' none';
                                                            }
                                                        
                                                         echo ';" id="hidden_div11">
                                                            
                                                         
                                                            <br>
                                                            <h5 class="fixnotes">Notes: </h5>';
                                                            
                                                            $sql3 = "SELECT notes_content11 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                            $result3 = mysqli_query($conn, $sql3);
            
                                                            
            
                                                                if(mysqli_num_rows($result3)>0){
                                                                    $row3=mysqli_fetch_assoc($result3);
                                                                    echo'
                                                                    <textarea class="fixtextarea" name="notes_arch11" value="">'.$row3['notes_content11'].'</textarea>
                                                                    
                                                                    ';
            
                                                                }
            
                                                            echo'
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
                                                                        $row2=mysqli_fetch_assoc($result2);
                                                                        echo'
                                                                            <button name="DOWNLOAD12">Download</button>
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
                                                            <div style="display:';
                                                            
                                                                if($status1 == $row['project_status_additional_Architect_4'] || $status3 == $row['project_status_additional_Architect_4']){
                                                                    echo ' block ';
                                                                }else{
                                                                    echo ' none';
                                                                }
                                                            
                                                             echo ';" id="hidden_div12">
                                                                
                                                             
                                                                <br>
                                                                <h5 class="fixnotes">Notes: </h5>';
                                                                
                                                                $sql3 = "SELECT notes_content12 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                                $result3 = mysqli_query($conn, $sql3);
                
                                                                
                
                                                                    if(mysqli_num_rows($result3)>0){
                                                                        $row3=mysqli_fetch_assoc($result3);
                                                                        echo'
                                                                        <textarea class="fixtextarea" name="notes_arch12" value="">'.$row3['notes_content12'].'</textarea>
                                                                        
                                                                        ';
                
                                                                    }
                
                                                                echo'
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
                                                                    $row2=mysqli_fetch_assoc($result2);
                                                                    echo'
                                                                        <button name="DOWNLOAD13">Download</button>
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
                                                        <div style="display:';
                                                        
                                                            if($status1 == $row['project_status_additional_Architect_5'] || $status3 == $row['project_status_additional_Architect_5']){
                                                                echo ' block ';
                                                            }else{
                                                                echo ' none';
                                                            }
                                                        
                                                         echo ';" id="hidden_div13">
                                                            
                                                         
                                                            <br>
                                                            <h5 class="fixnotes">Notes: </h5>';
                                                            
                                                            $sql3 = "SELECT notes_content13 FROM notes_db WHERE notes_project_id = '$project_id'";
                                                            $result3 = mysqli_query($conn, $sql3);
            
                                                            
            
                                                                if(mysqli_num_rows($result3)>0){
                                                                    $row3=mysqli_fetch_assoc($result3);
                                                                    echo'
                                                                    <textarea class="fixtextarea" name="notes_arch13" value="">'.$row3['notes_content13'].'</textarea>
                                                                    
                                                                    ';
            
                                                                }
            
                                                            echo'
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
                    </section>
                    
                    <script>
                        $(".confirm").on("click", function(event){
                            if(confirm("Are you sure to delete?")){
                            return true;
                            } else {
                                event.preventDefault();
                                return false;
                            }
                        });
                    </script>';
                   
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





    echo '
    <div style="margin-top:3%;">
        <h4 class="text-center" style="height: 35px;font-size: 34px;">Foreman Activities</h4> 
    </div>';

        $forpmID = $_SESSION['projectViewName'];
        // $sqlpm = "SELECT * FROM project_db WHERE project_pm = '$forpmID';";
        $sql = "SELECT * FROM project_db WHERE project_id = '$forprojectID' AND project_pm = '$formanName'";
        $resultforprojectID = mysqli_query($conn, $sql);

        

        $numerator = 0;
        $denominator = 21;
        $progressbar = ($numerator / $denominator)*100;
        $roundvalue = round($progressbar);
                                         

        if(mysqli_num_rows($resultforprojectID)>0){
            while($row=mysqli_fetch_assoc($resultforprojectID)){

                $status1 = "Pending";
                $status2 = "Completed";
                $status3 = "Delayed";

                echo //project_id and counter inside this echo
                '
                <form method="post" action="../../includes/viewproject_projectmanager.php">

                    <br>                                                                                                                               
                ';

                echo 
                '
                
                
                <div class="progress mx-auto container" style="width: 80%;height: 30px; margin-top:3%;">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["project_progress_PM"].'%;">'.$row["project_progress_PM"].'</div>
                </div>

                <br><br>
               

                <div id="body-section" class="sectionPADDING">
                    <div style="margin-bottom: 50px;">
                        <h4 class="text-center" style="height: 35px;font-size: 34px;">Mobilization</h4>



                        <input hidden name="project_id" value="'.$row["project_id"] .'">



                        <div class="d-inline-flex" style="width: 100%;">
                            <div class="container">
                                <div class="row">

                                    <!--FIRST DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_1'].'</p>
                                            <br><br>
                                            <label class="selectColor  ';

                                                if($status1 == $row['project_status_PM_1']){
                                                    echo ' pending-class ';
                                                }
                                                elseif($status2 == $row['project_status_PM_1']){
                                                    echo ' completed-class ';
                                                }
                                                elseif($status3 == $row['project_status_PM_1']){
                                                    echo ' delayed-class ';
                                                }
                                            
                                            
                                                echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM1">';

                                                if($status1 == $row['project_status_PM_1']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_1']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_1'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_1">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_1']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--SECOND DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_2'].'</p>
                                            <br><br>
                                            <label class="selectColor ';

                                                if($status1 == $row['project_status_PM_2']){
                                                    echo ' pending-class ';
                                                }
                                                elseif($status2 == $row['project_status_PM_2']){
                                                    echo ' completed-class ';
                                                }
                                                elseif($status3 == $row['project_status_PM_2']){
                                                    echo ' delayed-class ';
                                                }
                                            
                                            
                                                echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM2">';

                                                if($status1 == $row['project_status_PM_2']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_2']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_2'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_2">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_2']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--3rd DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_3'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_3']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_3']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_3'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_3">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_3']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <label class="selectColor ';

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
                                                ';

                                                if($status1 == $row['project_status_PM_4']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_4']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_4'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_4">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_4']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--5th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_5'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_5']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_5']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_5'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_5">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_5']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--6th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_6'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_6']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_6']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_6'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_6">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_6']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--7th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_7'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_7']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_7']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_7'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_7">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_7']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--8th DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_8'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_8']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_8']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_8'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_8">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_8']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--9th DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_9'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_9']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_9']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_9'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_9">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_9']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--10th DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_10'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_10']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_10']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_10'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_10">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_10']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <h4 class="text-center" style="height: 35px;font-size: 34px;">Architectural/Structural works</h4>
                        <div class="d-inline-flex" style="width: 100%;">
                            <div class="container">
                                <div class="row">

                                    <!--11th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_11'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_11']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_11']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_11'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_11">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_11']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>
                                    
                                    <!--12th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_12'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_12']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_12']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_12'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_12">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_12']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--13th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_13'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_13']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_13']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_13'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_13">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_13']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--14th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_14'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_14']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_14']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_14'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_14">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_14']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--15th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_15'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_15']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_15']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_15'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_15">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_15']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--16th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_16'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_16']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_16']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_16'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_16">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_16']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--17th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_17'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_17']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_17']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_17'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_17">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_17']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--18th DIV-->
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_18'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_18']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_18']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_18'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_18">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_18']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_19']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_19']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_19'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=230/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_19">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_19']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--20th DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_20'].'</p>
                                            <br><br>
                                            <label class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_20']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_20']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_20'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_20">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_20']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
                                        </div>
                                    </div>

                                    <!--21th DIV-->
                                    <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_21'].'</p>
                                            <br><br>
                                            <label disabled class="selectColor';

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
                                                ';

                                                if($status1 == $row['project_status_PM_21']){
                                                    echo 'Pending </label>';
                                                    
                                                }
                                                    
                                                elseif($status2 == $row['project_status_PM_21']){
                                                    echo 'Completed </label>';
                                                    $numerator++;
                                                    echo '<div style="margin-top: 10px; text-align:center;">';
                                                    
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_21'";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if(mysqli_num_rows($result2)>0){
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        echo $row2['files_name'];
                                                        echo '

                                                        <br>
                                                        <br>
                                                        <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                        <br>
                                                        <br>
                                                        
                                                        <button name ="DOWNLOAD_PM_21">Download</button>
                                                        <br>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    echo'
                                                        </div>';
                                                    


                                                }

                                                if($status3 == $row['project_status_PM_21']){
                                                    echo 'Delayed </label>';
                                                    
                                                }
                                                
                                                echo '
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
                                            <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px; ';
                                                if($row['project_activity_PM_22'] == "empty" || $row['project_activity_PM_22'] == null){
                                                    echo ' display: none;';
                                                }else{
                                                    echo ' display: block;';
                                                }
                                            
                                            echo '">
                                                <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">                                                                
                                                    <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_22'].'</p>
                                                    <input hidden name="counter" value="1"></input>
                                                    <br><br>
                                                    <label class="selectColor';

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
                                                        ';

                                                        if($status1 == $row['project_status_PM_22']){
                                                            echo 'Pending </label>';
                                                            
                                                        }
                                                            
                                                        elseif($status2 == $row['project_status_PM_22']){
                                                            echo 'Completed </label>';
                                                            $numerator++;
                                                            echo '<div style="margin-top: 10px; text-align:center;">';
                                                            
                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_22'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);

                                                                echo $row2['files_name'];
                                                                echo '

                                                                <br>
                                                                <br>
                                                                <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                <br>
                                                                <br>
                                                                
                                                                <button name ="DOWNLOAD_PM_22">Download</button>
                                                                <br>
                                                                ';
                                                            }
                                                            
                                                            
                                                            
                                                            echo'
                                                                </div>';
                                                            


                                                        }

                                                        if($status3 == $row['project_status_PM_22']){
                                                            echo 'Delayed </label>';
                                                            
                                                        }
                                                        
                                                        echo '
                                                </div>
                                            </div> <!-- END OF SPECIFIC DIV-->

                                            <!--23rd DIV-->
                                            <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;';
                                               
                                            if($row['project_activity_PM_23'] == "empty" || $row['project_activity_PM_23'] == null){
                                                    echo ' display: none;';
                                                }else{
                                                    echo ' display: block;';
                                                }
                                            
                                            echo '">
                                                <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_23'].'</p>
                                                <input hidden name="counter" value="2"></input>
                                                    <br><br>
                                                    <label class="selectColor';

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
                                                        ';

                                                        if($status1 == $row['project_status_PM_23']){
                                                            echo 'Pending </label>';
                                                            
                                                        }
                                                            
                                                        elseif($status2 == $row['project_status_PM_23']){
                                                            echo 'Completed </label>';
                                                            $numerator++;
                                                            echo '<div style="margin-top: 10px; text-align:center;">';
                                                            
                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_23'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);

                                                                echo $row2['files_name'];
                                                                echo '

                                                                <br>
                                                                <br>
                                                                <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                <br>
                                                                <br>
                                                                
                                                                <button name ="DOWNLOAD_PM_23">Download</button>
                                                                <br>
                                                                ';
                                                            }
                                                            
                                                            
                                                            
                                                            echo'
                                                                </div>';
                                                            


                                                        }

                                                        if($status3 == $row['project_status_PM_23']){
                                                            echo 'Delayed </label>';
                                                            
                                                        }
                                                        
                                                        echo '
                                                </div>
                                            </div> <!-- END OF SPECIFIC DIV-->

                                            <!--24th DIV-->
                                            <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;';
                                                if($row['project_activity_PM_24'] == "empty" || $row['project_activity_PM_24'] == null){
                                                    echo ' display: none;';
                                                }else{
                                                    echo ' display: block;';
                                                }
                                                
                                            echo '">
                                                <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">                                                        
                                                    <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_24'].'</p>
                                                    <input hidden name="counter" value="3"></input>
                                                    <br><br>
                                                    <label class="selectColor';

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
                                                        ';

                                                        if($status1 == $row['project_status_PM_24']){
                                                            echo 'Pending </label>';
                                                            
                                                        }
                                                            
                                                        elseif($status2 == $row['project_status_PM_24']){
                                                            echo 'Completed </label>';
                                                            $numerator++;
                                                            echo '<div style="margin-top: 10px; text-align:center;">';
                                                            
                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_24'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);

                                                                echo $row2['files_name'];
                                                                echo '

                                                                <br>
                                                                <br>
                                                                <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                <br>
                                                                <br>
                                                                
                                                                <button name ="DOWNLOAD_PM_24">Download</button>
                                                                <br>
                                                                ';
                                                            }
                                                            
                                                            
                                                            
                                                            echo'
                                                                </div>';
                                                            


                                                        }

                                                        if($status3 == $row['project_status_PM_24']){
                                                            echo 'Delayed </label>';
                                                            
                                                        }
                                                        
                                                        echo '
                                                </div>
                                            </div> <!-- END OF SPECIFIC DIV-->

                                            <!--25th DIV-->
                                            <div class="col-md-6" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;';
                                            
                                            if($row['project_activity_PM_25'] == "empty" || $row['project_activity_PM_25'] == null){
                                                echo ' display: none;';
                                            }else{
                                                echo ' display: block;';
                                            }
                                            
                                            
                                            echo'">
                                                <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_25'].'</p>
                                                    <input hidden name="counter" value="4"></input>
                                                    <br><br>
                                                    <label class="selectColor';

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
                                                        ';

                                                        if($status1 == $row['project_status_PM_25']){
                                                            echo 'Pending </label>';
                                                            
                                                        }
                                                            
                                                        elseif($status2 == $row['project_status_PM_25']){
                                                            echo 'Completed </label>';
                                                            $numerator++;
                                                            echo '<div style="margin-top: 10px; text-align:center;">';
                                                            
                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_25'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);

                                                                echo $row2['files_name'];
                                                                echo '

                                                                <br>
                                                                <br>
                                                                <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                <br>
                                                                <br>
                                                                
                                                                <button name ="DOWNLOAD_PM_25">Download</button>
                                                                <br>
                                                                ';
                                                            }
                                                            
                                                            
                                                            
                                                            echo'
                                                                </div>';
                                                            


                                                        }

                                                        if($status3 == $row['project_status_PM_25']){
                                                            echo 'Delayed </label>';
                                                            
                                                        }
                                                        
                                                        echo '
                                                </div>
                                            </div> <!-- END OF SPECIFIC DIV-->

                                            <!--26th DIV-->
                                            <div class="col-md-6" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;';
                                            
                                            if($row['project_activity_PM_26'] == "empty" || $row['project_activity_PM_26'] == null){
                                                echo ' display: none;';
                                            }else{
                                                echo ' display: block;';
                                            }
                                            
                                            
                                            echo'">
                                                <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_26'].'</p>
                                                    <input hidden name="counter" value="4"></input>
                                                    <br><br>
                                                    <label class="selectColor';

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
                                                        ';

                                                        if($status1 == $row['project_status_PM_26']){
                                                            echo 'Pending </label>';
                                                            
                                                        }
                                                            
                                                        elseif($status2 == $row['project_status_PM_26']){
                                                            echo 'Completed </label>';
                                                            $numerator++;
                                                            echo '<div style="margin-top: 10px; text-align:center;">';
                                                            
                                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE_PM_26'";
                                                            $result2 = mysqli_query($conn, $sql2);

                                                            if(mysqli_num_rows($result2)>0){
                                                                $row2=mysqli_fetch_assoc($result2);

                                                                echo $row2['files_name'];
                                                                echo '

                                                                <br>
                                                                <br>
                                                                <img src="../'.$row2['files_path'].'" height=200 width=300/>
                                                                <br>
                                                                <br>
                                                                
                                                                <button name ="DOWNLOAD_PM_26">Download</button>
                                                                <br>
                                                                ';
                                                            }
                                                            
                                                            
                                                            
                                                            echo'
                                                                </div>';
                                                            


                                                        }

                                                        if($status3 == $row['project_status_PM_26']){
                                                            echo 'Delayed </label>';
                                                            
                                                        }
                                                        
                                                        echo '
                                                </div>
                                            </div> <!-- END OF SPECIFIC DIV-->

                                           

                                        </div>
                                    </div>
                                </div> <!-- END OF ADDITIONAL ACTIVITIES DIV -->
                                </div>
                            </div>
                        </div>                                                                
                        </form>
                        
                        ';
                    }
                }
                                                    


    echo'
        <section class="text-center" id="footer-section">
            <button class="btn btn-primary" style="background: rgb(229,234,239);color: rgb(0,0,0);margin: 10px;border-color: rgb(229,234,239);" type="button" onclick="history.back()">
                <i class="fa fa-arrow-circle-left"></i>&nbsp; Back</button>
        </section>
    
    </form>
    </div>';

?>
    
    <script src="assetsForViewProject/js/jquery.min.js"></script>
    <script src="assetsForViewProject/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetsForViewProject/js/forProjectView.js"></script>

    <script src="assetsForViewProject/js/forUpload.js"></script>
</body>

</html>