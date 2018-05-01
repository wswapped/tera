<?php
 if(isset($_POST["thisId2"])&&isset($_POST["edit"])){
 	$thisId = $_POST["thisId2"];
 	$edit = $_POST["edit"];
 	$sql = "UPDATE `carts` 
 	         SET `Quantity` = '$edit' 
 	         WHERE `carts`.`cartId` = $thisId";
 	include("../conne.php");
 	$result = mysqli_query($conn,$sql);
 	if($result){
       ?>
       <script type="text/javascript">
       	  $("#existing").html(loading_small);
          $("#existing").load("htmls/existing.php");
       </script>
       <?php
 	}
 }
 else if(isset($_POST["thisId"])){
 	$thisId = $_POST["thisId"];
      ?>
<form id="EDITCART">
  <div class="form-group">
    <label for="exampleInputEmail1" class="w3-orange"> Enter quantity </label>
    <input class="form-control Nospecial_field required_field" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter Quantity" name="edit">
    <input type="text" name="thisId2" value="<?php echo $thisId?>" style="display: none;">
    <a class="w3-btn w3-orange" href="#" id="CancelBTn"><i class="fa fa-close"></i> cancel </a>
    <a class="w3-btn w3-orange" href="#" id="CHARTBTn"><i class="fa fa-save"></i> save </a>
  </div>
</form>
<script type="text/javascript">
	$("#CHARTBTn").click( function(ckckck){
        ckckck.preventDefault();
        var datasForm = $("#EDITCART").serialize();
        var Quantity = $("#exampleInputEmail1").val();
        $("#EDITDISPLAY<?php echo $thisId ?>").html(loading_small);
        $.post("functions/userfiles/editOrder.php",
        	   datasForm,
        	   function(execute){
        	   	$("#EDITDISPLAY<?php echo $thisId ?>").html(execute);
        	   })

	})
	$("#CancelBTn").click( function(ckckck){
        ckckck.preventDefault();
        $("#EDITDISPLAY<?php echo $thisId ?>").html("");

	})
</script>
      <?php
 }
?>