<?php
   if(isset($_POST["thisId"])){
   	  $thisId = $_POST["thisId"];
   	  $sql = "DELETE FROM `carts` WHERE `carts`.`cartId` = $thisId";
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
?>