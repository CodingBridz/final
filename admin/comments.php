<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
elseif(isset($_SESSION['username']) && $_SESSION['roll'] == 'author') {
  header("Location:index.php");
}
$session_username = $_SESSION['username'];

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_check_query = "SELECT * FROM comments WHERE id = $del_id";
  $del_check_run = mysqli_query($con,$del_check_query);
  if (mysqli_num_rows($del_check_run)> 0) {
    $del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $del_id ";
  if (isset($_SESSION['username']) && $_SESSION['roll'] == 'admin') {
    
     if(mysqli_query($con,$del_query)){
     $msg = "Comment Has Been Deleted";
  }
  else
  {
    $error = "Comment Has Not Been Deleted";
  }
  }
  }
  else{
    header("Location:index.php");
  }
}
/*Approved Code Here*/
if (isset($_GET['approved'])) {
  $Approved_id = $_GET['approved'];
  $Approved_check_query = "SELECT * FROM comments WHERE id = $Approved_id";
  $Approved_check_run = mysqli_query($con,$Approved_check_query);
  if (mysqli_num_rows($Approved_check_run)> 0) {
    $Approved_query = "UPDATE `comments` SET `status` = 'approved' WHERE `comments`.`id` = $Approved_id";
  if (isset($_SESSION['username']) && $_SESSION['roll'] == 'admin') {
    
     if(mysqli_query($con,$Approved_query)){
     $msg = "Comment Has Been approved";
  }
  else
  {
    $error = "Comment Has Not Been approved";
  }
  }
  }
  else{
    header("Location:index.php");
  }
}
/*Approved End Here*/
/*-----------------------------------------------------------------------*/
/*pproved Code Here*/
if (isset($_GET['unapproved'])) {
  $unapproved_id = $_GET['unapproved'];
  $unapproved_check_query = "SELECT * FROM comments WHERE id = $unapproved_id";
  $unapproved_check_run = mysqli_query($con,$unapproved_check_query);
  if (mysqli_num_rows($unapproved_check_run)> 0) {
    $unapproved_query = "UPDATE `comments` SET `status` = 'pending' WHERE `comments`.`id` = $unapproved_id";
  if (isset($_SESSION['username']) && $_SESSION['roll'] == 'admin') {
    
     if(mysqli_query($con,$unapproved_query)){
     $msg = "Comment Has Been unapproved";
  }
  else
  {
    $error = "Comment Has Not Been unapproved";
  }
  }
  }
  else{
    header("Location:index.php");
  }
}
/*Unapproved End Here*/
    if (isset($_POST['checkboxes'])) {
       foreach($_POST['checkboxes'] as $user_id) {
        
          $bulk_option = $_POST['bulk-options'];
            if ($bulk_option == 'delete') {
              $bulk_del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $user_id ";
              mysqli_query($con,$bulk_del_query);
            }
            elseif ($bulk_option == 'Approved') {
              $bulk_author_query = "UPDATE `comments` SET `status` = 'approved' WHERE `comments`.`id` = $user_id";
              mysqli_query($con,$bulk_author_query);
            }
            elseif ($bulk_option == 'pending') {
              $bulk_admin_query = "UPDATE `comments` SET `status` = 'pending' WHERE `comments`.`id` = $user_id";
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
        <h1><i class="fa fa-comments"></i>&nbspComments
          <small class="smalld">View All Comments</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard /&nbsp </a></li>
          <li class="active"><i class="fa fa-comments"></i> Comments</li>
        </ol>
        <?php
        if (isset($_GET['reply'])) {
          $reply_id = $_GET['reply'];
          $reply_check = "SELECT * from comments WHERE post_id = $reply_id";
          $reply_check_run = mysqli_query($con,$reply_check);
          if (mysqli_num_rows($reply_check_run) > 0) {
            if (isset($_POST['reply'])) {
              $comment_data = $_POST['comment'];
              if (empty($comment_data)) {
                $comment_error = "Must Fill This Field";
              }
              else{
                $get_users_data = "SELECT * FROM users WHERE = '$session_username'";
                $get_user_run = mysqli_query($con,$get_users_data);
                $get_user_row = mysqli_fetch_array($get_user_run);
                $date = time();
                $first_name = $get_user_row['first_name'];
                $last_name = $get_user_row['last_name'];
                $full_name = "$first_name $last_name";
                $email = $get_user_row['email'];
                $image = $get_user_row['image'];
                $insert_comment_query = "INSERT INTO comments (date,name,username,post_id,email,image,comment,status) VALUES ('$date','$full_name','$session_username','$reply_id','$email','$image','$comment_data','approved')";
                if (mysqli_query($con,$insert_comment_query)) {
                  $comment_msg = "Comment Has Been Submited";
                  header('location:comments.php');
                }
                else{
                  $comment_error = "Comment Has Not Been Submited";
                }
              }
            }
        ?>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <form action="" method="post">
              <div class="form-group" >
                <label for="comment">Comment:*</label>
                <?php
                if (isset($comment_error)) {
                  echo "<span class='pull-right' style='color:red;'>$comment_error</span>";
                }
                elseif (isset($comment_msg)) {
                  echo "<span class='pull-right' style='color:green;'>$comment_msg</span>";
                }
                ?>
                <textarea name="comment" id="comment" placeholder="Your Comment Here" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <input type="submit" name="reply" class="btn btn-primary">
              </form>
          </div>
        </div>
        <hr/>
        <?php
      }
    }
      $query = "SELECT * FROM comments ORDER BY id DESC";
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
                        <option value="Approved">Approved</option>
                        <option value="pending">Un-Approved</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <input type="submit" name="" class="btn btn-success" value="Apply">
                    
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
              <th>Username</th>
              <th>Comment</th>
              <th>Status</th>
              <th>Approved</th>
              <th>Unapproved</th>
              <th>Reply</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($run)) {
              $id = $row['id'];
              $username= $row['username'];
              $status= $row['status'];
              $comment= $row['comment'];
              $post_id= $row['post_id'];
              $date = $row['date'];
            ?>
            <tr>
              <td><input type="checkbox" name="checkboxes[]" value="<?php echo $id;?>" class="checkboxes"></td>
              <td><?php  echo $id; ?></td>
              <td><?php  echo $date; ?></td>
              <td><?php echo $username;?></td>
              <td><?php echo $comment;?></td>
              <td><span style="color:<?php if ($status == 'approved') {
                echo 'green';
              }
              else if ($status == 'pending') {
                echo 'red';
              }
              ?>"><?php echo ucfirst($status);?></span></td>
              <td><a href="comments.php?approved=<?php echo $id; ?>">Approved</a></td>
              <td><a href="comments.php?unapproved=<?php echo $id; ?>">Unapproved</a></td>
              <td><a href="comments.php?reply=<?php echo $post_id; ?>"><i class="fa fa-reply"></i></a></td>
              <td><a href="comments.php?del=<?php echo  $id; ?>"><i class="fa fa-times"></i></a></td>
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