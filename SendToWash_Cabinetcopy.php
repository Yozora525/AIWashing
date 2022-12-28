<!DOCTYPE html>
<!-- <?php
      require_once('connect.php');
      ?> -->

<html lang="en">

<?php
$WashMode_ = $_POST["WashMode_"];
$DehydrationMode_ = $_POST["DehydrationMode_"];
$DryMode_ = $_POST["DryMode_"];
$FoldMode_Way = $_POST["FoldMode_Way"];
$creditcard = $_POST["creditcard"];

?>

<head>
  <!-- <?php include('templates/frame/head.html') ?> -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="static/css/all.css">
  <link rel="stylesheet" href="static/css/header.css" />
  <link href="static/css/bootstrap.min.css" rel="stylesheet">
  <script src="static/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <title>選擇模式</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-default bg-amos" role="navigation">
      <div class="container-fluid">
        <a class="navbar-brand" href="">
          <img src="img/washing-machine.png" width="50" alt="AI智慧喜" class="d-inline-block align-text-top" id="logo-img"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target-sidebar=".side-collapse-right">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--頁面選單-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" href="">首頁</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">智慧洗</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">訂單管理</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container">
      <form method="post" action="">
        <p>請在時間內自送到指定門市</p>
        <!-- 剩下的時間 -->
        <p class="h1 text-success"><b>10:59 等待中</b></p>
        <!-- 進度條 -->
        <div class="progress" style="height: 4px;">
          <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <hr style="background-color:rgb(25, 25, 47); height:1px; border:none;" />
        <p class="fs-5"><b>訂單詳情</b></p>
        <span class="fs-6">訂單編號: </span><br>
        <span class="fs-6">洗衣門市: </span><br>
        <span class="fs-6">集中櫃編號: </span><br>
        <span class="fs-6">洗滌模式: <?php echo $WashMode_ ?> </span><br>
        <span class="fs-6">脫水模式: <?php echo $DehydrationMode_ ?> </span><br>
        <span class="fs-6">乾燥模式: <?php echo $DryMode_ ?></span><br>
        <span class="fs-6">折衣模式: <?php echo $FoldMode_Way ?></span><br>
        <span class="fs-6">送洗方式: </span><br>
        <span class="fs-6">領取方式: </span><br>
        <span class="fs-6">衣物重量: </span><br>
        <span class="fs-6">洗衣總額: </span><br>
        <span class="fs-6 dis_none">運費:NT$ </span>
        <span class="fs-6">碳點: </span><br>
        <span class="fs-6">下單時間: </span><br>
        <p class="fs-5"><b>總額: NT$ </b></p>
        <!-- 等待時間00:00時 自動出現下一步按紐 -->
        <p><input type="submit" value="下一步" class="btn btn-success" onclick="" /></p>
      </form>
    </div>
  </main>
  <footer></footer>
</body>

</html>