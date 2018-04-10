<?php
  include("conne.php");
  $sql = "SELECT * FROM `products` ORDER BY `products`.`productId` ASC LIMIT 0,5";
  $sql2 = "SELECT * FROM `products` ORDER BY `products`.`productId`";
  $result = mysqli_query($conn,$sql);
  $result2 = mysqli_query($conn,$sql2);
  $nums = mysqli_num_rows($result2);
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
  {
?>
    <option value="<?php echo $row["productId"]?>"><?php echo $row["productName"]?></option>
<?php
   }
?>
   <option> see all <?php echo $nums ?> </option>