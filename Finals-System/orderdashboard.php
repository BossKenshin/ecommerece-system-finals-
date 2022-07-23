<?php
session_start();

require 'php/dbconnect.php';


$seller_name;
$seller_location;
$sell_acc = $_SESSION['seller_acc_name'];



if(isset($_SESSION['seller_id'])){

$idseller = $_SESSION['seller_id'];

$sqle = "SELECT * FROM account where account_id = '$idseller'";

$res  = $conn->query($sqle);

$row = mysqli_fetch_object($res);


$seller_name = $row->lname . ', '.  $row->fname . ' '.  $row->mname ;
$seller_location =  $row->strt_brgy . ', '.  $row->city_municipality . ', '.  $row->province;

//echo $seller_name . ' '. $seller_location; 

}
else{
              header("Location: index.php"); 

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="sellerdashboardstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="transition/transition_dashboard.css">

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
          <a class="nav-link  " aria-current="page" href="sellerhomepage.php" id="home-link">Home</a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link" href="sellerdashboard.php" id="dashboard-link">Dashboard</a>
        </li>

        
      </ul>
     
      <ul class="navbar-nav " id="unlista" >
             <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php  echo $sell_acc; ?>
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
    
if(isset($_SESSION['status'])){
    $string = $_SESSION['status'];

 if(  $string == "ERROR IMAGE"){
 ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>IMAGE DIMENSIONS DOES NOT MATCH TO RECOMMENDED</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
 }

 else{

     ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hey !</strong> <?= $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
 }

     
    }
    unset($_SESSION['status']);


?>

</div>

<div class="container" id="seller-container">

<div class="row">

<div class="col-6">


<div  id="seller-title"> SELLER INFORMATION </div>
<div  id="seller-name"> <?php  echo $seller_name; ?>  </div>
<div  id="seller-loc"> <?php  echo $seller_location; ?> </div>

</div>

<div class="col-6">

<div class="sum-content"> 
  <p class="prod-num"> Number of Orders<br>
   <span>

   <?php 

     $selid = $_SESSION['seller_id'];
            $sql = "SELECT * FROM order_history_table where seller_name='$selid'  ;";
            $res  = $conn->query($sql);

$numrow = mysqli_num_rows($res);

echo $numrow;

  ?>
  </span>
  </p></div>

</div>
</div>
</div>


<div class="container" id="product-container">
<table class="table caption-top">
  <caption>Order History</caption>
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quanity</th>
      <th scope="col">Price ₱</th>
      <th scope="col">Total ₱</th>
      <th scope="col">Buyer Name</th>
      <th scope="col">Buyer Location</th>
      <th  scope="col">Date and Time of Checkout</th>
    </tr>
  </thead>
  <tbody>

 <?php
            $selid = $_SESSION['seller_id'];
            $sql = "SELECT * FROM order_history_table where seller_name= '$selid'  ORDER BY  STR_TO_DATE(date_checkout, '%m/%d/%Y' ) DESC, time_checkout DESC ;";
            $res  = $conn->query($sql);

            if(!$res){
                echo "error";
            }
            while($row = mysqli_fetch_object($res)){
           
            ?>
    <tr>
      <th scope="row"><?php  echo $row->order_id?></th>
      <td><?php  echo $row->prod_name?></td>
      <td><?php  echo $row->qty?></td>
      <td><?php  echo  number_format($row->price_per_unit,2);?></td>
      <td><?php  echo number_format($row->total_per_unit,2);?></td>
      <td><?php  echo $row->buyer_name?></td>
      <td><?php  echo $row->buyer_location?></td>
      <td><?php  echo $row->date_checkout ." ".$row->time_checkout?></td>
   
    </tr>

  <?php

            }

  ?>
    
  </tbody>
</table>


</div>

    


<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">New Product Form</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="productedit.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Product Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="product" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Size</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="size" autocomplete="off">
                        </div>
                    </div>

                     <div class="form-group ">
                        <label class="control-label">Image</label>
                        <div>
                            <input type="file" accept=".jpg,.jpeg,.png" class="form-control input-lg" name="img">
                        </div>
                    </div>

                      <div class="form-group ">
                        <label class="control-label">Price</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text">PHP</span>
                  <span class="input-group-text">0.00</span>
                  <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="price" autocomplete="off">
                        </div>
                    </div>
                   
                         <div class="form-group ">
                        <label class="control-label">Quantity</label>
                        <div>
                            <input type="number" class="form-control input-lg" name="quantity">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-danger" name="submit" value="submit">Add</button>

                        </div>
                    </div>
                </form>
                
            </div>
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