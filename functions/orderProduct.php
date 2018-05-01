<?php
session_start();
if(isset($_SESSION['userId'])){
 if (isset($_POST["cv"])) {
      $cdv = $_POST["cv"];
      if(isset($_POST["q"])){
      	$Quantity = $_POST["q"];
      	$userId = $_SESSION['userId'];
      	$sql = "INSERT INTO `carts` (`cartId`,`productId`,`user_id`,`Quantity`,`date`) 
      	        VALUES (NULL,'$cdv','$userId','$Quantity',CURRENT_TIMESTAMP)";
      	include("conne.php");
      	$result = mysqli_query($conn,$sql);
      	if($result){
      		?>
           <h4 class="w3-orange" style="text-align: center; padding: 10px;">
           	<i class="fa fa-home"></i> this products has been added to the cart.</h4>
           <button class="w3-button  w3-blue" id="viewCart"><i class="fa fa-cart"></i> view cart </button>
           <script type="text/javascript">
           	  $("#viewCart").click( function(def){
           	  	def.preventDefault();
           	  	$("#pipNAVORDER").click();
                $("#closePIP_MODEL").click();
           	  })
           </script>
      		<?php
      	}
      }
      else{
?>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1" class="w3-orange"> Enter quantity </label>
    <input class="form-control Nospecial_field required_field" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter Quantity" name="email">
    <a class="w3-btn w3-orange" href="#" id="CHARTBTn"> Order </a>
  </div>
</form>
<script type="text/javascript">
	$("#CHARTBTn").click( function(ckckck){
        ckckck.preventDefault();
        var Quantity = $("#exampleInputEmail1").val();
        $.post("functions/orderProduct.php",
        	   "cv=<?php echo $cdv?>&q="+Quantity,
        	   function(exe){
        	   	$("#ORDERDISPLAY").html(exe);
        	   })

	})
</script>
<?php
}
}
}
else
    {
      ?>
       <script type="text/javascript">
          $("#userDets").click();
       </script>
      <?php
    }
?>