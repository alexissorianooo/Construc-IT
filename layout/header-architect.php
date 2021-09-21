<!-- FOR KNOWING WHO IS THE CURRENT USER -->
<?php
  session_start();
?>

<link rel="icon" href="../../assets/img/logo3-white.png">

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand nav-link js-scroll-trigger" href="../../users/Architect/architect main.php"
            style="background: url(&quot;../../assets/img/logo3-white.png&quot;) center / contain no-repeat, transparent;width: 162px;height: 55px;margin-top: 0px;color: rgb(254, 209, 54);"></a>
        </a>
        <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
            type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <!-- NAVIGATION LINKS -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto text-uppercase">
                <!-- DI PA NAREREAD YUNG SA PROJECTS -->
                <li class="nav-item"><a class="nav-link js-scroll-trigger" data-toggle="modal"
                        href="#createProjectModal">Create Project</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger"
                        href="../../users/Projects/project_arch.php">Projects</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger"
                        href="../../users/CE/estimator try.php">ESTIMATOR</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#item1">Message</a></li>
                <li class="nav-item"><a class="nav-link" href="../../includes/logoutdb.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>