<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
$orderId = $_SESSION['orderId'];
$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$orderId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
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
    <title>選擇模式</title>
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
            <form method="post" action="ShowOrder.php">
                <br>
                <p>預計完成的時間:</p>
                <!-- 剩下的時間 -->
                <p class="h1 text-success"><b>2022-12-28 12:28</b></p>
                <hr style="background-color:rgb(25, 25, 47); height:1px; border:none;" />

                <label for="start">約定取件時間:</label>
                <input type="datetime-local" id="birthdaytime" name="add_sendback_time">
                <br><br>
                <p class="fs-5"><b>訂單詳情</b></p>
                <span class="fs-6">訂單編號：<?php echo $row['order_id'] ?></span><br>
                <input type="hidden" name="payid[]" value="<?php echo $row['order_id'] ?>" readonly />

                <span class="fs-6">集中櫃編號：<?php  ?></span><br>

                <span class="fs-6">洗滌模式：<?php echo $row['wash_mode'] ?></span><br>
                <span class="fs-6">脫水模式：<?php echo $row['dryout_mode'] ?></span><br>
                <span class="fs-6">乾燥模式：<?php echo $row['drying_mode'] ?></span><br>
                <span class="fs-6">折衣模式：<?php echo $row['folding_mode'] ?></span><br>

                <span class="fs-6">送洗方式：<?php echo $row['sent_to'] ?></span><br>
                <span class="fs-6">洗衣門市/地址：<?php echo $row['sentTo_address'] ?></span><br>

                <span class="fs-6">領取方式：<?php echo $row['sent_back'] ?></span><br>
                <span class="fs-6">取衣門市/地址：<?php echo $row['sentBack_address'] ?></span><br>

                <!-- <span class="fs-6">衣物重量: 0.8kg</span><br> -->
                <span class="fs-6">洗衣總額：NT$ <?php echo $row['washing_price']   ?></span><br>
                <span class="fs-6">運費：NT$ <?php echo $row['sendprice'] ?></span><br>
                <span class="fs-6">碳稅：NT$ <?php echo $row['carbon_tax'] ?></span><br>
                <span class="fs-6">碳點：<?php echo $row['carbon_point'] ?></span><br>
                <p class="fs-5"><b>總額: NT$ <?php echo $row['total_price']   ?></b></p>
                <p><input type="submit" value="確定" class="btn btn-success" onclick="" />
            </form>
            <!-- 等待時間00:00時 自動出現下一步按紐 -->
            <!--                 </p>
 -->
        </div>
    </main>
    <footer></footer>
</body>

</html>