<?php
    include_once("../connect.php");
    
    // write order data to database
    function SetOrderData(string $OrderId=''){
        // if orderId -> update else insert
        if (strlen($OrderId)) {
            $sql = "update";
        } else {
            $sql = "insert ";
        }
    }

    // receive frontend post data
    $orderId = $_POST['orderId'];
    // $memId = from session
    // ....

    SetOrderData($orderId);
?>