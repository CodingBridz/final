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
                      <span class="pull-left"><a href="#">  View All Comments </a></span>
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
        <table class="table table-hover table-striped table-bordered">
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
    <?php require_once('inc/footer.php');?>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
