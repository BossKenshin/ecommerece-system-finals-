<?php
session_start();
require 'php/dbconnect.php';




$buyid = $_SESSION['buyer_id'];


            if(isset($_POST['delete_cart']))
            {

            $cart_id = $_POST['cart_id'];


            $sql = "DELETE FROM cart_table WHERE id='$cart_id' AND userid= ' $buyid'";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            if($resultset) {
            $_SESSION['status_cart'] = "DELETED SUCCESSFULLY";
            header("Location: cart.php");

            }
        }





            if(isset($_POST['update_cart'])){

                echo $_POST['cart_id'];
               $_SESSION['product_cart_id'] = $_POST['cart_id'];
               $_SESSION['product_id']  = $_POST['prod_cart_id'];
                header("Location: updatecart.php");

            }

            






?>


