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
                    <input type="password" class="form-control" placeholder="請再輸入密碼一次" name="phone">
                    <input type="button" onclick="window.alert('此功能尚未開放!');" value="手機驗證碼" />

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