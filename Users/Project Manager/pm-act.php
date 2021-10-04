<?php 
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets-act/css/select.css">
    <link rel="stylesheet" href="assets-act/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets-act/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets-act/css/smoothproducts.css">
    <link rel="stylesheet" href="assets-act/css/Projects-Horizontal.css">    

    <link rel="stylesheet" href="assets-act/css/styles.css">
</head>

<body>
    <main class="page landing-page">
        <!-- <section class="clean-block">
            <div class="container" style="margin-top: -100px; margin-bottom: 30px;"> -->
                
                <?php 
                session_start();

                $forpmID = $_SESSION['user_fullname'];
                // echo $forpmID;
                $sql = "SELECT * FROM project_db WHERE project_pm = '$forpmID';";
                $resultforprojectID = mysqli_query($conn, $sql);

                $numerator = 0;
                $denominator = 21;

                if(mysqli_num_rows($resultforprojectID)>0){
                    while($row=mysqli_fetch_assoc($resultforprojectID)){
                        if($row["project_status_fk_PM"]=="Not Complete" || $row["project_status_fk_PM"]==""){
                            $status1 = "Pending";
                            $status2 = "Completed";
                            $status3 = "Delayed";
    
                            echo //project_id and counter inside this echo
                            '
                            <form method="post" action="../../includes/viewproject_projectmanager.php">
    
                                <br><br>
                                <br><br>
                                
                                <div>
                                    <div style="width: 100%;">
                                        <div class="text-center" style="width: 100%;">
                                            <h1 style="height: 50px;font-size: 50px;">'.$row["project_name"].'</h1>
                                            
                                        </div>
                                        <input hidden name="project_id" value="'.$row["project_id"].'">
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
                            
                            
                            <div class="progress" style="width: 50%;height: 30px;margin: auto;">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["project_progress_PM"].'%;">'.$row["project_progress_PM"].'</div>
                            </div>
    
                            <br><br>
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
    
                                                        </select>
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
    
                                                        </select>
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
    
                                                        </select>
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
    
                                                        </select>
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
    
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <!--12th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--13th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
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
                                                    </div>
                                                </div>
    
                                                <!--14th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--15th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--16th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--17th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
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
    
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <!--18th DIV-->
                                                <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                                    <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
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
    
                                                        </select>
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
                        else{
                            echo'
                            <br><br><br>
                            NO AVAILABLE PROJECTS';
                            // problem: since nasa loob siya ng while loop, nag didisplay siya ng "no available projects" depende sa dami ng completed projects niya
                        
                            
                        }
                       
                    }
                }


                ?>
                
    </main>
    <script src="assets-act/js/select-prog.js"></script>
    <script src="assets-act/js/jquery.min.js"></script>
    <script src="assets-act/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets-act/js/smoothproducts.min.js"></script>
    <script src="assets-act/js/theme.js"></script>
    <script src="assets-act/js/create-act.js"></script>
</body>

</html>