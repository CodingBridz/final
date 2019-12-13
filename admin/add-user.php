<?php require_once('../inc/db.php'); ?>
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
        <div class="row">
          <div class="col-md-8">
            <form action="" method="post">
              <div class="form-group">
                <label for="first-name">First Name:*</label>
                <input type="text" name="first-name" class="form-control" id="first-name" placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="first-name">Last Name:*</label>
                <input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last Name">
              </div>
              <div class="form-group">
                <label for="username">Username:*</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="email">Email:*</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <label for="Password">Password:*</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="roll">Role:*</label>
                <select name="roll" id="roll" class="form-control">
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
          <div class="col-md-4"></div>
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