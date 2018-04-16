<?php
include("../conne.php");
if(isset($_POST['search']) && $_POST['search']!=""){
    $data = mysqli_real_escape_string($conn,$_POST['search']);
    $keyword =  trim(preg_replace('/\s+/',' ',$data));
    $sql = "SELECT * 
            FROM `products` 
            WHERE `productName` LIKE '%$keyword%'
            OR `productDescription` LIKE '%$keyword%'
            limit 10";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    $currency = array("","RWF","USD");
    ?>
        <div class="col-sm-12">
			<h3 class="w3-win8-blue" style="text-align: center;"><?php echo $count ?> result(s) found</h3>
		</div>
    <?php
    	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
            {
			?>
			<div class="col-sm-4 pipProducts" id="pipProducts<?php echo $row["productId"]?>">
				<div class="panel">
			        <div class="panel-heading w3-win8-blue"><?php echo $row["productName"] ?></div>
			        <div class="panel-body"><img src="<?php echo $row["productIcon"] ?>" class="img-responsive" alt="Image"></div>
			        <div class="panel-footer w3-win8-blue">
			          <b><del><?php echo $row["productPrice"]." ".$currency[$row["currency"]] ?></del></b><br>
						          <b style="color: #fd8e21"><?php echo $row["promotion"]." ".$currency[$row["currency"]] ?></b><br>
						          <?php echo $row["notes"] ?>
			        </div>
			    </div>
		    </div>
			<?php
			}
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