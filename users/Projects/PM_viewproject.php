<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>view completed project PM</title>
    <link rel="stylesheet" href="assetsFORPM_viewproject/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetsFORPM_viewproject/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assetsFORPM_viewproject/css/styles.css">
    <link rel="stylesheet" href="assetsFORPM_viewproject/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assetsFORPM_viewproject/css/Table-With-Search.css">
</head>

<body>
<?php include '../../layout/header-pm.php';?>
<?php 
    session_start();
    require_once '../../includes/db.php';
    require_once '../../includes/functions.php';
    // TRAIL PHP SEGMENT

    // $trail_user = $_SESSION["user_fullname"];
    // $trail_user_type = $_SESSION["usertype_fk"];
    // $trail_path = "View Completed Project";
    // $trail_action = "viewing all completed projects";
    // $trail_date = date('Y-m-d H:i:s');

    // recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT


?>
    <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">
                    <tr>
                        <th style="max-width: 12.5%;">Project ID</th>
                        <th id="trs-hd" class="col-lg-1" style="max-width: 12.5%;">Project Name</th>
                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Architect</th>
                        <th id="trs-hd" class="col-lg-3" style="max-width: 12.5%;">Foreman</th>
                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Startdate</th>
                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Deadline</th>
                        <th style="max-width: 12.5%;">Date Completed</th>
                        <th id="trs-hd" class="col-lg-2" style="max-width: 12.5%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    require_once '../../includes/db.php';
                    require_once '../../includes/functions.php';
                    

                    $sql = "SELECT * FROM project_db";
                    $result = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            if($row["project_status_fk_PM"]=="Complete" && $_SESSION["user_fullname"] == $row["project_pm"] ){
                            echo'
                                <tr>
                                    <td>'.$row['project_id'].'</td>
                                    <td>'.$row['project_name'].'</td>
                                    <td>'.$row['project_architect'].'</td>
                                    <td>'.$row['project_pm'].'</td>
                                    <td>'.$row['project_startdate'].'</td>
                                    <td>'.$row['project_deadline'].'</td>
                                    <td>'.$row['project_completed_PM'].'</td>
                                    <form method="post" action="PM_viewproject_completed.php">
                                    <td>
                                        <button class="btn btn-success" style="margin-left: 5px;background: var(--warning);" type="submit">
                                        <input name="projectView" value="'.$row["project_id"].'" hidden>
                                        <input name="projectViewName" value="'.$row["project_name"].'" hidden>
                                            <i class="fa fa-folder-open-o" style="font-size: 15px;"> Open Project
                                            </i>
                                        </button>
                                    </td>
                                    </form>
                                </tr>
                                ';
                            }
                        }
                    }

                    
                    
                    ?>
                
                
                    <!-- <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-success" style="margin-left: 5px;background: var(--warning);" type="submit">
                                <i class="fa fa-folder-open-o" style="font-size: 15px;">
                                </i>
                            </button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        
    </div>
    <script src="assetsFORPM_viewproject/js/jquery.min.js"></script>
    <script src="assetsFORPM_viewproject/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetsFORPM_viewproject/js/Table-With-Search.js"></script>
</body>

</html>