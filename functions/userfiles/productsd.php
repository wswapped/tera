<?php
 include("../conne.php");
 $sql = "SELECT * FROM `products`";
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows($result);
 $sql = "SELECT * FROM `products` ORDER BY `products`.`productId` DESC LIMIT 0,6";
 if(isset($_POST["active"]))
 {
 	$limits = $_POST["active"];
 	$limits = ($limits-1) * 6;
 	$limits2 = $limits + 6;
 	$sql = "SELECT * FROM
 	        `products` 
 	        ORDER BY `products`.`productId` 
 	        DESC LIMIT $limits,$limits2";
 }
  if(isset($_POST["categorie"]))
 {
 	$limits = $_POST["categorie"];
 	$sql = "SELECT * FROM
 	        `products`
 	        WHERE `products`.`productCategory` = '$limits'
 	        ORDER BY `products`.`productId` DESC LIMIT 0,6";
 }
 $currency = array("RWF","USD");
 $result = mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
            {
			?>
			<div class="col-sm-4 pipProducts" id="pipProducts<?php echo $row["productId"]?>">
				<div class="panel">
			        <div class="panel-heading w3-win8-blue"><?php echo $row["productName"] ?></div>
			        <div class="panel-body"><img src="<?php echo $row["productIcon"] ?>" class="img-responsive" alt="Image"></div>
			        <div class="panel-footer w3-win8-blue">
			          <small><b>
                        <?php
                              if(!($row['promotion']==0)){
                              	?>
			          	<del><?php
                              	echo $row["productPrice"]." ".$currency[$row["currency"]]; ?></del></b><br>
						          <b style="color: #fd8e21"><?php echo $row["promotion"]." ".$currency[$row["currency"]];}
                                else{
                                	?>
                                  <b> <?php echo $row["productPrice"]." ".$currency[$row["currency"]] ?></b>
                                	<?php
                                }

						          ?></b><br>
						          <?php echo $row["notes"] ?></small>
			        </div>
			    </div>
		    </div>
			<?php
			}
			?>
		<script type="text/javascript">
			$(".pipProducts").click( function(argument) {
				argument.preventDefault();
				var thisId = $(this).attr("id");
				thisId = thisId.substring(11,thisId.length);
				$("#PIP_MODEL").fadeIn(500);
                $("#PIP_MODEL_S").html(loading);
                $.post("functions/userfiles/productsone.php",
                	   "cdv="+thisId,
                	   function(result){
                	   	$("#PIP_MODEL_S").html(result);
                	   })
			});

		</script>
