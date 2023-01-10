<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
$payId = $_GET['payid'];

$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$payId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['checkpay_id']  = $row['order_id'];

mysqli_close($conn);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/css/all.css">
    <link rel="stylesheet" href="static/css/header.css" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <script src="static/lib/Frontend_lib/jquery/jquery-3.1.0.js"></script>
    <title>付款成功</title>
</head>

<body>
    <?php
    include('templates/frame/header.php');
    ?>

    <main>
        <div class="container ">
            <form method="post" action="paycheck.php">
                <p><img src="static/img/yes.png" alt="結帳成功!" class="ounded mx-auto d-block"></p>
                <p class="h1 text-success text-center"><b>付款成功!</b></p>
                <br>
                <!-- <hr style="background-color:rgb(25, 25, 47); height:1px; border:none;" />
                <span class="fs-6">訂單編號: O202212110874</span><br>
                <span class="fs-6">付款金額: NT$ 955</span><br>
                <span class="fs-6">收款方: AI智慧喜公司</span><br> -->
                <div class="card">
                    <div class="card-header">
                        <p class="text-center">發票</p>
                        <span class="fs-6">訂單編號：<?php echo $row['order_id'] ?><br></span>
                        <input type="hidden" name="payid[]" value="<?php echo $row['order_id'] ?>" readonly />
                        <span class="fs-6">下單時間：<?php echo $row['order_time'] ?></span><br>
                        <span class="fs-6">隨機碼：0000</span>&nbsp;
                        <span class="fs-6">公司名：AI智慧喜</span><br><br>
                        <span class="fs-6">洗滌模式：<?php echo $row['wash_mode'] ?></span><br>
                        <span class="fs-6">脫水模式：<?php echo $row['dryout_mode'] ?></span><br>
                        <span class="fs-6">乾燥模式：<?php echo $row['drying_mode'] ?></span><br>
                        <span class="fs-6">折衣模式：<?php echo $row['folding_mode'] ?></span><br>

                        <span class="fs-6">送洗方式：<?php echo $row['sent_to'] ?></span><br>
                        <span class="fs-6">洗衣門市/地址：<?php echo $row['sentTo_address'] ?></span><br>

                        <span class="fs-6">領取方式：<?php echo $row['sent_back'] ?></span><br>
                        <span class="fs-6">取衣門市/地址：<?php echo $row['sentBack_address'] ?></span><br>

                        <span class="fs-6">衣物重量：<?php echo $row['weight'] ?>kg</span><br>
                        <span class="fs-6">洗衣總額：NT$ <?php echo $row['washing_price']   ?></span><br>
                        <span class="fs-6">運費：NT$ <?php echo $row['sendprice'] ?></span><br>
                        <span class="fs-6">碳排放：<?php echo $row['carbon_emission'] ?>g</span><br>
                        <span class="fs-6">碳點：<?php echo $row['carbon_point'] ?></span><br>

                        <span id="tax" style="display:none">碳稅：<?php echo $row['carbon_tax'] ?></span><br>


                        <p class="fs-6">總額：NT$ <b style="color:red"><?php echo $row['total_price'] ?></b></p>
                    </div>
                </div>
                <!-- 等待時間00:00時 自動出現下一步按紐 --><br>
                <p><input type="submit" value="完成" class="btn btn-success" onclick="" /></p>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>