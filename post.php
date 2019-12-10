<?php require_once('inc/db.php'); ?>
<?php 
if (isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
  $query = "SELECT * FROM  posts WHERE status = 'publish' and id = $post_id";
  $run = mysqli_query($con,$query);
  if (mysqli_num_rows($run)> 0) {
    $row = mysqli_fetch_array($run);
    $id = $row['id'];
    $date = ($row['date']);
    $title = $row['title'];
    $author = $row['author'];
    $author_image = $row['author_image'];
    $image = $row['image'];
    $categories = $row['categories'];
    $post_data = $row['post_data'];
  }
  else{
    header('Location: blog.php');
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
    <br><br><br><br>
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="img/<?php echo $image;?>" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="post.php"><?php echo ucfirst($categories);?></a></div>
                </div>
                <h1><?php echo $title; ?><a href="post.php"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/<?php echo $author_image;?>" alt="..." class="img-fluid"></div>
                    <div class="title"><span><?php echo ucfirst($author); ?></span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i> <?php echo $date; ?></div>
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
                <div class="post-body">
                  <?php echo $post_data; ?>
                </div>
                <div class="post-tags"><a href="#" class="tag">#Business</a><a href="#" class="tag">#Tricks</a><a href="#" class="tag">#Financial</a><a href="#" class="tag">#Economy</a></div>
                <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                    <div class="text"><strong class="text-primary">Previous Post </strong>
                      <h6>I Bought a Wedding Dress.</h6>
                    </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                    <div class="text"><strong class="text-primary">Next Post </strong>
                      <h6>I Bought a Wedding Dress.</h6>
                    </div>
                    <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>
                <div class="post-comments">
                  <header>
                    <h3 class="h6">Post Comments<span class="no-of-comments"></span></h3>
                  </header>
                  </div>
                  <?php
                  $c_query = "SELECT * FROM comments WHERE status ='approved' and post_id = $post_id ORDER BY id DESC";
                  $c_run = mysqli_query($con,$c_query);
                  if (mysqli_num_rows($c_run) > 0) {
                  ?>
                  <div class="comment">
                    <?php
                    while ($c_row = mysqli_fetch_array($c_run)) {
                     $c_id = $c_row['id'];
                     $c_name = $c_row['name'];
                     $c_username = $c_row['username'];
                     $c_image = $c_row['image'];
                     $c_comment = $c_row['comment'];
                     $c_date = $c_row['date'];
                    ?>
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"><img src="img/<?php echo $c_image; ?>"alt="..." class="img-fluid rounded-circle" height="50" width="50"></div>
                        <div class="title"><strong>|<?php echo ucfirst($c_name); ?></strong><span class="date">|<?php echo $c_date; ?></span></div>
                      </div>
                    </div>
                    <br/>
                    <div class="comment-body">
                      <p><?php echo $c_comment; ?></p>
                    </div>
                    <?php
                  }
                    ?>
                  </div>
                  <?php
                }

                  if (isset($_POST['submit'])) {
                    $cs_name = $_POST['name'];
                    $cs_email = $_POST['email'];
                    $cs_comment = $_POST['comment'];
                    $cs_date = time();
                    if (empty($cs_name) or empty($cs_email) or empty($cs_comment)) {
                      
                      $error_msg = "All (*) feilds are Required";

                    }
                    else{
                      $cs_query = "INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES (NULL, '$cs_date', '$cs_name', 'ShreeGanesh', '$post_id', '$cs_email', 'CodingBridz.com', 'user.svg', '$cs_comment', 'pending')";
                      if (mysqli_query($con,$cs_query)) {
                          $msg = "Comment Submited and Wait For Approval";
                            $cs_name = "";
                            $cs_email = "";
                            $cs_comment = "";
                      }
                      else{
                        $error_msg = "Comment has been not Submited";
                      }
                    }
                  }
                  ?>
                </div>
                <div class="add-comment">
                  <header>
                    <h3 class="h6">Leave a reply</h3>
                  </header>
                  <form action="" method="post" class="commenting-form">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <input type="text" name="name" value="<?php
                        if(isset($cs_name)){echo $cs_name;} ?>" id="username" placeholder="Name" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <input type="email" name="email" value="<?php
                        if(isset($cs_email)){echo $cs_email;} ?>"  id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <textarea name="comment" id="usercomment" placeholder="Type your comment"  class="form-control"><?php
                        if(isset($cs_comment)){echo $cs_comment;} ?> </textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary" name="submit">Submit Comment</button>
                        <?php
                        if (isset($error_msg)) {
                         echo "<span style='color:red;'class='pull-right'>$error_msg</span>";
                        }
                        elseif (isset($msg)) {
                          echo "<span style='color:Green;'class='pull-right'>$msg</span>";
                        }

                        ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </main>
        <?php require_once('inc/sidebar.php');?>
      </div>
    </div>
    <!-- Page Footer-->
    <?php require_once('inc/footer.php');?>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>