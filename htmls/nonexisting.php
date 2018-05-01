<?php
session_start();
            include("../functions/conne.php");
            $userId = $_SESSION["userId"];
            $sql = "SELECT * FROM `orders`
                    WHERE `orders`.`userId`= $userId
                    ORDER BY `ordersId` DESC";
            $result = mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                      $icon = $row['ordersicon'];
                      ?>
                      <div class="w3-card-4">
                         <div class="w3-container w3-win8-blue">
                            <?php
                              if(!empty($icon)){
                                ?>
                            <img src="img/ecommm/<?php echo $icon?>" style="width: 10%; float: left;">
                              <?php
                            }
                            ?>
                            <h2><?php echo $row['orderstitle']; ?></h2>
                            <p><?php echo $row['ordersdesc']; ?></p>
                            <p><i class="fa fa-calendar"></i><?php echo $row['orderDate']; ?></p>
                            <button class="w3-button w3-win8-orange ORDERCANCEL w3-tiny w3-round-xxlarge" id="ORDERCANCEL<?php echo $row['ordersId']; ?>"><i class="fa fa-trash"></i> cancel </button>
                         </div>
                      </div>
                      <br>
                      <?php
                    }
        ?>
        <script type="text/javascript">
          $(".ORDERCANCEL").click( function(ev){
              ev.preventDefault();
              var idVal = $(this).attr("id");
              idVal = idVal.substring(11,idVal.length);
              var r = confirm("this order will be canceled and deleted permanently!");
                if (r == true) {
                    $.post("functions/orderP.php",
                           "cancelTHIS="+idVal,
                           function(datsds,sate){
                               $("#PIP_MODEL_S").html(datsds);
                           })
                } 
          })
        </script>