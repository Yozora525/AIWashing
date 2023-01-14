<!DOCTYPE html>
<html lang="en">
<?php
require_once('connect.php');
session_start();
if (isset($_SESSION['login']) == true) {
    header('location:member.php'); //改成會員界面
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>

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
        <div class="container">
            <br><br><br><br>
            <form method="post" action="memberlogin.php">
                <div class="form-group">
                    <label>帳 號：</label>
                    <input type="text" name="account" class="form-control" aria-describedby="CertifiedHelp" placeholder="請輸入身份證字號">
                    <small id="CertifiedHelp" class="form-text text-muted">We'll never share personal information with
                        anyone else.</small>
                </div>
                <div class="form-group">
                    <label>密 碼：</label>
                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label">記住我</label>
                </div>
                <br>
                <div class="d-grid gap-2">
                    <input class="btn btn-success" type="submit" onclick="" value="登入">
                    <a href="loginTan.php"><button class="btn btn-primary" type="button">以碳治郎帳號授權登入</button></a>
                </div>
            </form>
            <p class="text-center">
                沒有帳號嗎? <a href="Signup.php">前往註冊</a>
            </p>
        </div>
    </main>
    <footer></footer>
</body>

</html>