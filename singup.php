<?php

require_once('connectcopy.php');
$account = $_POST['account'];
$username = $_POST['name']; //post獲取表單裡的name
$password = $_POST['password']; //post獲取表單裡的password
$confirm = $_POST['passwordconfirm']; //post獲取表單裡的passwordconfirm
$phone = $_POST['phone']; //post獲取表單裡的phone


/*註冊*/
if (!isset($_POST['submit'])) {
    exit("錯誤執行");
} //判斷是否有submit操作

elseif ($account == "" || $username == "" || $password == "" || $confirm == "" || $phone == "") {
    echo "<script>alert('資訊不能為空！重新填寫');window.location.href='sing.html'</script>";
} elseif (mysqli_fetch_array(mysqli_query($conn, "select * from member where account = '$account'"))) {
    echo "<script>alert('帳號已註冊過');window.location.href='sing.html'</script>";
} elseif ($password != $confirm) {
    echo "<script>alert('兩次密碼不相同！重新填寫');window.location.href='sing.html'</script>";
} else {
    $singup = "insert into `member`(username,password,confirm,phone) values ('$username','$password','$confirm','$phone')"; //向資料庫插入表單傳來的值的sql
    $reslut = mysqli_query($conn, $singup); //執行sql
}

if (!$reslut) {
    die('Error: ' . mysqli_error($conn)); //如果sql執行失敗輸出錯誤
} else {
    echo "註冊成功"; //成功輸出註冊成功
}
mysqli_close($conn);//關閉資料庫
