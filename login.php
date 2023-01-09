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
                    <button class="btn btn-primary" type="button">以碳治郎帳號授權登入</button>
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