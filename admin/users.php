<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
elseif(isset($_SESSION['username']) && $_SESSION['roll'] == 'author') {
  header("Location:index.php");
}

if(!isset($_SESSION['username'])) {
  header('Location:login.php');
}
if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_check_query = "SELECT * FROM users WHERE id = $del_id";
  $del_check_run = mysqli_query($con,$del_check_query);
  if (mysqli_num_rows($del_check_run)> 0) {
    $del_query = "DELETE FROM `users` WHERE `users`.`id` = $del_id ";
  if (isset($_SESSION['username']) && $_SESSION['roll'] == 'admin') {
    
     if(mysqli_query($con,$del_query)){
     $msg = "Users Has Been Deleted";
  }
  else
  {
    $error = "User Has Not Been Deleted";
  }
  }
  }
  else{
    header("Location:index.php");
  }
}
    if (isset($_POST['checkboxes'])) {
       foreach($_POST['checkboxes'] as $user_id) {
        
          $bulk_option = $_POST['bulk-options'];
            if ($bulk_option == 'delete') {
              $bulk_del_query = "DELETE FROM `users` WHERE `users`.`id` = $user_id ";
              mysqli_query($con,$bulk_del_query);
            }
            elseif ($bulk_option == 'author') {
              $bulk_author_query = "UPDATE `users` SET `roll` = 'author' WHERE `users`.`id` = $user_id";
              mysqli_query($con,$bulk_author_query);
            }
            elseif ($bulk_option == 'admin') {
              $bulk_admin_query = "UPDATE `users` SET `roll` = 'admin' WHERE `users`.`id` = $user_id";
              mysqli_query($con,$bulk_admin_query);
            }
       }

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
        <form action="" method="post">
        <div class="row">
          <div class="col-md-6">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <select class="form-control" name="bulk-options" id="">
                        <option value="delete">Delete</option>
                        <option value="author">Change to Author</option>
                        <option value="admin">Change to Admin</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <input type="submit" name="" class="btn btn-success" value="Apply">
                    <a href="add-user.php" class="btn btn-primary">Add New</a>
                  </div>
                </div>
          </div>
           <div class="col-md-6">   
          </div>
        </div>
        <?php
        if (isset($error)) {
          echo "<span style='color:red;' class='pull-right'>$error</span>";
        }
        elseif(isset($msg)) {
          echo "<span style='color:green;' class='pull-right'>$msg</span>";
        }
        ?>
        <table class="table table-hover table-bordered table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" name="" id="selectallboxes"></th>
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
              <td><input type="checkbox" name="checkboxes[]" value="<?php echo $id;?>" class="checkboxes"></td>
              <td><?php  echo $id; ?></td>
              <td><?php  echo $date; ?></td>
              <td><?php echo "$first_name $last_name"; ?></td>
              <td><?php echo $username;?></td>
              <td><?php echo $email;?></td>
              <td><img src="img/<?php echo $image; ?>" alt="" class="img-responsive" width="40px;" height="30px;"></td>
              <td>******</td>
              <td><?php echo ucfirst($roll); ?></td>
              <td><a href="edit-user.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></td>
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
        </form>
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