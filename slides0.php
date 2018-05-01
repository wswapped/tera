<div class="w3-content w3-display-container">
  <?php
   include("functions/conne.php");
   $sql = "SELECT * FROM `products` ORDER BY `products`.`productId` ASC LIMIT 0,3";
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
            $count = 0;
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
              {
        ?>
    <div class="w3-display-container mySlides w3-animate-left" 
         id="mySlides<?php echo $row["productId"];?>" 
         style="cursor: pointer;">
      <img src="<?php echo $row["productIcon"] ?>" 
           alt="<?php echo $row["productName"] ?>" 
           title="<?php echo $row["productName"] ?>" 
           style="width:100%">
      <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-win8-orange">
        <h3> <?php echo $row["productName"] ?></h3>
        <p><?php echo $row["notes"] ?></p>
      </div>
    </div>
<?php
           $count++;
            }
      ?>

    <button class="w3-button w3-display-left w3-win8-orange" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-display-right w3-win8-orange" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

var slideIndex = 0;
//myStopFunction(myVar);
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    myVar = setTimeout(carousel, 3000); // Change image every 2 seconds

}
function myStopFunction(myVar) {
    clearTimeout(myVar);
}
$(".mySlides").hover( function(){
                     myStopFunction(myVar);  
                    }, function(){
                     carousel();
                    });
$(".mySlides").click( function(events){
  events.preventDefault();
  var thisId = $(this).attr("id");
  thisId = thisId.substring(8,thisId.length);
  $("#PIP_MODEL").fadeIn(500);
  $("#PIP_MODEL_S").html(loading);
  $.post("functions/userfiles/productsone.php",
       "cdv="+thisId,
       function(result){
        $("#PIP_MODEL_S").html(result);
       })
})
</script>