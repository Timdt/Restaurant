<?php


$con = mysqli_connect('localhost','root','');

if(!$con) {
echo 'Not connected with server';
}

if(!mysqli_select_db ($con,'restaurant')) {
echo 'Database Not selected';
}

$tablenumber = $_POST['tafelnummer'];
$receiptid = $_POST['receiptid'];
$menu_item = $_POST['menu_item'];
$date = $_POST['date'];


$sql = "INSERT INTO Orders (orders.Tafel_Id, orders.ReceiptID, orders.MenuItemID,  orders.Res_Datum )
VALUES ('$tablenumber', '$receiptid', '$menu_item', '$date')";

if(!mysqli_query($con,$sql)){
  echo 'insert did not work';
}else {
  echo 'Order created successfully';
}

header("refresh:1; url=bestelling.php");





?>
