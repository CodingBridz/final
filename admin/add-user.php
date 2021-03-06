<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
elseif(isset($_SESSION['username']) && $_SESSION['roll'] == 'author') {
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once('inc/top.php');?>
  </head>
  <body>
    <?php require_once('inc/header.php');?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <?php require_once('inc/sidebar.php');?>
      </div>
      <div class="col-md-9">
        <h1><i class="fa fa-user-plus"></i> Add User
          <small class="smalld">Add New Users</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard /  </a></li>
          <li class="active"><i class="fa fa-user-plus"></i> Add New </li>
        </ol>
        <?php
        if (isset($_POST['submit'])) {
             $date = time();
             $first_name = mysqli_real_escape_string($con,$_POST['first-name']);
             $last_name = mysqli_real_escape_string($con,$_POST['last-name']);
             $username = mysqli_real_escape_string($con,strtolower($_POST['username']));
             $username_trim = preg_replace('/\s+/','',$username);
             $email = mysqli_real_escape_string($con,strtolower($_POST['email']));
             $password = mysqli_real_escape_string($con,$_POST['password']);
             $role = $_POST['role'];
             $image = $_FILES['image']['name'];
             $image_tmp = $_FILES['image']['tmp_name'];
             $check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
             $check_run = mysqli_query($con,$check_query);
             /*Salt Query Here*/
             $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
             $salt_run = mysqli_query($con,$salt_query); 
             $salt_row = mysqli_fetch_array($salt_run);
             $salt = $salt_row['salt'];
            /*Salt Query End Here*/
             $password = crypt($password,$salt);/*Password Encrypt Query*/


             if (empty($first_name) or empty($last_name) or empty($username) or empty($email) or  empty($password) or empty($image)) {
               $error = "All (*) fields are Required";
             }
             else if($username != $username_trim){
              $error = "Don't Use Spaces In Username";

             }
             elseif (mysqli_num_rows($check_run)> 0) {
               $error = "Username or Email Already Exist";
             }
             else{
              $insert_query = "INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `image`, `password`, `roll`,  `email`) VALUES (NULL, '$date', '$first_name', '$last_name', '$username', '$image', '$password', '$role', '$email')";

                    if (mysqli_query($con,$insert_query)) 
                    {
                      $msg = "User Has Been Added";
                      move_uploaded_file($image_tmp,"img/$image");
                      $image_check = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                      $image_run = mysqli_query($con,$image_check);
                      $image_row = mysqli_fetch_array($image_run);
                      $check_image = $image_row['image'];
                      $first_name = "";
                      $last_name = "";
                      $username ="";
                      $email = "";   
                     }
                    else 
                    {
                      $error = "User Has Been Not Added";
                    }
             }
        }
        ?>

        <div class="row">
          <div class="col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="first-name">First Name:*</label>
                <?php
                if (isset($error)) {
                  echo "<span class='pull-right' style='color:red;'>$error</span>";
                }
                elseif (isset($msg)) {
                  echo "<span class='pull-right' style='color:green;'>$msg</span>";
                }
                ?>
                <input type="text" name="first-name" value="<?php if(isset($first_name)){echo $first_name; } ?>"class="form-control" id="first-name" placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="first-name">Last Name:*</label>
                <input type="text" value="<?php if(isset($last_name)){echo $last_name; } ?>" name="last-name" class="form-control" id="last-name" placeholder="Last Name">
              </div>
              <div class="form-group">
                <label for="username">Username:*</label>
                <input type="text" value="<?php if(isset($username)){echo $username; } ?>" name="username" class="form-control" id="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="email">Email:*</label>
                <input type="text" value="<?php if(isset($email)){echo $email; } ?>" name="email" class="form-control" id="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <label for="Password">Password:*</label>
                <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="role">Role:*</label>
                <select name="role" id="role" class="form-control">
                  <option value="author">Author</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
              <div class="form-group">
                <label for="image">Profile Pic:*</label>
                <br/>
                <input type="file" id="image" name="image">
              </div>
              <input type="submit" value="Add User" name="submit" class="btn btn-primary">
            </form>
          </div>
          <div class="col-md-4">
            <?php
            if (isset($check_image)) {
               echo "<img src='img/$check_image' width='100%'>"; 
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div><br>
  <!-- Footer -->
  <?php require_once('inc/footer.php');?>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>