<?php
require_once('connect.php');
function IdProducer(string $Feature)
{
    $timestamp =  microtime(true);
    $timestamp = (string) $timestamp * 1000;
    $id = $Feature . $timestamp;
    $id = explode('.', $id)[0];
    return $id;
}




/*註冊*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = $_POST['account'];
    $username = $_POST['name']; //post獲取表單裡的name
    $password = $_POST['password']; //post獲取表單裡的password
    $confirm = $_POST['passwordconfirm']; //post獲取表單裡的passwordconfirm
    $phone = $_POST['phone']; //post獲取表單裡的phone
    $memId = IdProducer('M');

    /* 新增借用洗衣袋 */
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
            break;
        }
    }

    if (!isset($_POST['submit'])) {
        exit("錯誤執行");
    } //判斷是否有submit操作

    elseif ($account == "" || $username == "" || $password == "" || $confirm == "" || $phone == "") {
        echo "<script> alert('資訊不能為空！重新填寫');window.location.href = 'signup.php'</script>";
    } elseif (mysqli_fetch_array(mysqli_query($conn, "SELECT * from `member` where `mem_account` = '$account'"))) {
        echo "<script>alert('帳號已註冊過');window.location.href = 'signup.php'</script>";
    } elseif ($password != $confirm) {
        echo "<script>alert('兩次密碼不相同！重新填寫');window.location.href = 'signup.php'</script>";
    } else {
        $singup = "INSERT into `member`(mem_id,mem_account,mem_name,mem_pwd,pwd_confirm,mem_phone) values ('$memId','$account','$username','$password','$confirm','$phone')"; //向資料庫插入表單傳來的值的sql
        $reslut = mysqli_query($conn, $singup);
        $addaibag = "INSERT into `bag_borrow_record`(bad_id,mem_id) values ('$aibag','$memId')";
        $reslut = mysqli_query($conn, $addaibag);
    }

    if (!$reslut) {
        die('Error: ' . mysqli_error($conn)); //如果sql執行失敗輸出錯誤
    } else {
        echo "<script> alert('註冊成功'); window.location.href = 'member.php'</script>"; //成功輸出註冊成功
    }
}
mysqli_close($conn); //關閉資料庫
