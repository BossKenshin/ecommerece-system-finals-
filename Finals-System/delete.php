
<?php
require "php/dbconnect.php";

if($_REQUEST['productid']) {
$sql = "DELETE FROM product_table WHERE id='".$_REQUEST['productid']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if($resultset) {
echo "PRODUCT DELETED";

}
}
?>

