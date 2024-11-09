<?php
  include('action.php');
  if(!isset($_SESSION['uname'])){
    header('location:index.php');
  } 
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
  <link href="img/wed.jpg" rel="icon">
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
<body>




<div class="container">
  <div class="card mt-4">
    <div class="card-header bg-info">
      <h3 class="text-center">Service Details</h3>
    </div>
   
    <?php

if(isset($_GET['reg_id'])) {
    $reg_id = $_GET['reg_id'];
    $sql = "SELECT * FROM registration WHERE reg_id='$reg_id'";
    $run = mysqli_query($con, $sql);
    if (mysqli_num_rows($run) == 0) {
        echo "<h2 class='text-center'>Wedding Not Register Yet</h2>";
    } else{
            $row = mysqli_fetch_array($run);
            $d1name = $row['dname'];
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


            $sql = "SELECT * FROM catering WHERE cid ='$cid'";
            $run = mysqli_query($con, $sql);
              $price1 = 0;
              $cname = '';
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price1=$row['price'];
                $cname=$row['name'];
              }
              
              $sql="SELECT * FROM theme WHERE tid='$tid'  ";
              $run=mysqli_query($con,$sql);
              $price2 = 0;
              $tname = '';
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price2=$row['price'];
                $tname=$row['name'];  
              }
             
              $sql="SELECT * FROM music WHERE mid='$mid' ";
              $run=mysqli_query($con,$sql);
              $price3 = 0;
              $mname = '';
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price3=$row['price'];
                $mname=$row['name']; 
              }
              
              $sql="SELECT * FROM photoshop WHERE pid='$pid' ";
              $run=mysqli_query($con,$sql);
              $price4 = 0;
              $pname='';
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price4=$row['price'];
                $pname=$row['name'];
              }
             
              $sql="SELECT * FROM decoration WHERE did='$did' ";
              $run = mysqli_query($con,$sql);
              $price5=0;
              $dname = '';
              if(mysqli_num_rows($run) !=0){
                $row=mysqli_fetch_array($run);
                $price5=$row['price'];
                $dname=$row['name'];
              }
              $sql="SELECT * FROM venue WHERE vid='$vid' ";
              $run = mysqli_query($con, $sql);
              $price6 = 0;
              $vname ='';
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price6=$row['price'];
                $vname=$row['name'];
              }
              $sum=$price1+$price2+$price3+$price4+$price5+$price6+$s; 
               echo " <div class='card-body'>
      <h4 class='text-center'>Wedding Couple Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Groom Name :</h5>
          <h5>Bride Name :</h5>
          <h5>Wedding Date :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$d1name</h5>
          <h5>$dlname</h5>
          <h5>$date</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Catering Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Catering Name :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$cname</h5>
          <h5>$price1</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Decoration Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Decoration  :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$dname</h5>
          <h5>$price5</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Music Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Music Style :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$mname</h5>
          <h5>$price3</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Venue Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Venue :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$vname</h5>
          <h5>$price6</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Theme Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Theme Type :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$tname</h5>
          <h5>$price2</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Photoshop Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Photo :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$pname</h5>
          <h5>$price4</h5>
        </div>
      </div>
    </div>
    <div class='card-footer'>
      <h3 class='text-center'>Total Fare :$sum </h3>
    </div>";
            }
          }     
          ?>
  </div>
</div>



  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route mt-4">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
            Select  Services
            </h3>
            <p class="subtitle-a">
             
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
        <a href="venue.php">
          <div class="service-box" style="background-image:url(img/venue.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Venue</b></h2>
              <p class="s-description text-center text-white"><b>
               </b>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
           <div class="service-box" style="background-image:url(img/theme.jpg); background-size: cover;">
            <div class="service-ico">
            <a href="theme.php">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Theme</b></h2>
              <p class="s-description text-center text-white"><b>
                </b>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
           <div class="service-box" style="background-image:url(img/cat.jpg); background-size: cover;">
            <div class="service-ico">
            <a href="cat.php">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Catering</b></h2>
              <p class="s-description text-center text-white"><b>
                </b>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
        <a href="music.php">
           <div class="service-box" style="background-image:url(img/dj.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Music</b></h2>
              <p class="s-description text-center text-white"><b>
              </b>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
        <a href="photo.php">
           <div class="service-box" style="background-image:url(img/photo.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Photoshop</b></h2>
              <p class="s-description text-center text-white"><b>
                </b>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
        <a href="decoration.php">
          <div class="service-box" style="background-image:url(img/decoration.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Decoration</b></h2>
              <p class="s-description text-center text-white"><b>
               </b>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


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
 </body>
    </html>