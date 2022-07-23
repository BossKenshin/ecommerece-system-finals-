<?php

session_start();

require 'php/dbconnect.php';


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



if(isset($_GET['id'])){

$_SESSION['id_product'] = $_GET['id'];

 $sql = "Select product_name, min(image_name) as image_shoe from product_table INNER JOIN image_table ON product_table.id = image_table.prod_id where id = ".$_GET['id']." GROUP BY product_name";
        $res  = $conn->query($sql);

        while($row = mysqli_fetch_object($res)){
          $pname = $row->product_name;
                   $image = $row->image_shoe;

        }


}
else{

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>   
    <link rel="stylesheet" href="deletestyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
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




<div class="container" id="seller-container">
<p class="h4">ARE YOU SURE  YOU WANT TO DELETE THIS PRODUCT?</p>

<div class="img-container" style=" background-image: url(image/<?php echo $image ?>);"></div>




  <form role="form" method="POST" class="form-es" action="productedit.php" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Product Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="product" value="<?php echo $pname; ?>" disabled readonly>
                        </div>
                    </div>
                   
                    <br>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-danger" name="deleteproduct">CONFIRM</button>
                            <button type="submit" class="btn btn-outline-dark" name="canceldelete">CANCEL </button>


                        </div>
                    </div>
                </form>

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