<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets-audit/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets-audit/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets-audit/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets-audit/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets-audit/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: var(--warning);">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="admin-page.php">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span style="color: rgb(0,0,0);">ADMIN&nbsp;</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="admin-page.php"><span
                                style="border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;color: rgb(0,0,0);"><i
                                    class="fas fa-tachometer-alt" style="color: rgb(172,135,43);"></i>User
                                Profiles</span></a>
                        <a class="nav-link" data-bss-hover-animate="pulse" href="admin-audit.php"><i class="fas fa-user"
                                style="color: rgb(0,0,0);"></i><span style="color: rgb(0,0,0);">Audit Trail</span></a>
                    </li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="login.html"
                            style="color: rgba(0,0,0,0.8);"><i class="far fa-user-circle"
                                style="color: rgba(0,0,0,0.3);"></i><span
                                style="color: rgba(0,0,0,0.8);">Logout</span></a></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"></div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    <h1><strong>AUDIT&nbsp;TRAIL&nbsp;</strong></h1>
                    <div class="row">
                        <div class="col">
                            <a href="admin-audit.php" style="text-decoration: none">
                                <div class="card shadow border-left-warning py-2" data-bss-hover-animate="pulse">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                    <span>USER TYPE</span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0"><span>NAME OF
                                                        USER</span></div>
                                            </div>
                                        </div><span>AUDIT TRAIL UPDATE</span>
                                        <div></div><span id="time-date">TIME AND DATE&nbsp;</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php include '../../layout/footer.php' ?>
    <script src="assets-audit/js/jquery.min.js"></script>
    <script src="assets-audit/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-audit/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets-audit/js/theme.js"></script>
</body>

</html>