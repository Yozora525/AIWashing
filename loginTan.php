<?php
// require_once('connect.php');
function httpRequest() {
    $ch = curl_init();
    $url = 'http://140.135.43.61:3000/accounts/J334251732/';
    curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_POST, 0);
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     'Content-Type: application/json',
    //     'Content-Length: ' . strlen($data_string))
    // );
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    // var_dump($result);
    return $result;
    // return json_decode($result, true);
}

$oRes = httpRequest();

echo $oRes;
//  $oRes = json_encode($oRes);
//  echo $oRes;

$sql = "SELECT * FROM `member` WHERE `mem_id`=''";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0) {
        session_start();
        if (isset($_SESSION['login']) == true) {
            header('location:member.php'); //改成會員界面
            exit;  //記得要跳出來，不然會重複轉址過多次
    }
}




?>
