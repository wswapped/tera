<?php
session_start();
include("../conne.php");
if(isset($_POST["shop"])){
	$userId = $_SESSION["userId"];
	$shop = $_POST["shop"];
	$contents = $_POST["mess"];
	$sql = "INSERT INTO `usermessages` (`messId`, `userId`, `shop`, `contents`, `messdate`,`direction`)
                      VALUES (NULL, '$userId', '$shop', '$contents', CURRENT_TIMESTAMP,1)";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
    	?>
    	<script type="text/javascript">
    		$("#pipMainBody").html(loading);
    		$.post("functions/userfiles/shopContacts.php",
    			   "ThisIDDs=<?php echo $shop ?>",
    			   function(evydex){
                       $("#pipMainBody").html(evydex);
    			   })
    	</script>
    	<?php
    }
    else echo mysqli_error($conn);
                  }
?>
<?php
 if(isset($_POST["ThisIDDs"])){
 	?>
<div style="padding: 2em;" class="col-sm-8" id="messageLIST">
 	<?php
 	  $userId = $_SESSION["userId"];
 	  $shop = $_POST["ThisIDDs"];
 	  $numberOfallMess = "SELECT * FROM `usermessages` WHERE `userId` = '$userId' AND `shop` = '$shop' ";
 	  $result = mysqli_query($conn,$numberOfallMess);
 	  $totalN = mysqli_num_rows($result);
 	  $totalN2 = $totalN;
 	  if($totalN<3)
 	  	$totalN2 = 0;
 	  else $totalN2 = $totalN-3;

      $sql = "SELECT * FROM `usermessages`
              INNER JOIN `shops` ON `usermessages`.`shop` = `shops`.`id`
              WHERE `userId` = '$userId' AND `shop` = '$shop' 
              ORDER BY `messId` ASC LIMIT $totalN2,$totalN";
      $align = array("w3-left-align","w3-right-align");
      $result = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
            	?>
            	<div class="w3-card-4">
	                 <div class="w3-container w3-win8-blue <?php echo $align[$row['direction']]?>">
	                    <h2><?php if(!$row['direction']) echo $row['shopName']; else echo "you" ?></h2>
	                    <p><?php echo $row['contents']; ?></p>
	                    <p><i class="fa fa-calendar"></i> <?php echo $row['messdate']; ?></p>
	                 </div>
	              </div>
	              <br>
            	<?php
 }
?>
<form class="w3-container w3-win8-blue" id="USERCONTACTS" enctype="multipart/form-data">
	<input type="text" name="shop" value="<?php echo $shop ?>" style="display: none;">
   <label> send message </label> 
   <div id="waitingTHis">
    	</div>
	<textarea style="color: #165388;" class="w3-input Nospecial_field required_field" name="mess">
    </textarea>
    <p>
	<div class="w3-panel w3-red w3-display-container" style="display: none;" id="erroMess">
     <span onclick="this.parentElement.style.display='none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
     <p> </p>
    </div>
      <button class="w3-btn w3-win8-orange w3-tiny w3-round-xxlarge" id="sendMessBTN">
      	<i class="fa fa-paper-plane"></i> send </button>
    </p>
</form>
<script type="text/javascript">
	$("#sendMessBTN").click( function(ete){
                ete.preventDefault();
                var forms = $("#USERCONTACTS").serialize();
                VALIDATING("#USERCONTACTS");
                     if(error_status)
                     {
                        
                        $("#waitingTHis").html(loading_small);
                        $.post("functions/userfiles/shopContacts.php",
                        	   forms,
                        	   function(fgdfa){
                                  $("#waitingTHis").html(fgdfa);
                        	   });
                     }
                     else {
                                    $("#erroMess p").html(error_message);
                                    $("#erroMess").css("display","block");
                                    setTimeout(function(){
                                      $("#erroMess").css("display","none");
                                      error_status = true;
                                    },2000);
                     }
            });
</script>
</div>
<div style="padding: 2em;" class="col-sm-4">
	<?php 
         $sql = "SELECT DISTINCT `shop` FROM `usermessages` WHERE `userId` = '$userId'";
         $result = mysqli_query($conn,$sql);
         $shops = array();
         $isFound = false;
         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
               array_push($shops,$row["shop"]);
               $isFound = true;
            }
        $Construct = "SELECT * FROM `shops` WHERE";
        for($var = 1; $var <= count($shops); $var++){
        	$Construct .= " `id` = '".$shops[$var-1]."' ";
        	if(!($var ==count($shops))){
                 $Construct.=" OR ";
        	}
        }
        if($isFound){
        	$result = mysqli_query($conn,$Construct);
        	?>
           <ul class="w3-ul w3-card-4">
        	<?php
        	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
            	?>
             <li class="w3-bar <?php if($row['id']==$shop) echo "w3-win8-orange" ?> NOBSHOPS" id="NOBSHOPS<?php echo $row['id']?>" style="cursor: pointer;">
		      <img src="<?php echo $row['shopIcon']?>" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
		      <div class="w3-bar-item">
		        <span class="w3-large"><?php echo $row['shopName']?></span>
		      </div>
		    </li>
		    <?php
            }
           ?>
           <script type="text/javascript">
           	  $(".NOBSHOPS").click( function(dfdg){
           	  	dfdg.preventDefault();
           	  	var ThisIDDs = $(this).attr("id");
           	  	$("#pipMainBody").html(loading);
           	  	ThisIDDs = ThisIDDs.substring(8,ThisIDDs.length);
           	  	$.post("functions/userfiles/shopContacts.php",
           	  		   "ThisIDDs="+ThisIDDs,
           	  		   function(hjjh){
           	  		   	 $("#pipMainBody").html(hjjh);
           	  		   })
           	  })
           </script>
         </ul>
           <?php
        }
	?>
  
</div>
<?php
}
?>