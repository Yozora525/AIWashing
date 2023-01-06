<?
    function IdProducer(string $Feature){
        // get current timestamp
        $timestamp =  microtime(true);
        $timestamp = (string) $timestamp * 1000;
        $id = $Feature.$timestamp;
        $id = explode('.', $id)[0];
        // $id = $id[0];
        return $id;
    }

    
?>