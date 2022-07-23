<?php
session_start();


if(isset($_POST['update_qty'])){
include "php/dbconnect.php";


$qty = $_POST['new_qty'];
$cid = $_SESSION['product_cart_id'];
$sql = "UPDATE cart_table set qty = '$qty' where id = '$cid' ";
mysqli_query($conn, $sql);

header("Location: cart.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
         <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="updatestyle.css">
</head>
<body>
    
<div class="container">

<?php

include "php/dbconnect.php";

$pid = $_SESSION['product_id'];

$sql = "SELECT * FROM product_table where id = '$pid'";
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_object($res);



?>

<form  action=""  method="post" class="row">
<div class="mb-3">
  <label for="new_quantity" class="form-label">Quantity</label>
  <input type="number" class="form-control" id="new_quantity" name="new_qty" value="" min="1" max="<?php echo$row->quantity;?>" required>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-dark" name="update_qty" id="update_qty">
        Update Quantity
    </button>

    <a href="cart.php" class="btn btn-outline-danger"> Cancel</a>
</div>
</form>



</div>


</body>
</html>