<?php
session_start();

require 'php/dbconnect.php';

$buy_acc =  $_SESSION['buyer_acc_name'];
unset($_SESSION['view_prid']);

if(isset($_SESSION['buyer_id'])){

//echo  $_SESSION['buyer_fullname'];
//echo  $_SESSION['buyer_location'];


}
else{
              header("Location: index.php"); 

}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="homepage.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Homepage</title>
        <link rel="stylesheet" href="transition/transforhomepage.css">

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
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="homepage.php" id="home-link">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php" id="dashboard-link"> 
            <span><i class="bi bi-cart4"></i></span>  
            Cart</a>
        </li>

        
      </ul>
      <form class="d-flex" method="get" action="searchresults.php">
        <input class="form-control me-2" id="searchbox" type="search" placeholder="Search" name="search_me" aria-label="Search">
        <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
      </form>
       <ul class="navbar-nav " id="unlista" >

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php  echo $buy_acc; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>              
      </ul>
    </div>
  </div>
</nav>
    



<div class="container">




<?php


    $string;
    
if(isset($_SESSION['add_cart_status'])){
    $string = $_SESSION['add_cart_status'];

 if(  $string == "ERROR"){
 ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>PRODUCT ADD TO CART UNSUCCESSFUL, DUE TO QUANTITY OVERLAP</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
 }

 else{

     ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>PRODUCT IS ADDED TO YOUR CART</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
 }

     
    }
 if(isset($_SESSION['checkout_status'])){


     ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>CART CHECKOUT  <?php  echo $_SESSION['checkout_status']; ?>  </strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
    

}



    unset($_SESSION['add_cart_status']);
     unset($_SESSION['checkout_status']);


?>


</div>



<div class="container-fluid" id="content_div">
 <div class="row">
        <div class="col-3">
        <div class="accordion" id="accordionExample">
            <p class="cat">CATEGORIES</p>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="false"
                  aria-controls="collapseOne"
                >
                  MENS
                </button>
              </h2>
              <div
                id="collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <div class="btn-group-vertical">
                    <a  href="displaycategories.php?category=Men&sub=Sneakers">Sneakers</a>
                    <a  href="displaycategories.php?category=Men&sub=Running Shoes">Running Shoes</a>
                    <a  href="displaycategories.php?category=Men&sub=Basketball Shoes">Basketball Shoes</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  WOMEN
                </button>
              </h2>
              <div
                id="collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <div class="btn-group-vertical">
                   <a  href="displaycategories.php?category=Women&sub=Sneakers">Sneakers</a>
                    <a  href="displaycategories.php?category=Women&sub=Running Shoes">Running Shoes</a>
                    <a  href="displaycategories.php?category=Women&sub=Basketball Shoes">Basketball Shoes</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  KIDS
                </button>
              </h2>
              <div
                id="collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body">
                  <div class="btn-group-vertical">
                   <a  href="displaycategories.php?category=Kids&sub=Sneakers">Sneakers</a>
                    <a  href="displaycategories.php?category=Kids&sub=Running Shoes">Running Shoes</a>
                    <a  href="displaycategories.php?category=Kids&sub=Basketball Shoes">Basketball Shoes</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-9">

            <div class="banner">
              <img src="banner.png" alt="banner" class="img-fluid">
            </div>

          <div class="product-container">

<?php
            require "php/dbconnect.php";

             $sql = "SELECT product_name, price, id, min(image_name) as image_name, AVG(rated_product_table.rated_points) as rate_points FROM product_table 
                    INNER JOIN image_table ON product_table.id = image_table.prod_id 
                    LEFT JOIN rated_product_table ON product_table.id = rated_product_table.product_id
                    where quantity != 0  OR rate_status = 'RATED' GROUP BY product_name ORDER BY rate_points DESC;" ;       
                    $res  = $conn->query($sql);

            if(!$res){
                echo "error";
            }
            
            while($row = mysqli_fetch_object($res)){
           
            ?>



  

  <div class="product-div">
               <a  href="viewproductbuyer.php?id=<?php echo $row->id;?>" class="view-product"></a>
      <div class="img-container" <?php echo "style='background-image: url(image/".$row->image_name .") ; '"?> >
      </div>

      <div class="text-div">
        <p class="product-name"> <i class="bi bi-box2"></i> <?php  echo$row->product_name?></p>
        <p class="price"> <i class="bi bi-tags"> </i> <?php  echo "₱ ". number_format($row->price,2); 
        
        if($row->rate_points != 0){
        echo" | "." <i class='bi bi-star-fill'></i> ".number_format($row->rate_points,1);  
        }
        ?> </p>
      </div>
    </div>

            <?php

            }
?>

          
          </div>
        </div>
      </div>

        <div class="container-fluid " id="footer">
            <div class="row gy-4 gx-5" id="footerrow">
                          <div class="col-lg-4 col-md-6">
                              <h5 class="h1 text-white"> Top Online Shopping Experience</h5>
                              <p class="small text-muted">Committed to both quantity and quality, KJ Collections continues to provide its customers with a diverse selection of products at the lowest prices every time..</p>
                              <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved.</p>
                            </div>
                        <div class="col-lg-4 col-md-6">
                            <h5 class="text-white mb-3">Quick links</h5>
                            <ul class="list-unstyled text-muted">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Get started</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
               
                          <div class="col-lg-4 col-md-6">
                              <h5 class="text-white mb-3">Questions</h5>
                              <p class="small text-muted">Fill up this form if you have any questions, we will reply as soon as we get your questions.</p>
                              <form action="#">
                                  <div class="input-group mb-3">
                                      <input class="form-control" id="form-footer" type="text" placeholder="Questions here" aria-label="Questions here" aria-describedby="button-addon2">
                                      <button class="btn btn-danger" id="button-addon2" type="button"><i class="bi bi-send"></i></button>
                                  </div>
                              </form>
                          </div>
            </div>
        </div>
</div>








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
