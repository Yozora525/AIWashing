<?php
session_start();
//連線mysql
require_once('connectcopy.php');
//$_POST使用者名稱和密碼
$account = $_POST['account'];
$password = $_POST['password'];
//sql查詢語句
$sql = "SELECT `member_id` from `member` where `account`='$account' && `password`='$password'";//改連接的資料庫
//執行
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result); // 函式返回結果集中行的數量
if ($num) {
    echo "<script>alert('登入成功');window.location.href = 'ChooseWashMode.php'</script>";//改登入成功網址
} else {
    echo "<script>alert('帳號或密碼錯誤');window.location.href = 'login.html'</script>";//改成登入頁面的網址
}

$_SESSION['memberid'] =mysqli_fetch_assoc($result);['member_id']; // session
$_SESSION["account"] = mysqli_fetch_assoc($result)["account"];
mysqli_close($conn);
?>