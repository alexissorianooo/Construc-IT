<!DOCTYPE html>
<html class="text-center" lang="en" style="width: 1200px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>createproject</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="pagetitle">
        <h1 class="text-center">Create Project</h1>
    </div>
    <div><a class="btn btn-primary btn-lg" role="button" data-toggle="modal" href="#createProjectModal">Launch Demo Modal</a>
        <div class="modal fade" role="dialog" tabindex="-1" data-toggle="tooltip" data-bss-tooltip="" id="createProjectModal" style="height: 100%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Create Project</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                                <div class="text-center"><button class="btn btn-primary" type="button" style="margin-top: 20px;" onclick="createForm()">Add more activities</button></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Create</button></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/createproject.js"></script>
    <!-- <script>
        $('.openModal').on('click',function(){
            $('.modal-body').load('../Projects/project_arch.php',function(){
                $('#createProjectModal').modal({show:true});
            });
        });
    </script> -->
</body>



</html>