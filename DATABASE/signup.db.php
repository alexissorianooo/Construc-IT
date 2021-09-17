<?php

//cannot jumpt to certain pages without signing up
if(isset($_POST["submit"])){
    echo "lol it works";
}
else{
    header("location: ../landing-page.php");
}