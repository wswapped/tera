<?php
session_start();
if(isset($_POST['Title']))
{
    include("conne.php");
    if (!$db_selected) {
        die ('Can\'t use this : ' . mysqli_error($conn));
    }
    else {
        $Title = $_POST['Title'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $userId = $_SESSION["userId"];

        // To protect from MySQL injection

        $Title = stripslashes($Title);
        $quantity = stripslashes($quantity);
        $description = stripslashes($description);

            $Title = mysqli_real_escape_string($conn,$Title);
            $quantity = mysqli_real_escape_string($conn,$quantity);
            $description = mysqli_real_escape_string($conn,$description);
        $PIP_query = "INSERT INTO `orders` (`ordersId`,`orderstitle`,`ordersquantity`,`ordersdesc`,`userId`,`orderDate`) 
                      VALUES (NULL, '$Title','$quantity','$description','$userId',now())";
        $save = mysqli_query($conn,$PIP_query);
        if($save)
          {
           ?>
           <script type="text/javascript">
             $("#pipNAVORDER").click();
           </script>
            
          <?php
          }
        else echo "not done".mysqli_error($conn)."</br>".$PIP_query;
        }
    }  
?>