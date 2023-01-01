<?php
    require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/frame/head.html') ?>
    <?php include('src/commonTools.php') ?>
<body>
    <?php
        $id = IdProducer('Mem');
        echo $id;
    ?>
</body>
</html>