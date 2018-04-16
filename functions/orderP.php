<?php
session_start();
include("conne.php");
if(isset($_POST['cancelTHIS'])){
    $delId = $_POST['cancelTHIS'];
    $PIP_query = "DELETE FROM `orders` WHERE `orders`.`ordersId` = $delId";
        $delete = mysqli_query($conn,$PIP_query);
        if($delete){
            ?>
            order canceled successfully!!
             <script type="text/javascript">
               $("#pipNAVORDER").click();
             </script>
            <?php
        }
        else echo mysqli_error($conn);
        
}
if(isset($_POST['Title']))
{
  $withImage = false;
  if(isset($_FILES["icon"])&&($_FILES["icon"]["name"]!=""))
     {$withImage = true;}
  else {$withImage = false;}
    
    if (!$db_selected) {
        die ('Can\'t use this : ' . mysqli_error($conn));
    }
    else {
        $Title = $_POST['Title'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $userId = $_SESSION["userId"];
        // To protect from MySQL injection

        $Title = stripslashes($Title);
        $quantity = stripslashes($quantity);
        $description = stripslashes($description);

            $Title = mysqli_real_escape_string($conn,$Title);
            $quantity = mysqli_real_escape_string($conn,$quantity);
            $description = mysqli_real_escape_string($conn,$description);
        $PIP_query = "INSERT INTO `orders` (`ordersId`,`orderstitle`,`ordersquantity`,`ordersdesc`,`userId`,`orderDate`) VALUES (NULL, '$Title','$quantity','$description','$userId',now())";
        $save = mysqli_query($conn,$PIP_query);
        if($save&&$withImage)
          {
            $idd = mysqli_insert_id($conn);
            $target_dir = "../img/ecommm/";
            $target_file = $target_dir . basename($_FILES["icon"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $target_file = $target_dir .date("Y_m_d_hisa").md5(basename($_FILES["icon"]["name"])).".".$imageFileType;
            $check = getimagesize($_FILES["icon"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . "."; 
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
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
            }
            else {
                  if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                      $fpaths =  date("Y_m_d_hisa").md5(basename($_FILES["icon"]["name"])).".".$imageFileType;
                      $PipQ = "UPDATE `orders` SET `ordersicon` = '$fpaths' WHERE `orders`.`ordersId` = $idd";
                      $result = mysqli_query($conn,$PipQ);
                        if($result){
                          ?>
                              image uploaded
                               <script type="text/javascript">
                                 $("#pipNAVORDER").click();
                               </script>
                        <?php
                        }
                        else echo mysqli_error($conn);
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
              }
          }
        else if(!$save) echo "not done".mysqli_error($conn)."</br>".$PIP_query;
        else if($save){
          ?>
          done with out images
             <script type="text/javascript">
               $("#pipNAVORDER").click();
             </script>
          <?php
        }
        }
    }  
?>