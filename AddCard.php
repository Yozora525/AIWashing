<!DOCTYPE html>
<?php
require_once('connectcopy.php');
session_start();
?>

<html lang="en">

<head>
    <?php //include('templates/frame/head.html') 
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/css/all.css">
    <link rel="stylesheet" href="static/css/header.css" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <script src="static/lib/Frontend_lib/jquery/jquery-3.1.0.js"></script>
    <title>使用者登入頁面</title>
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
            <br><br><br>
            <form method="post" action="addcreditcard.php">
                <div class="form-group">
                    <label>付款卡名稱：</label>
                    <input type="text" class="form-control" aria-describedby="CertifiedHelp" placeholder="請輸入付款卡名稱" name="credit_name">
                </div>
                <div class="form-group">
                    <label>付款卡卡號：</label>
                    <input type="text" class="form-control" placeholder="請輸入付款卡卡號" name="credit_num">
                </div>
                <div class="form-group">
                    <label>持卡人姓名：</label>
                    <input type="text" class="form-control" aria-describedby="CertifiedHelp" placeholder="請輸入持卡人姓名" name="user_name">
                </div>
                <div class="form-group">
                    <label>月：</label>
                    <input type="text" placeholder="月" class="form-control" name="month">
                    <label>西元年：</label>
                    <input type="text" placeholder="西元年" class="form-control" name="year">
                </div>
                <div class="form-group">
                    <label>安全碼：</label>
                    <input type="text" class="form-control" placeholder="請輸入安全碼" name="security_code">
                    <div class="d-md-flex justify-content-md-end" style="margin-top: 1rem;">
                        <input type="button" class="btn btn-outline-success " onclick="window.alert('此功能尚未開放!');" value="簡訊驗證碼" />
                    </div>
                </div>
                <div class="form-group" style="display:none">
                    <label>驗證碼：</label>
                    <input type="text" class="form-control" placeholder="請輸入驗證碼" name="">
                </div>
                <br>
                <div class="d-grid gap-2">
                    <input class="btn btn-success" name="submit" type="submit" onclick="" value="確認">
                </div>
                <br><br>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>