<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
$session_username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '$session_username'";
$run = mysqli_query($con,$query);
$row = mysqli_fetch_array($run);
$image = $row['image'];
$id = $row['id'];
$date = $row['date'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$username = $row['username'];
$email = $row['email'];
$role = $row['roll'];
$details = $row['details'];

?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once('inc/top.php');?>
  </head>
  <body id="profile">
    <?php require_once('inc/header.php');?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <?php require_once('inc/sidebar.php');?>
      </div>
      <div class="col-md-9">
        <h1><i class="fa fa-user"></i>&nbsp Profile
          <small class="smalld">Personal Details</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard / &nbsp </a></li>
          <li class="active"><i class="fa fa-user"></i> Profile</li>
        </ol>
      <div class="row">
        <div class="col-md-12">
          <center><img src="img/<?php echo $image; ?>" id="profile-img" width="200px" class="img-circle img-thumbnail"></center>
      <a href="edit-profile.php?edit=<?php echo $id; ?>" class="btn btn-danger pull-right">Edit Profile</a>
      <br/><br/>
      <h3><center>Profile Details</center></h3>
      <br/>
      <table class="table table-hover table-bordered">
        <tr>
          <td width="20%"><b>User Id:</b></td>
          <td width="30%"><?php echo $id; ?></td>
          <td width="20%"><b>Signup Date:</b></td>
          <td width="30%"><?php echo $date; ?></td>
        </tr>
         <tr>
          <td width="20%"><b>First Name:</b></td>
          <td width="30%"><?php echo $first_name; ?></td>
          <td width="20%"><b>Last Name</b></td>
          <td width="30%"><?php echo $last_name; ?></td>
        </tr>
         <tr>
          <td width="20%"><b>User-name:</b></td>
          <td width="30%"><?php echo $username; ?></td>
          <td width="20%"><b>Email:</b></td>
          <td width="30%"><?php echo $email; ?></td>
        </tr>
         <tr>
          <td width="20%"><b>Role:</b></td>
          <td width="30%"><?php echo $role; ?></td>
          <td width="20%"><b></b></td>
          <td width="30%"></td>
        </tr>
      </table>
      <div class="row">
        <div class="col-lg-8 col-sm-12">
          <b>Details:</b>
          <div>Hello Me Navi
          Hello Me Navi</div>
          Hello Me Navi
          Hello Me Navi
          Hello Me Navi
          Hello Me Navi
        </div>
      </div>
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