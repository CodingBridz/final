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
          <a class="list-group-item active" href="#">
            <i class="fa fa-tachometer"></i> Dashboard</a>
          <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
            <i class="fa fa-file-text"> All Post</i>
            <span class="badge badge-primary badge-pill">14</span>
          </a>
          <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
            <i class="fa fa-comment"> Comments</i>
            <span class="badge badge-primary badge-pill">10</span>
          </a>
          <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
            <i class="fa fa-folder-open"> Categories</i>
            <span class="badge badge-primary badge-pill">6</span>
          </a>
          <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
            <i class="fa fa-users"> Users</i>
            <span class="badge badge-primary badge-pill">3</span>
          </a>
        </div>
      </div>
      <div class="col-md-9">
        <h1><i class="fa fa-tachometer"></i> Dashboard
          <small class="smalld">Statistics Overview</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-tachometer"></i> Dashboard</li>
        </ol>
        <div class="row tag-boxes">
          <div class="col-md-4 col-lg-3 col-xs-1">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3 dta">
                    <i class="fa fa-comments fa-5x commet"></i>
                  </div>
                  <div class="col-xs-9">
                    <div class="text-right huge">11</div>
                    <div class="text-right comm">New Comments</div>
                  </div>
                </div>
              </div>
              <div class="panel-footer ddd">
                  <div class="row">
                    <div class="col-xs-11">
                      <span class="pull-left"><a href="#"> View All Comments </a></span>
                    </div>
                    <div class="col-xs-1">
                       <a href="#"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 col-xs-1">
            <div class="panel panel-red">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3 dta">
                    <i class="fa fa-file-text fa-5x commet"></i>
                  </div>
                  <div class="col-xs-9">
                    <div class="text-right huge" >18</div>
                    <div class="text-right comm">All Posts</div>
                  </div>
                </div>
              </div>
              <div class="panel-footer ddd">
                  <div class="row">
                    <div class="col-xs-11">
                      <span class="com1"><a href="#"> View All Posts </a></span>
                    </div>
                    <div class="col-xs-1">
                       <a href="#"><span class="pull-right1"><i class="fa fa-arrow-circle-right"></i></span></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 col-xs-1">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3 dta">
                    <i class="fa fa-users fa-5x commet"></i>
                  </div>
                  <div class="col-xs-9">
                    <div class="text-right huge">30</div>
                    <div class="text-right comm">All Users</div>
                  </div>
                </div>
              </div>
              <div class="panel-footer ddd">
                  <div class="row">
                    <div class="col-xs-11">
                      <span class="pull-left1"><a href="#"> View All Users </a></span>
                    </div>
                    <div class="col-xs-1">
                       <a href="#"><span class="pull-right2"><i class="fa fa-arrow-circle-right"></i></span></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 col-xs-1">
            <div class="panel panel-yellow">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3 dta">
                    <i class="fa fa-folder-open fa-5x commet"></i>
                  </div>
                  <div class="col-xs-9">
                    <div class="text-right huge">9</div>
                    <div class="text-right comm">All Categories</div>
                  </div>
                </div>
              </div>
              <div class="panel-footer ddd">
                  <div class="row">
                    <div class="col-xs-11">
                      <span class="pull-left2"><a href="#"> View All Categories </a></span>
                    </div>
                    <div class="col-xs-1">
                       <a href="#"><span class="pull-right3"><i class="fa fa-arrow-circle-right"></i></span></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr/>
        <h3>New Users</h3>
        <table class="table table-hover table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Date</th>
              <th>Name</th>
              <th>Username</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>05 Dec 2019</td>
              <td>Deepak</td>
              <td>Deepak_verma</td>
              <td>admin</td>
            </tr>
            <tr>
              <td>1</td>
              <td>05 Dec 2019</td>
              <td>Deepak</td>
              <td>Deepak_verma</td>
              <td>admin</td>
            </tr>
            <tr>
              <td>1</td>
              <td>05 Dec 2019</td>
              <td>Navi</td>
              <td>Navi_Singh</td>
              <td>admin</td>
            </tr>
          </tbody>
        </table>
        <a href="#" class="btn btn-danger">View-Users</a>
        <hr/>
        <h3>New Posts</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Date</th>
              <th>Post Title</th>
              <th>Category</th>
              <th>Views</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>05 Dec 2019</td>
              <td>MediaOcean</td>
              <td>Blog</td>
              <td><i class="fa fa-eye"></i> 10</td>
            </tr>
            <tr>
              <td>1</td>
              <td>05 Dec 2019</td>
              <td>MediaOcean</td>
              <td>Blog</td>
              <td><i class="fa fa-eye"></i> 10</td>
            </tr>
            <tr>
              <td>1</td>
              <td>05 Dec 2019</td>
              <td>MediaOcean</td>
              <td>Blog</td>
              <td><i class="fa fa-eye"></i> 10</td>
            </tr>
          </tbody>
        </table>
        <a href="#" class="btn btn-info">View-Posts</a>
      </div>
    </div>
  </div>
  <br/><br/>
  <!-- Footer -->
  <footer class="text-center">
    Copyright &copy by Deepak & Navi 2019
  </footer>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>