<ul class="PIPmuenuBAr w3-win8-orange">
<?php
 include("../conne.php");
 $sql = "SELECT * FROM `categories` ORDER BY `categories`.`id` ASC LIMIT 0,10";
 $sql3 = "SELECT * FROM `categories` ORDER BY `categories`.`id`";
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows(mysqli_query($conn,$sql3));
 ?>
<li id="PIPmuenuBArx"><a href="#"  class="w3-bar-item w3-button"> all </a></li>
 <?php
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
			?>
			   <li id="PIPmuenuBAr<?php echo $row["id"] ?>"><a href="#" class="w3-button"><?php echo $row["name"] ?></a></li>
			<?php
			}
			?>
	   <li id="PIPmuenuBArx"><a href="#" class="w3-button"> more(<?php echo $nums-10; ?>)  </a></li>
</ul>
<script type="text/javascript">
	$("ul.PIPmuenuBAr li").click( function(){
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