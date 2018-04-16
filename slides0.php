<?php
 include("functions/conne.php");
 $sql = "SELECT * FROM `products` ORDER BY `products`.`productId` DESC LIMIT 0,3";
 if(isset($_POST["sdsd"]))
   {
    $sdsd = $_POST["sdsd"];
    $sql = "SELECT * FROM `products`
            WHERE `products`.`productCategorie` = '$sdsd' 
            ORDER BY `products`.`productId` 
            DESC LIMIT 0,3";
   }
 $currency = array("","RWF","USD");
 $result = mysqli_query($conn,$sql);
 $nums = mysqli_num_rows($result);
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php
          $count = 0;
          while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
      ?>
      <div class="item <?php if($count<1) echo "active"?>">
        <div  class="w3-win8-orange">
          <h3> <?php echo $row["productName"] ?></h3>
          <p><?php echo $row["notes"] ?></p>
        </div>
        <img src="<?php echo $row["productIcon"] ?>"
             alt="<?php echo $row["productName"] ?>"
             title="<?php echo $row["productName"] ?>"
             style="width:100%;">
      </div>
      <?php
           $count++;
            }
      ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>