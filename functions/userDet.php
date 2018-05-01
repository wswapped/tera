<div class="w3-dropdown-hover">
<?php
session_start();
$names = $_SESSION["userId"];
$sql2 = "SELECT * FROM `users` WHERE `userId` = '$names'";
$sql3 = "SELECT `shop` FROM `usermessages` ORDER BY `messId` DESC LIMIT 0,1";
include("conne.php");
 $result = mysqli_query($conn,$sql2);
 $result2 = mysqli_query($conn,$sql3);
 $last_cart = mysqli_fetch_array($result2,MYSQLI_ASSOC);
 $last_cart_shop = $last_cart["shop"];
 if($result){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo '<button class="w3-button w3-white"> '.$row["fname"].' <span class="fa fa-user"></span></button>';
?>
<span class="w3-badge realTimeImage"></span>
<div class="w3-dropdown-content w3-bar-block w3-border">
   <a href="#" class="w3-bar-item w3-button" id="userAccount"><i class="fa fa-user"></i> Account </a>
   <a href="#" class="w3-bar-item w3-button" id="messageBTNS">
    <i class="fa fa-envelope"></i> Messages <span class="w3-badge realTimeImage w3-tiny"></span>
   </a>
   <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i> settings </a>
   <a href="#" class="w3-bar-item w3-button" id="logoutBTNS"><i class="fa fa-sign-out"></i> logout </a>          
</div>
<?php
  }
?>
<script type="text/javascript">
	$("#logoutBTNS").click( function(event){
		event.preventDefault();
    $("#pipMainBody").html(loading);
		$("#accountLOG").load("functions/logOUT.php");
	});
  $("#messageBTNS").click( function(ghd){
    ghd.preventDefault();
    $("#pipMainBody").html(loading);
    $.post("functions/userfiles/shopContacts.php",
           "ThisIDDs=<?php echo $last_cart_shop?>",
           function(hjkl){
            $("#pipMainBody").html(hjkl);
           })
  });
  $("#userAccount").click( function(zzz){
    zzz.preventDefault();
    $("#pipMainBody").html(loading);
    $("#pipMainBody").load("functions/userfiles/myaccount.php");
  });
  $.post("functions/userfiles/numberOfmessages.php",
         "userId=<?php echo $names ?>",
         function(numberOfmessages){
            $(".realTimeImage").html(numberOfmessages);
         });
</script>
</div>