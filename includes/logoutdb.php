<?php

session_start();

// FOR TRAIL SOON!
// require_once 'dbhTrail.inc.php';
// require_once 'functions.inc.php';

// $trailuser = $_SESSION["username"];
// $trailusertype = $_SESSION["usertype"];
// $trailpath = "Logout";
// $trailaction = "Logged out";
// $traildate = date('Y-m-d H:i:s');

// recordTrail($conn, $trailuser, $trailusertype, $trailpath, $trailaction);


require_once 'db.php';
require_once 'functions.php';
// TRAIL PHP SEGMENT

$trail_user = $_SESSION["user_fullname"];
$trail_user_type = $_SESSION["usertype_fk"];
$trail_path = "Logout";
$trail_action = "Logged Out";
$trail_date = date('Y-m-d H:i:s');

recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

// END OF TRAIL PHP SEGMENT

session_unset();
session_destroy();

header("location: ../landing-page.php");
exit();
