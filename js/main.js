var loading = new Image();
loading.src = "img/loader.gif";
loading.style.width = "60%";
$(document).ready( function(){
  $("#functionsDiv1").load("functions/userBack.php");
      
     
      $("#userDets").click( function( dfdf){
        dfdf.preventDefault();
        $("#PIP_MODEL").fadeIn(500);
        $("#PIP_MODEL_S").html(loading);

        $.post("htmls/login.html",
              "vv=bb",
              function(allTheLight){
                 $("#PIP_MODEL_S").html(allTheLight);
              });
      });
      $("#closePIP_MODEL").click( function(closePIP_MODEL){
          closePIP_MODEL.preventDefault();
          $("#PIP_MODEL").fadeOut(500);
        $("#PIP_MODEL_S").html("");
      });
    $("#pipMainBody").html(loading);
    $("#pipMainBody").load("htmls/home.html");
    $("#pipNAVHOME").click( function(){
          $("#pipMainBody").html(loading);
          $.post("htmls/home.html",
           "cc=cc",
           function(elseII){
              $("#pipMainBody").html(elseII);
           });
        })
    $("#pipNAVPROJECTS").click( function(){
          $("#pipMainBody").html(loading);
          $.post("htmls/projects.php",
           "cc=cc",
           function(elseII){
              $("#pipMainBody").html(elseII);
           });
        })
    $("#pipNAVCONTACTS").click( function(){
          $("#pipMainBody").html(loading);
          $.post("htmls/contacts.html",
           "cc=cc",
           function(elseII){
              $("#pipMainBody").html(elseII);
           });
        })
    $("#pipNAVORDER").click( function(){
          $("#pipMainBody").html(loading);
          $.post("htmls/order.php",
           "cc=cc",
           function(elseII){
              $("#pipMainBody").html(elseII);
           });
        })
  }) 