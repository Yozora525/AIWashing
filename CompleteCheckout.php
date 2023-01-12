<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();

$orderid = $_SESSION['checkpay_id'];
$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$orderid}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// 發票
$sql = "SELECT * FROM `invoice` WHERE `order_id`='{$orderid}'";
$result = mysqli_query($conn, $sql);
$invoicerow = mysqli_fetch_assoc($result);

/* 顯示洗衣格子編號 */
$sql = "SELECT * FROM `cabinet_record` WHERE `order_id`='{$orderid}'";
$result = mysqli_query($conn, $sql);
$gridrow = mysqli_fetch_assoc($result);
if ($gridrow['order_id'] == $orderid) {
    if (!empty($gridrow['sendbuck_grid_num'])) {
        $grid_num = $gridrow['sendbuck_grid_num'];
        $update_gridstatus = "UPDATE `grid` SET `grid_status` ='1' Where `grid_id`='$grid_num'";
        $reslut = mysqli_query($conn, $update_gridstatus);
    }
}
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
                <?php
                if (!empty($grid_num)) { ?>
                    <p class="h1 text-success text-center">取衣格子編號：<?php echo $grid_num ?></p><br>
                <?php } ?>

                <div class="card">
                    <div class="card-header">
                        <span class="fs-6 text-center">
                            <h4>AI智慧喜</h4>
                        </span>
                        <span class="fs-6 text-center">
                            <h3><?php echo $invoicerow['invoice_id'] ?></h3>
                        </span>
                        <input type="hidden" name="payid[]" value="<?php echo $row['order_id'] ?>" readonly />
                        <!-- 改成發票的時間 -->
                        <span class="fs-6 text-center">
                            <h6><?php echo $invoicerow['invoice_addTime'] ?></h6>
                        </span>
                        <span class="fs-6 text-center">
                            <p>隨機碼：<?php echo $invoicerow['random_code'] ?>
                                &nbsp;
                                總額：NT$ <b><?php echo $row['total_price'] ?></b>
                                <br>
                            </p>
                        </span>
                        <span class="fs-6 text-center">
                            <p>碳排放：<?php echo $row['carbon_emission'] ?>g
                                &nbsp;
                                碳點：<?php echo $row['carbon_point'] ?>
                            </p>
                        </span>
                        <span class="fs-6 text-center">
                            <span id="tax">
                                <p>賣家編號：10944247&nbsp;&nbsp;碳稅：<?php echo $row['carbon_tax'] ?>
                            </span>
                            </p>
                        </span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span class="fs-6 text-center">
                            <h5>--------發票明細--------</h5>
                        </span>
                        <span class="fs-6">
                            <h6>衣物重量：<?php echo $row['weight'] ?>kg</h6>
                        </span><span class="fs-6 ">
                            <h6>洗滌模式：<?php echo $row['wash_mode'] ?></h6>
                        </span>
                        <span class="fs-6">
                            <h6>脫水模式：<?php echo $row['dryout_mode'] ?></h6>
                        </span>
                        <span class="fs-6">
                            <h6>乾燥模式：<?php echo $row['drying_mode'] ?></h6>
                        </span>
                        <span class="fs-6">
                            <h6>折衣模式：<?php echo $row['folding_mode'] ?></h6>
                        </span>

                        <span class="fs-6">
                            <h6>送洗方式：<?php echo $row['sent_to'] ?></h6>
                        </span>
                        <span class="fs-6">
                            <h6>洗衣門市/地址：<?php echo $row['sentTo_address'] ?></h6>
                        </span>

                        <span class="fs-6">
                            <h6>領取方式：<?php echo $row['sent_back'] ?></h6>
                        </span>
                        <span class="fs-6">
                            <h6>取衣門市/地址：<?php echo $row['sentBack_address'] ?></h6>
                        </span>

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