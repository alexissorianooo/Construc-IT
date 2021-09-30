<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>client view</title>
    <link rel="stylesheet" href="assetsForClientView/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetsForClientView/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assetsForClientView/css/styles.css">
</head>

<body style="width: 1000px;margin: auto;">

<?php include '../../layout/header-client.php' ?>

<br>
<br>
<br>
<br>

    <!-- MODAL WHEN INSERTING PROJECT ID -->
    <div class="modal fade" role="dialog" tabindex="-1" id="client-id-modal" style="border-radius: 24px;margin-top:10%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header bg-dark" style="color: rgb(255,255,255);">
                        <h4 class="modal-title" style="background: url(&quot;../../assets/img/logo3-white.png&quot;) center / contain no-repeat, transparent;width: 123px;height: 65px;"></h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background:white;width:30px;margin-top:17px;"> x </button>                        
                    </div>
                <div class="modal-body text-center bg-dark">
                    <label class="form-label" style="color: white;">Enter Project ID:</label>
                    <input id="projectID" type="text" name=viewProject style="background: rgb(128,145,160);border-radius: 125px;width:200px;">
                </div>
                <div class="modal-footer justify-content-center bg-dark"><button class="btn btn-primary" type="button">Search</button></div>
            </div>
        </div>
    </div>



    <!-- ACTUAL CONTENT OF THE FILE -->
    <section id="header-section">
        <div style="width: 100%;">
            <div class="text-center" style="width: 100%;">
                <h2 style="height: 50px;font-size: 50px;">Modal Title</h2>
            </div>
            <div style="margin-top: 20px;">
                <div class="container" style="margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <p class="text-center">Start Date: asda</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p>Deadline: asda</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p>Architect: asda</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p>Foreman: asda</p>
                        </div>
                    </div>
                </div>
                <div class="progress" style="width: 80%;height: 30px;margin: auto;">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                </div>
            </div>
        </div>
    </section>
    <section id="body-section">
        <div style="margin-bottom: 50px;">
            <h4 class="text-center" style="height: 35px;font-size: 34px;">Architect Activitites</h4>
            <div class="d-inline-flex" style="width: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label class="text-center" style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label class="text-center" style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label class="text-center" style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h4 class="text-center" style="height: 35px;font-size: 34px;">Foreman Activitites</h4>
            <div class="d-inline-flex" style="width: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label class="text-center" style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label class="text-center" style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;">
                            <div class="text-center border rounded border-dark shadow" style="width: 100%;border-color: rgb(0,0,0);padding: 10px;">
                                <p class="text-center text-muted" style="height: 38px;font-size: 25px;">Description </p><label class="text-center" style="width: 100%;height: 38px;">Label</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center" id="footer-section"><button class="btn btn-primary" type="button" style="background: rgb(229,234,239);color: rgb(0,0,0);margin: 10px;border-color: rgb(229,234,239);"><i class="fa fa-arrow-circle-left"></i>&nbsp; Back</button></section>
    
    
    

    
    <script src="assetsForClientView/js/jquery.min.js"></script>
    <script src="assetsForClientView/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>