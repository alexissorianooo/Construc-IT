<?php
include 'db.php';
session_start();

if(isset($_POST["saveButton"])){

    $project_id = $_POST['project_id'];
    $project_name = $_POST['project_name'];
    $select1 = $_POST['SELECT1'];
    $select2 = $_POST['SELECT2'];
    $select3 = $_POST['SELECT3'];
    $select4 = $_POST['SELECT4'];
    $select5 = $_POST['SELECT5'];
    $select6 = $_POST['SELECT6'];
    $select7 = $_POST['SELECT7'];
    $select8 = $_POST['SELECT8'];
    $progressbar =  $_POST['progressbarUPDATE'];
    // $numerator = $_POST['numeratorUPDATE'];
    // $denominator = $_POST['denominatorUPDATE'];

    // echo "<br><br><br>";
    // // echo $select9 = $_POST['SELECT_additional_1'];
    // // echo $select10 = $_POST['SELECT_additional_2'];
    // // echo $select11 = $_POST['SELECT_additional_3'];
    // // echo $select12 = $_POST['SELECT_additional_4'];
    // // echo $select13 = $_POST['SELECT_additional_5'];
    
    

    //SHORT VERSION FOR PC VERSION
    // $selectnum = 8;
    // for ($i=0; $i<5;$i++){
    //     $selectnum++;


    //     if(($_POST['additional_name_'. $i+1])!="empty"){
    //         $select["select".$selectnum] = $_POST['SELECT_additional_'. $i+1];
    //     } else{
    //         $select["select".$selectnum] = "Pending";
    //     }
    //     extract($select);
    // }
    

    //LONG VERSION
    if(($_POST['additional_name_1']!="empty")){
        $select9 = $_POST['SELECT_additional_1'];
    }else{
        $select9 = "empty";
    }
    if(($_POST['additional_name_2']!="empty")){
        $select10 = $_POST['SELECT_additional_2'];
    }else{
        $select10 = "empty";
    }
    if(($_POST['additional_name_3']!="empty")){
        $select11 = $_POST['SELECT_additional_3'];
    }else{
        $select11 = "empty";
    }
    if(($_POST['additional_name_4']!="empty")){
        $select12 = $_POST['SELECT_additional_4'];
    }else{
        $select12 = "empty";
    }
    if(($_POST['additional_name_5']!="empty")){
        $select13 = $_POST['SELECT_additional_5'];
    }else{
        $select13 = "empty";
    }



    // echo "<br>".$select9;
    // echo "<br>".$select10;
    // echo "<br>".$select11;
    // echo "<br>".$select12;
    // echo "<br>".$select13;
    

    //THIS IS FOR PROGRESS BAR
    $counter = $_POST['counter'];
    $denominator = $counter+8;
    $numerator=0;

    
        
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



    require_once 'db.php';
    require_once 'functions.php';

    // if($select1=="Completed" && $select2=="Completed" && $select3=="Completed" && $select4=="Completed" && $select5=="Completed" && $select6=="Completed" && $select7=="Completed" && $select8=="Completed" && $select9=="Completed" && $select10=="Completed" && $select11=="Completed" && $select12=="Completed" && $select13=="Completed"){
    //     completeProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);
    // } 

    if($numerator/$denominator==1){

        completeProject($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);

        // TRAIL PHP SEGMENT

        $trail_user = $_SESSION["user_fullname"];
        $trail_user_type = $_SESSION["usertype_fk"];
        $trail_path = "Project View";
        $trail_action = "Complete project activities ".$project_id.": ".$project_name;
        $trail_date = date('Y-m-d H:i:s');

        recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

        // END OF TRAIL PHP SEGMENT

        header("Location: ../users/Projects/project_arch.php?status=complete");
        exit;
    } 



    updateProjectINC($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13);



    // TRAIL PHP SEGMENT

    $trail_user = $_SESSION["user_fullname"];
    $trail_user_type = $_SESSION["usertype_fk"];
    $trail_path = "Project View";
    $trail_action = "Update project activities ".$project_id.": ".$project_name;
    $trail_date = date('Y-m-d H:i:s');

    recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

    // END OF TRAIL PHP SEGMENT
    
    header("Location: ../users/Projects/view project.php?status=updated");
    exit;
    
}
elseif(isset($_POST["UPLOAD1"])){
    // echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE1';

    echo $filename = $_FILES['FILE1']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE1']['tmp_name'];

    $size = $_FILES['FILE1']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        // echo '
        // <script>
        // alert("Your file extension must be .zip, .pdf, .jpg or .png");
        // location.replace(document.referrer);
        // </script>
        
        // ';
    }
    elseif($_FILES['FILE1']['size']>1000000){
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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename',$size,0)";

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
elseif(isset($_POST["UPLOAD2"])){
    echo 'UPLOAD 2';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE2';

    $filename = $_FILES['FILE2']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE2']['tmp_name'];

    $size = $_FILES['FILE2']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE2']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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

                        // echo 'meron na pong file'
                    }
                }
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD3"])){
    echo 'UPLOAD 3';
    
    $project_id = $_POST['project_id'];
    $filenum = 'FILE3';

    $filename = $_FILES['FILE3']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE3']['tmp_name'];

    $size = $_FILES['FILE3']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE3']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD4"])){
    echo 'UPLOAD 4';
    
    $project_id = $_POST['project_id'];
    $filenum = 'FILE4';

    $filename = $_FILES['FILE4']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE4']['tmp_name'];

    $size = $_FILES['FILE4']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE4']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD5"])){
    echo 'UPLOAD 5';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE5';

    $filename = $_FILES['FILE5']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE5']['tmp_name'];

    $size = $_FILES['FILE5']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE5']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD6"])){
    echo 'UPLOAD 6';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE6';

    $filename = $_FILES['FILE6']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE6']['tmp_name'];

    $size = $_FILES['FILE6']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE6']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD7"])){
    echo 'UPLOAD 7';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE7';

    $filename = $_FILES['FILE7']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE7']['tmp_name'];

    $size = $_FILES['FILE7']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE7']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD8"])){
    echo 'UPLOAD 8';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE8';

    $filename = $_FILES['FILE8']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE8']['tmp_name'];

    $size = $_FILES['FILE8']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE8']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD9"])){
    echo 'UPLOAD 9';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE9';

    $filename = $_FILES['FILE9']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE9']['tmp_name'];

    $size = $_FILES['FILE9']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE9']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD10"])){
    echo 'UPLOAD 10';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE10';

    $filename = $_FILES['FILE10']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE10']['tmp_name'];

    $size = $_FILES['FILE10']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE10']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD11"])){
    echo 'UPLOAD 11';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE11';

    $filename = $_FILES['FILE11']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE11']['tmp_name'];

    $size = $_FILES['FILE11']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE11']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD12"])){
    echo 'UPLOAD 12';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE12';

    $filename = $_FILES['FILE12']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE12']['tmp_name'];

    $size = $_FILES['FILE12']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE12']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["UPLOAD13"])){
    echo 'UPLOAD 13';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE13';

    $filename = $_FILES['FILE13']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE13']['tmp_name'];

    $size = $_FILES['FILE13']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        // echo 'Your file extension must be .zip, .pdf, .jpg or .png';
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        location.replace(document.referrer);
        </script>
        
        ';
    }
    elseif($_FILES['FILE13']['size']>1000000){
        echo 'File is too large';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_project_id'] == $project_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum'";

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

                        // echo 'meron na pong file';\
                    }
                }
            }
            
            $sql3 = "INSERT INTO files_db (files_project_id,files_activity,files_name,files_size,files_downloads) VALUES ('$project_id','$filenum','$filename','$size',0)";

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
elseif(isset($_POST["DOWNLOAD1"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE1';

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

elseif(isset($_POST["DOWNLOAD2"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE2';

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

elseif(isset($_POST["DOWNLOAD3"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE3';

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

elseif(isset($_POST["DOWNLOAD4"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE4';

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
elseif(isset($_POST["DOWNLOAD5"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE5';

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

elseif(isset($_POST["DOWNLOAD6"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE6';

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

elseif(isset($_POST["DOWNLOAD7"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE7';

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

elseif(isset($_POST["DOWNLOAD8"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE8';

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

elseif(isset($_POST["DOWNLOAD9"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE9';

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

elseif(isset($_POST["DOWNLOAD10"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE10';

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

elseif(isset($_POST["DOWNLOAD11"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE11';

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

elseif(isset($_POST["DOWNLOAD12"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE12';

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

elseif(isset($_POST["DOWNLOAD13"])){
    

    $project_id = $_POST['project_id'];
    $filenum = 'FILE13';

    $sql = "SELECT * FROM files_db WHERE files_project_id = '$project_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

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

// TRAIL PHP SEGMENT
require_once 'functions.php';
$trail_user = $_SESSION["user_fullname"];
$trail_user_type = $_SESSION["usertype_fk"];
$trail_path = "Project View";
$trail_action = "Uploaded and downloaded files from project code: " . $project_id;
$trail_date = date('Y-m-d H:i:s');

recordTrail($conn, $trail_user, $trail_user_type, $trail_path, $trail_action, $trail_date);

// END OF TRAIL PHP SEGMENT