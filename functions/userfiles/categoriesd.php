<?php
 include("../conne.php");
 $sql = "SELECT * FROM `categories` ORDER BY `categories`.`id` ASC LIMIT 0,5";
 $sql2 = "SELECT * FROM `categories_2` ORDER BY `categories_2`.`cat_id` ASC LIMIT 0,5";
 $sql3 = "SELECT * FROM `categories_2` ORDER BY `categories_2`.`cat_id` ASC";
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows($result);
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
			?>
			   <a href="#" class="w3-bar-item w3-button"><?php echo $row["name"] ?></a>
			<?php
			}
			?>
	   <a href="#" class="w3-bar-item w3-button"> more </a>
