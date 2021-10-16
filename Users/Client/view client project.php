<?php include '../../layout/header-client.php' ?>
<?php 
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';
    session_start();

    // TRAIL PHP SEGMENT

    $trail_user = $_SESSION["user_fullname"];
    $trail_user_type = $_SESSION["usertype_fk"];
    $trail_path = "Project View";
    $trail_action = "Viewing progress of the project";
    $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>project view</title>
    <link rel="stylesheet" href="../Projects/assetsForViewProject/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Projects/assetsForViewProject/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../Projects/assetsForViewProject/css/styles.css">
    <link rel="stylesheet" href="../Projects/assetsForViewProject/css/view.css">
</head>

<body class="masthead" style="width: 100%; margin: auto;">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    
    <?php 
    $forprojectID = $_POST["projectView"];
    $client = $_SESSION["user_fullname"];

    $sql = "SELECT * FROM project_db WHERE project_id = '$forprojectID' AND project_client = '$client' ";
    $result = mysqli_query($conn, $sql);

    $numerator = 0;
    $denominator = 8;
    

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

            $status1 = "Pending";
            $status2 = "Completed";
            $status3 = "Delayed";

            $project_id = $row["project_id"];
            

            if($_SESSION["user_fullname"] == $row["project_client"] || $forprojectID == $row["project_id"]){
                                

                echo '

                <div style="margin-top:3%; margin-bottom:50px;">
                    <h4 class="text-center" style="height: 35px;font-size: 34px;">Architect Activities</h4> 
                </div>
                <div >
                <form method="post" action="../../includes/uploadArchiProject_admin.php" enctype="multipart/form-data">
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

                    <div class="progress mx-auto" style="width: 80%;height: 30px; margin-top:3%;">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["project_progress_architect"].'%;">'.$row["project_progress_architect"].'</div>
                    </div>
                </div>
            </section>



            <section id="body-section" style="padding-bottom: 30px">
                <h4 class="text-center">Activities</h4>
                <div class="d-inline-flex" style="width: 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 borderbox psm1">
                                <div class="text-center" style="width: 100%;">
                                    <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_1"] .'</p>
                                    <label class="selectColor  ';

                                        if($status1 == $row['project_status_Architect_1']){
                                            echo ' pending-class ';
                                        }
                                        elseif($status2 == $row['project_status_Architect_1']){
                                            echo ' completed-class ';
                                        }
                                        elseif($status3 == $row['project_status_Architect_1']){
                                            echo ' delayed-class ';
                                        }
                                    
                                    
                                    echo '
                                    " style="width:100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT1">';

                                        if($status1 == $row['project_status_Architect_1']){
                                            echo ' Pending </label>';
                                        }
                                        elseif($status2 == $row['project_status_Architect_1']){
                                            echo ' Completed </label>
                                            <div style="margin-top: 10px;text-align: center;">';
                                                   
                                            $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE1'";
                                            $result2 = mysqli_query($conn, $sql2);

                                            if(mysqli_num_rows($result2)>0){
                                                
                                                echo'
                                                    <button name="DOWNLOAD1">Download</button>
                                                ';
                                                 
                                            }

                                        echo'</div>';
                                        }
                                        elseif($status3 == $row['project_status_Architect_1']){
                                            echo ' Delayed </label>';
                                        }
                                    
                                        
                                    echo'   
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-3 borderbox psm2">
                                <div style="width: 100%;">
                                    <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_2"] .'</p>
                                    <label class="selectColor';

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
                                " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT2">';
                                    
                                    if($status1 == $row['project_status_Architect_2']){
                                        echo ' Pending </label>';
                                    }
                                    elseif($status2 == $row['project_status_Architect_2']){
                                        echo ' Completed </label>
                                        <div style="margin-top: 10px;text-align: center;">';
                                                   
                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE2'";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($result2)>0){
                                            
                                            echo'
                                                <button name="DOWNLOAD2">Download</button>
                                            ';
                                             
                                        }

                                    echo'</div>';
                                    }
                                    elseif($status3 == $row['project_status_Architect_2']){
                                        echo ' Delayed </label>';
                                    }
                                    
                                    echo '
                                    
                                </div>
                            </div>
                            <div class="col-md-3 borderbox psm3">
                                <div style="width: 100%;">
                                    <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_3"] .'</p>
                                    <label class="selectColor';

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
                                " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT3">';
                                    
                                    
                                    if($status1 == $row['project_status_Architect_3']){
                                        echo ' Pending </label>';
                                    }
                                    elseif($status2 == $row['project_status_Architect_3']){
                                        echo ' Completed </label>
                                        <div style="margin-top: 10px;text-align: center;">';
                                                   
                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE3'";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($result2)>0){
                                            
                                            echo'
                                                <button name="DOWNLOAD3">Download</button>
                                            ';
                                             
                                        }

                                    echo'</div>';
                                    }
                                    elseif($status3 == $row['project_status_Architect_3']){
                                        echo ' Delayed </label>';
                                    }

                                    echo '
                                    
                                </div>
                            </div>
                            <div class="col-md-3 borderbox psm4">
                                <div class="text-center" style="width: 100%;">
                                    <p class="text-center text-muted viewfixds">'.$row["project_activity_Architect_4"] .'</p>
                                    <label class="selectColor';

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
                                " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT4">';
                                    
                                    if($status1 == $row['project_status_Architect_4']){
                                        echo ' Pending </label>';
                                    }
                                    elseif($status2 == $row['project_status_Architect_4']){
                                        echo ' Completed </label>
                                        <div style="margin-top: 10px;text-align: center;">';
                                                   
                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE4'";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($result2)>0){
                                            
                                            echo'
                                                <button name="DOWNLOAD4">Download</button>
                                            ';
                                             
                                        }

                                    echo'</div>';
                                    }
                                    elseif($status3 == $row['project_status_Architect_4']){
                                        echo ' Delayed </label>';
                                    }
                                    
                                    echo '
                                    
                                </div>
                            </div>
                            <div class="col-md-3 borderbox psm5">
                                <div class="text-center" style="width: 100%;">
                                    <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_5"] .'</p>
                                    <label class="selectColor';

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
                                " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT5">';
                                    
                                    if($status1 == $row['project_status_Architect_5']){
                                        echo ' Pending </label>';
                                    }
                                    elseif($status2 == $row['project_status_Architect_5']){
                                        echo ' Completed </label>
                                        <div style="margin-top: 10px;text-align: center;">  ';
                                                   
                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE5'";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($result2)>0){
                                            
                                            echo'
                                                <button name="DOWNLOAD5">Download</button>
                                            ';
                                             
                                        }

                                    echo'</div>';
                                    }
                                    elseif($status3 == $row['project_status_Architect_5']){
                                        echo ' Delayed </label>';
                                    }
                                    
                                    echo '
                                    
                                </div>
                            </div>
                            <div class="col-md-3 borderbox psm6">
                                <div class="text-center" style="width: 100%;">
                                    <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_6"] .'</p>
                                    <label class="selectColor';

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
                                " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT6">';
                                    
                                    if($status1 == $row['project_status_Architect_6']){
                                        echo ' Pending </label>';
                                    }
                                    elseif($status2 == $row['project_status_Architect_6']){
                                        echo ' Completed </label>
                                        <div style="margin-top: 10px;text-align: center;"> ';
                                                   
                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE6'";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($result2)>0){
                                            
                                            echo'
                                                <button name="DOWNLOAD6">Download</button>
                                            ';
                                             
                                        }

                                    echo'</div>';
                                    }
                                    elseif($status3 == $row['project_status_Architect_6']){
                                        echo ' Delayed </label>';
                                    }
                                    echo '
                                    
                                </div>
                            </div>
                            <div class="col-md-3 borderbox psm7">
                                <div class="text-center" style="width: 100%;">
                                    <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_7"] .'</p>
                                    <label class="selectColor';

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
                                " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT7">';
                                    
                                    if($status1 == $row['project_status_Architect_7']){
                                        echo ' Pending </label>';
                                    }
                                    elseif($status2 == $row['project_status_Architect_7']){
                                        echo ' Completed </label>
                                        <div style="margin-top: 10px;text-align: center;"> ';
                                                   
                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE7'";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($result2)>0){
                                            
                                            echo'
                                                <button name="DOWNLOAD7">Download</button>
                                            ';
                                             
                                        }

                                    echo'</div>';
                                    }
                                    elseif($status3 == $row['project_status_Architect_7']){
                                        echo ' Delayed </label>';
                                    }
                                    
                                    echo '
                                   
                                </div>
                            </div>
                            <div class="col-md-3 borderbox psm8">
                                <div style="width: 100%;">
                                    <p class="text-center text-muted viewfix">'.$row["project_activity_Architect_8"] .'</p>
                                    <label class="selectColor';

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
                                " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT8">';
                                    
                                    if($status1 == $row['project_status_Architect_8']){
                                        echo ' Pending </label>';
                                    }
                                    elseif($status2 == $row['project_status_Architect_8']){
                                        echo ' Completed </label>
                                        <div style="margin-top: 10px;text-align: center;">  ';
                                                   
                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE8'";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if(mysqli_num_rows($result2)>0){
                                            
                                            echo'
                                                <button name="DOWNLOAD8">Download</button>
                                            ';
                                             
                                        }

                                    echo'</div>';
                                    }
                                    elseif($status3 == $row['project_status_Architect_8']){
                                        echo ' Delayed </label>';
                                    }
                                    
                                    echo '
                                    
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
                                            <label class="selectColor';

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
                                        " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_1">';
                                            
                                            if($status1 == $row['project_status_additional_Architect_1']){
                                                echo ' Pending </label>';
                                            }
                                            elseif($status2 == $row['project_status_additional_Architect_1']){
                                                echo ' Completed </label>
                                                <div style="margin-top: 10px;text-align: center;">   ';
                                                   
                                                $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE9'";
                                                $result2 = mysqli_query($conn, $sql2);
        
                                                if(mysqli_num_rows($result2)>0){
                                                    
                                                    echo'
                                                        <button name="DOWNLOAD9">Download</button>
                                                    ';
                                                     
                                                }
        
                                            echo'</div>';
                                            }
                                            elseif($status3 == $row['project_status_additional_Architect_1']){
                                                echo ' Delayed </label>';
                                            }
                                            echo '
                                            
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
                                                <label class="selectColor';

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
                                            " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_2">';
                                                
                                            if($status1 == $row['project_status_additional_Architect_2']){
                                                echo ' Pending </label>';
                                            }
                                            elseif($status2 == $row['project_status_additional_Architect_2']){
                                                echo ' Completed </label>
                                                <div style="margin-top: 10px;text-align: center;">  ';
                                                   
                                                $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE10'";
                                                $result2 = mysqli_query($conn, $sql2);
        
                                                if(mysqli_num_rows($result2)>0){
                                                    
                                                    echo'
                                                        <button name="DOWNLOAD10">Download</button>
                                                    ';
                                                     
                                                }
        
                                            echo'</div>';
                                            }
                                            elseif($status3 == $row['project_status_additional_Architect_2']){
                                                echo ' Delayed </label>';
                                            }
                                                
                                                echo '
                                                
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
                                                <label class="selectColor';

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
                                            " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_3">';
                                                
                                                if($status1 == $row['project_status_additional_Architect_3']){
                                                    echo ' Pending </label>';
                                                }
                                                elseif($status2 == $row['project_status_additional_Architect_3']){
                                                    echo ' Completed </label>
                                                    <div style="margin-top: 10px;text-align: center;">   ';
                                                   
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE11'";
                                                    $result2 = mysqli_query($conn, $sql2);
            
                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD11">Download</button>
                                                        ';
                                                         
                                                    }
            
                                                echo'</div>';
                                                }
                                                elseif($status3 == $row['project_status_additional_Architect_3']){
                                                    echo ' Delayed </label>';
                                                }
                                                
                                                echo '
                                                
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
                                                    <label class="selectColor';

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
                                            " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_4">';
                                                
                                                if($status1 == $row['project_status_additional_Architect_4']){
                                                    echo ' Pending </label>';
                                                }
                                                elseif($status2 == $row['project_status_additional_Architect_4']){
                                                    echo ' Completed </label>
                                                    <div style="margin-top: 10px;text-align: center;">    ';
                                                   
                                                    $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE12'";
                                                    $result2 = mysqli_query($conn, $sql2);
            
                                                    if(mysqli_num_rows($result2)>0){
                                                        
                                                        echo'
                                                            <button name="DOWNLOAD12">Download</button>
                                                        ';
                                                         
                                                    }
            
                                                echo'</div>';
                                                }
                                                elseif($status3 == $row['project_status_additional_Architect_4']){
                                                    echo ' Delayed </label>';
                                                }
                                                    echo '
                                                    
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
                                                        <label class="selectColor';
    
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
                                            " style="width: 100%;margin: auto;text-align: center;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_5">';
                                                
                                                    if($status1 == $row['project_status_additional_Architect_5']){
                                                        echo ' Pending </label>';
                                                    }
                                                    elseif($status2 == $row['project_status_additional_Architect_5']){
                                                        echo ' Completed </label>
                                                        <div style="margin-top: 10px;text-align: center;">  ';
                                                   
                                                        $sql2 = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = 'FILE13'";
                                                        $result2 = mysqli_query($conn, $sql2);
                
                                                        if(mysqli_num_rows($result2)>0){
                                                            
                                                            echo'
                                                                <button name="DOWNLOAD13">Download</button>
                                                            ';
                                                             
                                                        }
                
                                                    echo'</div>';
                                                    }
                                                    elseif($status3 == $row['project_status_additional_Architect_5']){
                                                        echo ' Delayed </label>';
                                                    }
                                                        
                                                echo '
                                                
                                            </div>
                                        </div>';
                                    }
                            echo'  
                        </div>
                    </div>
                </div>
            </section>';







                // FOREMAN ACTIVITIES
                
                echo '
                <div style="margin-top:3%;">
                    <h4 class="text-center" style="height: 35px;font-size: 34px;">Foreman Activities</h4> 
                </div>';

                    $forpmID = $_SESSION['user_fullname'];
                    // $sqlpm = "SELECT * FROM project_db WHERE project_pm = '$forpmID';";
                    $sql = "SELECT * FROM project_db WHERE project_id = '$forprojectID' AND project_client = '$client'";
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
                                    <div class="d-inline-flex" style="width: 100%;">
                                        <div class="container">
                                            <div class="row">
    
                                                <!--FIRST DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_1'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor  ';
    
                                                            if($status1 == $row['project_status_PM_1']){
                                                                echo ' pending-class ';
                                                            }
                                                            elseif($status2 == $row['project_status_PM_1']){
                                                                echo ' completed-class ';
                                                            }
                                                            elseif($status3 == $row['project_status_PM_1']){
                                                                echo ' delayed-class ';
                                                            }
                                                        
                                                        
                                                            echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM1">
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--SECOND DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_2'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor ';
    
                                                            if($status1 == $row['project_status_PM_2']){
                                                                echo ' pending-class ';
                                                            }
                                                            elseif($status2 == $row['project_status_PM_2']){
                                                                echo ' completed-class ';
                                                            }
                                                            elseif($status3 == $row['project_status_PM_2']){
                                                                echo ' delayed-class ';
                                                            }
                                                        
                                                        
                                                            echo' " onchange="this.className=this.options[this.selectedIndex].className" name="SELECTPM2">
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--3rd DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_3'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
                                                        <select disabled class="selectColor ';
    
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
                                                    </div>
                                                </div>
    
                                                <!--5th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_5'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
                                                    </div>
                                                </div>
    
                                                <!--6th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_6'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--7th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_7'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--8th DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_8'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--9th DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_9'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--10th DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_10'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
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
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <!--12th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_12'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--13th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_13'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
                                                    </div>
                                                </div>
    
                                                <!--14th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_14'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--15th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_15'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--16th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_16'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--17th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_17'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--18th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_18'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
                                                        <select disabled class="selectColor';
    
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
                                                    </div>
                                                </div>
    
                                                <!--20th DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_20'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--21th DIV-->
                                                <div class="col-md-4" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_21'].'</p>
                                                        <br><br>
                                                        <select disabled class="selectColor';
    
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
    
                                                            </select>
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
                                                                <select disabled class="selectColor';
            
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
                                                                <select disabled class="selectColor';
            
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
                                                                <select disabled class="selectColor';
            
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
                                                                <select disabled class="selectColor';
            
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
                                                            </div>
                                                        </div> <!-- END OF SPECIFIC DIV-->
            
                                                        <!--26th DIV-->
                                                        <div class="col-md-6" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;';
                                                        
                                                        if($row['project_activity_PM_26'] == "empty" || $row['project_activity_PM_26'] == null){
                                                            echo ' display: none;';
                                                        }else{
                                                            echo ' display: block;';
                                                        }
                                                        
                                                        
                                                        '">
                                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                            <p class="text-center text-muted" style="height: 38px;font-size: 20px;">'.$row['project_activity_PM_26'].'</p>
                                                                <input hidden name="counter" value="5"></input>
                                                                <br><br>
                                                                <select disabled class="selectColor';
            
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







            }
        }
    } else{
        echo '<script> alert ("No Project Assigned") </script>';
        header("location: client main.php");
    }

?>

    <script src="../Projects/assetsForViewProject/js/jquery.min.js"></script>
    <script src="../Projects/assetsForViewProject/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Projects/assetsForViewProject/js/forProjectView.js"></script>

</body>

</html>
















