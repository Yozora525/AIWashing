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
    <title>訂單管理</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-default bg-amos" role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="static/img/washing-machine.png" width="50" alt="AI智慧喜" class="d-inline-block align-text-top" id="logo-img"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target-sidebar=".side-collapse-right">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--頁面選單-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link" href="Index.php">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ChooseWashMode.php">智慧洗</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Member.php">會員管理</a>
                        </li>
                    </ul>
                </div>
                <!-- To後端:登入/登出按紐 -->
                <!-- 用if 判斷session 是否有資料 決定要秀登入or 登出 -->
                <?php if (isset($_SESSION['login']) == true) { ?>
                    <a href="logout.php"><input class="btn btn-outline-light" type="submit" onclick="" value="登出"></a>
                <?php } else { ?>
                    <a href="Login.php"><input class="btn btn-outline-light" type="submit" onclick="" value="登入"></a>
                <?php } ?>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <form method="post" action="CompleteCheckout.php">
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
                                    訂單編號: <?php echo $order_row['order_id'] ?>
                                </div>
                                <!-- data-seemore 及 data-detail 值要給訂單編號 -->
                                <div class="card-body">
                                    <span class="fs-6">碳點: <?php echo $order_row['carbon_point'] ?><br></span>
                                    <span class="fs-6">碳排放: <?php echo $order_row['carbon_emission'] ?><br></span>
                                    <a class="card-link" data-seemore="<?php echo $order_row['order_id'] ?>" onclick="ShowDetailData('<?php echo $order_row['order_id'] ?>')">查看詳情<br></a>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">洗衣門市: 中原門市<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">洗滌模式: 冷<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">脫水模式: 弱脫水<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">乾燥模式: 電熱烘乾<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">折衣模式: 機器人<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">送洗方式: 集中櫃<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">領取方式: 外送<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">衣物重量: 0.8kg<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">洗衣總額: NT$664<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">運費: NT$ 20<br></span>
                                    <span class="fs-6 dis_none" data-detail="<?php echo $order_row['order_id'] ?>">總額: NT$ 1974<br></span>
                                    <p>
                                        <?php if ($order_row['order_status'] == '1') {
                                            $_SESSION['payid'] = $order_row['order_id'] ?>
                                            <input type="submit" value="確認付款" class="btn btn-success" onclick="" />
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
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>