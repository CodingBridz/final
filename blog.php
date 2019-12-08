<?php require_once('inc/db.php');

  $no_of_posts = 2;
  if (isset($_GET['page'])){
    $page_id = $_GET['page'];
  }
  else{
    $page_id = 1;
  }
  $all_post_query = "SELECT  * FROM posts WHERE status ='publish'";
  $all_post_run = mysqli_query($con,$all_post_query);
  $all_post = mysqli_num_rows($all_post_run);
  $total_pages = ceil($all_post / $no_of_posts);
  $posts_start_from = ($page_id - 1) * $no_of_posts;
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
        <main class="posts-listing col-lg-8"> 
          <div class="container">
             <center>
              <h1>Here are some Posts</h1>
              </center><br>
            <div class="row">
              <?php
       $query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY id DESC LIMIT $posts_start_from ,$no_of_posts";
       $run = mysqli_query($con,$query);
       if (mysqli_num_rows($run) > 0) {
         while ($row = mysqli_fetch_array($run)) {
           $id = $row['id'];
           $date = $row['date'];
           $title = $row['title'];
           $author = $row['author'];
           $author_image = $row['author_image'];
           $image = $row['image'];
           $categories = $row['categories'];
           $tags = $row['tags'];
           $post_data = $row['post_data'];
           $views = $row['views'];
           $status = $row['status'];
           ?>  
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.php?post_id=<?php echo $id; ?>"><img src="img/<?php echo $image; ?>" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last"><?php echo $date; ?></div>
                    <div class="category"><a href="index.php?cat=<?php
                    echo $id; ?>"><?php echo $categories; ?></a></div>
                  </div><a href="post.php?post_id=<?php echo $id; ?>">
                    <h3 class="h4"><?php echo $title; ?></h3></a>
                  <p class="text-muted"><?php echo substr($post_data,0,300)."........"; ?>
                     <a href="post.php?post_id=<?php echo $id; ?>" name="read more"  class="btn btn-primary" id="radius">Read More</a>
                  </p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                      <div class="title"><span><?php echo $author; ?></span></div></a>
                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </footer>
                </div>
              </div>
              <?php 
            } 
          }else{

               echo "No Posts Here Yet !!";
          }

            ?>
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
               <?php
               for ($i=1; $i<=$total_pages; $i++) { 
                 echo "<li class='page-item ".($page_id == $i ? 'active':'')."'><a href='blog.php?page=".$i."' class='page-link'>$i</a></li>";
               }
               ?>
              </ul>
            </nav>
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