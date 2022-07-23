<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css"> 
 <script src="js/bootstrap.bundle.min.js"></script> 
 <link rel="stylesheet" href="loginstyle.css">
    <title>Log in</title>
    <link rel="stylesheet" href="transition/trans.css">
</head>
<body>

    <div class="container-fluid">


  <div class="row" id="top-row">
    <div class="col-2">
     <a href="index.php"><img src="KJ.png" class="mx-auto d-block"></a> 

    </div>
    <div class="col-6">
   
    <img src="loginblackshoe.png" class="img-fluid">
        <img src="loginredshoe.png" class="img-fluid">
                <img id="br" src="shoe-brown.png" class="img-fluid">
    </div>
<div class="col-2"></div>
  </div>







<?php


    $string;
    
if(isset($_SESSION['validate_account'])){


  if($_SESSION['validate_account'] == "ERROR"){
  ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>CREDENTIALS DOES NOT MATCH</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
  }

      elseif($_SESSION['validate_account'] == "DUAL"){
      ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>CANNOT LOG IN AS OF NOW</strong> 
                <p>There's an account that is currenly logged in. <span>  <a href="logout.php">Click here to logout other account</a></span></p>
              
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
    }
      else{
      ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>ACCOUNT CREATED, you can now Login.</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
    }
    }
   
    unset($_SESSION['validate_account']);


?>



  
    <div class="container" id="form-container">
        <form class="row g-3" action="accountfunctions.php" method="post">

 <div class="col-md-12">
   <p class="h3">SIGN IN</p> 

</div>

  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" required>
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password" required>
  </div>
 


  <div class="col-12">
    <button type="submit" class="btn btn-danger" name="loginme" >Log in</button>
  </div>
 <div class="col-12">
      <a id="link-btn" class="btn btn-link"href="signup.php"> Don't have an Account? Sign up</a>
    </div>
  </div>
   
</form>
        </div>

    </div>


<div class="footer" id="row-bot" >

            <p class="h5"> ABOUT US</p>

  <p class="about-text">
              Through our collections we blur the borders between high fashion
              and high performance. Like our Shoes by different brands athletic
              clothing collection – designed to look the part inside and outside
              of the gym. Or some of our shoe Originals lifestyle pieces, that
              can be worn as sports apparel too. Our lives are constantly
              changing. Becoming more and more versatile.
            </p>

           
    </div>





        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
 
</body>
</html>