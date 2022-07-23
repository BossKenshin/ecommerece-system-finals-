<?php
session_start();

if(isset($_SESSION['seller_id'])){
unset($_SESSION['seller_id']);
unset( $_SESSION['buyer_acc_name']);

}
elseif (isset($_SESSION['buyer_id'])) {
unset($_SESSION['buyer_id']);
unset( $_SESSION['seller_acc_name']);


}

           header("Location: index.php"); 

?>