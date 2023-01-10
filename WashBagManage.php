<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
$member_memid = $_SESSION['login'];
$member_sql = "SELECT `mem_id` FROM `member` WHERE `mem_id`='{$member_memid}'";
$member_result = mysqli_query($conn, $member_sql);
$member_row = mysqli_fetch_assoc($member_result);
$member_mem_id = $member_row['mem_id'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/css/all.css">
    <link rel="stylesheet" href="static/css/header.css" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <script src="static/lib/Frontend_lib/jquery/jquery-3.1.0.js"></script>
    <script src="static/js/OrderManage.js"></script>
    <title>AI洗衣袋管理</title>
</head>

<body>
    <?php
    include('templates/frame/header.php');
    ?>

    <main>
        <div class="container">
            <form method="post" action="">
                <br>
                <h4>顯示現有的AI洗衣袋</h4>
                <?php
                $laundry_bag_sql = "SELECT * FROM laundry_bag";
                $laundry_bag_result = mysqli_query($conn, $laundry_bag_sql);
                if ($laundry_bag_result->num_rows > 0) {
                    while ($laundry_bag_row = $laundry_bag_result->fetch_assoc()) {
                        if ($member_mem_id == $laundry_bag_row['mem_id']) {
                ?>
                            <div class="card">
                                <div class="card-header">
                                    AI洗衣袋編號: <?php echo $laundry_bag_row['bag_id'] ?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0  dis-none" data-detail="">
                                        <footer class="blockquote-footer"><?php echo $laundry_bag_row['bag_addTime'] ?> </footer>
                                    </blockquote>
                                </div>
                            </div>
                            <br>
                <?php }
                    }
                } ?>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>