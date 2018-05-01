<div class="col-sm-2">
</div>
<div class="col-sm-8">
<?php
 session_start();
 if(isset($_SESSION["userId"])){
 	$userId = $_SESSION["userId"];
 	$sql = "SELECT * FROM `users` WHERE `userId` = $userId";
 	include("../conne.php");
 	$result = mysqli_query($conn,$sql);
 	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
             ?>
             <div class="w3-card-4">
	                 <div class="w3-container w3-win8-blue <?php echo $align[$row['direction']]?>">
	                    <p>
	                    	<?php echo $row['lname'];?>
	                    	<span class="w3-btn w3-win8-orange w3-tiny w3-round-xxlarge" id="">
	                    	  <i class="fa fa-pencil"></i> Edit 
	                    	</span>
	                    </p>
	                    <p>
	                    	<?php echo $row['fname']; ?>
	                    	<span class="w3-btn w3-win8-orange w3-tiny w3-round-xxlarge" id="">
	                    		<i class="fa fa-pencil"></i> Edit 
	                    	</span>
	                    </p>
	                    <p>
	                    	<?php echo $row['email']; ?>
	                    	<span class="w3-btn w3-win8-orange w3-tiny w3-round-xxlarge" id="">
	                    		<i class="fa fa-pencil"></i> Edit 
	                    	</span>	
	                    </p>
	                    <span class="w3-btn w3-win8-orange w3-tiny w3-round-xxlarge" id="">
	                    	<i class="fa fa-pencil"></i> Edit Password 
	                    </span>	
	                 </div>
	              </div>
             <?php
            }
 }
?>
</div>
<div class="col-sm-2">
</div>