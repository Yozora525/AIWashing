<?php
session_start();
require_once('connect.php');
// Define variables and initialize with empty values 
$account = $_POST["account"];
$password = $_POST["password"];

$sql = "SELECT `mem_id` from `member` where `mem_account`='$account' and `mem_pwd`='$password'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result); // 函式返回結果集中行的數量
if ($num) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['login'] = $row['mem_id']; // session
    echo "<script>window.location.href = 'member.php'</script>";
} else {
    echo "<script>alert('登入失敗，帳號或密碼錯誤');window.location.href = 'login.php'</script>";
}
mysqli_close($conn);
?>
