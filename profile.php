<?php
  include('action.php');
  if(!isset($_SESSION['uname'])){
    header('location:index.php');
  } 
  $loggedInUserName = $_SESSION['urname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Wedding Party</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/wed3.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">F.R.I.E.N.D.S Wedding Planner</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="#home">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/registration.php">Wedding Registration</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll" href="#das"><?php echo $_SESSION['urname']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/wed.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">F.R.I.E.N.D.S Wedding Planner</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Find your best Match,Make Your Wedding Memorable,Hire Us. Rest on Us</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->




  <br>

  <div id="#das">
    <h2 class="text-center">Wedding Details</h2>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-2"> Name</div>
                    <div class="col-md-2">Groom Name</div>
                    <div class="col-md-2">Bride Name</div>
                    <div class="col-md-2">Wedding Date</div>
                    <div class="col-md-1">Person </div>
                    <div class="col-md-2">Total Cost</div>
                    <div class="col-md-1">Action</div>
                </div>
            </div>
            <div class="card-body"> 
            <?php
                    $uid = $_SESSION['uid'];
                    $sql = "SELECT * FROM registration WHERE uid = '$uid'";
                    $runRegistration = mysqli_query($con, $sql);

                    if (mysqli_num_rows($runRegistration) == 0) {
                        echo "<h2 class='text-center'>No Wedding Registered Yet</h2>";
                    } else {
                        while ($row = mysqli_fetch_array($runRegistration)) {
                            $name = $row['name'];
                            // Check if the name from the database matches the logged-in user's name
                            if ($name === $loggedInUserName) {
                        $reg_id = $row['reg_id'];
                        $name = $row['name'];
                        $dname = $row['dname'];
                        $dlname = $row['dlname'];
                        $date = $row['wdate'];
                        $pno = $row['pno'];
                        $s = $pno * 100;
                        $vid = $row['vid'];
                        $tid = $row['tid'];
                        $did = $row['did'];
                        $pid = $row['pid'];
                        $cid = $row['cid'];
                        $mid = $row['mid'];
                        // Fetching catering price
                        $sql = "SELECT * FROM catering WHERE cid='$cid' ";
                        $run = mysqli_query($con, $sql);
                        $price1 = 0;
                        if (mysqli_num_rows($run) != 0) {
                            $row = mysqli_fetch_array($run);
                            $price1 = $row['price'];
                        }
                        // Fetching theme price
                        $sql = "SELECT * FROM theme WHERE tid='$tid' ";
                        $run = mysqli_query($con, $sql);
                        $price2 = 0;
                        if (mysqli_num_rows($run) != 0) {
                            $row = mysqli_fetch_array($run);
                            $price2 = $row['price'];
                        }
                        // Fetching music price
                        $price3 = 0;
                        $sql = "SELECT * FROM music WHERE mid='$mid' ";
                        $run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($run) != 0) {
                            $row = mysqli_fetch_array($run);
                            $price3 = $row['price'];
                        }
                        // Fetching photoshop price
                        $price4 = 0;
                        $sql = "SELECT * FROM photoshop WHERE pid='$pid' ";
                        $run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($run) != 0) {
                            $row = mysqli_fetch_array($run);
                            $price4 = $row['price'];
                        }
                        // Fetching decoration price
                        $sql = "SELECT * FROM decoration WHERE did='$did' ";
                        $run = mysqli_query($con, $sql);
                        $price5 = 0;
                        if (mysqli_num_rows($run) != 0) {
                            $row = mysqli_fetch_array($run);
                            $price5 = $row['price'];
                        }
                        // Fetching venue price
                        $sql = "SELECT * FROM venue WHERE vid='$vid' ";
                        $run = mysqli_query($con, $sql);
                        $price6 = 0;
                        if (mysqli_num_rows($run) != 0) {
                            $row = mysqli_fetch_array($run);
                            $price6 = $row['price'];
                        }
                        // Calculating total cost
                        $total_cost = $price1 + $price2 + $price3 + $price4 + $price5 + $price6 + $s;

                        // Displaying wedding details
                        echo "<div class='row'>
                    <div class='col-md-2'><h5>$name</h5></div>
                    <div class='col-md-2'><h5>$dname</h5></div>
                    <div class='col-md-2'><h5>$dlname</h5></div>
                    <div class='col-md-2'><h5>$date</h5></div>
                    <div class='col-md-1'><h5>$pno</h5></div>
                    <div class='col-md-2'><h5>$total_cost</h5></div>
                    <div class='col-md-1'>
                        <div class='btn btn-outline-danger bookButton' rid='$reg_id'>Service</div>
                        <div style='margin-top:10px;' class='btn btn-outline-danger del' rid='$reg_id'>Cancel</div>
                    </div>
                </div><br>";
        }
    }
  }
?>
            </div>
        </div>
    </div>
</div>








  <!--/ Section Services End /-->
   
  <div class="section-counter paralax-mf bg-image" style="background-image: url(img/wed.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">450</p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">3</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-people"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">550</p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">36</p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Portfolio Star /-->
 

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                    <div class="about-img">
                      <img src="img/wed2.jpeg" class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                 
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                  <p class="lead">
                  Welcome to F.R.I.E.N.D.S Wedding Planner, where love meets perfection. With a passion for 
                  creating unforgettable moments, we specialize in crafting bespoke weddings tailored to 
                  your unique love story. From intimate gatherings to lavish celebrations, our dedicated team of 
                  professionals is committed to turning your dreams into reality. With meticulous attention to detail 
                  and a flair for creativity, we handle every aspect of your special day, ensuring a seamless and 
                  stress-free experience from start to finish. Let us be your trusted partner in making your wedding 
                  day truly magical. Get in touch with us today and let's begin the journey towards your happily ever after.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Testimonials Star /-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(img/wed1.jpeg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-mf" class="owl-carousel owl-theme">
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/prajna.jpeg" alt="" class="rounded-circle b-shadow-a" style="height: 250px; width: 250px;">
                <span class="author">PRAJNASHANKARI M N</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  CSE (Data science) Engineering student
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/nisha.jpeg" alt="" class="rounded-circle b-shadow-a" style="height: 250px; width: 250px;">
                <span class="author">NISHA SHETTY A</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                CSE (Data science) Engineering student
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/shreelakshmi.jpeg" alt="" class="rounded-circle b-shadow-a" style="height: 250px; width: 250px;">
                <span class="author">SHREELAKSHMI</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                CSE (Data science) Engineering student
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Blog Star /-->
  <!--/ Section Blog End /-->
  
  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/wed2.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      F.R.I.E.N.D.S
                     </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span>Nehru Nagar, Puttur 574203</li>
                      <li><span class="ion-ios-telephone"></span> +919608472701</li>
                      <li><span class="ion-email"></span> nishushetty654@gmail.com</li>
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>F.R.I.E.N.D.S Wedding Planner</strong>. All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                Designed by <a href="#">Nisha, Shreelakshmi and Prajna</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  var bookButtons = document.querySelectorAll(".bookButton");

  
  bookButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        var regId = this.getAttribute("rid");
        window.location.href = "bookservice.php?reg_id=" + regId;
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var cancelButton = document.querySelectorAll(".del");

    // Add click event listener to each cancel button
    cancelButton.forEach(function(button) {
        button.addEventListener("click", function() {
            var row = this.parentNode.parentNode;
            var regId = this.getAttribute("rid");

            // Send AJAX request to cancel_wedding.php
            $.ajax({
                url: 'cancel_wedding.php',
                type: 'POST',
                dataType: 'json',
                data: { reg_id: regId },
                success: function(response) {
                    if(response.status === 'success') {
                        // Remove the row from the DOM
                        row.remove();
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error: Failed to delete wedding detail.');
                }
            });
        });
    });
});
</script>
</body>
</html>