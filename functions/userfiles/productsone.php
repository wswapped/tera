<?php
include("../conne.php");
  if(isset($_POST["cdv"])){
  	$cdv = $_POST["cdv"];
  	$sql = "SELECT * FROM `nobarwanda`.`products`
  	        INNER JOIN `nobarwanda`.`shops`
  	        ON `products`.`shop` = `shops`.`id`
  	        WHERE `products`.`productId`= $cdv";
  	$currency = array("","RWF","USD");
    $result = mysqli_query($conn,$sql);
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
            	?>
            	<div class="col-sm-12">
					<div class="panel">
				        <div class="panel-heading  w3-black"><?php echo $row["productName"] ?>
				        </div>
				        <div class="panel-body">
				        	<img src="<?php echo $row["productIcon"] ?>" class="img-responsive" alt="Image"  style="width: 50%; float: left;">
				        	<p class="w3-black"><?php echo $row["productDescription"] ?></p>
				        	<p>
				        		<b><del><?php echo $row["productPrice"]." ".$currency[$row["currency"]] ?></del></b><br>
						          <b style="color: #f56"><?php echo $row["promotion"]." ".$currency[$row["currency"]] ?></b><br>
						          <i><?php echo $row["notes"] ?></i>
				        	</p>
				        	<div class="w3-pannel w3-bottombar w3-topbar w3-border-black">
				        	  <h5 class="w3-black"><?php echo $row["shopName"] ?></h5>
				        	  <img src="<?php echo $row["shopIcon"] ?>" width="100">
				        		<button class="w3-button w3-black"> 
				        			<i class="fa fa-address-book"></i> 
				        		     contact us
				        	   </button>
				        	</div>
				        	<br>
				        	<button class="w3-button w3-black"> <i class="fa fa-cart-plus"></i> add to cart</button>
				        </div>
				        <div class="panel-footer w3-black">
				        	<div  id="moreMaterials" style="width: 100px; height: 100px"></div>
				        </div>
				    </div>
			    </div>
			    <script type="text/javascript">
			    	$("#moreMaterials").load("functions/userfiles/productsMore.php");
			    </script>
            	<?php
            }
  }
?>