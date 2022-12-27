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
  <script src="static/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <title>選擇模式</title>
  <script>
    // 選擇領送/回時，啟用js
    $(function () {
      //全部選擇隱藏
      $('div[id^="tab1_"]').hide();
      $('#slt1').change(function () {
        let sltValue = $(this).val();
        console.log(sltValue);

        $('div[id^="tab1_"]').hide();
        //指定選擇顯示
        $(sltValue).show();
      });
      $('div[id^="tab2_"]').hide();
      $('#slt2').change(function () {
        let sltValue = $(this).val();
        console.log(sltValue);

        $('div[id^="tab2_"]').hide();
        //指定選擇顯示
        $(sltValue).show();
      });
    });
  </script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-default bg-amos" role="navigation">
      <div class="container-fluid">
        <a class="navbar-brand" href="">
          <img src="img/washing-machine.png" width="50" alt="AI智慧喜" class="d-inline-block align-text-top"
            id="logo-img"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
          data-target-sidebar=".side-collapse-right">
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
      <h2>選擇洗衣模式</h2>

      <form method="post" action="result.php">
        <!-- 洗衣模式:洗滌 -->
        <p>洗滌模式:
          <select name="WashMode_" id="WashMode">
            <option value="" disabled>請選擇洗滌模式</option>
            <option value="WashMode_Hot">熱水</option>
            <option value="WashMode_Cold" selected>冷水</option>
            <option value="WashMode_Power">強力</option>
          </select>
        </p>
        <!-- 洗衣模式:脫水 -->
        <p>脫水模式:
          <select name="DehydrationMode_">
            <option value="" disabled>請選擇脫水模式</option>
            <option value="DehydrationMode_Not">不脫水</option>
            <option value="DehydrationMode_Power" selected>強脫水</option>
            <option value="DehydrationMode_Median">中脫水</option>
            <option value="DehydrationMode_Small">弱脫水</option>
          </select>
        </p>
        <!-- 洗衣模式:乾燥 -->
        <p>乾燥模式:
          <select name="DryMode_">
            <option value="" disabled>請選擇乾燥模式</option>
            <option value="DryMode_Sun">日曬</option>
            <option value="DryMode_Electric" selected>電熱烘乾</option>
            <option value="DryMode_Power">急速烘乾</option>
          </select>
        </p>
        <!-- 洗衣模式:折衣 -->
        <p>折衣模式:
          <select name="FoldMode_Way">
            <option value="" disabled>請選擇折衣模式</option>
            <option value="FoldMode_Not">不折</option>
            <option value="FoldMode_Robot" selected>機器人</option>
            <option value="FoldMode_Hand">手工</option>
          </select>
        </p>

        <h2>選擇送/領方式</h2>

        <!-- 選擇送洗方式 -->
        <p>送洗方式:
          <select name="SendTo_Way" id="slt1">
            <option value="" disabled>請選擇送洗方式</option>
            <option value="#tab1_1" id="SendTo_Panda">外送</option>
            <option value="#tab1_2" id="SendTo_Cabinet" selected>集中櫃</option>
            <option value="#tab1_3" id="SendTo_Self">自送</option>
          </select>
        </p>

        <!-- 輸入送洗詳細資料 -->
        <div class="A-4" id="tab1_1">
          <p>外送地址:<input type="text" value="請輸入外送地址" minlength="8" maxlength="50" size="30"></p>
        </div>

        <div class="A-5" id="tab1_2">
          <p>集中櫃地址:<input type="text" value="請輸入集中櫃地址" minlength="8" maxlength="50" size="30"></p>
        </div>

        <div class="A-6" id="tab1_3">
          <p>自取地址:<input type="text" value="請輸入自取地址" minlength="8" maxlength="50" size="30"></p>
        </div>

        <!-- 選擇領回方式 -->
        <p>領回方式:
          <select name="SendBack_Way" id="slt2">
            <option value="" disabled>請選擇領回方式</option>
            <option value="#tab2_1" id="SentBack_Panda">外送</option>
            <option value="#tab2_2" id="SentBack_Cabinet" selected>集中櫃</option>
            <option value="#tab2_3" id="SentBack_Self">自送</option>
          </select>
        </p>

        <!-- 輸入送洗詳細資料 -->
        <div class="A-4" id="tab2_1">
          <p>外送地址:<input type="text" value="請輸入外送地址" minlength="8" maxlength="50" size="30"></p>
        </div>
        <div class="A-5" id="tab2_2">
          <p>集中櫃門市:
            <select max-length="10">
              <option value="" disabled>請選擇門市</option>
              <option value="">桃園門市</option>
              <option value="">光壢門市</option>
              <option value="" >大中原門市</option>
              <option value="" >統上門市</option>
              <option value="" >北原門市</option>
            </select>
          </p>
        </div>

        <div class="A-6" id="tab2_3">
          <p>自取門市:
          <select max-length="10">
            <option value="" disabled>請選擇門市</option>
            <option value="">桃園門市</option>
            <option value="">光壢門市</option>
            <option value="" >大中原門市</option>
            <option value="" >統上門市</option>
            <option value="" >北原門市</option>
          </select>
        </p>
        </div>

        <h2>選擇付款卡</h2>
        <!-- 選擇付款卡 -->
        <p>付款卡:
          <select max-length="10">
            <option value="" disabled>請選擇付款卡片</option>
            <option value="">184487185030836</option>
            <option value="">929197863610113</option>
            <option value="" >3551698980587396</option>
          </select>
        </p>

        <!-- 前往下一頁按紐 -->
        <p><input type="submit" value="下一步" class="" onclick="" /></p>
      </form>
    </div>
  </main>
  <footer></footer>
</body>

</html>