<?php 
ob_start();
session_start();
require_once('../inc/db.php');
if (isset($_POST['submit'])) {
   $username = mysqli_real_escape_string($con,strtolower($_POST['username']));
   $password = mysqli_real_escape_string($con,$_POST['password']);
   $check_username_query = "SELECT * FROM  users WHERE username = '$username'";
   $check_username_run = mysqli_query($con,$check_username_query);
   if (mysqli_num_rows($check_username_run) > 0) {
       $row = mysqli_fetch_array($check_username_run);

       $db_username = $row['username'];
       $db_password = $row['password']; 
       $db_role = $row['roll'];
       $db_author_image = $row['image'];
       $password = crypt($password,$db_password);
       if($username == $db_username && $password == $db_password){
          $_SESSION['username']= $db_username;
          $_SESSION['roll']=$db_role;
          $_SESSION['author_image'] = $db_author_image;
          
          header('Location:index.php');
       }
       else{
        $error = "Wrong Username And Password";
       }

   }
   else {
    $error = "Wrong Username And Password";
   }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
    <div class="login-box">
      <h1 class="animated rubberBand">Admin Login</h1>
      <div class="textbox">
        <i class="fa fa-user"></i>
        <form action="" method="post">
        <input type="text" placeholder="Username" required="required" autocomplete="none" name="username" >
      </div>
      <div class="textbox">
        <i class="fa fa-lock"></i>
        <input type="password" placeholder="Password" required="required" name="password">
      </div>
      <?php
      if (isset($error)) {
        echo "<center>$error</center>";
      }
      ?>
      <input type="submit" class="btn" value="Sign in" name="submit">
    </form>
    </div>
  </body>
</html>