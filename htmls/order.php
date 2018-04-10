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
                    WHERE `orders`.`userId`= $userId";
            $result = mysqli_query($conn,$sql);
             while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                      ?>
                      <div class="w3-card-4">
                         <div class="w3-container w3-win8-blue">
                            <h2><?php echo $row['orderstitle']; ?></h2>
                            <p><?php echo $row['ordersdesc']; ?></p>
                            <p><i class="fa fa-calendar"></i><?php echo $row['orderDate']; ?></p>
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
                <input type="file" name="file" class="w3-input" name="icon">
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
            $("#sendOrderBTN").click( function(ete){
                ete.preventDefault();
                VALIDATING("#OrdersForm");
                     if(error_status)
                     {
                        var saveThis = $("#OrdersForm").serialize();
                        $("#PIP_MODEL_S").html(loading);
                        $.post("functions/orderP.php",
                                saveThis,
                                function( datss, sta){
                                  $("#PIP_MODEL_S").html(datss);
                                })
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

