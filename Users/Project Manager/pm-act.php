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
                
                <div>
                <?php 
                // session_start();

                // $forpmID = $_SESSION['user_fullname'];
                // // echo $forpmID;
                // $sql = "SELECT * FROM project_db WHERE project_pm = '$forpmID';";
                // $resultforprojectID = mysqli_query($conn, $sql);

                

                // if(mysqli_num_rows($resultforprojectID)>0){
                //     while($row=mysqli_fetch_assoc($resultforprojectID)){

                //         $status1 = "Pending";
                //         $status2 = "Completed";
                //         $status3 = "Delayed";

                //         echo 
                //         '
                //             <div class="block-heading">
                //                 <h2 class="text-warning">'.$row['project_name'].'</h2>
                //                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in,
                //                     mattis vitae leo.</p>
                //             </div>
                //         ';

                //         echo 
                //         '
                //         <form>
                //             <div class="d-inline-flex" style="width: 100%;">

                //                 <div class="container">';

                //                 echo //first activity DIV
                //                 '
                //                     <div class="row">
                //                         <div class="col-md-3" style="margin-bottom: 15px;margin-right: 0px;margin-top: 15px;margin-left: 0px;">
                //                             <h4 class="card-title"><strong>'.$row['project_activity_PM_1'].'</strong><br></h4>
                                            
                //                             <div class="controls">
                //                                 <select class="selectColor form-control ';

                //                                     if($status1 == $row['project_status_PM_1']){
                //                                         echo ' pending-class ';
                //                                     }
                //                                     elseif($status2 == $row['project_status_PM_1']){
                //                                         echo ' completed-class ';
                //                                     }
                //                                     elseif($status3 == $row['project_status_PM_1']){
                //                                         echo ' delayed-class ';
                //                                     }
                                                
                                                
                //                                     echo' " onchange="this.className=this.options[this.selectedIndex].className">

                //                                     <option value="Pending" class="pending-class" ';

                //                                     if($status1 == $row['project_status_PM_1']){
                //                                         echo ' selected="" ';
                                                        
                //                                     }
                                                        
                //                                     echo '>Pending</option>
                //                                     <option value="Completed" class="completed-class" ';
                                                    
                //                                         if($status2 == $row['project_status_PM_1']){
                //                                             echo ' selected="" ';
                //                                             $numerator++;
                                                            
                //                                         }

                //                                     echo '>Completed</option>
                //                                     <option value="Delayed" class="delayed-class" ';

                //                                         if($status3 == $row['project_status_PM_1']){
                //                                             echo ' selected="" ';
                                                            
                //                                         }
                                                    
                //                                     echo '>Delayed</option>

                //                                 </select>
                //                             </div>
                //                         </div>
                //                     </div>
                //                 ';

                //                 echo //first activity DIV
                //                 '
                //                     <div class="card text-center clean-card">
                //                         <div class="card-body info">
                //                             <h4 class="card-title"><strong>'.$row['project_activity_PM_2'].'</strong><br></h4>
                                            
                //                             <div class="controls">
                //                                 <select class="selectColor form-control ';

                //                                     if($status1 == $row['project_status_PM_2']){
                //                                         echo ' pending-class ';
                //                                     }
                //                                     elseif($status2 == $row['project_status_PM_2']){
                //                                         echo ' completed-class ';
                //                                     }
                //                                     elseif($status3 == $row['project_status_PM_2']){
                //                                         echo ' delayed-class ';
                //                                     }
                                                
                                                
                //                                     echo' " onchange="this.className=this.options[this.selectedIndex].className">

                //                                     <option value="Pending" class="pending-class" ';

                //                                     if($status1 == $row['project_status_PM_2']){
                //                                         echo ' selected="" ';
                                                        
                //                                     }
                                                        
                //                                     echo '>Pending</option>
                //                                     <option value="Completed" class="completed-class" ';
                                                    
                //                                         if($status2 == $row['project_status_PM_2']){
                //                                             echo ' selected="" ';
                //                                             $numerator++;
                                                            
                //                                         }

                //                                     echo '>Completed</option>
                //                                     <option value="Delayed" class="delayed-class" ';

                //                                         if($status3 == $row['project_status_PM_2']){
                //                                             echo ' selected="" ';
                                                            
                //                                         }
                                                    
                //                                     echo '>Delayed</option>

                //                                 </select>
                //                             </div>
                //                         </div>
                //                     </div>
                //                 ';


                //         echo'
                //                 </div> <!--partner is  <div class="col-sm-6 col-lg-4"> -->
                //         </form>';
                //     } //END OF WHILE
                // } //END OF IF(mysqli_num_rows($resultforprojectID)>0)
                // ?>
                </div>
                <?php 
                session_start();

                $forpmID = $_SESSION['user_fullname'];
                // echo $forpmID;
                $sql = "SELECT * FROM project_db WHERE project_pm = '$forpmID';";
                $resultforprojectID = mysqli_query($conn, $sql);

                

                if(mysqli_num_rows($resultforprojectID)>0){
                    while($row=mysqli_fetch_assoc($resultforprojectID)){

                        $status1 = "Pending";
                        $status2 = "Completed";
                        $status3 = "Delayed";



                        echo 
                        '
                        <form>
                        <section id="body-section">
                            <div style="margin-bottom: 50px;">
                                <h4 class="text-center" style="height: 35px;font-size: 34px;">'.$row['project_name'].'</h4>
                                <div class="d-inline-flex" style="width: 100%;">
                                    <div class="container">
                                        <div class="row">

                                            <!--FIRST DIV-->
                                            <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                            <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                            <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                            <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
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
                                                    
                                                    
                                                        echo' " onchange="this.className=this.options[this.selectedIndex].className">

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
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        </form>
                        
                        ';
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