<?php 

echo $_POST['userid'];
?>
<html>


<link rel="stylesheet" href="assets-edituser/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets-edituser/css/styles.css">

    <?php 

        require_once '../../includes/db.php';
        require_once '../../includes/functions.php';
        
        $userID = $_POST['userid'];
        $sql = "SELECT * FROM user_db WHERE userid=$userID";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){

                echo '
                
                        <div class="row" role="dialog" tabindex="-1" id="edituser">
                            <div class="col" role="">
                                <div class="card shadow border-left-warning py-2">
                                    <div class="modal-header">
                                        <h2>Edit User</h2><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 50%;">Full name</label></div>
                                                <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 50%;">Email</label></div>
                                                <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                                            </div>
                                        </div>
                                        <div class="text-center" style="width: 100%;margin-top: 20px;"><button class="btn btn-primary" type="button" data-toggle="modal" role="button" data-target="#changepassModal" data-dismiss="modal">Change Password</button></div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Save</button></div>
                                </div>
                            </div>
                        </div>

                
                ';

            }
        }
    
    
    ?>
                        </div>
                    </div>
                </div>
            </div>
    
    <div class="modal fade" role="dialog" tabindex="-1" id="changepassModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Password</h2><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Enter Current Password</label></div>
                            <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Password</label></div>
                            <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Confirm Password</label></div>
                            <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
</div>
<script src="assets-edituser/js/jquery.min.js"></script>
<script src="assets-edituser/bootstrap/js/bootstrap.min.js"></script>

</html>

        <!-- <link rel="stylesheet" href="assets-edituser/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets-edituser/css/styles.css">


            <div class="modal fade" role="dialog" tabindex="-1" id="edituserModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Edit User</h2><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 50%;">Full name</label></div>
                                    <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 50%;">Email</label></div>
                                    <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                                </div>
                            </div>
                            <div class="text-center" style="width: 100%;margin-top: 20px;"><button class="btn btn-primary" type="button" data-toggle="modal" role="button" data-target="#changepassModal" data-dismiss="modal">Change Password</button></div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Save</button></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="changepassModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Edit Password</h2><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Enter Current Password</label></div>
                                    <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Password</label></div>
                                    <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-6" style="width: 100%;"><label class="col-form-label text-left float-left" style="width: 100%;">Confirm Password</label></div>
                                    <div class="col-md-6"><input type="text" style="width: 100%;height: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Save</button></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets-edituser/js/jquery.min.js"></script>
        <script src="assets-edituser/bootstrap/js/bootstrap.min.js"></script> -->

