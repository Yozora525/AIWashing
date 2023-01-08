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
    include('src/commonTools.php');

    $id = IdProducer('Mem');
    echo $id;
    ?>

    <footer></footer>
</body>

</html>