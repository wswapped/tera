
<?php
 include("../conne.php");
 $sql = "SELECT * FROM `categories` ORDER BY `categories`.`id` ASC LIMIT 0,5";
 $sql3 = "SELECT * FROM `categories` ORDER BY `categories`.`id`";
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows(mysqli_query($conn,$sql3));
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
			?>
			   <a href="#" 
			      class="w3-bar-item w3-button SORTBYCAT W3333"
			      id="SORTBYCAT<?php echo $row["id"] ?>"><?php echo $row["name"] ?></a>
			<?php
			}
			?>
	   <a href="#" class="w3-bar-item w3-button W3333"> all (<?php echo $nums ?>) </a>
	   <script type="text/javascript">
	   	$(".W3333").click( function(ddf){
	   	  	ddf.preventDefault();
	   	  })
	   	  $(".SORTBYCAT").click( function(ddf){
	   	  	var ids = $(this).attr("id");
	   	    ids = ids.substring(9,ids.length);
	   	    $("#productsd").html(loading);
	   	    $.post("functions/userfiles/productsd.php",
	   	    	    "categorie="+ids,
	   	    	    function(dass){
	   	    	    	$("#productsd").html(dass)
	   	    	    })
	   	  })
	   </script>