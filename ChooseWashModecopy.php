<!DOCTYPE html>


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
    $(function() {
      //全部選擇隱藏
      $('div[id^="tab1_"]').hide();
      $('#slt1').change(function() {
        let sltValue = $(this).val();
        console.log(sltValue);

        $('div[id^="tab1_"]').hide();
        //指定選擇顯示
        $(sltValue).show();
      });
      $('div[id^="tab2_"]').hide();
      $('#slt2').change(function() {
        let sltValue = $(this).val();
        console.log(sltValue);

        $('div[id^="tab2_"]').hide();
        //指定選擇顯示
        $(sltValue).show();
      });
    });
  </script>
  <?php
  $WashMode_ = array(
    "WashMode_Cold" => "冷水",
    "WashMode_Hot" => "熱水",
    "WashMode_Power" => "強力"
  );
  $DehydrationMode_ = array(
    "DehydrationMode_Power" => "強脫水",
    "DehydrationMode_Median" => "中脫水",
    "DehydrationMode_Small" => "弱脫水",
    "DehydrationMode_Not" => "不脫水"
  );
  $DryMode_ = array(
    "DryMode_Electric" => "電熱烘乾",
        "DryMode_Power" => "急速烘乾",
    "DryMode_Sun" => "日曬"
  );

  $FoldMode_Way = array(
    "FoldMode_Robot" => "機器人",
    "FoldMode_Hand" => "手工",
    "FoldMode_Not" => "不折"
  );
  ?>
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
      <h2>選擇洗衣模式</h2>
      <form method="post" action="SendToWash_Cabinetcopy.php">

        <!-- 洗衣模式:洗滌 -->
        <label for="Wash">洗滌模式：</label>
        <select name="WashMode_" id="Wash">
          <?php foreach ($WashMode_ as $Wash_english => $Wash_chinese) : ?>
            <option value="<?= $Wash_chinese ?>"><?= $Wash_chinese ?></option>
          <?php endforeach; ?>
        </select><br><br>

        <!-- 洗衣模式:脫水 -->
        <label for="Dehydration">脫水模式：</label>
        <select name="DehydrationMode_" id="Dehydration">
          <?php foreach ($DehydrationMode_ as $Dehydration_english => $Dehydration_chinese) : ?>
            <option value="<?= $Dehydration_chinese ?>"><?= $Dehydration_chinese ?></option>
          <?php endforeach; ?>
        </select><br><br>

        <!-- 洗衣模式:乾燥 -->
        <label for="Dry">乾燥模式：</label>
        <select name="DryMode_" id="Dry">
          <?php foreach ($DryMode_ as $Dry_english => $Dry_chinese) : ?>
            <option value="<?= $Dry_chinese ?>"><?= $Dry_chinese ?></option>
          <?php endforeach; ?>
        </select><br><br>

        <!-- 洗衣模式:折衣 -->
        <label for="Fold">折衣模式：</label>
        <select name="FoldMode_Way" id="Fold">
          <?php foreach ($FoldMode_Way as $Fold_english => $Fold_chinese) : ?>
            <option value="<?= $Fold_chinese ?>"><?= $Fold_chinese ?></option>
          <?php endforeach; ?>
        </select><br><br>


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
              <option value="">大中原門市</option>
              <option value="">統上門市</option>
              <option value="">北原門市</option>
            </select>
          </p>
        </div>

        <div class="A-6" id="tab2_3">
          <p>自取門市:
            <select max-length="10">
              <option value="" disabled>請選擇門市</option>
              <option value="">桃園門市</option>
              <option value="">光壢門市</option>
              <option value="">大中原門市</option>
              <option value="">統上門市</option>
              <option value="">北原門市</option>
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
            <option value="">3551698980587396</option>
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