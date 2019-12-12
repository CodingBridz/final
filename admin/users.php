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
        <h1><i class="fa fa-folder-open"></i> Users
          <small class="smalld">View All Users</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard / </a></li>
          <li class="active"><i class="fa fa-folder-opn"></i> Users</li>
        </ol>
        <?php
      $query = "SELECT * FROM users ORDER BY id DESC";
      $run = mysqli_query($con,$query);
      if (mysqli_num_rows($run) > 0) {
        
      
        ?>
        <div class="row">
          <div class="col-md-6">
              <form action="">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <select class="form-control" name="" id="">
                        <option value="delete">Delete</option>
                        <option value="author">Change to Auhtor</option>
                        <option value="admin">Change to Admin</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <input type="submit" name="" class="btn btn-success" value="Apply">
                    <a href="#" class="btn btn-primary">Add New</a>
                  </div>
                </div>
              </form>
          </div>
           <div class="col-md-6">   
          </div>
        </div>
        <table class="table table-hover table-bordered table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" name=""></th>
              <th>#</th>
              <th>Date</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Image</th>
              <th>Password</th>
              <th>Role</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($run)) {
              $id = $row['id'];
              $first_name = ucfirst($row['first_name']);
              $last_name = ucfirst($row['last_name']);
              $email= $row['email'];
              $username= $row['username'];
              $roll = $row['roll'];
              $image= $row['image'];
              $date = $row['date'];
            ?>
            <tr>
              <td><input type="checkbox" name=""></td>
              <td><?php  echo $id; ?></td>
              <td><?php  echo $date; ?></td>
              <td><?php echo "$first_name $last_name"; ?></td>
              <td><?php echo $username;?></td>
              <td><?php echo $email;?></td>
              <td><img src="img/<?php echo $image; ?>" alt="" class="img-responsive" width="40px;" height="30px;"></td>
              <td>******</td>
              <td><?php echo $roll; ?></td>
              <td><a href="add-user.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></td>
              <td><a href="users.php?del=<?php echo  $id; ?>"><i class="fa fa-times"></i></a></td>
            </tr>
            <?php
               }
            ?>
          </tbody>
        </table>
        <?php
        } 
      else{
           echo "<center><h2>No Users Avialable Now</h2></center>";     
      }
        ?>
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