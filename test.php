<?php
require_once('connect.php');
/* 先新增新的洗衣袋 */
session_start();
/* 預計取回時間 */
$orderId = $_SESSION['orderId'];
$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$orderId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$memId = $row['mem_id'];/* 先新增新的洗衣袋 */
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
/* 新增新的洗衣袋 */
$addaibag = "INSERT into `bag_borrow_record`(bag_id,mem_id) values ('$aibag','$memId')";
$reslut = mysqli_query($conn, $addaibag);
/* 更新洗衣袋狀態 */
$update_aibag = "UPDATE `laundry_bag` SET `bag_status` ='2' Where `bag_id`='$aibag'";
$reslut = mysqli_query($conn, $update_aibag);



/* 再更改舊的洗衣袋狀態 */
$sql = "SELECT * FROM `bag_borrow_record`";
$result = mysqli_query($conn, $sql);
$AIbag_row = mysqli_fetch_assoc($result);
if ($AIbag_row['mem_id'] == $row['mem_id']) {
    $bag_id = $AIbag_row['bag_id'];
}
$update_bag_status = "UPDATE `laundry_bag` SET `bag_status` ='1' Where `bag_id`='$bag_id'";
$update_borrow_record = "UPDATE `bag_borrow_record` SET `bag_status` ='2' Where `bag_id`='$bag_id'";

$reslut = mysqli_query($conn, $update_bag_status);