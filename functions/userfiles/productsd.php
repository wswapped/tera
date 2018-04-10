<?php
 include("../conne.php");
 $sql = "SELECT * FROM `products` ORDER BY `products`.`productId` ASC LIMIT 0,5";
 $sql2 = "SELECT * FROM `categories_2` ORDER BY `categories_2`.`cat_id` ASC LIMIT 0,5";
 $sql3 = "SELECT * FROM `categories_2` ORDER BY `categories_2`.`cat_id` ASC";
 $currency = array("","RWF","USD");
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows($result);
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
			?>
			<div class="col-sm-4 pipProducts" id="pipProducts<?php echo $row["productId"]?>">
				<div class="panel">
			        <div class="panel-heading  w3-win8-blue"><?php echo $row["productName"] ?></div>
			        <div class="panel-body"><img src="img/arduino.jpg" class="img-responsive" alt="Image"></div>
			        <div class="panel-footer w3-win8-blue">
			          <b><del><?php echo $row["productPrice"]." ".$currency[$row["currency"]] ?></del></b><br>
						          <b style="color: #fd8e21"><?php echo $row["promotion"]." ".$currency[$row["currency"]] ?></b><br>
						          <?php echo $row["notes"] ?>
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
			})
		</script>
