

<?php


// --------------------------------------------------------- FOR SIGNUP ------------------------------------------------------------

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
  $usercodeforAdmin = "admin";
  $result;

  if (($usertype === "architect" && $usercode === $usercodeforArchitect) || ($usertype === "projectmanager" && $usercode === $usercodeforProjectmanager) || ($usertype === "admin" && $usercode === $usercodeforAdmin)){
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

// -------------------------------------------------------- FOR LOGIN -----------------------------------------------------

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
    $_SESSION["userid"] = $emailExist["userid"];
    $_SESSION["user_fullname"] = $emailExist["user_fullname"];
    $_SESSION["user_email"] = $emailExist["user_email"];
    $_SESSION["usertype_fk"] = $emailExist["usertype_fk"];

    if($_SESSION["usertype_fk"] == "architect"){
      header("location: ../users/Projects/project_arch.php");
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
    if($_SESSION["usertype_fk"] == "admin"){
      header("location: ../users/Admin/admin-page.php");
      exit();
    }
    
  }
}

// ------------------------------------- CREATE PROJECT -----------------------------------------------------

function createProject($conn, $project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_clientSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8, $project_input9, $project_input10, $project_input11, $project_input12, $project_input13){
  // project name exist
  // project deadline exist
  // deadline should not overlap

  //Mobilization
  $project_input_pm_1 = "Defining the points of the site";
  $project_input_pm_2 = "Setting up signages and borders for safety";
  $project_input_pm_3 = "Setting up of temporary electrical, plumbing services";
  // FOUNDATION WORKS
  $project_input_pm_4 = "Excavation";
  $project_input_pm_5 = "Footing and Column works";
  $project_input_pm_6 = "Rebars";
  $project_input_pm_7 = "Frameworks";
  $project_input_pm_8 = "Concrete pouring";
  $project_input_pm_9 = "Concrete curing";
  $project_input_pm_10 = "Backfill";
  //Architectural/Structural works
  $project_input_pm_11 = "Columns on floors above ground";
  $project_input_pm_12 = "Beams";
  $project_input_pm_13 = "Slabs (Flooring)";
  $project_input_pm_14 = "Concrete Hollow Blocks Walls";
  $project_input_pm_15 = "Doors and Windows";
  $project_input_pm_16 = "MEPF Roughing ins";
  $project_input_pm_17 = "Waterproofing";
  $project_input_pm_18 = "Roofing Works";
  //Finishing Works
  $project_input_pm_19 = "Tiles";
  $project_input_pm_20 = "Painting Works";
  $project_input_pm_21 = "Fixtures";
  


  $sql = "INSERT INTO project_db (project_name, project_startdate, project_deadline, project_architect, project_pm, project_client, project_activity_Architect_1, project_activity_Architect_2, project_activity_Architect_3, project_activity_Architect_4, project_activity_Architect_5, project_activity_Architect_6, project_activity_Architect_7, project_activity_Architect_8, project_activity_additional_Architect_1, project_activity_additional_Architect_2, project_activity_additional_Architect_3, project_activity_additional_Architect_4, project_activity_additional_Architect_5, project_activity_PM_1, project_activity_PM_2, project_activity_PM_3, project_activity_PM_4, project_activity_PM_5, project_activity_PM_6, project_activity_PM_7, project_activity_PM_8, project_activity_PM_9, project_activity_PM_10, project_activity_PM_11, project_activity_PM_12, project_activity_PM_13, project_activity_PM_14, project_activity_PM_15, project_activity_PM_16, project_activity_PM_17, project_activity_PM_18, project_activity_PM_19, project_activity_PM_20, project_activity_PM_21) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  //should be 40 columns
  $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../users/Projects/project_arch.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssssssss", $project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_clientSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8, $project_input9, $project_input10, $project_input11, $project_input12, $project_input13, $project_input_pm_1, $project_input_pm_2, $project_input_pm_3, $project_input_pm_4, $project_input_pm_5, $project_input_pm_6, $project_input_pm_7, $project_input_pm_8, $project_input_pm_9, $project_input_pm_10, $project_input_pm_11, $project_input_pm_12, $project_input_pm_13, $project_input_pm_14, $project_input_pm_15, $project_input_pm_16, $project_input_pm_17, $project_input_pm_18, $project_input_pm_19, $project_input_pm_20, $project_input_pm_21);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    

}


function pmStatus($conn, $project_pmSELECTid){
  $sql = "UPDATE user_db SET user_status = 'Busy' WHERE userid = $project_pmSELECTid";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);

  
}

function clientStatus($conn, $project_clientSELECTid){
  $sql = "UPDATE user_db SET user_status = 'Occupied' WHERE userid = $project_clientSELECTid";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);

  header("location: ../users/Projects/project_arch.php?error=noneFROMclientStatus");
  exit();
}

function emptyInputcreate($project_name, $project_startdate, $project_deadline, $project_architect, $project_pmSELECT, $project_clientSELECT, $project_input1, $project_input2, $project_input3, $project_input4, $project_input5, $project_input6, $project_input7, $project_input8){
  $result;
  if(empty($project_name) || empty($project_startdate) || empty($project_deadline) || empty($project_architect) || empty($project_pmSELECT) || empty($project_clientSELECT) || empty($project_input1) || empty($project_input2) || empty($project_input3) || empty($project_input4) || empty($project_input5) || empty($project_input6) || empty($project_input7) || empty($project_input8)){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

//  -------------------------------------------------------------  FOR PROJECT VIEW ---------------------------------------------------------------------

function updateProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13){
  
  $progressbar = ($numerator / $denominator)*100;
  $roundvalue = round($progressbar);
  // $roundvalue = 10;
  
  $sql = "UPDATE project_db SET project_status_Architect_1 = '$select1', project_status_Architect_2 = '$select2', project_status_Architect_3 = '$select3', project_status_Architect_4 = '$select4', project_status_Architect_5 = '$select5', project_status_Architect_6 = '$select6', project_status_Architect_7 = '$select7', project_status_Architect_8 = '$select8', project_status_additional_Architect_1 = '$select9', project_status_additional_Architect_2 = '$select10', project_status_additional_Architect_3 = '$select11', project_status_additional_Architect_4 = '$select12', project_status_additional_Architect_5 = '$select13', project_progress_architect = '$roundvalue' WHERE project_id = $project_id";
  $stmt = mysqli_stmt_init($conn);

  
  mysqli_query($conn, $sql);
  

  mysqli_close($conn);
  header("Location: ../users/Projects/project_arch.php?error=none");
  exit;


}

function updateProjectINC($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13){
  $sql = "UPDATE project_db SET project_status_fk = 'Not Complete' WHERE project_id = $project_id";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);
  
  updateProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);
}


function completeProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13){
  $datecomplete = date('Y-m-d');
  $sql = "UPDATE project_db SET project_status_fk = 'Complete', project_completed = '$datecomplete' WHERE project_id = $project_id";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);
  
  updateProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);
}

// --------------------------------- FOR PROJECT MANAGER (FOREMAN) PROJECT UPDATE AND VIEW -------------------------------------

function updateProjectPM($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13, $select14, $select15, $select16, $select17, $select18, $select19, $select20, $select21, $select22, $select23, $select24, $select25, $select26, $input22, $input23, $input24, $input25, $input26){
  $progressbar = ($numerator / $denominator)*100;
  $roundvalue = round($progressbar);

  $sql = "UPDATE project_db SET project_status_PM_1 = '$select1', project_status_PM_2 = '$select2', project_status_PM_3 = '$select3', project_status_PM_4 = '$select4', project_status_PM_5 = '$select5', project_status_PM_6 = '$select6', project_status_PM_7 = '$select7', project_status_PM_8 = '$select8', project_status_PM_9 = '$select9', project_status_PM_10 = '$select10', project_status_PM_11 = '$select11', project_status_PM_12 = '$select12', project_status_PM_13 = '$select13', project_status_PM_14 = '$select14', project_status_PM_15 = '$select15', project_status_PM_16 = '$select16', project_status_PM_17 = '$select17', project_status_PM_18 = '$select18', project_status_PM_19 = '$select19', project_status_PM_20 = '$select20', project_status_PM_21 = '$select21', project_status_PM_22 = '$select22', project_status_PM_23 = '$select23', project_status_PM_24 = '$select24', project_status_PM_25 = '$select25', project_status_PM_26 = '$select26', project_activity_PM_22 = '$input22', project_activity_PM_23 = '$input23', project_activity_PM_24 = '$input24', project_activity_PM_25 = '$input25', project_activity_PM_26 = '$input26', project_progress_PM = '$roundvalue' WHERE project_id = $project_id";
  $stmt = mysqli_stmt_init($conn);

  
  mysqli_query($conn, $sql);
  
  
  
}

function pmStatusComplete($conn, $project_pmSELECTid){
  $sql = "UPDATE user_db SET user_status = 'Vacant' WHERE userid = $project_pmSELECTid";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);

  
}

function projectCompletePM($conn, $project_id){
  $datecomplete = date('Y-m-d');
  $sql = "UPDATE project_db SET project_status_fk_PM = 'Complete', project_completed_PM = '$datecomplete' WHERE project_id = $project_id";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);

  header("Location: ../users/Project Manager/pm main.php?status=vacant");
  exit;
}

function pmStatusINC($conn, $project_pmSELECTid){
  $sql = "UPDATE user_db SET user_status = 'Busy' WHERE userid = $project_pmSELECTid";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);

  
}

function projectNOTCompletePM($conn, $project_id){
  $datecomplete = "";
  $sql = "UPDATE project_db SET project_status_fk_PM = 'Not Complete', project_completed_PM = '$datecomplete' WHERE project_id = $project_id";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);

  header("Location: ../users/Project Manager/pm main.php?status=busy");
  exit;
}

// -------------------------------------------  FOR ADMIN -----------------------------------------------------

function createUserforClient($conn, $usertype, $email, $fullname, $password, $project_archiSELECT){
  $sql = "INSERT INTO user_db (usertype_fk, user_email, user_fullname, user_password, architect_assigned) VALUES (? ,? ,?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../landing-page.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssss", $usertype, $email, $fullname, $hashedPwd, $project_archiSELECT);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  echo '<script type="text/javascript">
  window.history.go(-2);
  </script>';

}


function edituser_admin($conn,  $user_fullname, $user_email, $userid){
  $sql = "UPDATE user_db SET user_fullname = '$user_fullname', user_email = '$user_email' WHERE userid = $userid";
  $stmt = mysqli_stmt_init($conn);
  mysqli_query($conn, $sql);

  echo '<script type="text/javascript">
  var page = window.history.go(-1);
  window.location.reload(page);
  </script>';
}

function passVerify($oldpass, $userid){
$sql = "SELECT user_password FROM user_db WHERE userid = $userid";
$stmt = mysqli_stmt_init($conn);

$result = mysqli_query($conn, $sql);
    
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){

    }
  }

  
}