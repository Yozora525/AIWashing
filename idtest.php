<!DOCTYPE html>
<html lang="en">

<head>
<?php
include('templates/frame/head.html');
?>
</head>

<body>
    <?php
    include('templates/frame/header.html');
    ?>

    <?php
    function IdProducer(string $Feature){
        // get current timestamp
        $timestamp =  microtime(true);
        $timestamp = (string) $timestamp * 1000;
        $id = $Feature.$timestamp;
        $id = explode('.', $id)[0];
        // $id = $id[0];
        return $id;
    }


    $id = IdProducer('D');
    echo $id;
    ?>

    <footer></footer>
</body>

</html>