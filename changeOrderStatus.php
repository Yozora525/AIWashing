<?php
    include_once("connect.php");
    header("Content-type: text/html; charset=UTF-8");
    
    // Get OrderId and Status Code
    $orderId = $_POST['orderId'];
    $status = $_POST['status'];
    
    // update syntax
    $sql = "update washing_order set status=" . $status . "where order_id=" . $orderId;
    
    // update order status, if success return {'res':'success'} else {'res':'fail', msg:'error message .....'}
    if (mysqli_query($conn, $sql)) {
        $oRes = array("res"=>"success");
    } else {
        $oRes = array("res"=>"fail", "msg"=>"發生錯誤，請稍後再試，若持續發生請聯絡管理員".mysqli_error($conn));
    }
    
    echo json_encode($oRes);
?>