<?php include '../../layout/header-client.php' ?>
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
    <link rel="stylesheet" href="../Projects/assetsForViewProject/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Projects/assetsForViewProject/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../Projects/assetsForViewProject/css/styles.css">
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
            

            if($_SESSION["user_fullname"] == $row["project_client"] || $forprojectID == $row["project_id"]){
                                

                echo '
                <div >
                <form method="post" action="../../includes/viewprojectdb.php">

                    <section id="header-section">
                        <div style="width: 100%;">
                            <div class="text-center" style="width: 100%;">
                                <h2 style:"height: 50px; font-size: 50px;><b>'.$row["project_name"].'</b></h2>
                            </div>                            
                            <input hidden name="project_id" value="'.$row["project_id"] .'">
                            <input hidden name="counter" value="0">
                            <div style="margin-top: 20px;">
                                <div class="container" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <p><b>Start Date:</b>    '.$row["project_startdate"] .'</p>
                                        </div>
                                        <div class="col-md-6 text-center"">
                                            <p><b>Deadline:</b>    '.$row["project_deadline"] .'</p>
                                        </div>
                                        <div class="col-md-6 text-center"">
                                            <p><b>Architect:</b>    '.$row["project_architect"] .'</p>
                                        </div>
                                        <div class="col-md-6 text-center"">
                                            <p><b>Project Manager:</b>    '.$row["project_pm"] .'</p>
                                        </div>                                    
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </section>


                    <section id="body-section">
                    <h4 class="text-center" style="height: 35px;font-size: 34px;">Architect Activitites</h4>
                        <div class="d-inline-flex" style="width: 100%;">
                            <div class="container">
                                <div class="row">
                                     <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_1"] .'</p>
                                            
                                            <select disabled class="selectColor';

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
                                            " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT1">
                                                
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
                                                

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_2"] .'</p>
                                            <select disabled class="selectColor';

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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT2">
                                            
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_3"] .'</p>
                                            <select disabled class="selectColor';

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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT3">
                                            
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_4"] .'</p>
                                            <select disabled class="selectColor';

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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT4">
                                            
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_5"] .'</p>
                                            <select disabled class="selectColor';

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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT5">
                                            
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_6"] .'</p>
                                            <select disabled class="selectColor';

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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT6">
                                            
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_7"] .'</p>
                                            <select disabled class="selectColor';

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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT7">
                                            
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                            <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_Architect_8"] .'</p>
                                            <select disabled class="selectColor';

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
                                        " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT8">
                                            
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
                                            </select>
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
                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                    <input hidden name="additional_name_1" value="'.$row["project_activity_additional_Architect_1"].'">
                                                    <input hidden name="counter" value="1">
                                                    <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_additional_Architect_1"] .'</p>
                                                    <select disabled class="selectColor';

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
                                                " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_1">
                                                    
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
                                                    </select>
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
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <input hidden name="additional_name_2" value="'.$row["project_activity_additional_Architect_2"].'">
                                                        <input hidden name="counter" value="2">
                                                        <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_additional_Architect_2"] .'</p>
                                                        <select disabled class="selectColor';

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
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_2">
                                                        
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
                                                        </select>
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
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                        <input hidden name="additional_name_3" value="'.$row["project_activity_additional_Architect_3"].'">
                                                        <input hidden name="counter" value="3">
                                                        <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_additional_Architect_3"] .'</p>
                                                        <select disabled class="selectColor';

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
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_3">
                                                        
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
                                                        </select>
                                                    </div>
                                                </div>';
                                            }
                                            if($row["project_activity_additional_Architect_4"] == "empty"){
                                                echo '
                                                <input hidden name="additional_name_4" value="'.$row["project_activity_additional_Architect_4"].'">
                                                <select hidden name="SELECT_additional_4" style="height:38%;"></select>
                                                ';
                                            }
                                            elseif($row["project_activity_additional_Architect_4"] != "empty"){
                                                $denominator++;
                                                echo'
                                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                        <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                            <input hidden name="additional_name_4" value="'.$row["project_activity_additional_Architect_4"].'">
                                                            <input hidden name="counter" value="4">
                                                            <p class="text-center text-muted" style="height:38%;>'.$row["project_activity_additional_Architect_4"] .'</p>
                                                            <select disabled class="selectColor';

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
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_4">
                                                        
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
                                                            </select>
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
                                                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                                                <input hidden name="additional_name_5" value="'.$row["project_activity_additional_Architect_5"].'">
                                                                <input hidden name="counter" value="5">
                                                                <p class="text-center text-muted" style="height:38%;">'.$row["project_activity_additional_Architect_5"] .'</p>
                                                                <select disabled class="selectColor';
            
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
                                                    " style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className" name="SELECT_additional_5">
                                                        
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
                                                        </select>
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
                    <h4 class="text-center" style="height: 35px;font-size: 34px;">Foreman Activitites</h4> 
                </div>
                ';









                   
                    $progressbar = ($numerator / $denominator)*100;
                    $roundvalue = round($progressbar);
                    
                    echo'
                    <input hidden name="progressbarUPDATE" value="'.$roundvalue.'">
                    <input hidden name="numeratorUPDATE" value="'.$numerator.'">
                    <input hidden name="denominatorUPDATE" value="'.$denominator.'">
                    <div class="progress mx-auto" style="width: 80%;height: 30px; margin-top:3%;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '.$roundvalue.'%;">'.$roundvalue .'</div>
                    </div>
                    

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
















