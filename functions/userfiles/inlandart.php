<ul class="w3-ul w3-card-4"> 
<?php
   include("../conne.php");
   $sql = "SELECT * FROM `projects` ORDER BY `projects`.`news_id` ASC LIMIT 0,5";
   $result = mysqli_query($conn,$sql);
	 $nums = mysqli_num_rows($result);
	 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	            {
?> 
	<li class="w3-bar">
		<a href="#">
	  <img src="<?php  echo $row["icon"] ?>"
	       class="w3-bar-item w3-circle w3-hide-small"
	       style="width: 85px">
	  <div class="w3-bar-item">
	    <span class="w3-large w3-tooltip"><?php  echo $row["title"] ?>
	      <span style="position: absolute; left: 0; bottom: 5px;" class="w3-text w3-tag w3-small w3-win8-blue">
	      	<small>
	      	<?php  echo $row["subtitle"] ?>
	      	</small>
	      </span>
	    </span>
	  </div>
	</a>
	</li>
	<?php
	           }
	?>
</ul>