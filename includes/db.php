<!-- for connecting database -->

<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "capstone";


// NOTES
//open up a connection to a database
// procedual php (mysqli)
// mysqli functions

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn){
    die("connection failed: " . mysqli_connect_error());

}