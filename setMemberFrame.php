<?php
    header("Content-type: text/html; charset=UTF-8");
    require_once('connect.php');

    // get MemId
    session_start();
    if (isset($_SESSION['login']) == false) {
        header('location:login.php');
        exit;
    }
    $memid = $_SESSION['login'];

    // get frameId
    $frameId = $_POST['frameId'];

    // using frame's status 2 -> 1, set(update) frame status 1 -> 2
    $sqlUpdateOriginFrame = "update member_avatar_frame set memFrame_status=1 where memFrame_status=2 and mem_id='{$memid}'";
    
    if ($conn->query($sqlUpdateOriginFrame) === FALSE) {
        $oRes = array("res"=>'fail', "msg"=>'發生錯誤，請稍後再試！');
        echo json_encode($oRes);
    }

    $sqlSetNewFrame = "update member_avatar_frame set memFrame_status=2 where frame_id='{$frameId}' and mem_id='{$memid}'";
    
    if ($conn->query($sqlSetNewFrame) === FALSE) {
        $oRes = array("res"=>'fail', "msg"=>'發生錯誤，請稍後再試！');
        echo json_encode($oRes);
    }

    $sql = "SELECT `frame_color` FROM `avatar_frame` WHERE `frame_id`='{$frameId}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    
    $oRes = array("res"=>'success', "data"=>[$memid, $row['frame_color'],$frameId]);

    echo json_encode($oRes);


?>