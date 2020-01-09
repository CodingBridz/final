<!DOCTYPE html>
<html>
  <head>
    <?php require_once('inc/top.php');?>
  </head>
  <body>
    <?php require_once('inc/header.php');?>
    <br><br><br><br>
    <!--header end-->
      <div class="container">
      <div class="row">
        <main class="col-lg-8"> 
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.4357647795127!2d75.86302515008553!3d30.93039188304132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a837c9008b973%3A0xd750f8e26e9fe94a!2sCodingBridz!5e0!3m2!1sen!2sin!4v1575443104454!5m2!1sen!2sin" width="700" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="col-md-12 contact-form">
              <center><h2>Contact Form</h2> </center>
                <form action="">
                  <div class="form-group">
                      <label for="full-name">Full Name:</label>
                      <input type="text" id="full-name" class="form-control" placeholder="Full Name">
                      <label for="Email">Email:</label>
                      <input type="text" id="Email" class="form-control" placeholder="Email">
                      <label for="Website">Website:</label>
                      <input type="text" id="website" class="form-control" placeholder="Website">
                      <label for="message">Message:</label>
                      <textarea id="message" cols="30" rows="10" class="form-control" placeholder="Your Message Should Be Here"></textarea><br>
                      <center><input type="submit" name="submit" value="Submit Here" class="btn btn-danger"></center>
                  </div>
                </form>
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
    <script src="vendor/jquery/style.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>