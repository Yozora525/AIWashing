<?php
require_once('connect.php');
session_start();
$id=$_SESSION['checkpay_id'] ;
$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$id}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['order_status']=='1'){
    $addstatus = "UPDATE `washing_order` SET `order_status` ='2' Where `order_id`='$id'";
    $addstatusreslut = mysqli_query($conn, $addstatus);
    header('location:OrderManage.php');
}else{
    header('location:OrderManage.php');
}
?>