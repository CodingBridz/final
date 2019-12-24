<?php require_once('../inc/db.php'); ?>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
$session_username = $_SESSION['username'];
$session_author_image = $_SESSION['author_image'];

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
        <h1><i class="fa fa-plus-square"></i> Add Post
          <small class="smalld">Add New Post</small>
          <hr>
        </h1>
        <ol class="breadcrumb">
          <a href="index.php"><li class="active"><i class="fa fa-tachometer"></i> Dashboard / &nbsp</li></a>   
          <li class="active"><i class="fa fa-plus-square"></i>&nbsp Add Post</li>
        </ol>
        <?php
        if (isset($_POST['submit'])) {
         $date = time();
         $title = mysqli_real_escape_string($con,$_POST['title']);
         $post_data = mysqli_real_escape_string($con,$_POST['post_data']);
         $categories = $_POST['categories'];
         $tags = mysqli_real_escape_string($con,$_POST['tags']);
         $status = $_POST['status'];
         $image = $_FILES['image']['name'];
         $tmp_name = $_FILES['image']['tmp_name'];
         if (empty($title) or empty($post_data) or empty($tags) or empty($image)) {
           $error = "All * Fields are Required";
         }
         else{
          $insert_query = "INSERT INTO posts (date,title,author,author_image,image,categories,tags,post_data,views,status) VALUES ('$date','$title','$session_username','$session_author_image','$image','$categories','$tags','$post_data','0','$status')";
                  
                  if (mysqli_query($con,$insert_query)) {
                    $msg = "Post Has Been Added";
                    $path = "img/$image";
                    if(move_uploaded_file($tmp_name,$path)){
                        copy($path,"../$path");

                    }
                  }
                  else{
                    $error = "Post Has Been Added";
                  }
         }
        }
        ?>
        <div class="row">
            <div class="col-md-12">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title">Title:*</label>
                  <?php
                    if (isset($msg)) {
                     echo "<span class='pull-right' style='color:green'>$msg</span>";
                    }
                    elseif (isset($error)) {
                     echo "<span class='pull-right' style='color:red'>$error</span>";
                    }
                  ?>
                  <input type="text" name="title" placeholder="Type Post Title Here" class="form-control">
                </div>
                <div class="form-group">
                 <a href="media.php" class="btn btn-primary" name="">Add Media</a>
                </div>
                <div class="form-group">
                  <textarea name="post-data" id="textarea" rows="10" class="form-control"></textarea>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                  <label for="file">Post Image:*</label>
                  <input type="file" name="image">
                </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                  <label for="categories">Categories:*</label>
                    <select class="form-control" id="categories" name="categories">
                      <?php
                      $cat_query = "SELECT * FROM categories ORDER BY id DESC";
                      $cat_run = mysqli_query($con,$cat_query);

                        if (mysqli_num_rows($cat_run) > 0) {
                          while ($cat_row =mysqli_fetch_array($cat_run)){
                            
                            $cat_name = $cat_row['category'];
                            echo "<option value='".$cat_name."'>".ucfirst($cat_name)."</option>";
                          }
                          }
                        
                        else{
                          echo "<center><h6>No Category Availabel</h6></center>";
                        }
                      ?>
                    </select>
                </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                  <label for="tags">Tags:*</label>
                  <input type="text" name="tags" placeholder="Your Tags Here" class="form-control">
                </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                  <label for="status">Status:*</label>
                    <select class="form-control" id="status">
                      <option value="publish">Publish</option>
                      <option value="draft">Draft</option>
                    </select>
                </div>
                  </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Add Post">
              </form>
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
