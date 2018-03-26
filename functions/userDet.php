<div class="w3-dropdown-hover">
<?php
session_start();
$names = $_SESSION["userId"];
$sql2 = "SELECT * FROM `users` WHERE `userId` = '$names'";
include("conne.php");
 $result = mysqli_query($conn,$sql2);
 if($result){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo '<button class="w3-button  w3-white"> '.$row["fname"].' <span class="fa fa-user"></span></button>';
?>
<div class="w3-dropdown-content w3-bar-block w3-border">
   <a href="#" class="w3-bar-item w3-button"> Account </a>
   <a href="#" class="w3-bar-item w3-button"> cart </a>
   <a href="#" class="w3-bar-item w3-button"> settings </a>
   <a href="#" class="w3-bar-item w3-button" id="logoutBTNS"> logout </a>          
</div>
<?php
  }
?>
<script type="text/javascript">
	$("#logoutBTNS").click( function(event){
		event.preventDefault();
		$("#accountLOG").load("functions/logOUT.php");
	})
</script>
</div>