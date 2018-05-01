<?php
session_start();
include("conne.php");
$error = "";
$errorbtn = "";
$errorbool = true;
if(isset($_POST["email"]))
{
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
        $error = " Both fields are required ";
        $errorbtn = "retry";
        $errorbool = false;
    }else
    {
    // Define $username and $password
    $email = $_POST['email'];
    $password = $_POST['password'];
      
    // To protect from MySQL injection

    $email = stripslashes($email);
    $password = stripslashes($password);
    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn, $password);
    $password = md5($password);
     
    //Check username and password from database
    $sql ="";
    if(is_numeric($email))
    $sql = "SELECT `userId` FROM `users` WHERE `tel`='$email' and `password`='$password'";
    else
    $sql = "SELECT `userId` FROM `users` WHERE `email`='$email' and `password`='$password'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
       //If username and password exist in our database then create a session.
       //Otherwise echo error.
       if(mysqli_num_rows($result) == 1)
       {
       $error = " you have been loged in successfully";
       $errorbtn = "please wait";
       $errorbool = true;
       $_SESSION['userId'] = $row['userId']; // Initializing Session
       ?>
        <script> 
            $("#PIP_MODEL_S").load("functions/userBack.php");
        </script>

       <?php
       }else
       {
       $error = " Incorrect username or password ";
       $errorbtn = "retry";
       $errorbool = false;
       }
    }
    else
     $error = $sql.mysqli_error($conn);
    }
}
?>
<div class="w3-panel w3-red w3-display-container">
  
  <p>  <?php echo "$error"?>  </p>
</div>
<button class="w3-button  w3-section w3-teal w3-ripple" id="retry_again" style="width: 100%; "> <?php echo "$errorbtn"?>  </button>
<?php 
  if(!$errorbool){
?>
            <script>
               $("#retry_again").click( function(ee){
                 ee.preventDefault();
                 $("#PIP_MODEL_S").html(loadIng);
                 $("#PIP_MODEL_S").load("htmls/login.html");
               })
            </script>
  <?php }?>