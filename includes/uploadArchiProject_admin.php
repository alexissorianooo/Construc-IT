
<?php
session_start();
include 'db.php';

if(isset($_POST["UPLOAD1"])){
    echo 'UPLOAD 1';

    $project_id = $_POST['project_id'];

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
            $sql = "INSERT INTO files_db (files_project_id,files_name,files_size,files_downloads) VALUES ('$project_id','$filename','$size',0)";
            // $sql = "UPDATE files_db SET files_project_id = '$project_id', files_name = '$filename', files_size = '$size', files_download =  ";


            if(mysqli_query($conn, $sql)){
                echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                location.replace(document.referrer);
                </script>
                ';

            }else{
                echo "Failed to upload";
            }
        }
    }
}
elseif(isset($_POST["UPLOAD2"])){
    echo 'UPLOAD 2';
}
elseif(isset($_POST["UPLOAD3"])){
    echo 'UPLOAD 3';
}
elseif(isset($_POST["UPLOAD4"])){
    echo 'UPLOAD 4';
}
elseif(isset($_POST["UPLOAD5"])){
    echo 'UPLOAD 5';
}
elseif(isset($_POST["UPLOAD6"])){
    echo 'UPLOAD 6';
}
elseif(isset($_POST["UPLOAD7"])){
    echo 'UPLOAD 7';
}
elseif(isset($_POST["UPLOAD8"])){
    echo 'UPLOAD 8';
}
elseif(isset($_POST["UPLOAD9"])){
    echo 'UPLOAD 9';
}
elseif(isset($_POST["UPLOAD10"])){
    echo 'UPLOAD 10';
}
elseif(isset($_POST["UPLOAD11"])){
    echo 'UPLOAD 11';
}
elseif(isset($_POST["UPLOAD12"])){
    echo 'UPLOAD 12';
}
elseif(isset($_POST["UPLOAD13"])){
    echo 'UPLOAD 13';
}else{
    echo 'You pressed download';
}