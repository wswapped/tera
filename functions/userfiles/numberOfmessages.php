<?php
 if(isset($_POST["userId"])){
 	$userId = $_POST["userId"];
 	$numberOfallMess = "SELECT * FROM `usermessages` WHERE `userId` = '$userId' AND `seen2` = 0";
 	include("../conne.php");
    $result = mysqli_query($conn,$numberOfallMess);
 	$totalN = mysqli_num_rows($result);
 	echo $totalN;
 }
?>