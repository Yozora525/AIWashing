<?php
require_once('connectcopy.php');
session_start();
$memid = $_SESSION['login'];
$sql = "SELECT `mem_id` FROM `member` WHERE `mem_id`='{$memid}'";
$getmemid = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($getmemid);
$mem_id = $row['mem_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $WashMode = $_POST['WashMode_']; //洗滌
    $DehydrationMode = $_POST['DehydrationMode_']; //脫水
    $DryMode = $_POST['DryMode_']; //乾燥
    $FoldMode_Way = $_POST['FoldMode_Way']; //折衣

    $Aibag = $_POST['Aibag']; //AI洗衣袋

    $SendTo_Way = $_POST['SendTo_Way']; //送洗方式
    $SendTo_Panda = $_POST['SendTo_Panda']; //外送送洗
    $SendTo_Cabinet = $_POST['SendTo_Cabinet']; //集中送洗
    $SendTo_Self = $_POST['SendTo_Self']; //到店送
    $sendto = $SendTo_Panda . $SendTo_Cabinet . $SendTo_Self;

    $SendBack_Way = $_POST['SendBack_Way']; //取回方式
    $SendBack_Panda = $_POST['SendBack_Panda']; //外送取回
    $SendBack_Cabinet = $_POST['SendBack_Cabinet']; //集中取回
    $SendBack_Self = $_POST['SendBack_Self']; //到店取回
    $sendBack = $SendBack_Panda . $SendBack_Cabinet . $SendBack_Self;

    $creditcard = $_POST['creditcard']; //信用卡

    /*註冊*/
    if (!isset($_POST['submit'])) {
        exit("錯誤執行");
    } elseif ($WashMode == "" || $DehydrationMode == "" || $DryMode == "" || $FoldMode_Way == "" || $Aibag == "" || $SendTo_Way == "" || $SendBack_Way == "" || $creditcard == "") {
        echo "<script>alert('資訊不能為空！重新填寫');window.location.href='ChooseWashMode.php'</script>";
    } else {
        $addorder = "INSERT into `washing_order`(mem_id,bag_id,wash_mode,dryout_mode,drying_mode,folding_mode,sent_to,sent_back)
         values ('$mem_id','$Aibag','$WashMode','$DehydrationMode','$DryMode','$FoldMode_Way','$SendTo_Way','$SendBack_Way')"; //向資料庫插入表單傳來的值的sql
        $reslut = mysqli_query($conn, $addorder); //執行sql
    }

    if (!$reslut) {
        die('Error: ' . mysqli_error($conn)); //如果sql執行失敗輸出錯誤
    } else {
        echo "<script>alert('訂單輸入成功');window.location.href='SendToWash.php'</script>"; //成功輸出註冊成功
    }
}
mysqli_close($conn);

?>