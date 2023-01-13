<?php
    // 本檔案主要功能為將交易資訊送至碳治郎

    // 取得交易紀錄
    // $sql = "select * from washing_order where order_id = ";

    // 將資料送至碳治郎
    function httpRequest($data_string) {
        $ch = curl_init();
        $url = 'http://192.168.0.233:3000/accounts/J334251732/'.$data_string;
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

    $data = json_encode([
        "billId" => "B10384857395",
        "memberId" => "5697",
        "totalMoney" => 300,
        "cbTax" => 2.5,
        "cbPoint" => 21,
        "cbEm" => 21.5,
        "billDt" => "2023-01-13"
    ]);

    $oRes = httpRequest($data);

    if($oRes == 'ok'){
        echo 'same';
    } else {
        echo 'nosame';
    }
    

?>