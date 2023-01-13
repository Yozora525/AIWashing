<?
    function IdProducer(string $Feature){
        //date_default_timezone_set('時區');
        date_default_timezone_set('Asia/Taipei');
        // get current timestamp
        $timestamp =  microtime(true);
        $timestamp = (string) $timestamp * 1000;
        $id = $Feature.$timestamp;
        $id = explode('.', $id)[0];
        return $id;
    }

    /* 
        計算碳點、碳排、碳稅
        $ListMode 請給陣列
        重量統一用3kg來算
    */
    function CalculateCarbonData($ListMode){
        $weight = 3;
        $point = 0; // 碳點
        $discharge = 0; // 碳排

        // 撈出該模式下所需的碳排、點、稅，並加起來
        for ($i=0; $i < count($ListMode); $i++) {
            $sql = "select * from wash_mode where mode_id = {$ListMode[$i]}";

            // 找出每公斤的碳點、碳排

            // $weight * 
        }

        $tax = 0; // 碳稅
        $oRes = array("res"=>"success", "point"=>$point, "tax"=>$tax, "discharge"=>$discharge);

        return $oRes;
    }
?>