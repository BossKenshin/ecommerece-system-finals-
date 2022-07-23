<?php
session_start();

require 'php/dbconnect.php';

$buy_acc =  $_SESSION['buyer_acc_name'];
$buyid;


$id;
$buyer;
$com;


if(isset($_SESSION['buyer_id'])){
$buyid =$_SESSION['buyer_id'];

}
else{
    header("Location: index.php");
}


if(isset($_GET['pid']) ||isset($_GET['buyer_name']) || isset($_GET['comment']) && !empty($buy_acc)){

$id = $_GET['pid'];
$buyer = $_GET['buyer_name'];
$com = $_GET['comment'];


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="transition/transition_dashboard.css">

    <link rel="stylesheet" href="comment.css">

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
                        <a class="nav-link active " aria-current="page" href="homepage.php"
                            id="home-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.php" id="dashboard-link">
                            <span><i class="bi bi-cart4"></i></span>
                            Cart</a>
                    </li>


                </ul>
               
                <ul class="navbar-nav " id="unlista">

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
        <br>


        <div class="container">
        <p class="h4">  
            <?php

            echo $_GET['buyer_name'];
            ?>
        </p>
         <p class="h5">  
            <?php

            echo "Commented: ".$_GET['comment'];
            ?>
        </p>
    <hr>

    <p class="h6">Attach files:</p>
        </div>


    <?php 
        include"php/dbconnect.php";
        $sql_get_media = "SELECT `comment`, image_video FROM `review_table` WHERE pid = '$id' AND `buyer_name` = '$buyer' AND `comment`='$com';";

        $results = $conn->query($sql_get_media);

        
    ?>

        <div class="row align-items-start" id="row-image">

        <?php
            while($rows = mysqli_fetch_object($results)){
                    $src = $rows->image_video;
                    $lst_chr = $src[strlen($src)-1];

                if($lst_chr != "4"){
            ?>
                <div class="col" onclick="enlarge(this);" >

                 <img src="comment_media/<?php echo $src; ?>" alt="Media Image" class="image-show">

                </div>

             <?php
                }
                else{
                        
                    ?>

                <div class="col">
               <video class="video-player"  controls >
                         

                        <source src="comment_media/<?php echo $src; ?>"   type="video/mp4">

                      </video>  
                </div>

                     <?php   
                }
            }
                     ?>

        </div>



    <?php



    ?>



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