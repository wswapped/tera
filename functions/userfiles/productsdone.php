        <div class="row">
          <div class="col-sm-12" style="padding: 10px">
            <form class="form-inline w3-win8-blue w3-padding-16" id="searchProducts">
              <h3 class="w3-win8-blue" style="display:inline;">
                <button class="w3-btn w3-win8-orange" style="border-radius: 50%" id="BackBtn">
					<i class="fa fa-angle-left"></i>
				</button>
	<?php
	 include("../conne.php");
	 $sql = "SELECT * FROM `products` ORDER BY `products`.`productId`";
	 $sql2 = "SELECT * FROM `products` ORDER BY `products`.`productId`";
	  if(isset($_POST["sdsd"]))
	   {
	    $sdsd = $_POST["sdsd"];
	    if(!($sdsd=="x"))
	    $sql = "SELECT * FROM `products`
	            WHERE `products`.`productCategory` = '$sdsd'
	            ORDER BY `products`.`productId`
	            DESC LIMIT 0,6";
	    $sql2 = "SELECT * FROM `products`
	            WHERE `products`.`productCategory` = '$sdsd'
	            ORDER BY `products`.`productId`";
	   }
	 $currency = array("RWF","USD");
	 $result = mysqli_query($conn,$sql);
	 $result2 = mysqli_query($conn,$sql2);
	 $nums = mysqli_num_rows($result2);
	 ?>

                <?php echo $nums ?> result(s) <span id="categoriesName"></span> 
              </h3>
            </form>
          </div>
        </div>

	</div>
</div>
<div class="row">

		<div class="col-sm-2">
		    <ul class="PIPmuenuBArx w3-win8-orange">
		<?php
		 include("../conne.php");
		 $sql = "SELECT * FROM `categories` ORDER BY `categories`.`id`";
		 $results = mysqli_query($conn,$sql);
		 $nums = mysqli_num_rows($results);
		 while($rows=mysqli_fetch_array($results,MYSQLI_ASSOC))
		            {
					?>
					   <li id="PIPmuenuBAr<?php echo $rows["id"] ?>">
					   	<a href="#" class="w3-button
						   	<?php if($sdsd==$rows["id"]) echo "w3-win8-blue"?>">
						   	<?php echo $rows["name"] ?>
					   	</a>
					   </li>
					<?php
					  if($sdsd==$rows["id"]){
					  	?>
					  	<script type="text/javascript">
					  		$("#categoriesName").html('in <?php echo $rows["name"]?>');
					  	</script>
					  	<?php 
					  }
					}
					?>
		</ul>
		<script type="text/javascript">
			$("ul.PIPmuenuBArx li").click( function(){
				  var sdsd = $(this).attr("id");
				  sdsd = sdsd.substring(11,sdsd.length);
				  $("#pipMainBody").html(loading);
				  $.post("functions/userfiles/productsdone.php",
				  	     "sdsd="+sdsd,
				  	     function(sdsd){
		                    $("#pipMainBody").html(sdsd);
				  	     })
			})
		</script>
		</div>
		<div class="col-sm-10" id="productsD">
		 <?php
		 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		            {
					?>
					<div class="col-sm-4 pipProducts" id="pipProducts<?php echo $row["productId"]?>">
				<div class="panel">
			        <div class="panel-heading w3-win8-blue"><?php echo $row["productName"] ?></div>
			        <div class="panel-body"><img src="<?php echo $row["productIcon"] ?>" class="img-responsive" alt="Image"></div>
			        <div class="panel-footer w3-win8-blue">
			          <b>
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
						          <?php echo $row["notes"] ?>
			        </div>
			    </div>
		    </div>
					<?php
					}
					?>
		</div>
	</div>
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
			$("#BackBtn").click( function(gh){
				 gh.preventDefault();
				 $("#pipNAVHOME").click();
			})
		</script>
