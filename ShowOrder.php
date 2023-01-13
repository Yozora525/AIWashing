<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
$orderId = $_SESSION['orderId'];
$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$orderId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$memId = $row['mem_id'];

// 加入預計取衣服時間 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $add_sendback_time = $_POST['add_sendback_time'];
    $add_sql_time = date("Y-m-d H:i:s", strtotime($add_sendback_time));
    if ($row['order_id'] == $orderId) {
        $update_sentBack_time = "UPDATE `washing_order` SET `sentBack_time` ='$add_sql_time' WHERE `order_id`='{$orderId}'";
        $reslut = mysqli_query($conn, $update_sentBack_time);
    }
}

/* 顯示洗衣格子編號 */
$sql = "SELECT * FROM `cabinet_record` WHERE `order_id`='{$orderId}'";
$recordresult = mysqli_query($conn, $sql);
$gridrow = mysqli_fetch_assoc($recordresult);
$sendto_grid = $gridrow['sendto_grid_num'];

/* 門市 */
$serve_store_sql = "SELECT * FROM `serve_store`";
$serve_store_result = mysqli_query($conn, $serve_store_sql);
$serve_store_row = mysqli_fetch_assoc($serve_store_result);
if ($serve_store_row['store_name'] = $row['sentBack_address']) {
    $serve_id = $serve_store_row['store_id'];
}

/* 新增取衣格子 */
if ($row['sent_back'] != "外送取衣") {
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
    $reslut = mysqli_query($conn, $addserve);
    //更新取衣格子使用狀態(格子表)
    $update_gridstatus = "UPDATE `grid` SET `grid_status` ='2' Where `grid_id`='$grid_num'";
    $reslut = mysqli_query($conn, $update_gridstatus);
}
/* 更新洗衣格子使用狀態 */
if (!empty($sendto_grid)) {
    $update_sendto_gridstatus = "UPDATE `grid` SET `grid_status` ='1' Where `grid_id`='$sendto_grid'";
    $reslut = mysqli_query($conn, $update_sendto_gridstatus);
}


/* 洗衣袋 */
// 更改舊的洗衣袋狀態(洗衣袋紀錄表)
$sql = "SELECT * FROM `bag_borrow_record` where `mem_id`='{$memId}'";
$old_AIbag_result = mysqli_query($conn, $sql);
$old_AIbag = array();
$i = 0;
while ($old_AIbag[$i] = $old_AIbag_result->fetch_assoc()) {
    $i++;
}
for ($i = 0; $i < count($old_AIbag); $i++) {
    if ($old_AIbag[$i]['borrow_status'] == 1) {
        $old_bagid = $old_AIbag[$i]['bag_id'];
        $update_borrow_status = "UPDATE `bag_borrow_record` SET `borrow_status` ='2'where `bag_id`='$old_bagid' and `mem_id`='$memId'";
        $reslut = mysqli_query($conn, $update_borrow_status);
        break;
    }
}

// 新增新的洗衣袋(洗衣袋紀錄表)
$sql = "SELECT * FROM `laundry_bag`";
$laundry_bag_result = mysqli_query($conn, $sql);
$laundry_bag = array();
$i = 0;
while ($laundry_bag[$i] = $laundry_bag_result->fetch_assoc()) {
    $i++;
}
for ($i = 0; $i < count($laundry_bag); $i++) {
    if ($laundry_bag[$i]['bag_status'] == 1) {
        $aibag = $laundry_bag[$i]['bag_id'];
        if (!empty($aibag))
            break;
    }
}

// 新增新的洗衣袋(洗衣袋紀錄表)
$addaibag = "INSERT into `bag_borrow_record`(bag_id,mem_id) values ('$aibag','$memId')";
$reslut = mysqli_query($conn, $addaibag);

// 更新新的洗衣袋狀態(洗衣表)
$update_aibag = "UPDATE `laundry_bag` SET `bag_status` ='2' Where `bag_id`='$aibag'";
$reslut = mysqli_query($conn, $update_aibag);

// 更新舊的洗衣袋狀態(洗衣表)
$update_laundry_bag_status = "UPDATE `laundry_bag` SET `bag_status` ='1' Where `bag_id`='$old_bagid'";
$reslut = mysqli_query($conn, $update_laundry_bag_status);
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
                <p class="h1 text-success"><b>訂單成立！</b></p>
                <p class="h4"><b>取衣時間：<?php echo $row['washing_time'] ?></b></p>

                <hr style="background-color:rgb(25, 25, 47); height:1px; border:none;" />
                <p class="fs-5"><b>訂單詳情</b></p>
                <span class="fs-6">訂單編號：<?php echo $row['order_id'] ?></span><br>

                <span class="fs-6">洗滌模式：<?php echo $row['wash_mode'] ?></span><br>
                <span class="fs-6">脫水模式：<?php echo $row['dryout_mode'] ?></span><br>
                <span class="fs-6">乾燥模式：<?php echo $row['drying_mode'] ?></span><br>
                <span class="fs-6">折衣模式：<?php echo $row['folding_mode'] ?></span><br>

                <span class="fs-6">送洗方式：<?php echo $row['sent_to'] ?></span><br>
                <span class="fs-6">洗衣門市/地址：<?php echo $row['sentTo_address'] ?></span><br>
                <?php if (!empty($sendto_grid)) { ?>
                    <span class="fs-6">洗衣格子編號：<?php echo $sendto_grid ?></span><br>
                <?php } ?>
                <span class="fs-6">領取方式：<?php echo $row['sent_back'] ?></span><br>
                <span class="fs-6">取衣門市/地址：<?php echo $row['sentBack_address'] ?></span><br>

                <span class="fs-6">衣物重量：<?php echo $row['weight'] ?>kg</span><br>
                <span class="fs-6">洗衣總額：NT$ <?php echo $row['washing_price'] ?></span><br>
                <span class="fs-6">運費：NT$ <?php echo $row['sentprice'] ?></span><br>
                <span class="fs-6">碳點：<?php echo $row['carbon_point'] ?></span><br>
                <p class="fs-5"><b>總額：NT$ <?php echo $row['total_price'] ?></b></p>
                <p><input type="submit" value="前往付款" class="btn btn-success" onclick="" /></p>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>