<!DOCTYPE html>
<html lang="en">

<head>
<?php
include('templates/frame/head.html');
?>
</head>

<body>
    <?php
    include('templates/frame/header.php');
    ?>

    <?php
    function IdProducer(string $Feature){
        //date_default_timezone_set('時區');
        date_default_timezone_set('Asia/Taipei');
        // get current timestamp
        $timestamp =  microtime(true);
        $timestamp = (string) $timestamp * 1000;
        $id = $Feature.$timestamp;
        $id = explode('.', $id)[0];
        // $id = $id[0];
        return $id;
    }


    $id = IdProducer('D');
    echo $id;
    ?>

    <br>

    
    <?php
    // 發票隨機碼4碼!!
    $comb = "0123456789";
    $shfl = str_shuffle($comb);
    $random = substr($shfl,0,4);
    echo $random;
    ?>

    <br>

    <?php
    // 發票號碼 2英文+8數字(invoice_id)
    $invoice_random = "AB" .rand(11,99) .rand(100,1000) .rand(100,1000) ;
    echo $invoice_random;
    ?>


    <footer></footer>
</body>

</html>