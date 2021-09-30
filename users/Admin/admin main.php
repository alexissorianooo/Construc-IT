<?php
session_start();

echo "<br>".$_SESSION["user_fullname"]; 
echo "<br>".$_SESSION["user_email"];
echo "<br>".$_SESSION["usertype_fk"];


echo "<br>"."hello, welcome at admin";
?>
