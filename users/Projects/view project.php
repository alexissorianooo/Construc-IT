
<link rel="stylesheet" href="assetsForViewProject/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assetsForViewProject/css/styles.css">



<!-- <div><a class="btn btn-primary btn-lg" role="button" data-toggle="modal" href="#myModal">Launch Demo Modal</a> -->

<?php 

    // $string = $_POST['openProject'];
    // $forIDnum = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
    // echo $forIDnum;


    // $sql = "SELECT project_id, project_name, project_status_fk, project_startdate, project_deadline, project_architect, project_pm, project_progress FROM project_db";
    // $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
    //         if($row["project_status_fk"]=="Complete" && $_SESSION["user_fullname"] == $row["project_architect"]){
                
    //         }
    //     }
    // }


?>

    <form>
        <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="width: 100%;">
                            <div class="text-center" style="width: 100%;">
                                <h2>Modal Title</h2>
                            </div>
                            <div style="margin-top: 20px;">
                                <div class="container">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <p>Start Date: asda</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Deadline: asda</p>
                                        </div>
                                    </div>
                                    <?php 
                                        // if(isset($_POST["openProject"])){
                                        //     $string=0;
                                        //     $string = $_POST['openProject'];
                                        //     echo "hello: ".$string;
                                        // }else{
                                        //     echo "nothing";
                                        // }

                                        echo $_SESSION['button'];
                                    ?>
                                </div>
                                <div class="progress" style="width: 100%;height: 30px;">
                                    <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                </div>
                            </div>
                        </div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center">Activities</h4>
                        <div class="d-inline-flex" style="width: 100%;">
                            <div class="container">
                                <div class="form-row">
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div class="text-center" style="width: 100%;">
                                            <p class="text-center text-muted">Description </p><select class="form-control selectColor" style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                <option value="Pending" class="pending-class">Pending</option>
                                                <option value="Completed" class="completed-class">Completed</option>
                                                <option value="Delayed" class="delayed-class">Delayed</option>
                                                <option value="" selected="" class="status-class" disabled="true" hidden="true">Status</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div style="width: 100%;">
                                            <p class="text-center text-muted">Description </p><select class="form-control selectColor" style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                <option value="Pending" class="pending-class">Pending</option>
                                                <option value="Completed" class="completed-class">Completed</option>
                                                <option value="Delayed" class="delayed-class">Delayed</option>
                                                <option value="" selected="" class="status-class" disabled="true" hidden="true">Status</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div style="width: 100%;">
                                            <p class="text-center text-muted">Description </p><select class="form-control selectColor" style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                <option value="Pending" class="pending-class">Pending</option>
                                                <option value="Completed" class="completed-class">Completed</option>
                                                <option value="Delayed" class="delayed-class">Delayed</option>
                                                <option value="" selected="" class="status-class" disabled="true" hidden="true">Status</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                                        <div style="width: 100%;">
                                            <p class="text-center text-muted">Description </p><select class="form-control selectColor" style="width: 80%;margin: auto;" onchange="this.className=this.options[this.selectedIndex].className">
                                                <option value="Pending" class="pending-class">Pending</option>
                                                <option value="Completed" class="completed-class">Completed</option>
                                                <option value="Delayed" class="delayed-class">Delayed</option>
                                                <option value="" selected="" class="status-class" disabled="true" hidden="true">Status</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Save</button></div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="assetsForViewProject/js/jquery.min.js"></script>
<script src="assetsForViewProject/bootstrap/js/bootstrap.min.js"></script>
<script src="assetsForViewProject/js/forProjectView.js"></script>


