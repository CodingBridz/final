<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
$session_username = $_SESSION['username'];

if(!isset($_SESSION['username'])) {
  header('Location:login.php');
}
if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  if ($_SESSION['roll'] == 'admin' ) {
    $del_check_query = "SELECT * FROM posts WHERE id = $del_id";
  $del_check_run = mysqli_query($con,$del_check_query);
  }
  elseif ($_SESSION['roll'] == 'author') {
    $del_check_query = "SELECT * FROM posts WHERE id = $del_id and author = '$session_username'";
  $del_check_run = mysqli_query($con,$del_check_query);
  }
  if (mysqli_num_rows($del_check_run)> 0) {
    $del_query = "DELETE FROM `posts` WHERE `posts`.`id` = $del_id ";   
     if(mysqli_query($con,$del_query)){
     $msg = "Post Has Been Deleted";
  }
  else
  {
    $error = "Post Has Not Been Deleted";
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
              $bulk_del_query = "DELETE FROM `posts` WHERE `posts`.`id` = $user_id ";
              mysqli_query($con,$bulk_del_query);
            }
            elseif ($bulk_option == 'publish') {
              $bulk_author_query = "UPDATE `posts` SET `status` = 'publish' WHERE `posts`.`id` = $user_id";
              mysqli_query($con,$bulk_author_query);
            }
            elseif ($bulk_option == 'draft') {
              $bulk_admin_query = "UPDATE `posts` SET `status` = 'draft' WHERE `posts`.`id` = $user_id";
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
        <h1><i class="fa fa-file"></i> Posts
          <small class="smalld">View All Posts</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard / &nbsp</a></li>
          <li class="active"><i class="fa fa-file"></i> Posts</li>
        </ol>
        <?php
        if ($_SESSION['roll'] == 'admin') {
         $query = "SELECT * FROM posts ORDER BY id DESC";
      $run = mysqli_query($con,$query);
        }
        elseif ($_SESSION['roll'] == 'author') {
        $query = "SELECT * FROM posts WHERE author = '$session_username' ORDER BY id DESC";
      $run = mysqli_query($con,$query);
        }
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
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <input type="submit" name="" class="btn btn-success" value="Apply">
                    <a href="" class="btn btn-primary">Add New</a>
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
              <th>Title</th>
              <th>Author</th>
              <th>Image</th>
              <th>Categories</th>
              <th>Views</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($run)) {
              $id = $row['id'];
              $title = $row['title'];
              $author = $row['author'];
              $views = $row['views'];
              $categories = $row['categories'];
              $image= $row['image'];
              $date = $row['date'];
              $status = $row['status'];
            ?>
            <tr>
              <td><input type="checkbox" name="checkboxes[]" value="<?php echo $id;?>" class="checkboxes"></td>
              <td><?php  echo $id; ?></td>
              <td><?php  echo $date; ?></td>
              <td><?php echo $title; ?></td>
              <td><?php echo $author;?></td>
              <td><img src="img/<?php echo $image; ?>" alt="" class="img-responsive" width="40px;" height="30px;"></td>
              <td><?php echo $categories; ?></td>
              <td><?php echo $views ?></td>
              <td><span style="color:<?php if ($status == 'publish') {
                echo "green";
              }
                elseif ($status == 'draft') {
                  echo "red";
                }
              ?>"><?php echo ucfirst($status); ?></span></td>
              <td><a href="edit-post.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></td>
              <td><a href="posts.php?del=<?php echo  $id; ?>"><i class="fa fa-times"></i></a></td>
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