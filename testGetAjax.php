<?php
    header("Content-type: text/html; charset=UTF-8");
    // http://www.tastones.com/zh-tw/tutorial/php/php-json-parsing/ -> php json教學(可以參考)
    $test = $_POST['test'];
    $oRes = array("res"=>'success', "data"=>[$test]);
 
    echo json_encode($oRes);
?>