<?php

session_start();

require 'php/dbconnect.php';




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="landingstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="nav-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img src="KJ.png" alt="" class="img-fluid">  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon " style="color:#fff;" ></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="unlist" >
      
      
      </ul>
     
  
       <ul class="navbar-nav " id="unlista" >

  <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php" id="home-link">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="sellerdashboard.php" id="about-link">About</a>
        </li>



      </ul>              



    </div>
  </div>
</nav>

<div class="container-fluid" id="content-div">

<div class="row" id="content-row">
    <div class="col">
     
      <p class="store-quote">YOU ARE <br> YOUR ONLY <br>  <strong>LIMIT</strong> </p>

      <a href="shopfunctions.php"  class="btn btn-outline-light" id="shop-now">SHOP NOW</a>

    </div>
    <div class="col">
    </div>
  </div>


</div>

<div class="container" id="prod-container">
 <ul class="category">
              <li class="category-item">MEN</li>
              <li class="category-item">WOMEN</li>
              <li class="category-item">KIDS</li>
            </ul>

<img src="transition/Untitled-1.png" alt="" class="img-fluid" id="image-showcase">

<p class="sec-quote">What are you looking for?</p>
<a  href="shopfunctions.php"   class="btn btn-dark" id="shop-now-sec">Get me one!</a>
  

           

</div>

<div class="container-fluid" id="footer">

  <p class="h4">ABOUT US</p>

 <div class="row">

  <div class="col-sm">
      <p class="about-text">Join us to find everything you need at the best prices. Doing your online shopping at the Philippines’ best marketplace cannot get any easier. KJ Shoe Collections is a social marketplace where you can enjoy instant and personalized updates from your friends and favorite community members. If you spot great products or deals while you’re doing your online shopping,  KJ Shoe Collections enables you to share these deals with your friends via a simple tap.</p>

  </div>


  <div class="col-sm">

    <ul>

      <li class="item">
          <a href="" class="signup">Faq</a>
      </li>

          <li class="item">
          <a href="" class="top">Go top</a>
      </li>
    </ul>


  </div>


 </div>





</div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
     <script type="text/javascript" src="delete.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"
      integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
      crossorigin="anonymous"
      async
    ></script>
</body>
</html>