<?php
  require_once('db.php');
?>
<aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form action="#" class="search-form">
              <div class="form-group">
                <input type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
            <div class="blog-posts">
              <?php
               $query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY id DESC LIMIT 3";
               $run = mysqli_query($con,$query);
               if (mysqli_num_rows($run) > 0) {
                 while ($row = mysqli_fetch_array($run)) {
                   $id = $row['id'];
                   $title = $row['title'];
                   $image = $row['image'];
                   
                ?> 
              <a href="#">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="img/<?php echo $image; ?>" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php echo $title; ?></strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div>
              </a>
              <?php
                }}
               ?>
            </div>
          </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            <?php
            $query="SELECT * FROM categories";
            $run=mysqli_query($con,$query);
            if(mysqli_num_rows($run) > 0){
                while ($row = mysqli_fetch_array($run)) {

                      $category = ucfirst($row['category']);
                      $id = $row['id'];
                    echo "

                        <div class='item d-flex justify-content-between'><a href='index.php?cat_id=".$id."'>$category</a><span>12</span></div>
                    ";    
                }
            } else{

              echo "

                        <div class='item d-flex justify-content-between'><a href='#'>No Categories Yet</a><span>12</span></div>
                    ";
            }
            ?>
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">       
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
            </ul>
          </div>
        </aside>