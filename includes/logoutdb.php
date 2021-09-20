<?php

//session_start();

// FOR TRAIL SOON!
// require_once 'dbhTrail.inc.php';
// require_once 'functions.inc.php';

// $trailuser = $_SESSION["username"];
// $trailusertype = $_SESSION["usertype"];
// $trailpath = "Logout";
// $trailaction = "Logged out";
// $traildate = date('Y-m-d H:i:s');

// recordTrail($conn, $trailuser, $trailusertype, $trailpath, $trailaction);

session_unset();
session_destroy();

header("location: ../landing-page.php");
exit();
