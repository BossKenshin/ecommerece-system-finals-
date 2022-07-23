<?php
session_start();

require 'php/dbconnect.php';

$sell_acc = $_SESSION['seller_acc_name'];

if(isset($_GET['id'])){

$id = $_GET['id'];

$sql = "SELECT id, product_name, category, sub_category, size, price, quantity, AVG(rated_product_table.rated_points) as rate_points FROM product_table
         INNER JOIN rated_product_table ON product_table.id = rated_product_table.product_id
         where id= '$id' AND rate_status = 'RATED'";
            $res  = $conn->query($sql);

            if(!$res){
                echo "error";
            }
            
            while($row = mysqli_fetch_object($res)){
                    $id_prod = $row->id;
                    $name = $row->product_name;
                    $price = $row->price;
                    $points = $row->rate_points;
                    $cat = $row->category;
                    $sub = $row->sub_category;
                    $size = $row->size;
                    $quantity = $row->quantity;


            }
        }
        else{
    header('Location: homepage.php');

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
    <link rel="stylesheet" href="viewproduct.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
                <link rel="stylesheet" href="transition/transition_dashboard.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="nav-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="KJ.png" alt="" class="img-fluid"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon " style="color:#fff;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="unlist">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="sellerhomepage.php"
                            id="home-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="sellerdashboard.php" id="dashboard-link">Dashboard</a>
                    </li>

      


                </ul>
       
                <ul class="navbar-nav " id="unlista">
                    
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

</div>




    <div class="container" id="product-view-div">
        <div class="row">
            <div class="col-5" id="prod-image" >

                    <div id="product-image-slider" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                    <?php
                                    require 'php/dbconnect.php';
                                    $sqlone = "SELECT product_name, price, id, MIN(image_name) as image_name, img_id FROM product_table INNER JOIN image_table ON product_table.id = image_table.prod_id where quantity != 0 AND id = '$id_prod';";

                                    $ress  = $conn->query($sqlone);
                                    $rowwone = mysqli_fetch_object($ress);

                                    $excrow = $rowwone->img_id;


                                         $sql = "SELECT product_name, price, id, image_name, img_id FROM product_table INNER JOIN image_table ON product_table.id = image_table.prod_id where quantity != 0 AND id = '$id_prod' AND NOT img_id = '$excrow';";
                                         $res  = $conn->query($sql);

                                ?>

                                <div class="carousel-item active" style="background-image: url(image/<?php  echo $rowwone->image_name; ?>);">
                                </div>

                                
                                        <?php
                                                    while($row = mysqli_fetch_object($res)){



                                        ?>
                                            
                                                    <div class="carousel-item" style="background-image: url(image/<?php  echo $row->image_name;  ?>);">
                                                    </div>
                                        <?php

                                                    }

                                        ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#product-image-slider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#product-image-slider" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                    </div>



            
            </div>

            <div class="col-7" id="form-con">


                    <div class="product-information">

                     <p class="product-name"> <?php echo   $name;  ?></p>
                    <p class="product-price"> <?php echo "₱ ". number_format($price,2) . " <i class='bi bi-star-fill'></i> " .number_format($points,1) ;?></p>
                    
                    <p class="types"><?php echo   ' Category: '.$cat . ' Type: '.$sub;  ?></p>

                     <p class="size"><?php echo   'Size: '.$size; ?></p>
                    
                     <p class="stocks"><?php echo   'Available Stocks: '.$quantity;  ?></p>   

                    </div>
                    <form action="addtocartseller.php" method="post">

                    <input type="text" class="prod-id" hidden value="<?php echo $id_prod;?>" name="product_id">
               <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Quantity</span>
                            <input type="number" id="typeNumber" class="form-control" min="0" max="<?php echo $quantity;?>" name="inputed" required/>
                  </div>

                  <input type="submit" value="Add to Cart" class="btn btn-dark disabled" name="addtocart" id="addcart-button">
                    </form>

            </div>
        </div>

    </div>

 <?php
                                        include "php/dbconnect.php";

                                        $sqlgetall ="SELECT pid, product_table.product_name, buyer_name, `comment` FROM review_table INNER JOIN product_table ON review_table.pid = product_table.id where pid = '$id' GROUP BY `comment`;";
                                        
                                        $result = $conn->query($sqlgetall);

                                        $numrows = mysqli_num_rows($result);


                                        if($numrows != 0){
                                        ?>

                            <div class="container" id="review-container">

                                            <p class="h4">Reviews</p>
                                            <hr>
                           
                                       
                                       <?php       

                                        while($row = mysqli_fetch_object($result)){

                                        ?>

                                        <div class="container">


                                        <div class="container" id="comment-div">
                                        <p class="h6"> <?php echo $row->buyer_name;   ?> </p>
                                        <p class="h7"> <?php echo $row->comment;   ?> </p>

                                        <a  href="viewcommentseller.php?pid=<?php echo $row->pid;?>&buyer_name=<?php echo $row->buyer_name;?>&comment=<?php echo $row->comment;?>" class="view-comment">See full comment</a>
                                                <hr>                                       
                                             </div>

                                        <br>
                                            
                                        </div>


                                    <?php



                                        }
                                    
                                    }
                                    ?>
                            </div>



 <div class="container-fluid" id="footer">


    <div class="container" id="text-container">
        <h5 class="h3 text-white"> Top Online Shopping Experience</h5>
        <p class="small text-muted">Committed to both quantity and quality, KJ Collections continues to provide its customers with a diverse selection of products at the lowest prices every time..</p>
        <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved.</p>

    </div>

 </div>   

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
        async></script>
</body>

</html>