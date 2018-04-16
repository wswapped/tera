<ul class="pagination">
<?php
$active = 1;
if(isset($_POST["active"])){
   $active = $_POST["active"];
}
include("../conne.php");
$sql = "SELECT * FROM `products`";
$nums = mysqli_num_rows(mysqli_query($conn,$sql));
$pagination = false;
$numb = $nums%6;
$numbs = ($nums-$numb)/6;
if($nums>6){
	$pagination = true;
}
if($numb>0)
{
	$numbs++;
}
for($gh=0;$gh<$numbs;$gh++)
{
	$current = $gh+1;
?>
    <li class="<?php 
                  if($active==$current) 
                  	echo "disabled"; 
                  else echo "pippAGES"
                  	?>
                  letThis" id="pagesGH<?php echo $current?>">
    	<a href="#"><?php echo $current ?></a>
    </li>
<?php

}

?>
</ul>
<script type="text/javascript">
	$("li.letThis").click( function(ghgh){
		ghgh.preventDefault();
	})
	$("li.pippAGES").click( function(eeee){
		eeee.preventDefault();
		var active = $(this).attr("id");
		active = active.substring(7,active.length);
		$("#productsd").html(loading);
		$.post("functions/userfiles/pagination.php",
			   "active="+active,
			   function(act){
			   	       $("#pagination").html(act);
			   });
		$.post("functions/userfiles/productsd.php",
			   "active="+active,
			   function(act){
			   	      $("#productsd").html(act);
			   });
	});
</script>