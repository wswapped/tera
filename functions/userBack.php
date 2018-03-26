<?php
session_start();
if (isset($_SESSION['userId']))  
{
    ?>
     <script>
        $("#accountLOG").load("functions/userDet.php");
        $("#closePIP_MODEL").click();
        $("#pipMainBodyWhole").fadeIn(500);
    </script>
    <?php
}
else  {
	?>
       <script type="text/javascript">
       	  $("#closePIP_MODEL").click();
          $("#pipMainBodyWhole").fadeIn(500);
       </script>
	<?php
}
?>