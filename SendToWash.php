<!DOCTYPE html>
<?php
require_once('connectcopy.php');
session_start(); ?>

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
            <form method="post" action="showOrder.html">
                <br>
                <p>預計完成的時間:</p>
                <!-- 剩下的時間 -->
                <p class="h1 text-success"><b>2022-12-28 12:28</b></p>
                <hr style="background-color:rgb(25, 25, 47); height:1px; border:none;" />

                <label for="start">約定取件時間:</label>
                <input type="datetime-local" id="birthdaytime" name="birthdaytime">
                <br><br>
                <p class="fs-5"><b>訂單詳情</b></p>
                <span class="fs-6">訂單編號：O202212110874</span><br>
                <span class="fs-6">洗衣門市：中原門市</span><br>
                <span class="fs-6">集中櫃編號：3-3</span><br>
                <span class="fs-6">洗滌模式：冷</span><br>
                <span class="fs-6">脫水模式：弱脫水</span><br>
                <span class="fs-6">乾燥模式：電熱烘乾</span><br>
                <span class="fs-6">折衣模式：機器人</span><br>
                <span class="fs-6">送洗方式：集中櫃</span><br>
                <span class="fs-6">領取方式：集中櫃</span><br>
                <!-- <span class="fs-6">衣物重量: 0.8kg</span><br> -->
                <span class="fs-6">洗衣總額：NT$664</span><br>
                <span class="fs-6">運費：NT$ 20</span><br>
                <span class="fs-6">碳稅：NT$ 30</span><br>
                <span class="fs-6">碳點：30</span><br>
                <p class="fs-5"><b>總額: NT$ 974</b></p>

                <!-- 等待時間00:00時 自動出現下一步按紐 -->
                <p><input type="submit" value="確定" class="btn btn-success" onclick="" /></p>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>