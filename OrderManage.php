<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();

if (isset($_SESSION['login']) == false) {
    header('location:login.php');
    exit;
}

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
    <script src="static/js/OrderManagecopy.js"></script>
    <title>訂單管理</title>
</head>

<body>
    <?php
    include('templates/frame/header.php');
    ?>

    <main>
        <div class="container">
            <br>
            <h4>顯示近3個月的訂單</h4>
            <?php
            $order_sql = "SELECT * FROM `washing_order`";
            $order_result = mysqli_query($conn, $order_sql);
            if ($order_result->num_rows > 0) {
                while ($order_row = $order_result->fetch_assoc()) {
                    if ($member_mem_id == $order_row['mem_id']) {
            ?>
                        <div class="card">
                            <div class="card-header">
                                訂單編號：<?php echo $order_row['order_id'] ?>
                                <input type="hidden" name="payid[]" value="<?php echo $order_row['order_id'] ?>" readonly />
                            </div>
                            <!-- data-seemore 及 data-detail 值要給訂單編號 -->
                            <div class="card-body">
                                <span class="fs-6">碳點： <?php echo $order_row['carbon_point'] ?><br></span>
                                <span class="fs-6">碳排放： <?php echo $order_row['carbon_emission'] ?><br></span>
                                <a class="card-link" data-seemore="<?php echo $order_row['order_id'] ?>" onclick="ShowDetailData('<?php echo $order_row['order_id'] ?>')">查看詳情<br></a>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">洗滌模式： <?php echo $order_row['wash_mode'] ?><br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">脫水模式： <?php echo $order_row['dryout_mode'] ?><br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">乾燥模式： <?php echo $order_row['drying_mode'] ?><br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">折衣模式： <?php echo $order_row['folding_mode'] ?><br></span>

                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">送洗方式： <?php echo $order_row['sent_to'] ?><br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">洗衣門市/地址： <?php echo $order_row['sentTo_address'] ?><br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">送洗方式： <?php echo $order_row['sent_back'] ?><br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">取衣門市/地址： <?php echo $order_row['sentBack_address'] ?><br></span>


                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">衣物重量：<?php echo $order_row['weight'] ?> kg<br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">洗衣總額： NT$ <?php echo $order_row['washing_price'] ?></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">運費： NT$ <?php echo $order_row['sentprice'] ?><br></span>
                                <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">總額： NT$ <?php echo $order_row['total_price'] ?><br></span>
                                <p><br>
                                    <?php if ($order_row['order_status'] == '1') {
                                        $_SESSION['payid'] = $order_row['order_id'];
                                        echo "<a href='addinvoice.php?payid=" . $order_row['order_id'] . "' class='btn btn-success'>確認付款</a>"; ?>
                                    <?php }  ?>

                                </p>
                            </div>
                        </div>
                        <br>
            <?php
                    }
                }
            }

            mysqli_close($conn);
            ?>

        </div>
    </main>
    <footer></footer>
</body>

</html>