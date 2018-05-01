<?php
session_start();
if(isset($_SESSION["userId"]))
  {
    
      ?>
      
      <center>
          <button class="w3-button w3-win8-orange" id="addAnOrder">you can order a product here </button>
      </center>
      <div class="col-sm-6">
        <h4 class="w3-win8-orange" style="text-align: center; padding: 10px;">Ordered Products</h4>
        <div id="nonexisting">
          
        </div>
      </div>
      <div class="col-sm-6">
        <h4 class="w3-win8-orange" style="text-align: center; padding: 10px;"> Current Cart</h4>
        <div id="existing">
          
        </div>
      </div>
      <div id="secondMOD">
        
      </div>
        <script type="text/javascript">
          $("#nonexisting").load("htmls/nonexisting.php");
          $("#existing").load("htmls/existing.php");
          $("#addAnOrder").click( function(gfd){
            gfd.preventDefault();
            $("#PIP_MODEL").fadeIn(500);
            $("#PIP_MODEL_S").html(loading);
            $("#PIP_MODEL_S").load("htmls/orderForm.php");
          });
        </script>
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

