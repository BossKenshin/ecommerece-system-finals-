<?php 
session_start();
$prod_array = array();

if(isset($_SESSION['seller_id'])){

  $sid = $_SESSION['seller_id'];

  if(isset($_POST['checkout'])){

    foreach($prod_array as $prod_id => $qty_value) {
    
        $sql = "UPDATE product_table SET quantity =  quantity - '$qty_value' where id = '$prod_id'";
                            
                        
                            if ($conn->query($sql) === TRUE) {
                                    echo 'QUANTITY DECREASED' . $prod_id;
                            }
                           
    }
    
    require 'php/dbconnect.php';
    
    
      $sql_deleteall = "DELETE FROM cart_table where userid = '$sid'";
            $conn->query($sql_deleteall);
        $_SESSION['checkout_status'] = 'SUCCESS';
      header("Location: sellerhomepage.php");
    
    }
  
}

else{
    header('Location index.php');
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="cart.css">
    <title>Document</title>
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
          <a class="nav-link active " aria-current="page" href="sellerhomepage.php" id="home-link">Home</a>
        </li>
            <li class="nav-item active">       
          <a class="nav-link" href="sellerdashboard.php" id="dashboard-link">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cartseller.php" id="dashboard-link"> 
            <span><i class="bi bi-cart4"></i></span>  
            Cart</a>
        </li>

        
      </ul>
   
       <ul class="navbar-nav " id="unlista" >

          <li class="nav-item">
          <a class="nav-link" href="logout.php" id="dashboard-link"> 
            <span><i class="bi bi-box-arrow-left"></i></span>  
            Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" id="title">
<p class="h4">YOUR SHOPPING CART</p>

</div>


<div class="container">

<?php


    $string;
    
if(isset($_SESSION['status_cart'])){
    $string = $_SESSION['status_cart'];

 if(  $string == "DELETED"){
 ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>PRODUCT REMOVED FROM THE CART</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
 }

    }
    unset($_SESSION['status_cart']);


?>


</div>


<div class="container" id="cart-div">



    <?php
    require 'php/dbconnect.php';
    $total_accumulated_price= 0;
    $bid =$_SESSION['seller_id'];
    $sql = "SELECT cart_table.id as cart_id, product_table.id as prod_id, image_shoe, product_name, size,price, qty FROM cart_table  INNER JOIN product_table ON product_table.id = cart_table.pid where  userid= '$bid' AND quantity != 0 ;";
            $res  = $conn->query($sql);

            if(!$res){
                echo "error";
            }
            
            while($row = mysqli_fetch_object($res)){
                    $cid = $row->cart_id;
                    $id = $row->prod_id;
                    $image = $row->image_shoe;
                    $name = $row->product_name;
                    $size= $row->size;
                    $price = $row->price;
                    $qty = $row->qty;
                    $total_price = $qty * $price;
                    $total_accumulated_price = $total_accumulated_price +  $total_price;
                   $prod_array[$id] = $qty;
?>



            <div class="cart-product-div">

                <div class="img-div" style="background-image: url('image/<?php echo $image;?>');"></div>

                <div class="text-div">

                    <div class="text">
                        
                <p class="name"><?php echo $name;?></p>
                <p class="size"><?php echo 'Size:'. $size;?></p>
                    </div>
                     <div class="text">
                         
                <p class="unit-price">Unit Price: PHP <span> <?php echo $price.'.00';?></span> </p>
                <p class="quantity">Quantity: <?php echo $qty;?></p>
                <p class="total-price">Total Price: PHP <span>  <?php echo $total_price.'.00';?></span></p>
                     </div>


                </div>

                <div class="action-div">

                <form action="deletefromcart.php" method="post">

                <input type="text" name="cart_id" id="cart-id" value=" <?php echo$cid;?>" hidden>


                <input type="submit" class="btn btn-outline-danger" value="Delete" id="del-cart" name="delete_cart">

                </form>

                </div>


            </div>

                <?php

            }
?>

</div>



    <div class="container" id="checkout-all">

    <div class="row">
        <div class="col-6"> <p>TOTAL AMOUNT TO BE PAID: PHP <span><?php echo  $total_accumulated_price.'.00'  ;?></span> </p> </div>
        <div class="col-6">    
            <form method="post">
        <input type="submit" name="checkout"
                class="btn btn-danger" value="Checkout" />
    </form>   </div>
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