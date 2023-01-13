<?php
require_once('connect.php');
session_start();
$payId = $_GET['payid'];
$point = $_GET['point'];
$tax = $_GET['tax'];
$emission = $_GET['emission'];
$total = $_GET['total'];
$_SESSION['checkpay_id']  = $payId;
$memid = $_SESSION['login'];

// 隨機碼4碼!!
$comb = "0123456789";
$shfl = str_shuffle($comb);
$random = substr($shfl, 0, 4);

// 發票號碼 2英文+8數字(invoice_id)
$invoice_id = "HJ-" . rand(11, 99) . rand(100, 1000) . rand(100, 1000);
$addinvoice = "INSERT into `invoice`(invoice_id,order_id,random_code) values ('$invoice_id','$payId','$random')";
$reslut = mysqli_query($conn, $addinvoice);
mysqli_close($conn);

// 傳送發票記錄至碳治郎
// 取得交易紀錄
// $sql = "select * from washing_order where order_id = ";

// 將資料送至碳治郎
function httpRequest($data_string) {
    $ch = curl_init();
    $url = 'http://140.135.247.213:3000/accounts/J334251732/'.$data_string;
    curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_POST, 0);
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     'Content-Type: application/json',
    //     'Content-Length: ' . strlen($data_string))
    // );
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    // var_dump($result);
    return $result;
    // return json_decode($result, true);
}

$data = json_encode([
    "billId" => $invoice_id,
    "memberId" => $memid,
    "totalMoney" => $total,
    "cbTax" => $tax,
    "cbPoint" => $point,
    "cbEm" => $emission,
    "billDt" => date("Y-m-d")
]);

$oRes = httpRequest($data);

if($oRes == 'OK'){
    header('location:CompleteCheckout.php');
}

?>