<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
?>
<?php
/* $id = IdProducer('Mem');
echo $id; */
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
    <title>首頁</title>
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
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item  active">
                    <img src="static/img/BIGphoto.jpg" class="d-block w-100" alt="...">
                    <!-- <div class="carousel-caption d-none d-md-block">
            <h1 class="logo.title">AI智慧喜</h1>
            <p>AI智慧喜創立於20xx年，本公司以讓蕃薯國家裡不再有洗烘脫衣機，以達到節能減碳為目標。</p>
          </div> -->
                </div>
            </div>
        </div>
        <div class="container text-center index" style="display:block">

            <!-- <img src="img/BIGphoto.jpg" class="img-fluid" alt="..."> -->

            <p class="fs-1 logo.title">智慧喜</p>
            <p class="index.title fs-6 ">
                AI智慧喜創立於20xx年，本公司以讓蕃薯國家裡不再有洗烘脫衣機，以達到節能減碳為目標。</p>-
            <br> <br>
            <p class="index.title fs-6 ">
                本公司也有與政府單位「碳治郎」合作，在本商店洗衣都會紀錄該次交易的碳排量，如碳排量低於標準值可獲得碳點，碳點可於碳治郎平台，兌換特(奢)別(華)的「服務❤️」
            </p>
        </div>
    </main>
    <footer></footer>
</body>

</html>