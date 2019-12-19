<?php
require_once '../php_action/db_connect.php';
//SELECT * FROM product WHERE quantity < 100
// ORDER BY RAND()
// LIMIT 1
$sqlNotification = "SELECT `product_name`,`quantity` FROM product WHERE quantity < 100 ORDER BY RAND() LIMIT 1";
$NotificationQuery = $connect->query($sqlNotification);
$resultProductNotification = $NotificationQuery->fetch_assoc();
$notificationStock = " Product Name: " . $resultProductNotification["product_name"] . " , Quantity: " . $resultProductNotification["quantity"];
$notificationStock = json_encode($notificationStock);
echo $notificationStock;
