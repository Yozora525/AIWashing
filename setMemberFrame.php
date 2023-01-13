<?php
    header("Content-type: text/html; charset=UTF-8");
    
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
    
    $oRes = array("res"=>'success', "data"=>[$memid, $frameId]);

    echo json_encode($oRes);


?>