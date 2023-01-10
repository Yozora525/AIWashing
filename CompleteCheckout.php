<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
$payId=$_GET['payid'];

$sql = "SELECT * FROM `washing_order` WHERE `order_id`='{$payId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$WashMode = $row['wash_mode']; //洗滌
$id = $row['order_id'];
$DehydrationMode = $row['dryout_mode']; //脫水
$DryMode = $row['drying_mode']; //乾燥
$FoldMode_Way = $row['folding_mode']; //折衣

$SendTo_Way = $row['sent_to']; //送洗方式
$SendTo_address = $row['sentTo_address']; //送洗

$SendBack_Way = $row['sent_back']; //取回方式
$SendBack_address = $row['sentBack_address']; //取回
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
    <title>付款成功</title>
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
        <div class="container ">
            <form method="post" action="">
                <p><img src="static/img/yes.png" alt="結帳成功!" class="ounded mx-auto d-block"></p>
                <p class="h1 text-success text-center"><b>付款成功!</b></p>
                <br>
                <!-- <hr style="background-color:rgb(25, 25, 47); height:1px; border:none;" />
                <span class="fs-6">訂單編號: O202212110874</span><br>
                <span class="fs-6">付款金額: NT$ 955</span><br>
                <span class="fs-6">收款方: AI智慧喜公司</span><br> -->
                <div class="card">
                    <div class="card-header">
                        <p class="text-center">發票</p>
                        <span class="fs-6">訂單編號：<?php echo $id ?><br></span>


                        <span class="fs-6">洗滌模式：<?php echo $WashMode ?></span><br>
                        <span class="fs-6">脫水模式：<?php echo $DehydrationMode ?></span><br>
                        <span class="fs-6">乾燥模式：<?php echo $DryMode ?></span><br>
                        <span class="fs-6">折衣模式：<?php echo $FoldMode_Way ?></span><br>

                        <span class="fs-6">送洗方式：<?php echo $SendTo_Way ?></span><br>
                        <span class="fs-6">洗衣門市/地址：<?php echo $SendTo_address ?></span><br>

                        <span class="fs-6">領取方式：<?php echo $SendBack_Way ?></span><br>
                        <span class="fs-6">取衣門市/地址：<?php echo $SendBack_address ?></span><br>

                        <span class="fs-6">衣物重量：0.8kg</span><br>
                        <span class="fs-6">洗衣總額：NT$664</span><br>
                        <span class="fs-6">運費：NT$ 0</span><br>
                        <span class="fs-6">碳排放：55g</span><br>
                        <span class="fs-6">碳點：80</span><br>
                        <span id="tax" style="display:none">碳稅：80</span>
                        <span class="fs-6">隨機碼：0000</span><br>
                        <span class="fs-6">公司名：AI智慧喜</span><br>
                        <span class="fs-6">下單時間：2022-12-30 00:00:01</span><br>
                        <p class="fs-6">總額：NT$ <b style="color:red">974</b></p>
                    </div>
                </div>
                <!-- 等待時間00:00時 自動出現下一步按紐 --><br>
                <p><input type="submit" value="完成" class="btn btn-success" onclick="" /></p>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>