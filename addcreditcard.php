<?php
require_once('connectcopy.php');
session_start();
$memid = $_SESSION['login'];
$sql = "SELECT `mem_id` FROM `member` WHERE `mem_id`='{$memid}'";
//執行
$getmemid = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($getmemid);
$mem_id = $row['mem_id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $creditname = $_POST['credit_name'];
    $creditnum = $_POST['credit_num'];
    $username = $_POST['user_name'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $securitycode = $_POST['security_code'];

    /*註冊*/
    if (!isset($_POST['submit'])) {
        exit("錯誤執行");
    } //判斷是否有submit操作

    elseif ($creditname == "" || $creditnum == "" || $month == "" || $year == "" || $securitycode == "" || $username == "") {
        echo "<script>alert('資訊不能為空！重新填寫');window.location.href='addCard.php'</script>";
    } elseif (mysqli_fetch_array(mysqli_query($conn, "SELECT * from `payment` where `card_name` = '$creditname' & `card_num` = '$creditnum'"))) {
        echo "<script>alert('卡片已存在');window.location.href='addCard.php'</script>";
    } else {
        $addcreditcard = "INSERT into `payment`(mem_id,card_name,card_num,owner_name ,expired_month,expired_year,security_code) values ('$mem_id','$creditname','$creditnum','$username','$month','$year','$securitycode')"; 
        $reslut = mysqli_query($conn, $addcreditcard);
    }

    if (!$reslut) {
        die('Error: ' . mysqli_error($conn)); //如果sql執行失敗輸出錯誤
    } else {
        echo "<script>alert('卡片新增成功');window.location.href='CardManage.php'</script>"; //新增成功
    }
}
mysqli_close($conn); //關閉資料庫
?>