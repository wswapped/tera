<?php
 include("../functions/conne.php");
 $sql = "SELECT * FROM `projects` ORDER BY `projects`.`news_id` ASC LIMIT 0,5";
 $currency = array("","RWF","USD");
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows($result);
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
      ?>
          <div class="w3-row w3-margin">
              <div class="w3-third">
                <img src="<?php  echo $row["icon"] ?>" style="width:100%;min-height:200px">
              </div>
              <div class="w3-twothird w3-container">
                  <h2><?php  echo $row["title"] ?></h2>
                  <p>
                  <?php  echo $row["contents"] ?>
                  </p>
              </div>
          </div>
<?php
}
?>
