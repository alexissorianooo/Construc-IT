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
    <link rel="stylesheet" href="assetsForViewProject/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assetsForViewProject/css/styles.css">
    <link rel="stylesheet" href="assetsForViewProject/css/view.css">
</head>

<body style="width: 1000px;margin: auto;">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<?php 
    $forprojectID = $_POST["projectView"];
    $sql = "SELECT project_id, project_name, project_status_fk, project_startdate, project_deadline, project_architect, project_pm, project_progress, project_activity_Architect_1, project_status_Architect_1, project_activity_Architect_2, project_status_Architect_2, project_activity_Architect_3, project_status_Architect_3, project_activity_Architect_4, project_status_Architect_4, project_activity_Architect_5, project_status_Architect_5, project_activity_Architect_6, project_status_Architect_6, project_activity_Architect_7, project_status_Architect_7, project_activity_Architect_8, project_status_Architect_8, project_activity_additional_Architect_1, project_status_additional_Architect_1, project_activity_additional_Architect_2, project_status_additional_Architect_2, project_activity_additional_Architect_3, project_status_additional_Architect_3, project_activity_additional_Architect_4, project_status_additional_Architect_4, project_activity_additional_Architect_5, project_status_additional_Architect_5 FROM project_db WHERE project_id = $forprojectID;";
    $result = mysqli_query($conn, $sql);


    

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

            $status1 = "Pending";
            $status2 = "Completed";
            $status3 = "Delayed";


            if($_SESSION["user_fullname"] == $row["project_architect"]){

                echo '
                <form method="post" action="../../includes/viewprojectdb.php">
                    <section id="header-section">
                        <div style="width: 100%;">
                            <div class="text-center" style="width: 100%;">
                                <h2>'.$row["project_name"].'</h2>
                            </div>
                            <div style="margin-top: 20px;">
                                <div class="container" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Start Date:    '.$row["project_startdate"] .'</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Deadline:    '.$row["project_deadline"] .'</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress" style="width: 80%;height: 30px;margin: auto;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:'.$row["project_progress"] .' %;">'.$row["project_progress"] .'</div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="body-section">
                        <h4 class="text-center">Activities</h4>
                        <div class="d-inline-flex" style="width: 100%;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
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
                                            
                                            
                                            echo '
                                            " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                
                                                <option value="Pending" class="pending-class" ';

                                                    if($status1 == $row['project_status_Architect_1']){
                                                        echo ' selected="" ';
                                                    }
                                                    
                                                echo '>Pending</option>
                                                <option value="Completed" class="completed-class" ';
                                                
                                                    if($status2 == $row['project_status_Architect_1']){
                                                        echo ' selected="" ';
                                                    }

                                                echo '>Completed</option>
                                                <option value="Delayed" class="delayed-class" ';

                                                    if($status3 == $row['project_status_Architect_1']){
                                                        echo ' selected="" ';
                                                    }
                                                
                                                echo '>Delayed</option>
                                                

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_2']){
                                                    echo ' selected="" ';
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_2']){
                                                    echo ' selected="" ';
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_2']){
                                                    echo ' selected="" ';
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_3']){
                                                    echo ' selected="" ';
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_3']){
                                                    echo ' selected="" ';
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_3']){
                                                    echo ' selected="" ';
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_4']){
                                                    echo ' selected="" ';
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_4']){
                                                    echo ' selected="" ';
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_4']){
                                                    echo ' selected="" ';
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_5']){
                                                    echo ' selected="" ';
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_5']){
                                                    echo ' selected="" ';
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_5']){
                                                    echo ' selected="" ';
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_6']){
                                                    echo ' selected="" ';
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_6']){
                                                    echo ' selected="" ';
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_6']){
                                                    echo ' selected="" ';
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
                                        <div class="text-center" style="width: 100%;">
                                            <p class="text-center text-muted viewfixds">'.$row["project_activity_Architect_7"] .'</p>
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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_7']){
                                                    echo ' selected="" ';
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_7']){
                                                    echo ' selected="" ';
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_7']){
                                                    echo ' selected="" ';
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                            
                                            <option value="Pending" class="pending-class" ';

                                                if($status1 == $row['project_status_Architect_8']){
                                                    echo ' selected="" ';
                                                }
                                                
                                            echo '>Pending</option>
                                            <option value="Completed" class="completed-class" ';
                                            
                                                if($status2 == $row['project_status_Architect_8']){
                                                    echo ' selected="" ';
                                                }

                                            echo '>Completed</option>
                                            <option value="Delayed" class="delayed-class" ';

                                                if($status3 == $row['project_status_Architect_8']){
                                                    echo ' selected="" ';
                                                }
                                            
                                            echo '>Delayed</option>
                                            </select>
                                        </div>
                                    </div>
                                    ';

                                    if($row["project_activity_additional_Architect_1"] == "empty"){
                                        echo '';
                                    }
                                    elseif($row["project_activity_additional_Architect_1"] != "empty"){
                                        echo'
                                            <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
                                                <div style="width: 100%;">
                                                    <p class="text-center text-muted">'.$row["project_activity_additional_Architect_1"] .'</p>
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
                                                " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                    
                                                    <option value="Pending" class="pending-class" ';

                                                        if($status1 == $row['project_status_additional_Architect_1']){
                                                            echo ' selected="" ';
                                                        }
                                                        
                                                    echo '>Pending</option>
                                                    <option value="Completed" class="completed-class" ';
                                                    
                                                        if($status2 == $row['project_status_additional_Architect_1']){
                                                            echo ' selected="" ';
                                                        }

                                                    echo '>Completed</option>
                                                    <option value="Delayed" class="delayed-class" ';

                                                        if($status3 == $row['project_status_additional_Architect_1']){
                                                            echo ' selected="" ';
                                                        }
                                                    
                                                    echo '>Delayed</option>
                                                    </select>
                                                </div>
                                            </div>';
                                        }
                                        if($row["project_activity_additional_Architect_2"] == "empty"){
                                            echo '';
                                        }
                                        elseif($row["project_activity_additional_Architect_2"] != "empty"){
                                            echo'
                                                <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
                                                    <div style="width: 100%;">
                                                        <p class="text-center text-muted">'.$row["project_activity_additional_Architect_2"] .'</p>
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
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                        
                                                        <option value="Pending" class="pending-class" ';
    
                                                            if($status1 == $row['project_status_additional_Architect_2']){
                                                                echo ' selected="" ';
                                                            }
                                                            
                                                        echo '>Pending</option>
                                                        <option value="Completed" class="completed-class" ';
                                                        
                                                            if($status2 == $row['project_status_additional_Architect_2']){
                                                                echo ' selected="" ';
                                                            }
    
                                                        echo '>Completed</option>
                                                        <option value="Delayed" class="delayed-class" ';
    
                                                            if($status3 == $row['project_status_additional_Architect_2']){
                                                                echo ' selected="" ';
                                                            }
                                                        
                                                        echo '>Delayed</option>
                                                        </select>
                                                    </div>
                                                </div>';
                                            }
                                            if($row["project_activity_additional_Architect_3"] == "empty"){
                                                echo '';
                                            }
                                            elseif($row["project_activity_additional_Architect_3"] != "empty"){
                                                echo'
                                                    <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
                                                        <div style="width: 100%;">
                                                            <p class="text-center text-muted">'.$row["project_activity_additional_Architect_3"] .'</p>
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
                                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                            
                                                            <option value="Pending" class="pending-class" ';
        
                                                                if($status1 == $row['project_status_additional_Architect_3']){
                                                                    echo ' selected="" ';
                                                                }
                                                                
                                                            echo '>Pending</option>
                                                            <option value="Completed" class="completed-class" ';
                                                            
                                                                if($status2 == $row['project_status_additional_Architect_3']){
                                                                    echo ' selected="" ';
                                                                }
        
                                                            echo '>Completed</option>
                                                            <option value="Delayed" class="delayed-class" ';
        
                                                                if($status3 == $row['project_status_additional_Architect_3']){
                                                                    echo ' selected="" ';
                                                                }
                                                            
                                                            echo '>Delayed</option>
                                                            </select>
                                                        </div>
                                                    </div>';
                                                }
                                                if($row["project_activity_additional_Architect_4"] == "empty"){
                                                    echo '';
                                                }
                                                elseif($row["project_activity_additional_Architect_4"] != "empty"){
                                                    echo'
                                                        <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
                                                            <div style="width: 100%;">
                                                                <p class="text-center text-muted">'.$row["project_activity_additional_Architect_4"] .'</p>
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
                                                            " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                                
                                                                <option value="Pending" class="pending-class" ';
            
                                                                    if($status1 == $row['project_status_additional_Architect_4']){
                                                                        echo ' selected="" ';
                                                                    }
                                                                    
                                                                echo '>Pending</option>
                                                                <option value="Completed" class="completed-class" ';
                                                                
                                                                    if($status2 == $row['project_status_additional_Architect_4']){
                                                                        echo ' selected="" ';
                                                                    }
            
                                                                echo '>Completed</option>
                                                                <option value="Delayed" class="delayed-class" ';
            
                                                                    if($status3 == $row['project_status_additional_Architect_4']){
                                                                        echo ' selected="" ';
                                                                    }
                                                                
                                                                echo '>Delayed</option>
                                                                </select>
                                                            </div>
                                                        </div>';
                                                    }
                                                    if($row["project_activity_additional_Architect_5"] == "empty"){
                                                        echo '';
                                                    }
                                                    elseif($row["project_activity_additional_Architect_5"] != "empty"){
                                                        echo'
                                                            <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
                                                                <div style="width: 100%;">
                                                                    <p class="text-center text-muted">'.$row["project_activity_additional_Architect_5"] .'</p>
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
                                                                " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                                    
                                                                    <option value="Pending" class="pending-class" ';
                
                                                                        if($status1 == $row['project_status_additional_Architect_5']){
                                                                            echo ' selected="" ';
                                                                        }
                                                                        
                                                                    echo '>Pending</option>
                                                                    <option value="Completed" class="completed-class" ';
                                                                    
                                                                        if($status2 == $row['project_status_additional_Architect_5']){
                                                                            echo ' selected="" ';
                                                                        }
                
                                                                    echo '>Completed</option>
                                                                    <option value="Delayed" class="delayed-class" ';
                
                                                                        if($status3 == $row['project_status_additional_Architect_5']){
                                                                            echo ' selected="" ';
                                                                        }
                                                                    
                                                                    echo '>Delayed</option>
                                                                    </select>
                                                                </div>
                                                            </div>';
                                                        }




                                  echo'  
                                </div>
                            </div>
                        </div>
                    </section>



                    
                    <section class="text-center" id="footer-section">
                        <button class="btn btn-primary" style="background: rgb(229,234,239);color: rgb(0,0,0);margin: 10px;border-color: rgb(229,234,239);" type="button" onclick="history.back()">
                            <i class="fa fa-arrow-circle-left"></i>&nbsp; Back</button>
                        <button class="btn btn-primary" type="submit" style="margin: 10px;">
                            <i class="fa fa-save"></i>&nbsp; Save</button>
                    </section>
                        
                
            </form>';

            }
        }
    }

?>
    
    <script src="assetsForViewProject/js/jquery.min.js"></script>
    <script src="assetsForViewProject/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetsForViewProject/js/forProjectView.js"></script>
</body>

</html>