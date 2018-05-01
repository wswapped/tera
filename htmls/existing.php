<?php
session_start();
?>
<div class="w3-container w3-win8-blue">
        <?php
            include("../functions/conne.php");
            $userId = $_SESSION["userId"];
            $sql = "SELECT * FROM `teranoba_db`.`carts`
                    INNER JOIN `teranoba_db`.`products`
                    ON `carts`.`productId` = `products`.`productId`
                    WHERE `carts`.`user_id`= $userId
                    ORDER BY `cartId` DESC";
            $result = mysqli_query($conn,$sql);
            $currency = array("RWF","USD");
            $total = 0;
             while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                      ?>
                         <div class="">
                          <h4 onclick="myFunction('Demo<?php echo $row['cartId']; ?>')" class="w3-btn">
                            <img src="<?php echo $row["productIcon"] ?>" class="w3-circle" style="width: 10%; float: left;">
                            <?php echo $row['productName']; ?>
                              <span class="w3-badge w3-win8-orange w3-tiny">
                                <?php echo $row['Quantity'] ?></span>
                            
                          </h4>
                          <div id="Demo<?php echo $row['cartId']; ?>" class="w3-container w3-hide">
                            <button class="w3-button w3-win8-orange ORDEREDIT w3-tiny w3-round-xxlarge" id="ORDERCAN<?php echo $row['cartId']; ?>"><i class="fa fa-pencil"></i> Edit </button>
                            <button class="w3-button w3-win8-orange ORDERDELETE w3-tiny w3-round-xxlarge" id="ORDERCANC<?php echo $row['cartId']; ?>"><i class="fa fa-trash"></i> Delete </button>
                            <div id="EDITDISPLAY<?php echo $row['cartId']; ?>">
                              
                            </div>
                            <?php
                              if(!($row['promotion']==0)){

                            ?>
                            <p> unity price: <?php echo $row['promotion']." ".$currency[$row["currency"]] ; ?>, total price:
                              <?php
                                $total += $row['promotion']*$row['Quantity'];
                               echo $row['promotion']*$row['Quantity']." ".$currency[$row["currency"]]; ?></p>

                              <p><del> unity price: <?php echo $row['productPrice']." ".$currency[$row["currency"]] ; ?>, total price:
                              <?php echo $row['productPrice']*$row['Quantity']." ".$currency[$row["currency"]]; ?></del></p>
                              <?php
                                 }
                                else{
                                  ?>
                                <p> unity price: <?php echo $row['productPrice']." ".$currency[$row["currency"]] ; ?>, total price:
                              <?php
                                $total += $row['productPrice']*$row['Quantity'];
                               echo $row['productPrice']*$row['Quantity']." ".$currency[$row["currency"]]; ?></p>
                                  <?php
                                }
                              ?>
                            <p><i class="fa fa-calendar"></i> <?php echo $row['date']; ?>
                            </p>
                          </div>
                         </div>
                         <script>
                            function myFunction(id) {
                                var x = document.getElementById(id);
                                if (x.className.indexOf("w3-show") == -1) {
                                    x.className += " w3-show";
                                } else { 
                                    x.className = x.className.replace(" w3-show", "");
                                }
                            }
                         </script>
                         <hr>
                      <?php
                    }
              echo "<p> Amount: ".$total." RWF </p>"
        ?>
        <script type="text/javascript">
          $(".ORDEREDIT").click( function(gff){
            gff.preventDefault();
            var thisId = $(this).attr("id");
            thisId = thisId.substring(8,thisId.length);
            $("#EDITDISPLAY"+thisId).html(loading_small);
            $.post("functions/userfiles/editOrder.php",
                   "thisId="+thisId,
                  function(dassERT){
                    $("#EDITDISPLAY"+thisId).html(dassERT);
                  })
          });
          $(".ORDERDELETE").click( function(gff){
            gff.preventDefault();
            var thisId = $(this).attr("id");
            thisId = thisId.substring(9,thisId.length);
            $("#EDITDISPLAY"+thisId).html(loading_small);
            $.post("functions/userfiles/deleteOrder.php",
                   "thisId="+thisId,
                  function(dassERT){
                    $("#EDITDISPLAY"+thisId).html(dassERT);
                  })
          });
        </script>
        </div>