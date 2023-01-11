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
                <h4>顯示現有的付款卡 <button class="btn btn-success" type="button" onclick="location.href='AddCard.php'" value="">新增</button></h4>
                <?php
                $payment_sql = "SELECT * FROM `payment`";
                $payment_result = mysqli_query($conn, $payment_sql);
                if ($payment_result->num_rows > 0) {
                    while ($payment_row = $payment_result->fetch_assoc()) {
                        if ($member_mem_id == $payment_row['mem_id']) {
                ?>
                            <div class="card">
                                <div class="card-header">
                                    付款卡名稱：<?php echo $payment_row['card_name'] ?>
                                </div>
                                <div class="card-body">
                                    <span class="fs-6">付款卡卡號：<?php echo $payment_row['card_num'] ?><br></span>
                                    <span class="fs-6">到期日：<?php echo $payment_row['expired_month'] ?> / <?php echo $payment_row['expired_year'] ?><br></span>
                                </div>
                            </div>
                            <br>
                <?php
                        }
                    }
                }
                mysqli_close($conn); ?>

            </form>
        </div>
    </main>
    <footer></footer>
</body>


</html>