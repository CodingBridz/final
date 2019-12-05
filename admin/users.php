<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="text/css" href="img/icon1.png">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#">logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-plus-square"></i> Add Post<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-user-plus"></i> Add User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-user"></i> Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
          </li>
        </ul>
      </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a class="list-group-item active" href="index.php">
            <i class="fa fa-tachometer"></i> Dashboard</a>
          <a class="list-group-item d-flex justify-content-between align-items-center" href="">
            <i class="fa fa-file-text"> All Post</i>
            <span class="badge badge-primary badge-pill">14</span>
          </a>
          <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
            <i class="fa fa-comment"> Comments</i>
            <span class="badge badge-primary badge-pill">10</span>
          </a>
          <a class="list-group-item d-flex justify-content-between align-items-center" href="category.php">
            <i class="fa fa-folder-open"> Categories</i>
            <span class="badge badge-primary badge-pill">6</span>
          </a>
          <a class="list-group-item d-flex justify-content-between align-items-center active" href=users.php>
            <i class="fa fa-users"> Users</i>
            <span class="badge badge-primary badge-pill">3</span>
          </a>
        </div>
      </div>
      <div class="col-md-9">
        <h1><i class="fa fa-folder-open"></i> Users
          <small class="smalld">View All Users</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard / </a></li>
          <li class="active"><i class="fa fa-folder-opn"></i> Users</li>
        </ol>
        <div class="row">
          <div class="col-md-6">
      
          </div>
           <div class="col-md-6">
              
          </div>
        </div>

      </div>
    </div>
  </div><br><br>
  <!-- Footer -->
  <footer class="text-center footer">
    Copyright &copy by Deepak & Navi 2019
  </footer>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>