<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["icon"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir .date("Y_m_d_hisa").md5(basename($_FILES["icon"]["name"])).".".$imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["ids"])) {
    $check = getimagesize($_FILES["icon"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . "."; 
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["icon"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
        $idss = $_POST["ids"];
        $fpaths =  date("Y_m_d_hisa").md5(basename($_FILES["icon"]["name"])).".".$imageFileType;
        $PipQ = "UPDATE `vidsandfiles` SET `icon` = '$fpaths' WHERE `vidsandfiles`.`fId` = $idss";
        include('conne.php');
        $result = mysqli_query($conn,$PipQ);
          if($result){
            echo "The file ".$fpaths. " has been uploaded.";
          }
        
          else echo mysqli_error($conn);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>