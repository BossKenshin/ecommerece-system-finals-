<?php
session_start();



if(isset($_SESSION['seller_id'])){

header("Location: sellerdashboard.php");

}
elseif(isset($_SESSION['buyer_id'])){
header("Location: homepage.php");

}
else{
header("Location: login.php");

}


?>