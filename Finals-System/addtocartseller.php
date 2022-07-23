<?php
session_start();

require 'php/dbconnect.php';


if(isset($_POST['addtocart'])){
$userid;
$id = $_POST['product_id'];
$quantity = $_POST['inputed'];

$userid= $_SESSION['seller_id'];




$sql = "SELECT * FROM cart_table where  pid = '$id'  AND userid= '$userid';";
            $res  = $conn->query($sql);

            if(!$res){
                echo "error";
            }
          
            $row = mysqli_num_rows($res);
             
              if($row != 0){
    
                $_SESSION['add_cart_status'] = "ERROR";
              header("Location: sellerhomepage.php"); 
               
              }
              else{
             productSender();
              $_SESSION['add_cart_status'] = "SUCCESS";
              header("Location: sellerhomepage.php"); 

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



$userid= $_SESSION['seller_id'];


$sql = "INSERT INTO cart_table (pid, qty, userid) VALUES ('$id' , '$quantity', $userid)";

$res  = $conn->query($sql);
        
}
  


?>