<?php 
 if(isset($_POST["userId"]))
 {
    	$_SESSION["userId"] = $userId;
 }
?>
<script type="text/javascript">
   $("#PIP_MODEL_S").load("functions/userBack.php");
</script>