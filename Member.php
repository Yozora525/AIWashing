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
$sql = "SELECT * FROM `member` WHERE `mem_id`='{$memid}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$mem_id = $row['mem_id'];
$name = $row['mem_name'];

//計算累計碳排
$emission = 0;
$sql = "SELECT * FROM `washing_order`";
$carbon_result = mysqli_query($conn, $sql);
if ($carbon_result->num_rows > 0) {
    while ($carbonrow = $carbon_result->fetch_assoc()) {
        if ($mem_id == $carbonrow['mem_id']) {
            $emission += $carbonrow['carbon_emission'];
        }
    }
}

//抓出會員擁有頭像id
$sql = "SELECT * FROM `member_avatar_frame` WHERE `mem_id`='{$memid}'";
$result = mysqli_query($conn, $sql);
$memframerow = mysqli_fetch_assoc($result);
$frame_id = $memframerow['frame_id'];

mysqli_close($conn);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/css/all.css">
    <link rel="stylesheet" href="static/css/header.css" />
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <script src="static/lib/Frontend_lib/jquery/jquery.min.js"></script>
    <script src="static/js/member.js"></script>

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
            <br>
            <div class="row">

                <!-- 會員管理 -->

                <div class="col-12 col-md-6">
                    <div class="card mb-3 p-2" style=" border-radius: 15px;">
                        <div class="row g-0">
                            <div class="col-md-4 flex-shrink-0 ">
                                <div class="img_border" data-user-frame>
                                    <!-- 在img_border 的地方加入style="色碼" 即可換頭像 -->
                                    <img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-black flex-grow-1 ms-3">
                                    <small class="text-muted fs-8">會員編號 <?php echo $mem_id ?></small>
                                    <span class="mb-1 fs-6">
                                        <h1><?php echo $name ?></h1>
                                    </span>
                                    <p class="mb-2 pb-1" style="color: #867b4a;">狂暴的排碳者</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-0 text-center" style="background-color: #efefef;">
                                        <!-- <div>
                                                    <p class="small text-muted mb-1 fs-6">Articles</p>
                                                    <p class="mb-0 fs-6">41</p>
                                                </div> -->
                                        <div class="px-3">
                                            <p class="small text-muted mb-1 fs-8">累計排碳量</p>
                                            <p class="mb-0 fs-4"><?php echo $emission ?></p>
                                        </div>
                                        <div>
                                            <p class="small text-muted mb-1 fs-8">累計碳點</p>
                                            <p class="mb-0 fs-4"><?php echo $row['mem_points'] ?></p>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <div class="d-flex pt-1">
                                        <button type="button" class="btn btn-outline-primary me-1 flex-grow-1 m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">換頭像框</button>
                                        <!-- <button type="button" class="btn btn-primary flex-grow-1">換頭像框</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 會員條碼 -->
                <div class="col-12 col-md-6">
                    <img src="static/img/barcode.png" width="400" class="img-thumbnail rounded-5" alt="條碼">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">選擇頭像框</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-6 col-sm-6 hover-overlay ripple shadow-1-strong" data-mdb-ripple-color="light">
                                
                                <?php
                                        $sql = "SELECT * FROM `member_avatar_frame` WHERE `mem_id`='{$memid}'";
                                        $result = mysqli_query($conn, $sql);
                                        if ($order_result->num_rows > 0) {
                                        while ($order_row = $order_result->fetch_assoc()) {
                                        if ($member_mem_id == $order_row['mem_id']) {
                                ?>
                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid black;">
                                            <!-- 在img_border 的地方加入style="色碼" 即可換頭像 -->
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                        <div class="text-center m-3">
                                            <input class="form-check-input" type="radio" value="F1673338241919" name="avatar_frame">
                                            vip4
                                        </div>
                                    </div>

                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid #C3AAA6;">
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                    </div>
                                    <div class="text-center m-3">
                                        <input class="form-check-input" type="radio" value="FRAME002" name="avatar_frame" data-frameID="FRAME002">
                                        vip4
                                    </div>

                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid #A9B7AA;">
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                    </div>
                                    <div class="text-center m-3">
                                        <input class="form-check-input" type="radio" value="FRAME003" name="avatar_frame" data-frameID="FRAME003">
                                        vip4
                                    </div>

                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid #5cb5ac;">
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                    </div>
                                    <div class="text-center m-3">
                                        <input class="form-check-input" type="radio" value="FRAME004" name="avatar_frame" data-frameID="FRAME004">
                                        vip4
                                    </div>
                                </div>



                                <div class="col-6 col-sm-6">


                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid pink;">
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                    </div>
                                    <div class="text-center m-3">
                                        <input class="form-check-input" type="radio" value="FRAME005" name="avatar_frame" data-frameID="FRAME005">
                                        vip4
                                    </div>

                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid rgb(205, 187, 72);">
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                    </div>
                                    <div class="text-center m-3">
                                        <input class="form-check-input" type="radio" value="FRAME006" name="avatar_frame" data-frameID="FRAME006">
                                        vip4
                                    </div>

                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid #EFF0EA;">
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                    </div>
                                    <div class="text-center m-3">
                                        <input class="form-check-input" type="radio" value="FRAME007" name="avatar_frame" data-frameID="FRAME007">
                                        vip4
                                    </div>

                                    <div class="img-hover">
                                        <div class="img_border" style="border: .4rem solid #BECBD3;">
                                            <a href="#"><img src="static/img/user.png" class="img-thumbnail rounded-5" alt="頭像"></a>
                                        </div>
                                    </div>
                                    <div class="text-center m-3">
                                        <input class="form-check-input" type="radio" value="FRAME008" name="avatar_frame" data-frameID="FRAME008">
                                        vip4
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                            <!-- 後端給大頭貼id -->
                            <input type="button" data-btn="confirm-change-frame" value="確認" class="btn btn-primary" data-bs-dismiss="modal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>

    <script src="static/lib/Frontend_lib/jquery/jquery-3.1.0.js"></script>
    <script src="static/js/bootstrap.bundle.min.js"></script>
</body>

</html>