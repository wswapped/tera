<?php
session_start();
if(isset($_POST['passwrd']))
{
    include("conne.php");
    if (!$db_selected) {
        die ('Can\'t use this : ' . mysqli_error($conn));
    }
    else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $passwo = $_POST['passwrd'];

        // To protect from MySQL injection

        $fname = stripslashes($fname);
        $lname = stripslashes($lname);
        $email = stripslashes($email);
        $passwo = stripslashes($passwo);

            $fname = mysqli_real_escape_string($conn, $fname);
            $lname = mysqli_real_escape_string($conn, $lname);
            $email = mysqli_real_escape_string($conn, $email);
            $passwo = md5($passwo);
        $PIP_query = "SELECT `email` FROM `users` WHERE `email` = '$email' ";
        $result = $conn->query($PIP_query);
        if ($result->num_rows > 0) {
            ?>
           <div class="alert alert-danger">
             <strong>the email address <?php echo $email; ?> already exist  </strong>
             &nbsp; 
             <button type="button" class="btn btn-warning" id="Try_again"> Try to use another </button>
           </div>
           <script>
               $("#Try_again").click( function(e){
                   e.preventDefault();
                   $("#PIP_MODEL_S").html(loadIng);
                   $("#PIP_MODEL_S").load("htmls/reg.html");
               });
           </script>
           
            <?php 
        }
        else {
        $PIP_query = "INSERT INTO `users` (`userId`,`fname`,`lname`,`email`,`password`) 
                      VALUES (NULL, '$fname','$lname','$email','$passwo')";
        $save = mysqli_query($conn,$PIP_query);
        if($save)
          {
            $userId = mysqli_insert_id($conn);
            $_SESSION["userId"] = $userId;
           ?>
            </br>
            <div class="w3-panel w3-green">
              <h3>Success!</h3>
              <p> 
                you have been registered you can now proceed using your account after entering confirmation codes sended to your tel number 
              </p>
            <div id="continuing">
                
            </div>
            </div>
           <script>
                   $("#continuing").html(loadIng);
                   $("#continuing").load("htmls/confirm.html");
           </script>
          <?php
          }
        else echo "not registered".mysqli_error($conn)."</br>".$PIP_query;
        }
    }
}    
?>