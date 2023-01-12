<?php
require_once('connect.php');
session_start();
$payId = $_GET['payid'];
$_SESSION['checkpay_id']  = $payId;

// 隨機碼4碼!!
$comb = "0123456789";
$shfl = str_shuffle($comb);
$random = substr($shfl, 0, 4);

// 發票號碼 2英文+8數字(invoice_id)
$invoice_id = "HJ-" . rand(11, 99) . rand(100, 1000) . rand(100, 1000);
$addinvoice = "INSERT into `invoice`(invoice_id,order_id,random_code) values ('$invoice_id','$payId','$random')";
$reslut = mysqli_query($conn, $addinvoice);
mysqli_close($conn);
header('location:CompleteCheckout.php');
?>