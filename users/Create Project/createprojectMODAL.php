<?php
// require_once '../../includes/db.php';
// require_once '../../includes/functions.php';
// echo "<script type='text/javascript'>alert('ERROR STATEMENT');</script>";
?>


<link rel="stylesheet" href="../Create Project/assetsCP/bootstrap/css/bootstrapCP.min.css">
<link rel="stylesheet" href="../Create Project/assetsCP/fonts/font-awesome.min.css">
<link rel="stylesheet" href="../Create Project/assetsCP/css/stylesCP.css">

<div class="modal fade" role="dialog" tabindex="-1" data-toggle="tooltip" data-bss-tooltip="" id="createProjectModal" style="height: 100%;">
<div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: ivory;">
        <section class="sec">
            <div class="modal-header">
                <h3 class="center">Create Project</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="max-width: 64.31px; max-height: 38px;">
                    <span aria-hidden="true" style="max-width: 16.97px">×</span>
                </button>
            </div>
        </section>
        <div class="modal-body">
            <form method="post" action="../../includes/createproject.php">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">PROJECT MAIN DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="lefttext">Project Name<input class="form-control" type="text" style="margin: 0px; padding-top: 2px; border-width: 2px; border-color: darkslategray;" name="project_name"></td>
                                    </tr>
                                    <tr>
                                        <td class="lefttext">Start Date<input class="form-control" type="date" style="margin: 0px; padding-top: 2px; border-width: 2px; border-color: darkslategray;" name="project_startdeadline"></td>
                                    </tr>
                                    <tr>
                                        <td class="lefttext">Deadline<input class="form-control" type="date" style="margin: 0px; padding-top: 2px; border-width: 2px; border-color: darkslategray;" name="project_enddeadline"></td>
                                    </tr>
                                    <tr>
                                        <td>Project Manager 

                                            <select style="width: 320px;height: 38px; border-width: 2px; border-color: darkslategray;" id="usertype" name="project_pmSELECT">
                                                <option disabled selected>--Available Project Managers--</option>
                                                <?php
                                                    
                                                    $servername = "localhost";
                                                    $dbusername = "root";
                                                    $dbpassword = "";
                                                    $dbname = "capstone";

                                                    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

                                                    if (!$conn){
                                                        die("connection failed: " . mysqli_connect_error());

                                                    }

                                                    $sql = "SELECT user_fullname FROM user_db WHERE usertype_fk = 'projectmanager';";
                                                    $stmt = mysqli_stmt_init($conn);

                                                    if (!mysqli_stmt_prepare($stmt, $sql)){
                                                    echo "<script type='text/javascript'>alert('ERROR STATEMENT');</script>";
                                                    }

                                                    $records = mysqli_query($conn, $sql);

                                                    while($data = mysqli_fetch_array($records)){
                                                            echo "<option value'". $data['user_fullname']."'>" .$data['user_fullname']."</option>";
                                                    }
                                                    mysqli_close($conn);


                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Architect Activities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td class="lefttext">Proposal<div class="text-center"><label class="text-left" style="width: 100%; padding-top: 2px">
                                            <input class="form-control form-control-lg d-inline" type="text" id="input_design" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px" value="Design" name="project_input1">
                                            <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" id="input_design" type="button" style="height: 53px;width: 67px;color: var(--white);background: transparent;border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_design&#39;)" title="Rename">
                                            <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;background: #ffffff;">
                                            </i></button> -->
                                            </label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="lefttext">Contract Document Phase
                                            <div class="text-center">
                                                <label class="text-left" style="width: 100%; padding-top: 2px">
                                                <input class="form-control d-inline" type="text" id="input_CPD1" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px" value="Architectural Plans"  name="project_input2">
                                                <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_CPD1&#39;)" title="Rename">
                                                <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;">
                                                </i></button> -->
                                                </label></div>
                                            <div class="text-center">
                                                <label class="text-left" style="width: 100%;">
                                                <input class="form-control d-inline" type="text" id="input_CPD2" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px" value="Structural Plans"  name="project_input3">
                                                <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_CPD2&#39;)" title="Rename">
                                                <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;">
                                                </i></button> -->
                                                </label></div>
                                            <div class="text-center">
                                                <label class="text-left" style="width: 100%;max-height: 53px;">
                                                <input class="form-control d-inline" type="text" id="input_CPD3" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px" value="Mechanical, Electrical, Plumbing, and Fire" name="project_input4">
                                                <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_CPD3&#39;)" title="Rename">
                                                <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;">
                                                </i></button> -->
                                                </label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="lefttext">Permit Processing
                                            <div class="text-center">
                                                <label class="text-left" style="width: 100%; padding-top: 2px">
                                                <input class="form-control d-inline" type="text" id="input_PP1" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px;" value="Barangay Permit"  name="project_input5">
                                                <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP1&#39;)" title="Rename">
                                                <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;">
                                                </i></button> -->
                                                </label></div>
                                            <div class="text-center">
                                                <label class="text-left" style="width: 100%;">
                                                <input class="form-control d-inline" type="text" id="input_PP2" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px" value="Zoning Permit" name="project_input6">
                                                <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP2&#39;)" title="Rename">
                                                <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;">
                                                </i></button> -->
                                                </label></div>
                                            <div class="text-center">
                                                <label class="text-left" style="width: 100%;">
                                                <input class="form-control d-inline" type="text" id="input_PP3" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px" value="Bureau of Fire Protection Permit"  name="project_input7">
                                                <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP3&#39;)" title="Rename">
                                                <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;">
                                                </i></button> -->
                                                </label></div>
                                            <div class="text-center">
                                                <label class="text-left" style="width: 100%;">
                                                <input class="form-control d-inline" type="text" id="input_PP4" style="border-width: 2px; border-color: darkslategray;color: rgb(0,0,0);max-width: 95%;height: 52px; margin: 0px" value="Local Government Permit"  name="project_input8">
                                                <!-- <button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP4&#39;)" title="Rename">
                                                <i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;">
                                                </i></button> -->
                                                </label></div>
                                        </td>
                                    </tr>
                                    <tr id="additional_row">
                                        <td class="text-center" id="additional_cell">Additional</td>
                                    </tr>
                                    <tr id="additional_button">
                                        <td class="text-center" id="additional_cell_button">
                                            <div class="text-center">
                                                <button class="btn btn-primary" type="button" style="margin-top: 20px; max-width: 161.83px; max-height: 38px;" onclick="createForm()">Add more activities</button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal" type="button" style="max-width: 80.31px; max-height: 38px; color:white; background: #007bff">Close</button>
                    <button class="btn btn-primary" type="submit" style="max-width: 80.31px; max-height: 38px; color:white; background: #007bff" name="createButton">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../Create Project/assetsCP/js/jqueryCP.min.js"></script>
<script src="../Create Project/assetsCP/bootstrap/js/bootstrapCP.min.js"></script>
<script src="../Create Project/assetsCP/js/bs-init.js"></script>
<script src="../Create Project/assetsCP/js/createprojectCP.js"></script>