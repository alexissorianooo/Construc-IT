<!-- FOR ERROR FUNCTIONS -->

<?php

function emptyInputSignup($email, $fullname, $password, $password2){
  $result;
  if (empty($email) || empty($fullname) || empty($password) || empty($password2)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function pwdMatch($password, $password2){
    $result;
    if ($password !== $password2) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

function emailExist($conn, $email){
    $sql = "SELECT * FROM user_db WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../signup.php?error=stmtfailed");
      exit();
    }
  
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
  
    $resultData = mysqli_stmt_get_result($stmt);
  
    if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
    }
    else {
      $result = false;
      return $result;
    }
  
    mysqli_stmt_close($stmt);
}

function empAccount($usercode, $usertype){
  $usercodeforArchitect = "architect";
  $usercodeforProjectmanager = "projectmanager";
  $result;

  if (($usertype === "architect" && $usercode === $usercodeforArchitect) || ($usertype === "projectmanager" && $usercode === $usercodeforProjectmanager)){
    $result = true;
  }
  else{
    $result == false;
  }
  return $result;
}

function createUser($conn, $usertype, $email, $fullname, $password){
    $sql = "INSERT INTO user_db (usertype_fk, user_email, user_fullname, user_password) VALUES (? ,? ,?, ?);";
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../landing-page.php?error=stmtfailed");
      exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $usertype, $email, $fullname, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../landing-page.php?error=none");
    exit();
  
}


// FOR LOGIN MODULE

function emptyInputlogin($email,$password){
  $result;
  if (empty($email) || empty($password)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $email, $password){
  $emailExist = emailExist($conn, $email);

  if ($emailExists === false) {
    header("location: ../landing-page.php?error=emailnotexist");
    exit();
  }

  $pwdHashed = $emailExist["user_password"];
  $checkPwd = password_verify($password, $pwdHashed);

  if ($checkPwd === false) {
    header("location: ../landing-page.php?error=wronglogin");
    exit();
  }
  elseif ($checkPwd === true) {
    session_start();
    $_SESSION["user_fullname"] = $emailExist["user_fullname"];
    $_SESSION["user_email"] = $emailExist["user_email"];
    $_SESSION["usertype_fk"] = $emailExist["usertype_fk"];

    if($_SESSION["usertype_fk"] == "architect"){
      header("location: ../users/Architect/architect main.php");
      exit();
    }
    if($_SESSION["usertype_fk"] == "projectmanager"){
      header("location: ../users/Project Manager/pm main.php");
      exit();
    }
    if($_SESSION["usertype_fk"] == "client"){
      header("location: ../users/Client/client main.php");
      exit();
    }
    
  }
}