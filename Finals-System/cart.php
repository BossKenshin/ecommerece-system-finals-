<?php 
session_start();

$buy_acc =  $_SESSION['buyer_acc_name'];



if(isset($_SESSION['buyer_id'])){




if(isset($_POST['checkout'])){

  require 'php/dbconnect.php';
    $bid =$_SESSION['buyer_id'];
    $buyer_name =$_SESSION['buyer_fullname'];
    $buyer_loc = $_SESSION['buyer_location'];
    $prod_array = array();
    $datenow = date('m/d/Y');

  $sql_get_array = "SELECT product_table.id as prod_id, product_name,qty, price ,qty * price AS total, CONCAT(fname,' ',mname,' ',lname) AS fullname, seller_id, min(image_name) as image_name FROM cart_table  
                    INNER JOIN product_table ON product_table.id = cart_table.pid 
                    INNER JOIN account ON product_table.seller_id = account.account_id
                    INNER JOIN image_table ON product_table.id = image_table.prod_id
                    where  userid= '$bid' AND quantity != 0  GROUP BY product_table.product_name;";
  $results  = $conn->query($sql_get_array);

  if(!$results){
      echo "error";
  }
  

  while($row = mysqli_fetch_object($results)){
        
          $id = $row->prod_id;
          $pname = $row->product_name;
          $seller_con = $row->seller_id;
          $qty = $row->qty;
         $prod_array[$id] = $qty;
          $per_price = $row->price;
         $total_price_per_unit = $row->total;

              
        $sql_insert_check_rated = "SELECT * FROM rated_product_table WHERE userid = '$bid' AND product_id = '$id'  AND rate_status = 'RATED'";
            $result =  $conn->query($sql_insert_check_rated);
            $row_count = mysqli_num_rows($result);
            if($row_count == 0){

              $sql_insert_not_rated = "INSERT INTO rated_product_table (product_id, userid, rate_status) VALUES('$id', '$bid',  'NOT RATED') ";
              $conn->query($sql_insert_not_rated);
            }

              $insert_to_history = "INSERT INTO order_history_table (prod_name, qty, buyer_name, buyer_location, price_per_unit ,total_per_unit,seller_name, date_checkout) VALUES( '$pname', '$qty', '$buyer_name', '$buyer_loc', '$per_price' ,'$total_price_per_unit', '$seller_con', '  $datenow' )";
              $conn->query($insert_to_history);

  }

  foreach($prod_array as $prod_id => $qty_value) {
  
      $sql = "UPDATE product_table SET quantity =  quantity - '$qty_value' where id = '$prod_id'";
                          
                      
                          if ($conn->query($sql) === TRUE) {
                                  echo 'QUANTITY DECREASED' . $prod_id;
                          }
                         
  }
  
  require 'php/dbconnect.php';
  
  
    $sql_deleteall = "DELETE FROM cart_table where userid = '$bid'";
          $conn->query($sql_deleteall);
      $_SESSION['checkout_status'] = 'SUCCESS';
    header("Location: homepage.php");
  
  }
 
  
}
else{
  header('Location: index.php');
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
    <title>Cart</title>
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
          <a class="nav-link active " aria-current="page" href="homepage.php" id="home-link">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php" id="dashboard-link"> 
            <span><i class="bi bi-cart4"></i></span>  
            Cart</a>
        </li>

        
      </ul>
   
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
    $bid =$_SESSION['buyer_id'];

    $sql = "SELECT cart_table.id as cart_id, product_table.id as prod_id, product_name, size,price, qty, image_name FROM cart_table  
   			INNER JOIN product_table ON product_table.id = cart_table.pid
           	INNER JOIN image_table ON  product_table.id = image_table.prod_id
             where  userid= '$bid' AND quantity != 0 GROUP BY product_name ;;";
            $res  = $conn->query($sql);

            if(!$res){
                echo "error";
            }

            while($row = mysqli_fetch_object($res)){
                    $cid = $row->cart_id;
                    $id = $row->prod_id;
                    $image = $row->image_name;
                    $name = $row->product_name;
                    $size= $row->size;
                    $price = $row->price;
                    $qty = $row->qty;
                    $total_price = $qty * $price;
                    $total_accumulated_price = $total_accumulated_price +  $total_price;
?>



            <div class="cart-product-div">

                <div class="img-div" style="background-image: url('image/<?php echo $image; ?>');"></div>

                <div class="text-div">

                    <div class="text">
                        
                <p class="name"><?php echo $name; ?></p>
                <p class="size"><?php echo 'Size:'. $size;?></p>
                    </div>
                     <div class="text">
                         
                <p class="unit-price">Unit Price: <span> <?php  echo "₱ ". number_format($price,2); ?></span> </p>
                <p class="quantity">Quantity: <?php echo $qty;?></p>
                <p class="total-price">Total Price: <span>  <?php echo "₱ ". number_format($total_price,2); ?></span></p>
        
                     </div>

                </div>

                <div class="action-div">

                <form action="deletefromcart.php" method="post">

                <input type="text" name="cart_id" id="cart-id" value=" <?php echo$cid;?>" hidden>
                <input type="text" name="prod_cart_id" id="prod_cart-id" value=" <?php echo$id;?>" hidden>



                <input type="submit" class="btn btn-dark" value="Edit" id="up-cart" name="update_cart">

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
        <div class="col-6"> <p>TOTAL AMOUNT TO BE PAID: <span><?php  echo "₱ ". number_format($total_accumulated_price,2);?></span> </p> </div>
        <div class="col-6">    
            <form method="post">
        <input type="submit" name="checkout"
                class="btn btn-danger" value="Checkout"/>
    </form>   </div>
    </div>


    </div>




 <div class="container-fluid" id="footer">


        <div class="container" id="text-container">
            
        <h5 class="h3 text-white"> Top Online Shopping Experience</h5>
        <p class="small text-muted">Committed to both quantity and quality, KJ Collections continues to provide its customers with a diverse selection of products at the lowest prices every time..</p>
        <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved.</p>

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