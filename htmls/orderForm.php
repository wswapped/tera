<div class="w3-win8-blue">
<div class="w3-card-4">
  <div class="w3-container w3-win8-orange">
    <h2> add an order </h2> 
  </div>

  <form class="w3-container" id="OrdersForm15" enctype="multipart/form-data">
    <p>
    <label> Title </label>
    <input name="Title" style="color: #165388;" class="w3-input Nospecial_field required_field" type="text">
    </p>
    <p>
    <label> quantity </label>    
    <input   style="color: #165388;" class="w3-input" type="number" name="quantity">
    </p>
    <p>  
    <label> description </label> 
    <textarea   style="color: #165388;" class="w3-input Nospecial_field required_field" name="description">
      
    </textarea>
    </p>
    <div class="w3-panel w3-red w3-display-container" style="display: none;" id="erroMess">
         <span onclick="this.parentElement.style.display='none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
         <p> </p>
    </div>
    <p>
      <button class="w3-btn w3-win8-orange w3-tiny w3-round-xxlarge" id="sendOrderBTN"><i class="fa fa-paper-plane"></i> send </button>
      <span class="w3-btn w3-win8-orange w3-tiny w3-round-xxlarge" id="closeOrderBTN"><i class="fa fa-close"></i> cancel </span>
    </p>
    <br>
    <br>
    <br>
  </form>
</div>
<script type="text/javascript">
            $("#sendOrderBTN").click( function(ete){
                ete.preventDefault();
                var forms = $("#OrdersForm15").serialize();
                VALIDATING("#OrdersForm15");
                     if(error_status)
                     {
                        $("#PIP_MODEL_S").html(loading);
                        $.post("functions/orderP.php",
                               forms,
                               function(dssfe){
                                  $("#PIP_MODEL_S").html(dssfe);
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
            });
            $("#closeOrderBTN").click( function(etc){
              etc.preventDefault();
              $("#closePIP_MODEL").click();
            })
          </script>
</div>