<?php
 include("../conne.php");
 $sql = "SELECT * FROM `products` ORDER BY `products`.`productId` ASC LIMIT 0,3";
 $currency = array("RWF","USD");
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows($result);
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
			?>
			<div class="col-sm-4" style="margin-left: 5em">
				<div class="pipProducts" id="pipProducts<?php echo $row["productId"]?>">
					<div class="w3-panel">
				        <div class="w3-win8-blue"><?php echo $row["productName"] ?></div>
				        <div class="">
				        	<img src="<?php echo $row["productIcon"] ?>" class="img-responsive" alt="Image"></div>
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
