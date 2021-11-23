<?php
include 'db.php';
session_start();

if(isset($_POST["saveBUTTON"])){

    require_once 'db.php';
    require_once 'functions.php';

    echo "<br>". $project_id = $_POST['project_id'];
    echo "<br>". $project_name = $_POST['project_name'];
    echo "<br>". $select1 = $_POST['SELECTPM1'];
    echo "<br>". $select2 = $_POST['SELECTPM2'];
    echo "<br>". $select3 = $_POST['SELECTPM3'];
    echo "<br>". $select4 = $_POST['SELECTPM4'];
    echo "<br>". $select5 = $_POST['SELECTPM5'];
    echo "<br>". $select6 = $_POST['SELECTPM6'];
    echo "<br>". $select7 = $_POST['SELECTPM7'];
    echo "<br>". $select8 = $_POST['SELECTPM8'];
    echo "<br>". $select9 = $_POST['SELECTPM9'];
    echo "<br>". $select10 = $_POST['SELECTPM10'];
    echo "<br>". $select11 = $_POST['SELECTPM11'];
    echo "<br>". $select12 = $_POST['SELECTPM12'];
    echo "<br>". $select13 = $_POST['SELECTPM13'];
    echo "<br>". $select14 = $_POST['SELECTPM14'];
    echo "<br>". $select15 = $_POST['SELECTPM15'];
    echo "<br>". $select16 = $_POST['SELECTPM16'];
    echo "<br>". $select17 = $_POST['SELECTPM17'];
    echo "<br>". $select18 = $_POST['SELECTPM18'];
    echo "<br>". $select19 = $_POST['SELECTPM19'];
    echo "<br>". $select20 = $_POST['SELECTPM20'];
    echo "<br>". $select21 = $_POST['SELECTPM21'];

    echo "<br> user id: ".$project_pmSELECTid = $_SESSION["userid"];


    //variables for progress bar
    echo "<br> counter: ".$counter=0;
    
    $numerator=0;

    //for additional activities
    //for input and select
    
    if($_POST['inputPM22']!=null && $_POST['inputPM22']!="empty"){ //check if there is a value for input
        echo "<br> input22: ".$input22=$_POST['inputPM22']; //if there is value, put the value to input variable
        $counter++; //for denominator, progress bar
        $select22 = $_POST['SELECTPM22']; //gets the value from select 
        if($select22=="Completed"){ //checks select if completed for progress bar
            $numerator++; //for progress bar
        }
    }else{
        $input22="empty"; //if there is no value for input, put "empty" value
        $select22 = "Pending";
    }
    if($_POST['inputPM23']!=null && $_POST['inputPM23']!="empty"){
        echo "<br> input23: ".$input23=$_POST['inputPM23'];
        $counter++;
        $select23 = $_POST['SELECTPM23'];
        if($select23=="Completed"){
            $numerator++;
        }
    }else{
        $input23="empty";
        $select23 = "Pending";
    }
    if($_POST['inputPM24']!=null && $_POST['inputPM24']!="empty"){
        echo "<br> input24: ".$input24=$_POST['inputPM24'];
        $counter++;
        $select24 = $_POST['SELECTPM24'];
        if($select24=="Completed"){
            $numerator++;
        }
    }else{
        $input24="empty";
        $select24 = "Pending";
    }

    if($_POST['inputPM25']!=null && $_POST['inputPM25']!="empty"){
        echo "<br> input25: ".$input25=$_POST['inputPM25'];
        $counter++;
        $select25 = $_POST['SELECTPM25'];
        if($select25=="Completed"){
            $numerator++;
        }
    }else{
        $input25="empty";
        $select25 = "Pending";
    }
    if($_POST['inputPM26']!=null && $_POST['inputPM26']!="empty"){
        echo "<br> input26: ".$input26=$_POST['inputPM26'];
        $counter++;
        $select26 = $_POST['SELECTPM26'];
        if($select26=="Completed"){
            $numerator++;
        }
    }else{
        $input26="empty";
        $select26 = "Pending";
    }

    echo "<br> counter after if else: ".$counter;

    // for progress bar
    $denominator = $counter+21;
        
    if($select1=="Completed"){
        $numerator++;
    }
    if($select2=="Completed"){
        $numerator++;
    }
    if($select3=="Completed"){
        $numerator++;
    }
    if($select4=="Completed"){
        $numerator++;
    }
    if($select5=="Completed"){
        $numerator++;
    }
    if($select6=="Completed"){
        $numerator++;
    }
    if($select7=="Completed"){
        $numerator++;
    }
    if($select8=="Completed"){
        $numerator++;
    }
    if($select9=="Completed"){
        $numerator++;
    }
    if($select10=="Completed"){
        $numerator++;
    }
    if($select11=="Completed"){
        $numerator++;
    }
    if($select12=="Completed"){
        $numerator++;
    }
    if($select13=="Completed"){
        $numerator++;
    }
    if($select14=="Completed"){
        $numerator++;
    }
    if($select15=="Completed"){
        $numerator++;
    }
    if($select16=="Completed"){
        $numerator++;
    }
    if($select17=="Completed"){
        $numerator++;
    }
    if($select18=="Completed"){
        $numerator++;
    }
    if($select19=="Completed"){
        $numerator++;
    }
    if($select20=="Completed"){
        $numerator++;
    }
    if($select21=="Completed"){
        $numerator++;
    }

    echo "<br> numerator: ".$numerator;
    echo "<br> denominator: ".$denominator;
    echo "<br> answer: ".$ans = $numerator/$denominator;

    if($numerator/$denominator==1){
        updateProjectPM($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13, $select14, $select15, $select16, $select17, $select18, $select19, $select20, $select21, $select22, $select23, $select24, $select25, $select26, $input22, $input23, $input24, $input25, $input26);
        pmStatusComplete($conn, $project_pmSELECTid);
        projectCompletePM($conn, $project_id);

        // TRAIL PHP SEGMENT

        $trail_user = $_SESSION["user_fullname"];
        $trail_user_type = $_SESSION["usertype_fk"];
        $trail_path = "Project View";
        $trail_action = "Complete project activities ".$project_id.": ".$project_name;
        $trail_date = date('Y-m-d H:i:s');

        recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

        // END OF TRAIL PHP SEGMENT


        header("Location: ../users/Project Manager/pm main.php?status=vacant");
        exit;
    } 

    updateProjectPM($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13, $select14, $select15, $select16, $select17, $select18, $select19, $select20, $select21, $select22, $select23, $select24, $select25, $select26, $input22, $input23, $input24, $input25, $input26);
    pmStatusINC($conn, $project_pmSELECTid);
    projectNOTCompletePM($conn, $project_id);

    // TRAIL PHP SEGMENT

    $trail_user = $_SESSION["user_fullname"];
    $trail_user_type = $_SESSION["usertype_fk"];
    $trail_path = "Project View";
    $trail_action = "Update project activities ".$project_id.": ".$project_name;
    $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT

    header("Location: ../users/Project Manager/pm main.php?status=busy");
    exit;
    
}
elseif(isset($_POST["UPLOAD_PM_1"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_1';

    echo $filename = $_FILES['FILE_PM_1']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_1']['tmp_name'];

    $size = $_FILES['FILE_PM_1']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_1']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}

elseif(isset($_POST["UPLOAD_PM_2"])){
    echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_2';

    echo $filename = $_FILES['FILE_PM_2']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_2']['tmp_name'];

    $size = $_FILES['FILE_PM_2']['size'];

    // if(!in_array($extension,['zip','pdf','png','jpg'])){
    //     echo 'Your file extension must be .zip, .pdf, .jpg or .png';
    //     // echo '
    //     // <script>
    //     // alert("Your file extension must be .zip, .pdf, .jpg or .png");
    //     // location.replace(document.referrer);
    //     // </script>
        
    //     // ';
    // }
    // else
    if($_FILES['FILE_PM_2']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}


elseif(isset($_POST["UPLOAD_PM_3"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_3';

    echo $filename = $_FILES['FILE_PM_3']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_3']['tmp_name'];

    $size = $_FILES['FILE_PM_3']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_3']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_4"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_4';

    echo $filename = $_FILES['FILE_PM_4']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_4']['tmp_name'];

    $size = $_FILES['FILE_PM_4']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_4']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_5"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_5';

    echo $filename = $_FILES['FILE_PM_5']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_5']['tmp_name'];

    $size = $_FILES['FILE_PM_5']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_5']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_6"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_6';

    echo $filename = $_FILES['FILE_PM_6']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_6']['tmp_name'];

    $size = $_FILES['FILE_PM_6']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_6']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_7"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_7';

    echo $filename = $_FILES['FILE_PM_7']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_7']['tmp_name'];

    $size = $_FILES['FILE_PM_7']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_7']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_8"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_8';

    echo $filename = $_FILES['FILE_PM_8']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_8']['tmp_name'];

    $size = $_FILES['FILE_PM_8']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_8']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_9"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_9';

    echo $filename = $_FILES['FILE_PM_9']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_9']['tmp_name'];

    $size = $_FILES['FILE_PM_9']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_9']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_10"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_10';

    echo $filename = $_FILES['FILE_PM_10']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_10']['tmp_name'];

    $size = $_FILES['FILE_PM_10']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_10']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_11"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_11';

    echo $filename = $_FILES['FILE_PM_11']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_11']['tmp_name'];

    $size = $_FILES['FILE_PM_11']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_11']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_12"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_12';

    echo $filename = $_FILES['FILE_PM_12']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_12']['tmp_name'];

    $size = $_FILES['FILE_PM_12']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_12']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_13"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_13';

    echo $filename = $_FILES['FILE_PM_13']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_13']['tmp_name'];

    $size = $_FILES['FILE_PM_13']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_13']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_14"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_14';

    echo $filename = $_FILES['FILE_PM_14']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_14']['tmp_name'];

    $size = $_FILES['FILE_PM_14']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_14']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_15"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_15';

    echo $filename = $_FILES['FILE_PM_15']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_15']['tmp_name'];

    $size = $_FILES['FILE_PM_15']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_15']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_16"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_16';

    echo $filename = $_FILES['FILE_PM_16']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_16']['tmp_name'];

    $size = $_FILES['FILE_PM_16']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_16']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_17"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_17';

    echo $filename = $_FILES['FILE_PM_17']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_17']['tmp_name'];

    $size = $_FILES['FILE_PM_17']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_17']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_18"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_18';

    echo $filename = $_FILES['FILE_PM_18']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_18']['tmp_name'];

    $size = $_FILES['FILE_PM_18']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_18']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_19"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_19';

    echo $filename = $_FILES['FILE_PM_19']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_19']['tmp_name'];

    $size = $_FILES['FILE_PM_19']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_19']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_20"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_20';

    echo $filename = $_FILES['FILE_PM_20']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_20']['tmp_name'];

    $size = $_FILES['FILE_PM_20']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_20']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_21"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_21';

    echo $filename = $_FILES['FILE_PM_21']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_21']['tmp_name'];

    $size = $_FILES['FILE_PM_21']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_21']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_22"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_22';

    echo $filename = $_FILES['FILE_PM_22']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_22']['tmp_name'];

    $size = $_FILES['FILE_PM_22']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_22']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_23"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_23';

    echo $filename = $_FILES['FILE_PM_23']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_23']['tmp_name'];

    $size = $_FILES['FILE_PM_23']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_23']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_24"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_24';

    echo $filename = $_FILES['FILE_PM_24']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_24']['tmp_name'];

    $size = $_FILES['FILE_PM_24']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_24']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_25"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_25';

    echo $filename = $_FILES['FILE_PM_25']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_25']['tmp_name'];

    $size = $_FILES['FILE_PM_25']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_25']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}
elseif(isset($_POST["UPLOAD_PM_26"])){
    //echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_26';

    echo $filename = $_FILES['FILE_PM_26']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE_PM_26']['tmp_name'];

    $size = $_FILES['FILE_PM_26']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE_PM_26']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_project_id = '$project_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                            location.replace(document.referrer);
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads,files_path) VALUES ('$project_id','$filenum','$filename',$size,0,'$destination')";

            if(mysqli_query($conn, $sql3)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
}

elseif(isset($_POST["DOWNLOAD_PM_1"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_1';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_2"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_2';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}

elseif(isset($_POST["DOWNLOAD_PM_3"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_3';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_4"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_4';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_5"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_5';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_6"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_6';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_7"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_7';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_8"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_8';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_9"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_9';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_10"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_10';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_11"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_11';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_12"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_12';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_13"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_13';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_14"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_14';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_15"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_15';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_16"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_16';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_17"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_17';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_18"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_18';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_19"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_19';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_20"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_20';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_21"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_21';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_22"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_22';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_23"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_23';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_24"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_24';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_25"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_25';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}
elseif(isset($_POST["DOWNLOAD_PM_26"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_26';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
          
    //       echo $row['files_name'];
          
    //     }
    // }

    $file = mysqli_fetch_assoc($result);

    echo $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}



elseif(isset($_POST["deleteFile1"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_1';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile2"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_2';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile3"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_3';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile4"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_4';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile5"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_5';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile6"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_6';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile7"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_7';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile8"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_8';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile9"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_9';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile10"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_10';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile11"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_11';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile12"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_12';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile13"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_13';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile14"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_14';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile15"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_15';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile16"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_16';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile17"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_17';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile18"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_18';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile19"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_19';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile20"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_20';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile21"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_21';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile22"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_22';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile23"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_23';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile23"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_23';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile24"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_24';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile25"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_25';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}
elseif(isset($_POST["deleteFile26"])){
    echo 'you\'re deleting huh?';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE_PM_26';

    $sql = "DELETE FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}

























































else{
    echo "what's wrong brother?";
}