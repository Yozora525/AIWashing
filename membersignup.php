<?php
require_once('connect.php');
function IdProducer(string $Feature)
{
    //date_default_timezone_set('時區');
    date_default_timezone_set('Asia/Taipei');
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
            if (!empty($aibag))
                break;
        }
    }
    /* 新增註冊頭相框 */
    $sql = "SELECT * FROM `avatar_frame`";
    $avatar_frame_result = mysqli_query($conn, $sql);
    $avatar_frame = array();
    $s = 0;
    while ($avatar_frame[$s] = $avatar_frame_result->fetch_assoc()) {
        $s++;
    }
    for ($s = 0; $s < count($avatar_frame); $s++) {
        if ($avatar_frame[$s]['frame_points'] == 0) {
            $frame = $avatar_frame[$s]['frame_id'];
            if (!empty($frame))
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
        /* 註冊 */
        $singup = "INSERT into `member`(mem_id,mem_account,mem_name,mem_pwd,pwd_confirm,mem_phone) values ('$memId','$account','$username','$password','$confirm','$phone')"; //向資料庫插入表單傳來的值的sql
        $reslut = mysqli_query($conn, $singup);
        /* 新增洗衣袋 */
        $addaibag = "INSERT into `bag_borrow_record`(bag_id,mem_id) values ('$aibag','$memId')";
        $reslut = mysqli_query($conn, $addaibag);
        /* 更新洗衣袋狀態 */
        $update_aibag = "UPDATE `laundry_bag` SET `bag_status` ='2' Where `bag_id`='$aibag'";
        $reslut = mysqli_query($conn, $update_aibag);
        /* 新增頭相框 */
        $addframe = "INSERT into `member_avatar_frame`(frame_id,mem_id,memFrame_status) values ('$frame','$memId','2')";
        $reslut = mysqli_query($conn, $addframe);
    }

    if (!$reslut) {
        die('Error: ' . mysqli_error($conn)); //如果sql執行失敗輸出錯誤
    } else {
        echo "<script> alert('註冊成功'); window.location.href = 'member.php'</script>"; //成功輸出註冊成功
    }
}
mysqli_close($conn); //關閉資料庫
