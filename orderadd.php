<?php
require_once('connect.php');
session_start();
$memid = $_SESSION['login'];
$sql = "SELECT `mem_id` FROM `member` WHERE `mem_id`='{$memid}'";
$getmemid = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($getmemid);
$mem_id = $row['mem_id'];

// IdProducer 製造Id的 function, 給Id特徵即可生成獨一無二的Id
function IdProducer(string $Feature)
{
    // get current timestamp
    $timestamp =  microtime(true);
    $timestamp = (string) $timestamp * 1000;
    $id = $Feature . $timestamp;
    $id = explode('.', $id)[0];
    return $id;
}

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


    if (!isset($_POST['submit'])) {
        exit("錯誤執行");
    } elseif ($WashMode == "" || $DehydrationMode == "" || $DryMode == "" || $FoldMode_Way == "" || $Aibag == "" || $SendTo_Way == "" || $SendBack_Way == "" || $creditcard == "") {
        echo "<script>alert('資訊不能為空！重新填寫');window.location.href='ChooseWashMode.php'</script>";
    } else {
        /* 計算碳點、碳排、碳稅 */
        $ListMode = [$WashMode, $DehydrationMode, $DryMode, $FoldMode_Way];
        $weight = 3; // 重量統一用3kg來算
        $point = 0; // 碳點
        $emission = 0; // 碳排(單位：公斤)

        //! 撈出該模式下所需的碳排、點、稅，並加起來    -> 尚未測試(沒資料及table可能還會更改)
        for ($i = 0; $i < count($ListMode); $i++) {
            $sql = "select * from wash_mode where mode_id = {$ListMode[$i]}";

            // 找出每公斤的碳點、碳排
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    $point += $weight * $row["mode_point"];
                    $emission += $weight * $row["carbonEmissions"];
                }
            }
        }

        $tax = $emission / 1000 * 3000; // 碳稅(每公噸3000)
        /* 計算碳點、碳排、碳稅 */

        // 訂單編號
        $orderId = IdProducer('O');

        /*註冊*/
        $addorder = "INSERT into `washing_order`(order_id,mem_id,bag_id,wash_mode,dryout_mode,drying_mode,folding_mode,sent_to,sent_back,sentTo_address,sentBack_address)
         values ('$orderId','$mem_id','$Aibag','$WashMode','$DehydrationMode','$DryMode','$FoldMode_Way','$SendTo_Way','$SendBack_Way','$sendto','$sendBack')"; //向資料庫插入表單傳來的值的sql
        $reslut = mysqli_query($conn, $addorder); //執行sql
        
        $num = mysqli_num_rows($result); // 函式返回結果集中行的數量
        if ($num) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['orderId'] =$row[$orderId] ;}
    }

    if (!$reslut) {
        die('Error: ' . mysqli_error($conn)); //如果sql執行失敗輸出錯誤
    } else {
        echo "<script>alert('訂單輸入成功');window.location.href='SendToWash.php'</script>"; //成功輸出註冊成功
    }
}
mysqli_close($conn);
