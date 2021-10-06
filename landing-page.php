<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Construc - IT</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="icon" href="assets/img/logo3-white.png">
    <link rel="stylesheet" href="assets/css/restyle.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="page-top">

    <?php require 'layout/header.php' ?>

    


    <!-- LOGO WITH WELCOME LABELS -->
    <header class="masthead" style="background: url(&quot;assets/img/wallpaper1.jpg&quot;); background-size: cover; margin-top: 60px;">
        <div class="container">            
            <div class="intro-text" id="home" style="margin-top:-20px;">
            <div class="col-lg-12 text-center">
                <div class="intro-heading text-uppercase" style="font-size:120px; font-weight:500px; color:orange; -webkit-text-stroke: 2.5px; -webkit-text-stroke-color: #000;">
                     <span class="intro-T">CONSTRUC-IT</span> 
                </div>    
            </div>
                <div class="intro-lead-in ">
                    <h4>
                        <div class="col-lg-12 text-center">                        
                            <span class="intro-M" style="display: inline-block;"> 
                                QUALITY PLANNING - EFFICIENT MANAGING - ACCURATE TRACKING                         
                            </span>
                        </div>
                    </h4>
                </div>        
            </div>
        </div>
    </header>

    <!-- FOR ERROR NOTIFICATIONS -->
    <div class="errornotif">
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Invalid input. Fill all fields</p></div>";
                }
                elseif ($_GET["error"] == "passwordnotmatch") {
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Passwords do not match</p></div>";
                }
                elseif ($_GET["error"] == "emailtaken") {
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Email taken. Try different email.</p></div>";
                }
                elseif ($_GET["error"] == "stmtfailed") {
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Something went wrong! Please try again.</p></div>";
                }
                elseif ($_GET["error"] == "invalidusercode") {
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Invalid Usercode.</p></div>";
                }
                elseif ($_GET["error"] == "wronglogin") {
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Wrong Email/Password</p></div>";
                }
                elseif ($_GET["error"] == "emailnotexist") {
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Email does not exist.</p></div>";
                }
                elseif ($_GET["error"] == "none") {
                    echo "<div style='text-align: center; background-color:#2ad5a4; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p>Congratulations! You are signed up!</p></div>";
                }
                //NEWLY ADDED
                elseif ($_GET["error"] == "pattern") {                
                    echo "<div style='text-align: center; background-color:#D82753; margin-bottom: 0px; padding-bottom: 16px; color: white; font-size: 30px;'><p><br>Password must contain atleast 8 characters with one number, special character, small and capital letters.</p></div>";
                }
            }            
        ?>
    </div>

        <!-- LOGO WITH WELCOME LABELS FROM CAPSTONE TESTER 
        <header class="masthead" style="background: url(&quot;assets/img/wallpaper1.jpg&quot;); background-size: cover; margin-top: 60px;">
        <div class="container">            
            <div class="intro-text" id="home" style="margin-top:-20px;">

                <div class="intro-heading text-uppercase">
                     <span style="font-size:120px; font-weight:500px; color:orange; -webkit-text-stroke: 2.5px; -webkit-text-stroke-color: #000;">CONSTRUC IT</span> 
                </div>    

                <div class="intro-lead-in ">
                    <h4>                        
                        <span class="intro-M"> 
                            QUALITY PLANNING, EFFICIENT MANAGING, ACCURATE TRACKING                         
                        </span>
                    </h4>
                </div>        
            </div>
        </div>
    </header>
    -->



    <!-- DEVELOPERS -->
    <section class="bg-dark" id="team">
    <div class="container" style="color:white;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase">Development Team</h2>
                <h3 class="text-muted section-subheading">The People Behind The Scenes</h3>
            </div>
        </div>   
        <div class="row" >
            <div class="col-sm-6">
                <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/pakalu.jpg"/>
                    <h4>Alexis Soriano</h4>
                    <p>May Jowa #1</p>
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://twitter.com/AlexisSorianooo" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://web.facebook.com/alexis.j.soriano" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://ph.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/pakalu.jpg" />
                    <h4>Thomas Broñola</h4>
                    <p>Single #1</p>
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://twitter.com/bronolathomas" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://web.facebook.com/thomas.bronola/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://ph.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/pakalu.jpg" />
                    <h4>Eris Lacsamana</h4>
                    <p class="text-secondary">Single #2</p>
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://twitter.com/LaczFeli" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://web.facebook.com/Laczie" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://ph.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/pakalu.jpg" />
                    <h4>Perf John Gomera</h4>
                    <p class="text-muted">May Jowa #2</p>
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://twitter.com/theperfgomera" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://web.facebook.com/perf.gomera" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://ph.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>





    <!-- ABOUT THE PROJECT -->
    <section class="masthead" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">About</h2>
                    <h3 class="text-muted section-subheading">The Inspiration to Develop</h3>
                </div> 
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group timeline">

                        <!-- FIRST CIRLCE -->
                        <li class="list-group-item">                            
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Filler</h4>
                                    <h4 class="subheading">Filler</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Filler</p>
                                </div>
                            </div>
                        </li>

                        <!-- SECOND CIRCLE -->
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Filler</h4>
                                    <h4 class="subheading">Filler</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Filler</p>
                                </div>
                            </div>
                        </li>

                        <!-- THIRD CIRCLE -->
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Filler</h4>
                                    <h4 class="subheading">Filler</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Filler</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Filler</h4>
                                    <h4 class="subheading">Filler</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Filler</p>
                                </div>
                            </div>
                        </li>

                        <!-- PRESENT CIRCLE  -->
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image">
                                <h4 style="color:black;"><br>Filler</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--The Construc-IT Pages 
    <section class="py-5" id="c-it" style="background-color: #343a40;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase" style="color: white; padding-bottom:20px; -webkit-text-stroke:1px;">Join Us! Use Construc-IT Now!</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="simple-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <section id="accomplishments"></section>
                                <div class="swiper-slide" style="background: url(&quot;assets/img/a9aecfcd0c474899a57da07176a929c4.jpg&quot;) center center / cover no-repeat;"></div>
                                <div class="swiper-slide" style="background: url(&quot;assets/img/sk2.jpg&quot;) center center / cover no-repeat;"></div>
                                <div class="swiper-slide" style="background: url(&quot;assets/img/sk3.jpg&quot;) center center / cover no-repeat;"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- Construc-IT Pages Auto Slideshow -->
    <section class="bg-dark" id="c-it" style="padding-top: 30px; padding-bottom: 10px">
        <div>
            <h2 class="text-uppercase" style="color: white; padding-bottom:20px; -webkit-text-stroke:1px; text-align:center">Join Us! Use Construc-IT Now!</h2>
        </div>
        <div id="slideshow">
            <div>
                <img src="assets/img/sk1.jpg">
            </div>
            <div>
                <img src="assets/img/xb.jpg">
            </div>
            <div>
                <img src="assets/img/sk4.jpg">
            </div>
            <div>
                <img src="assets/img/sk2.jpg">
            </div>
        </div>
    </section>



    <?php require_once 'layout/footer.php' ?>

    






    <!-- LOGIN MODAL -->
    <div class="modal fade portfolio-modal" role="dialog" tabindex="-1" id="las-modal" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container" >
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body" style="margin-top:-40px;">
                                <button id="btn-close" data-dismiss="modal" class="close">
                                    <span aria-hidden="true">×</span>
                                </button>

                                <h4 style="background: url(&quot;assets/img/logo3.png&quot;) center / contain no-repeat, transparent;width: 123px;height: 65px;"></h4>
                                <h2 class="text-uppercase">LOGIN</h2>
                                <p class="text-muted item-intro" style="font-size: 13px;margin-top: -22px;">No account?
                                    <span id="reg-link" data-toggle="modal" data-target="#reg-modal" data style="color: var(--blue); cursor:pointer;">&nbsp;Sign up&nbsp;</span>
                                    <label>here</label>
                                </p>

                                <form action="includes/logindb.php" method="post">
                                    <div class="d-inline-block">                                    
                                        <input type="email" id="email" placeholder="Email" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="email">
                                        <br><br>
                                        <input type="password" id="password" placeholder="Password" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="password">
                                        <br> <br>
                                        <!-- <input type="text" id="proj-id" placeholder="Project ID" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;"> -->
                                        <a class="text-center d-block" id="forgot-password" href="#" style="color:blue;border-color: var(--blue);">&nbsp;Forgot Your Password?</a>                                
                                        <br>                            
                                        <button class="btn bg-info" type="submit" name="loginButton">Login</button>                                    
                                    </div>  
                                </form>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
   <!-- SIGN UP MODAL -->
   <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="reg-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">   
                <div class="container" >
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <button data-dismiss="modal" class="close">
                                    <span aria-hidden="true">×</span>
                                </button>

                                <h4 style="background: url(&quot;assets/img/logo3.png&quot;) center / contain no-repeat, transparent;width: 123px;height: 65px;"></h4>
                                <h2 class="text-uppercase">REGISTER</h2>
                                <div class="d-inline-block">

                                    
                                        
                                        <div id="usertype2">
                                            <form action="includes/signupdb.php" method="post">

                                                <!-- FOR USER TYPE OPTIONS -->
                                                <select style="width: 280px;height: 38px;" id="usertype" name="usertypeSELECT">
                                                    <option class="text-center" disabled selected>--Select Usertype--</option>
                                                    <option value="architect" >Architect</option>
                                                    <option value="projectmanager">Project Manager</option>
                                                    <option value="admin">Admin</option>
                                                </select>

                                                <br><br>
                                                
                                                <input required type="email" id="email" placeholder="Email" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="email">
                                                <br> <br>  
                                                <input required type="text" id="fullname" placeholder="Full Name" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="fullname">                                            
                                                <br> <br>  
                                                <input required type="password" id="password" placeholder="Password" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="password">                                                                 
                                                <br> <br>                                
                                                <input required type="password" id="confirm-password" placeholder="Confirm Password" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="confirm-password">                                                                                                             
                                                <br> <br>
                                                
                                                <!-- FOR ARCHITECT AND PM (code at js)-->

                                                <div style="" id="usertype1" ><input type="text" id="user-code" placeholder="User Code" style="border-style:none; border-bottom-style:solid;border-bottom-color:black;" name="usercode">                                                                 
                                                </div>
                                                <br> <br>   

                                                <button class="btn bg-info" type="submit" name="registerButton">Register</button>
                                            </form>
                                        </div>
                                                                                                    
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    
    

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/Auto-Slider.js"></script>

    <!-- FOR REGISTER SCRIPT -->
    
    <script src="assets/js/register.js"></script>
</body>

</html>