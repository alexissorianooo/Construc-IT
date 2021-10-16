
<?php
session_start();
include 'db.php';

if(isset($_POST["UPLOAD1"])){
    echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];
    $filenum = 'FILE1';

    $filename = $_FILES['FILE1']['name'];
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['FILE1']['tmp_name'];

    $size = $_FILES['FILE1']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
        echo 'Your file extension must be .zip, .pdf, .jpg or .png';
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
}else{
    echo 'You pressed download';
}