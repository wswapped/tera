<?php
session_start();
include("conne.php");
$ids = $_SESSION['username'];
$sql = "SELECT * FROM `users` WHERE `userId`='$ids'";
$result = mysqli_query($conn,$sql);
if($result){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if(mysqli_num_rows($result) == 1)
       {?>

    <div class="w3-col s4">
      <img src="images/user.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $row["fname"] ;?></strong> <?php echo $row["lname"] ;?> </span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i><span class="w3-badge w3-green">9</span></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-bell"></i><span class="w3-badge w3-green">9</span></a>
    </div>
       	<?php

       }
    }
?>