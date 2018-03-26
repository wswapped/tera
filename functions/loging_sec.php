<?php
session_start();
include("conne.php");
 
$error = "";
if(isset($_POST["email"]))
{
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
        $error = " Both fields are required ";
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
    $sql = "SELECT `sec_id` FROM `security_stuff` WHERE `user_name`='$email' and `pin`='$password'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
       //If username and password exist in our database then create a session.
       //Otherwise echo error.
       if(mysqli_num_rows($result) == 1)
       {
       $_SESSION['security'] = $row['sec_id']; // Initializing Session
       ?>
        <script> 
            $("#User_body").load("htmls/allusers_sec.html");
        </script>

       <?php
       }else
       {
       $error = " Incorrect username or password `user_name`=$email `pin`=$password";
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
<button class="w3-button  w3-section w3-teal w3-ripple" id="retry_again" style="width: 100%; "> retry </button>
            <script>
               $("#retry_again").click( function(ee){
                 ee.preventDefault();
                 $("#formsLogs").html(loadIng);
                 $("#formsLogs").load("htmls/singin_sec.html");
               })
            </script>