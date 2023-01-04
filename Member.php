<!DOCTYPE html>
<!-- <?php
    require_once('connect.php');
?> -->

<html lang="en">

<head>
    <!-- <?php include('templates/frame/head.html') ?> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/css/all.css">
    <link rel="stylesheet" href="static/css/header.css" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <title>會員管理</title>
    <style>
        .amos-my-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        a.custom-card,
        a.custom-card:hover {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-default bg-amos" role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="static/img/washing-machine.png" width="50" alt="AI智慧喜"
                        class="d-inline-block align-text-top" id="logo-img"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" data-target-sidebar=".side-collapse-right">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--頁面選單-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ChooseWashMode.html">智慧洗</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Member.html">會員管理</a>
                        </li>
                    </ul>
                </div>
                <!-- <?php
                       /// echo '<script>location.href="/"</script>';$i = time() str $xxxId = 'XX'+$i
                    ?>
                -->
                <!-- To後端:登入/登出按紐 -->
                <!-- 用if 判斷session 是否有資料 決定要秀登入or 登出 -->
                <a href="logout.php"><input class="btn btn-outline-light" type="submit" onclick="" value="登出"></a>
                <a href="logintest.php"><input class="btn btn-outline-light" type="submit" onclick="" value="登入"></a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mb-4">
            <form method="post" action="">
                <br>
                <div class="row">

                    <!-- 會員管理 -->

                    <div class="col-12 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <a href="Member.html" class="stretched-link custom-card">
                                <div class="row g-0">
                                    <div class="col-md-4 img_border">
                                        <img src="static/img/user.png" class="w-100 amos-my-card-img" alt="頭像"
                                            style="border-radius: 50%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">劉士豪</h5>

                                            <p class="card-text">累積碳點: 85</p>
                                            <p class="card-text"><small class="text-muted">會員編號</small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- 訂單管理 -->
                    <div class="col-12 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <a href="OrderManage.html" class="stretched-link custom-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="static/img/filter.png" class="w-100 amos-my-card-img" alt="訂單管理"
                                            style="border-radius: 50%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title">訂單管理</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- AI洗衣袋管理 -->
                <div class="col-12 col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <a href="WashBagManage.html" class="stretched-link custom-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="static/img/clothes.png" class="w-100 amos-my-card-img" alt="AI洗衣袋管理"
                                        style="border-radius: 50%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h2 class="card-title">AI洗衣袋管理</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
                                <!-- 付款卡管理 -->
                                <div class="col-12 col-md-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <a href="CardManage.html" class="stretched-link custom-card">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="static/img/card.png" class="w-100 amos-my-card-img" alt="訂單管理"
                                                        style="border-radius: 50%;">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h2 class="card-title">付款卡管理</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

            </form>
        </div>
    </main>
    <footer></footer>

    <script src="static/lib/Frontend_lib/jquery/jquery-3.1.0.js"></script>
    <script src="static/js/bootstrap.bundle.min.js"></script>
</body>

</html>