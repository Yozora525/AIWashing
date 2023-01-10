<!DOCTYPE html>
<html lang="en">
<?php
require_once('connect.php');
session_start();
if (isset($_SESSION['login']) == false) {
    header('location:login.php');
    exit; 
}
$memid = $_SESSION['login'];
$sql = "SELECT `mem_name`,`mem_id` FROM `member` WHERE `mem_id`='{$memid}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$mem_id = $row['mem_id'];
$name = $row['mem_name'];
mysqli_close($conn);

?>

<head>
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
    <?php
    include('templates/frame/header.php');
    ?>

    <main>
        <div class="container mb-4">
            <form method="post" action="">
                <br>
                <div class="row">

                    <!-- 會員管理 -->

                    <div class="col-12 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <a href="member.php" class="stretched-link custom-card">
                                <div class="row g-0">
                                    <div class="col-md-4 img_border">
                                        <img src="static/img/user.png" class="w-100 amos-my-card-img" alt="頭像" style="border-radius: 50%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $name ?></h5>
                                            <p class="card-text">累積碳點: 85</p>
                                            <p class="card-text"><small class="text-muted">會員編號<?php echo $mem_id ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- 訂單管理 -->
                    <div class="col-12 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <a href="OrderManage.php" class="stretched-link custom-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="static/img/filter.png" class="w-100 amos-my-card-img" alt="訂單管理" style="border-radius: 50%;">
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
                        <a href="WashBagManage.php" class="stretched-link custom-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="static/img/clothes.png" class="w-100 amos-my-card-img" alt="AI洗衣袋管理" style="border-radius: 50%;">
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
                        <a href="CardManage.php" class="stretched-link custom-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="static/img/card.png" class="w-100 amos-my-card-img" alt="訂單管理" style="border-radius: 50%;">
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