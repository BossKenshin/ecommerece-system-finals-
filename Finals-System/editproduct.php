<?php

session_start();

require 'php/dbconnect.php';

$sell_acc = $_SESSION['seller_acc_name'];

if(isset($_SESSION['seller_id'])){

}
else{
              header("Location: index.php"); 

}

if(isset($_GET['id'])){

$_SESSION['id_product'] = $_GET['id'];

 $sql = "SELECT  product_name, category, sub_category, size, price, quantity, min(image_name) as image_name FROM product_table INNER JOIN image_table ON product_table.id = image_table.prod_id where quantity != 0 and id = ".$_GET['id'];
        $res  = $conn->query($sql);

        while($row = mysqli_fetch_object($res)){
          $pname = $row->product_name;
          $size = $row->size;
          $price = $row->price;
          $quan = $row->quantity;
          $image = $row->image_name;
          $cat = $row->category;
          $sub = $row->sub_category;
        }


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
    <link rel="stylesheet" href="editproductstyle.css">
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




<div class="container" id="content-div">


<div class="img-container" style=" background-image: url(<?php echo "image/".$image ?>);"></div>


<div class="form-container">
 <form role="form" method="POST" class="form-es" action="productedit.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">Product Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="product" value="<?php echo $pname; ?>">
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label">Category</label>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="cat" required>
                            <option value="Women"  <?php if ($cat== 'Women') echo ' selected="selected"'; ?>>Women</option>
                            <option value="Men"  <?php if ($cat== 'Men') echo ' selected="selected"'; ?>>Men</option>
                            <option value="Kids"  <?php if ($cat== 'Kids') echo ' selected="selected"'; ?>>Kids</option>
                          </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Sub-Category</label>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="sub" required>
                            <option value="Sneakers"  <?php if ($sub== 'Sneakers') echo ' selected="selected"'; ?> >Sneakers</option>
                            <option value="Running Shoes" <?php if ($sub== 'Running Shoes') echo ' selected="selected"'; ?> >Running Shoes</option>
                            <option value="Basketball Shoes" <?php if ($sub== 'Basketball Shoes') echo ' selected="selected"'; ?> >Basketball Shoes</option>
                          </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label">Size</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="size" value="<?php echo $size; ?>">
                        </div>
                    </div>

                    
                     <div class="form-group ">
                        <label class="control-label">New Image here</label>
                        <div>
                            <input type="file" accept=".jpg,.jpeg,.png" class="form-control input-lg" name="new_image[]" multiple = "multiple">
                        </div>
                    </div>

                      <div class="form-group ">
                        <label class="control-label">Price</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text">PHP</span>
                  <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"  value="<?php echo $price; ?>" name="price">
                        </div>
                    </div>
                   
                         <div class="form-group ">
                        <label class="control-label">Quantity</label>
                        <div>
                            <input type="number" accept=".jpg,.jpeg,.png" class="form-control input-lg" name="quantity"  value="<?php echo $quan; ?>" name="quantity">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-danger" name="editproduct">SAVE CHANGES</button>
                            <button type="submit" class="btn btn-outline-dark" name="caledit">CANCEL </button>


                        </div>
                    </div>
                </form>

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