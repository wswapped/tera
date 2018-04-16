<?php
session_start();
if(isset($_SESSION["userId"]))
  {
    include("../functions/conne.php");
    $userId = $_SESSION["userId"];
      ?>
      <div>
        <?php
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
                            <button class="w3-button w3-red ORDERCANCEL" id="ORDERCANCEL<?php echo $row['ordersId']; ?>"><i class="fa fa-trash"></i> cancel </button>
                         </div>
                      </div>
                      <br>
                      <?php
                    }
        ?>
      </div>
        <center>
          <div class="w3-container" style="width:50%">
            <div class="w3-card-4">
              <div class="w3-container w3-win8-orange">
                <h2> add an order </h2>
              </div>

              <form class="w3-container" id="OrdersForm">
                <p>
                <label> Title </label>
                <input class="w3-input Nospecial_field required_field" type="text" name="Title">
                </p>
                <p>
                <label> quantity </label>    
                <input class="w3-input" type="number" name="quantity">
                </p>
                <p>
                <p>  
                <label> description </label> 
                <textarea class="w3-input Nospecial_field required_field" name="description"></textarea>
                </p>

                <p>  
                <input type="file" class="w3-input" name="icon">
                <label> upload a pictures </label> 
                </p>
                <div class="w3-panel w3-red w3-display-container" style="display: none;" id="erroMess">
                     <span onclick="this.parentElement.style.display='none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                     <p> </p>
                </div>
                <p>
                  <button class="w3-btn w3-win8-orange" id="sendOrderBTN"> send </button>
                </p>
                <br>
                <br>
                <br>
              </form>
            </div>
          </div>
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
                } else {
                    $("#pipNAVORDER").click();
                }
          })
            $("#sendOrderBTN").click( function(ete){
                ete.preventDefault();
                VALIDATING("#OrdersForm");
                     if(error_status)
                     {
                        
                        $("#PIP_MODEL_S").html(loading);
                        var formData = new FormData($("#OrdersForm")[0]);
                        $.ajax({
                            url: "functions/orderP.php",
                            type: 'POST',
                            data: formData,
                            async: false,
                            success: function( datss, sta){
                                  $("#PIP_MODEL_S").html(datss);
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                     }
                     else {
                                    $("#erroMess p").html(error_message);
                                    $("#erroMess").css("display","block");
                                    setTimeout(function(){
                                      $("#erroMess").css("display","none");
                                      error_status = true;
                                    },2000);
                     }
            })
          </script>
        </center>
<?php

    }
    else
    {
      ?>
       <script type="text/javascript">
          $("#userDets").click();
       </script>
      <?php
    }

?>
