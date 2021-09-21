<link rel="icon" href="../../assets/img/logo3-white.png">

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand nav-link js-scroll-trigger" href="../../users/Architect/architect main.php" style="background: url(&quot;../../assets/img/logo3-white.png&quot;) center / contain no-repeat, transparent;width: 162px;height: 55px;margin-top: 0px;color: rgb(254, 209, 54);"></a>      </a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <?php
            session_start();

                // REASON FOR SEPARATION:
                // PROJECT LINK CONNECTS TO DIFFERENT PROJRECT PAGES
                // ARCHITECT PROJECT PAGE IS DIFFERENT FROM PROJECT MANAGER
                // ARCHITECT OPEN THE PROJECT TAB - OPENS PROJECT PAGE WITH COMPILATION OF ONGOING PROJECTS
                // PROJECT MANAGER OPEN THE PROJECT TAB - OPENS THE SPECIFIC PROJECT ASSIGNED TO

                if($_SESSION["usertype_fk"] == "projectmanager"){
                    echo  
                    '<!-- NAVIGATION LINKS -->
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto text-uppercase">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../users/Projects/project_arch.php">Projects</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../users/CE/estimator try.php">ESTIMATOR</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Message</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../includes/logoutdb.php">LOGOUT</a></li>
                        </ul>
                    </div>';
                    
                }

                if($_SESSION["usertype_fk"] == "architect"){
                    echo  
                    '<!-- NAVIGATION LINKS -->
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto text-uppercase">
                            <li class="nav-item openModal"><a class="nav-link js-scroll-trigger" data-toggle="modal" href="#createProjectModal">Create Project</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../users/Projects/project_arch.php">Projects</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../users/CE/estimator try.php">ESTIMATOR</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Message</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../includes/logoutdb.php">LOGOUT</a></li>
                        </ul>
                    </div>';
                }
                 
                echo 
                    "<script>
                        src='../../assets/js/header-estimator.js';
                    
                    </script>";
                
            ?>
        </div>
        
    </nav>
    <?php include '../../users/Create Project/createprojectTrash.php'; ?>

    