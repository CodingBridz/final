<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
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
        <h1><i class="fa fa-database"></i> Media
          <small class="smalld">Add & View </small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard  / </a></li>&nbsp &nbsp
          <li ><i class="fa fa-database"></i> Media</li>
        </ol>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-4 col-xs-8">
              <input type="file" name="media[]" required="required" multiple="multiple">

            </div>
            <div class="col-sm-4 col-xs-4">
              <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Add Media">
            </div>
          </div>
        </form>
        <hr/>
        <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb" >
            <a href="#" class="thumbnail">
              <img src="img/avatar-1.jpg" width="100%" alt="">
            </a>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb" >
            <a href="#" class="thumbnail">
              <img src="img/avatar-1.jpg" width="100%" alt="">
            </a>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb" >
            <a href="#" class="thumbnail">
              <img src="img/avatar-1.jpg" width="100%" alt="">
            </a>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb" >
            <a href="#" class="thumbnail">
              <img src="img/avatar-1.jpg" width="100%" alt="">
            </a>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb" >
            <a href="#" class="thumbnail">
              <img src="img/avatar-1.jpg" width="100%" alt="">
            </a>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb" >
            <a href="#" class="thumbnail">
              <img src="img/avatar-1.jpg" width="100%" alt="">
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
  <br/><br/>
  <!-- Footer -->
    <?php require_once('inc/footer.php');?>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
