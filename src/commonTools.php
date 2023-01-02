<?
    function IdProducer(string $Feature){
        // get current timestamp
        $timestamp = (string) time();
        list($msec, $sec) = explode(' ', microtime());
        
        // get ms
        $msectime = (float) sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);

        $idNumber = $timestamp + (string)$msectime;

        if (strlen($idNumber) > 16) {
            $idNumber = substr($idNumber, 0, 16);
        }
        
        $id = $Feature.$idNumber;

        return $id;
    }

    
?>