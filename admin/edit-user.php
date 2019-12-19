<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
elseif(isset($_SESSION['username']) && $_SESSION['roll'] == 'author') {
  header("Location:index.php");
}
if (isset($_GET['edit'])) {
   $edit_id = $_GET['edit'];
   $edit_query = "SELECT * FROM users WHERE id = $edit_id;";
   $edit_query_run = mysqli_query($con,$edit_query);
if (mysqli_num_rows($edit_query_run)>0 ) {
  $edit_row = mysqli_fetch_array($edit_query_run);
    $e_first_name = $edit_row['first_name'];
    $e_last_name = $edit_row['last_name'];
    $e_role = $edit_row['roll'];
    $e_image = $edit_row['image'];
    $e_details = $edit_row['details'];
   }
   else{
    header("Location:index.php");
   }
}
else{
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
        <h1><i class="fa fa-user"></i> Edit- User
          <small class="smalld">Details</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard / &nbsp </a></li>
          <li class="active"><i class="fa fa-user"></i>&nbspEdit-User </li>
        </ol>
        <?php
        if (isset($_POST['submit'])) {
             $first_name = mysqli_real_escape_string($con,$_POST['first-name']);
             $last_name = mysqli_real_escape_string($con,$_POST['last-name']);
             $password = mysqli_real_escape_string($con,$_POST['password']);
             $role = $_POST['role'];
             $image = $_FILES['image']['name'];
             $image_tmp = $_FILES['image']['tmp_name'];
             $details = mysqli_real_escape_string($con,$_POST['details']);
             if(empty($image)) {
             $image = $e_image;
             }
             /*Salt Query Here*/
             $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
             $salt_run = mysqli_query($con,$salt_query); 
             $salt_row = mysqli_fetch_array($salt_run);
             $salt = $salt_row['salt'];
            /*Salt Query End Here*/
             $insert_password = crypt($password,$salt);/*Password Encrypt Query*/


             if (empty($first_name) or empty($last_name) or empty($image)) {
               $error = "All (*) fields are Required";
             }
             
             else{
             
              $update_query= "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `image` = '$image', `roll` = '$role', `details` = '$details'";
                if (isset($password)) {
                  $update_query .= "'password' = '$insert_password'"; 
                }
              $update_query .=" WHERE `users`.`id` = $edit_id";
              if (mysqli_query($con,$update_query)or die("check the code".mysqli_error($con))) {
                 $msg = "user has been updated";
                  header("refresh:1; url=edit-user.php?edit=$edit_id");
                   }
                 else{
                  $error = "user has not been updated";
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
                <input type="text" name="first-name" value="<?php echo $e_first_name; ?>" class="form-control" id="first-name" placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="first-name">Last Name:*</label>
                <input type="text" value="<?php echo $e_last_name; ?>" name="last-name" class="form-control" id="last-name" placeholder="Last Name">
              </div>
              <div class="form-group">
                <label for="Password">Password:*</label>
                <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="role">Role:*</label>
                <select name="role" id="role" class="form-control">
                  <option value="author"<?php if($e_role == 'author'){
                    echo "selected";
                  }?>>Author</option>
                  <option value="admin" <?php if($e_role == 'admin'){
                    echo "selected";
                  }?>>Admin</option>
                </select>
              </div>
              <div class="form-group">
                <label for="image">Profile Pic:*</label>
                <br/>
                <input type="file" id="image" name="image">
              </div>

              <div class="form-group">
                <label for="details">details</label>
                <br/>
                <textarea name="details" id="details" cols="30" rows="10" class="form-control"><?php echo $e_details; ?></textarea>
              </div>
              <input type="submit" value="Update" name="submit" class="btn btn-primary">
            </form>
          </div>
          <div class="col-md-4">
            <?php
               echo "<img src='img/$e_image' width='100%'>"; 
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