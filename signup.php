<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
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
    <title>使用者登入頁面</title>
</head>

<body>
    <?php
    include('templates/frame/header.php');
    ?>

    <main>
        <!-- 註冊 -->
        <div class="container">
            <br><br><br>
            <form method="post" action="membersignup.php">
                <div class="form-group">
                    <label>帳 號：</label>
                    <input type="text" class="form-control" aria-describedby="CertifiedHelp" placeholder="請輸入身份證字號" name="account">
                    <small id="CertifiedHelp" class="form-text text-muted">We'll never share personal information with
                        anyone else.</small>
                </div>
                <div class="form-group">
                    <label>使用者名稱：</label>
                    <input type="text" class="form-control" placeholder="請輸入使用者名稱" name="name">
                </div>
                <div class="form-group">
                    <label>密 碼：</label>
                    <input type="password" class="form-control" placeholder="請輸入密碼" name="password">
                </div>
                <div class="form-group">
                    <label>重複密碼：</label>
                    <input type="password" class="form-control" placeholder="請再輸入密碼一次" name="passwordconfirm">
                </div>
                <div class="form-group">
                    <label>電 話：</label>
                    <input type="text" class="form-control" placeholder="請輸入電話" name="phone">
                    <div class="d-md-flex justify-content-md-end" style="margin-top: 1rem;">
                        <input type="button" class="btn btn-outline-success " onclick="window.alert('此功能尚未開放!');" value="手機驗證碼" />
                    </div>

                </div>
                <br>
                <div class="d-grid gap-2">
                    <input class="btn btn-success" name="submit" type="submit" onclick="" value="註冊">
                </div>
                <br><br>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>