<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
elseif(isset($_SESSION['username']) && $_SESSION['roll'] == 'author') {
  header("Location:index.php");
}
if (isset($_GET['edit'])) {
  $edit_id = $_GET['edit'];
}

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  if (isset($_SESSION['username']) && $_SESSION['roll'] == 'admin') {
    $del_qry = "DELETE FROM categories WHERE id = '$del_id'";
   if(mysqli_query($con,$del_qry)){
     $del_msg = "Category has been deleted";
   }
   else{
    $del_error = "Category has not been deleted";
   }
  }
}
if (isset($_POST['submit'])) {
  $cat_name = mysqli_real_escape_string($con,strtolower($_POST['cat-name']));

  if (empty($cat_name)) {
    $error = "Must Fill This Field";
  }
  else{
    $check_qry = "SELECT * FROM categories WHERE  category = '$cat_name'";
  $check_run = mysqli_query($con,$check_qry);
  if (mysqli_num_rows($check_run)> 0) {
    $error = "Category Already Exists";
  }
  else{
    $insert_qry = "INSERT INTO categories (category) VALUES ('$cat_name')";
    if (mysqli_query($con,$insert_qry)) {
      $msg = "Category Has been added";
    }
    else{
      $error = "Category hast not been added";
    }
  }
  }
}
if (isset($_POST['update'])) {
  $cat_name = mysqli_real_escape_string($con,strtolower($_POST['cat-name']));

  if (empty($cat_name)) {
    $up_error = "Must Fill This Field";
  }
  else{
    $check_qry = "SELECT * FROM categories WHERE  category = '$cat_name'";
  $check_run = mysqli_query($con,$check_qry);
  if (mysqli_num_rows($check_run)> 0) {
    $up_error = "Category Already Exists";
  }
  else{
    $update_qry = "UPDATE `categories` SET `category` = '$cat_name' WHERE `categories`.`id` = $edit_id;";
    if (mysqli_query($con,$update_qry)) {
      $up_msg = "Category Has been Updated";
    }
    else{
      $up_error = "Category hast not been Updated";
    }
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
        <h1><i class="fa fa-folder-open"></i> Categories
          <small class="smalld">Different Categories</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard / </a></li>
          <li class="active"><i class="fa fa-folder-opn"></i> Categories</li>
        </ol>
        <div class="row">
          <div class="col-md-6">
            <form action="" method="post">
            <div class="form-group">
              <label for="category"> Category Name:</label>
              <?php
               if (isset($msg)) {
                 echo "<span class='pull-right' style='color:green'>$msg</span>";
               }
               else if(isset($error))
               {
                 echo "<span class='pull-right' style='color:red'>$error</span>";
               }

              ?>
              <input type="text" class="form-control" placeholder="Category Name" name="cat-name">
            </div>
            <input type="submit" value="Add Category" name="submit" class="btn btn-primary">
            </form >
            <?php
            if (isset($_GET['edit'])) {
             $edit_check_qry = "SELECT * FROM categories WHERE id = $edit_id";
             $edit_check_run = mysqli_query($con,$edit_check_qry);
             if (mysqli_num_rows($edit_check_run )> 0) {
                
                $edit_row = mysqli_fetch_array($edit_check_run);
                $up_category = $edit_row['category'];
            
            ?>
            <hr/>
             <form action="" method="post">
            <div class="form-group">
              <label for="category">Update Category Name:</label>
              <?php
               if (isset($up_msg)) {
                 echo "<span class='pull-right' style='color:green'>$up_msg</span>";
               }
               else if(isset($up_error))
               {
                 echo "<span class='pull-right' style='color:red'>$up_error</span>";
               }

              ?>
              <input type="text" class="form-control" value="<?php echo $up_category; ?>" placeholder="Category Name" name="cat-name">
            </div>
            <input type="submit" value="Update Category" name="update" class="btn btn-primary">
            </form >
            <?php
          }
        }
            ?>
          </div>
           <div class="col-md-6">
            <?php
            $get_qry = "SELECT * FROM categories ORDER BY id DESC";
            $get_run = mysqli_query($con,$get_qry);
            if (mysqli_num_rows($get_run) > 0) {
          
               if (isset($del_msg)) {
                 echo "<span class='pull-right' style='color:green'>$del_msg</span>";
               }
               else if(isset($del_error))
               {
                 echo "<span class='pull-right' style='color:red'>$del_error</span>";
               }

              

            ?>
              <table class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr #</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($get_row = mysqli_fetch_array($get_run)) {
                    
                  $category_id = $get_row['id'];
                  $category_name = $get_row['category'];

                  
                  ?>

                  <tr>
                    <td><?php echo $category_id; ?></td>
                    <td><?php echo ucfirst($category_name); ?></td>            
                    <td><a href="category.php?edit=<?php echo $category_id;?>"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="category.php?del=<?php echo $category_id;?>"><i class="fa fa-times"></i></a></td>
                  </tr>
                  <?php

                    }
                  ?>
                </tbody>
              </table>
              <?php
            }
              else{
              echo "<center>No Categories Found<h3></h3></center>";
            }

              ?>
          </div>
        </div>

      </div>
    </div>
  </div><br><br>
  <!-- Footer -->
    <?php require_once('inc/footer.php');?>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>