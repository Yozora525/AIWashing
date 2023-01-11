<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
/* 取件時間 */
$orderId = $_SESSION['orderId'];
$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$orderId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sendbacktime = strtotime($_POST['add_sendback_time']);
    $backtime = date("Y-m-d H:i:s", $sendbacktime);
    $addtime = "UPDATE `washing_order` SET `sentBack_time` ='$backtime' Where `order_id`='$orderId'";
    $addtimereslut = mysqli_query($conn, $addtime);
}
/* 顯示洗衣格子編號 */
$sql = "SELECT * FROM `cabinet_record`";
$recordresult = mysqli_query($conn, $sql);
$gridrow = mysqli_fetch_assoc($recordresult);
if ($gridrow['order_id'] == $orderId) {
    $sendto_grid = $gridrow['sendto_grid_num'];
}

/* 門市 */
$serve_store_sql = "SELECT * FROM `serve_store`";
$serve_store_result = mysqli_query($conn, $serve_store_sql);
$serve_store_row = mysqli_fetch_assoc($serve_store_result);
if ($serve_store_row['store_name'] = $row['sentBack_address']) {
    $serve_id = $serve_store_row['store_id'];
}

/* 取衣格子 */
$sql = "SELECT * FROM `grid`";
$grid_result = mysqli_query($conn, $sql);
$grid = array();
$i = 0;
while ($grid[$i] = $grid_result->fetch_assoc()) {
    $i++;
}
for ($i = 0; $i < count($grid); $i++) {
    if ($grid[$i]['store_id'] == $serve_id) {
        if ($grid[$i]['grid_status'] == 1)
            $grid_num = $grid[$i]['grid_id'];
        if (!empty($grid_num))
            break;
    }
}
//新增取衣門市格子紀錄
$addserve = "UPDATE `cabinet_record` SET `sendbuck_grid_num` ='$grid_num' Where `order_id`='$orderId'";
$reslut = mysqli_query($conn, $addserve); //執行sql   
/* 更新取衣格子使用狀態 */
$update_gridstatus = "UPDATE `grid` SET `grid_status` ='2' Where `grid_id`='$grid_num'";
$reslut = mysqli_query($conn, $update_gridstatus);


/* 更新洗衣格子使用狀態 */
$update_sendto_gridstatus = "UPDATE `grid` SET `grid_status` ='1' Where `grid_id`='$sendto_grid'";
$reslut = mysqli_query($conn, $update_sendto_gridstatus);





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
    <title>訂單成立!</title>
</head>

<body>
    <?php
    include('templates/frame/header.php');
    ?>

    <main>
        <div class="container">
            <form method="post" action="OrderManage.php">
                <!-- 訂單成立 -->
                <br><br>
                <p class="h1 text-success"><b>訂單成立!</b></p>
                <hr style="background-color:rgb(25, 25, 47); height:1px; border:none;" />
                <p class="fs-5"><b>訂單詳情</b></p>
                <span class="fs-6">訂單編號：<?php echo $row['order_id'] ?></span><br>

                <span class="fs-6">洗滌模式：<?php echo $row['wash_mode'] ?></span><br>
                <span class="fs-6">脫水模式：<?php echo $row['dryout_mode'] ?></span><br>
                <span class="fs-6">乾燥模式：<?php echo $row['drying_mode'] ?></span><br>
                <span class="fs-6">折衣模式：<?php echo $row['folding_mode'] ?></span><br>

                <span class="fs-6">送洗方式：<?php echo $row['sent_to'] ?></span><br>
                <span class="fs-6">洗衣門市/地址：<?php echo $row['sentTo_address'] ?></span><br>
                <span class="fs-6">洗衣格子編號：<?php echo $sendto_grid ?></span><br>

                <span class="fs-6">領取方式：<?php echo $row['sent_back'] ?></span><br>
                <span class="fs-6">取衣門市/地址：<?php echo $row['sentBack_address'] ?></span><br>

                <span class="fs-6">衣物重量：<?php echo $row['weight'] ?>kg</span><br>
                <span class="fs-6">洗衣總額：NT$ <?php echo $row['washing_price'] ?></span><br>
                <span class="fs-6">運費：NT$ <?php echo $row['sendprice'] ?></span><br>
                <span class="fs-6">碳點：<?php echo $row['carbon_point'] ?></span><br>
                <p class="fs-5"><b>總額：NT$ <?php echo $row['total_price'] ?></b></p>
                <p><input type="submit" value="前往付款" class="btn btn-success" onclick="" /></p>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>