<?php
session_start();

require 'php/dbconnect.php';


if(isset($_POST['addtocart'])){
$userid;
$id = $_POST['product_id'];
$quantity = $_POST['inputed'];

$userid= $_SESSION['buyer_id'];




$sql = "SELECT * FROM cart_table where  pid = '$id'  AND userid= '$userid';";
            $res  = $conn->query($sql);

            if(!$res){
                echo "error";
            }
            
            $row = mysqli_num_rows($res);

            $one_row = mysqli_fetch_object($res);

              if($row != 0){


                
            $_SESSION['initial_qty'] = $one_row->qty;
             productChecker();
               
              }
              else{
             productSender();

              }


}

else{
    echo'NO PRODUCT SENT';
}



function productSender(){
require 'php/dbconnect.php';


$userid;
$id = $_POST['product_id'];
$quantity = $_POST['inputed'];



$userid= $_SESSION['buyer_id'];


$sql = "INSERT INTO cart_table (pid, qty, userid) VALUES ('$id' , '$quantity', $userid)";

$res  = $conn->query($sql);
        
  $_SESSION['add_cart_status'] = "SUCCESS";
              header("Location: homepage.php"); 


}


function productChecker(){
require 'php/dbconnect.php';



$over_qty = $_SESSION['product_quantity'];
$userid;
$id = $_POST['product_id'];
$quantity = $_POST['inputed'];


 $initial_qty = $_SESSION['initial_qty'];

  echo $initial_qty;


$userid= $_SESSION['buyer_id'];


if($quantity + $initial_qty <= $over_qty){


$sql_update = "UPDATE cart_table SET qty = $quantity + qty where pid = '$id' AND userid = '$userid' ";

$res  = $conn->query($sql_update);
        
  $_SESSION['add_cart_status'] = "SUCCESS";
              header("Location: homepage.php"); 
              
}
else{
$_SESSION['add_cart_status'] = "ERROR";
              header("Location: homepage.php"); 
}










}
  


?>