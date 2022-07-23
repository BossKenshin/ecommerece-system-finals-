<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css"> 
 <script src="js/bootstrap.bundle.min.js"></script> 
 <link rel="stylesheet" href="signup.css">
    <title>Sign up</title>
        <link rel="stylesheet" href="transition/trans.css">

</head>
<body>

    <div class="container-fluid">


  <div class="row" id="top-row">
    <div class="col-2">
      <img src="KJ.png" class="mx-auto d-block">

    </div>
    <div class="col-6">
   
    <img src="loginblackshoe.png" class="img-fluid">
        <img src="loginredshoe.png" class="img-fluid">
                <img id="br" src="shoe-brown.png" class="img-fluid">


    </div>

    <div class="col-2"></div>
  

  </div>


    <div class="container">




<?php
session_start();

    $string;
    
if(isset($_SESSION['validate_email'])){
    $string = $_SESSION['validate_email'];

       ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Credentials already used</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
    }
    unset($_SESSION['validate_email']);

      
?>



        <form class="row g-3" id="form-row"  action="accountfunctions.php" method="post">

 <div class="col-md-12">
   <p class="h3">CREATE NEW ACCOUNT</p> 

</div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password" required>
  </div>
  <div class="col-4">
    <label for="inputAddress" class="form-label">Firstname</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Firstname" name="firstname" required>
  </div>
   <div class="col-4">
    <label for="inputAddress" class="form-label">Lastname</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Lastname" name="lastname" required>
  </div>
   <div class="col-4">
    <label for="inputAddress" class="form-label">Middlename</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Middlename" name="middlename" required>
  </div>

<div class="col-4">
    <label for="inputAddress2" class="form-label">Street and Barangay</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Street, Barangay" name="st_brgy" required>
  </div>

<div class="col-4">
    <label for="inputAddress2" class="form-label">City or Municaplity</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="City or Municaplity" name="city_muni" required>
  </div>

  <div class="col-4">
    <label for="inputAddress2" class="form-label">Province</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Province" name="province" required>
  </div>


  <div class="col-12">
    <label for="inputAddress2" class="form-label">Birthdate</label>
    <input type="date" class="form-control" id="inputAddress2" placeholder="" name="birthdate" required>
  </div>

<div class="col-12" id="select"> 
  <div class="selectbox">
  <div class="form-check">
      <input class="form-check-input" type="radio" id="gridCheck" name="flexRadioDefault" value="Seller" checked>
      <label class="form-check-label" for="gridCheck">
        I am a Seller
      </label>
    </div>
  </div>

   <div class="selectbox">
    <div class="form-check">
      <input class="form-check-input" type="radio" id="gridCheck" value="Buyer" name="flexRadioDefault">
      <label class="form-check-label" for="gridCheck">
         I am a Buyer
      </label>
    </div>
  </div>
</div>
 
    


  <div class="col-12" id="tcol">
    <button type="submit" class="btn btn-danger" id="btn-signup" name="signme">Sign Up</button>
  </div>

  <div class="col-12">
      <a id="link-btn" class="btn btn-link"href="login.php">Have an Account? Click here to Log in</a>
    </div>


</form>
        </div>
    </div>



        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
 
</body>
</html>