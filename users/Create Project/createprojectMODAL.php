
<link rel="stylesheet" href="../Create Project/assetsCP/bootstrap/css/bootstrapCP.min.css">
<link rel="stylesheet" href="../Create Project/assetsCP/fonts/font-awesome.min.css">
<link rel="stylesheet" href="../Create Project/assetsCP/css/stylesCP.css">

<div class="modal fade" role="dialog" tabindex="-1" data-toggle="tooltip" data-bss-tooltip="" id="createProjectModal" style="height: 100%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Create Project</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="max-width: 64.31px; max-height: 38px;"><span aria-hidden="true" style="max-width: 16.97px">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">PROJECT MAIN DETAIL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Project Name<input class="form-control" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Deadline<input class="form-control" type="date"></td>
                                        </tr>
                                        <tr>
                                            <td>Project Manager 

                                                <select style="width: 320px;height: 38px;" id="usertype" name="usertypeSELECT">
                                                    <option value="client" selected>Client</option>
                                                    <option value="architect">Architect</option>
                                                    <option value="projectmanager">Project Manager</option>
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
                                            <td class="text-center">Proposal<div class="text-center"><label class="text-left" style="width: 100%;"><input class="form-control form-control-lg d-inline" type="text" id="input_design" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" disabled="" placeholder="Design"><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" id="input_design" type="button" style="height: 53px;width: 67px;color: var(--white);background: transparent;border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_design&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;background: #ffffff;"></i></button></label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Contract Document Phase<div class="text-center"><label class="text-left" style="width: 100%;"><input class="form-control d-inline" type="text" id="input_CPD1" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" placeholder="Architectural Plans" disabled=""><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_CPD1&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;"></i></button></label></div>
                                                <div class="text-center"><label class="text-left" style="width: 100%;"><input class="form-control d-inline" type="text" id="input_CPD2" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" placeholder="Structural Plans" disabled=""><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_CPD2&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;"></i></button></label></div>
                                                <div class="text-center"><label class="text-left" style="width: 100%;max-height: 53px;"><input class="form-control d-inline" type="text" id="input_CPD3" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" placeholder="Mechanical, Electrical, Plumbing, and Fire" disabled=""><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_CPD3&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;"></i></button></label></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Permit Processing<div class="text-center"><label class="text-left" style="width: 100%;"><input class="form-control d-inline" type="text" id="input_PP1" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" placeholder="Barangay Permit" disabled=""><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP1&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;"></i></button></label></div>
                                                <div class="text-center"><label class="text-left" style="width: 100%;"><input class="form-control d-inline" type="text" id="input_PP2" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" placeholder="Zoning Permit" disabled=""><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP2&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;"></i></button></label></div>
                                                <div class="text-center"><label class="text-left" style="width: 100%;"><input class="form-control d-inline" type="text" id="input_PP3" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" placeholder="Bureau of Fire Protection Permit" disabled=""><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP3&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;"></i></button></label></div>
                                                <div class="text-center"><label class="text-left" style="width: 100%;"><input class="form-control d-inline" type="text" id="input_PP4" style="border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px;" placeholder="Local Government Permit" disabled=""><button class="btn btn-primary float-right activityButton" data-toggle="tooltip" data-bss-tooltip="" type="button" style="height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;" onclick="toggleEnable(&#39;input_PP4&#39;)" title="Rename"><i class="fa fa-edit float-right align-items-center align-content-center" style="font-size: 38px;color: #000000;"></i></button></label></div>
                                            </td>
                                        </tr>
                                        <tr id="additional_row">
                                            <td class="text-center" id="additional_cell">Additional</td>
                                        </tr>
                                        <tr id="additional_button">
                                            <td class="text-center" id="additional_cell_button">
                                                <div class="text-center"><button class="btn btn-primary" type="button" style="margin-top: 20px; max-width: 161.83px; max-height: 38px;" onclick="createForm()">Add more activities</button></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button" style="max-width: 64.31px; max-height: 38px;">Close</button><button class="btn btn-primary" type="button" style="max-width: 64.31px; max-height: 38px;">Create</button></div>
                </div>
            </div>
        </div>
<script src="../Create Project/assetsCP/js/jqueryCP.min.js"></script>
<script src="../Create Project/assetsCP/bootstrap/js/bootstrapCP.min.js"></script>
<script src="../Create Project/assetsCP/js/bs-init.js"></script>
<script src="../Create Project/assetsCP/js/createprojectCP.js"></script>