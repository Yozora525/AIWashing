<!DOCTYPE html>
<?php
require_once('connect.php');
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
    <?php
    include('templates/frame/header.php');
    ?>

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
                    <div class="d-md-flex" style="margin-top: 1rem;">
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