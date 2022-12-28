<!DOCTYPE html>

<html lang="en">

<head>
<?php//include('templates/frame/head.html') ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../static/css/all.css">
  <link rel="stylesheet" href="../static/css/header.css" />
  <link href="../static/css/bootstrap.min.css" rel="stylesheet">
  <script src="../static/js/bootstrap.bundle.min.js"></script>
  <script src="../static/lib/Frontend_lib/jquery/jquery-3.1.0.js"></script>
  <script src="../static/js/ChooseWashMode.js"></script>
  <title>選擇模式</title>
</head>
<?php
require_once('connectcopy.php');
$sql = "SELECT  `name` FROM `test1` WHERE 2;";
$user_name = mysqli_query($conn, $sql);
?>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-default bg-amos" role="navigation">
      <div class="container-fluid">
        <a class="navbar-brand" href="">
          <img src="../img/washing-machine.png" width="50" alt="AI智慧喜" class="d-inline-block align-text-top"
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
                       // echo '<script>location.href="/"</script>';$i = time() str $xxxId = 'XX'+$i
                    ?>
                -->
        <!-- To後端:登入/登出按紐 -->
        <!-- 用if 判斷session 是否有資料 決定要秀登入or 登出 -->
        <input class="btn btn-outline-light" type="submit" onclick="" value="登出">
        <input class="btn btn-outline-light" type="submit" onclick="" value="登入">
      </div>
    </nav>
  </header>

  <main>
    <section style="padding:.5 rem">
      <div class="container">
        <br>
        <form method="post" action="">
          <!-- 洗衣模式:洗滌 -->
          <!-- <h2>選擇洗衣模式</h2> -->
          <p>洗滌模式：
            <select class="form-select form-select-sm mt-3" name="WashMode_" data-select="washMode">
            <?php while ($name = mysqli_fetch_array($user_name, MYSQLI_ASSOC)) :; ?>
                <option value="<?php echo $name['name']; ?>">
                    <?php echo $name['name']; ?>
                </option>
            <?php
            endwhile;
            ?>  
            
            <!--<option selected="selected" disabled="disabled" style="display:none" value="">請選擇洗滌模式</option>
              <option value="">熱水</option>
              <option value="">冷水</option>
              <option value="">強力</option>-->
            </select>
          </p>
          <!-- 洗衣模式:脫水 -->
          <p>脫水模式：
            <select class="form-select form-select-sm mt-3" name="DehydrationMode_">
              <option selected="selected" disabled="disabled" style="display:none" value="">請選擇脫水模式</option>
              <option value="">不脫水</option>
              <option value="">強脫水</option>
              <option value="">中脫水</option>
              <option value="">弱脫水</option>
            </select>
          </p>
          <!-- 洗衣模式:乾燥 -->
          <p>乾燥模式：
            <select class="form-select form-select-sm mt-3" name="DryMode_">
              <option selected="selected" disabled="disabled" style="display:none" value="">請選擇乾燥模式</option>
              <option value="">日曬</option>
              <option value="">電熱烘乾</option>
              <option value="">急速烘乾</option>
            </select>
          </p>
          <!-- 洗衣模式:折衣 -->
          <p>折衣模式：
            <select class="form-select form-select-sm mt-3" name="FoldMode_Way">
              <option selected="selected" disabled="disabled" style="display:none" value="">請選擇折衣模式</option>
              <option value="">不折</option>
              <option value="">機器人</option>
              <option value="">手工</option>
            </select>
          </p>

          <!-- 選擇AI洗衣袋 -->
          <p>AI洗衣袋：
            <select class="form-select form-select-sm mt-3" max-length="10" name="FoldMode_Way">
              <option selected="selected" disabled="disabled" style="display:none" value="">請選擇AI洗衣袋</option>
              <option value="">5451632135084617</option>
              <option value="">4916271159538174</option>
              <option value="">4556438447000425</option>
            </select>
          </p>

          <!-- <p class="fs-2">選擇送/領方式</p> -->
          <!-- 選擇送洗方式 -->
          <!-- To後端:value值要給領回方式的id編號 -->

          <p>送洗方式：
            <select name="SendTo_Way" class="form-select form-select-sm mt-3" data-send="sendToWay1">
              <option selected="selected" disabled="disabled" style="display:none" value="">請選擇送洗方式</option>
              <option value="">外送</option>
              <option value="">集中櫃</option>
              <option value="">自送</option>
            </select>
          </p>

          <!-- 輸入送洗詳細資料 -->
          <!-- <p>外送地址: -->

          <div class="input-group input-group-sm mb-3 A-4" id="SentToPanda" style="display:none">
            <span class="input-group-text">外送地址：</span>
            <input type="text" class="form-control" value="" placeholder="請輸入外送地址" maxlength="50" size="30">
          </div>

          <div id="SentToCabinet" style="display:none">
            <p>集中櫃門市：
              <select max-length="10">
                <option selected="selected" disabled="disabled" style="display:none" value="">請選擇門市</option>
                <option value="">桃園門市</option>
                <option value="">光壢門市</option>
                <option value="">大中原門市</option>
                <option value="">統上門市</option>
                <option value="">北原門市</option>
              </select></p>
          </div>

          <div id="SentToSelf" style="display:none">
            <p>自送門市：
              <select max-length="10">
                <option selected="selected" disabled="disabled" style="display:none" value="">請選擇門市</option>
                <option value="">桃園門市</option>
                <option value="">光壢門市</option>
                <option value="">大中原門市</option>
                <option value="">統上門市</option>
                <option value="">北原門市</option>
              </select></p>
          </div>

          <!-- 選擇領回方式 -->
          <!-- To後端:value值要給領回方式的id編號 -->
          <p>領回方式：
            <select name="SendBack_Way" class="form-select form-select-sm mt-3" data-send="sendBackWay2">
              <option selected="selected" disabled="disabled" value="">請選擇領回方式</option>
              <option value="">外送</option>
              <option value="">集中櫃</option>
              <option value="">自取</option>
            </select>
          </p>

          <!-- 輸入送洗詳細資料 -->
          <!-- <div class="A-4" id="tab2_1">
          <p>外送地址:<input type="text" placeholder="請輸入外送地址" minlength="8" maxlength="50" size="30"></p>
        </div> -->
          <div class="input-group input-group-sm mb-3 A-4" style="display:none" id="SelfBackPanda">
            <span class="input-group-text">外送地址：</span>
            <input type="text" class="form-control" value="" placeholder="請輸入外送地址" maxlength="50" size="30">
            <!-- </div><input type="text" value="" placeholder="請輸入外送地址" minlength="8" maxlength="50" size="30"></p> -->
          </div>
          <div id="SelfBackCabinet" style="display:none">
            <p>集中櫃門市：
              <select max-length="10">
                <option selected="selected" disabled="disabled" style="display:none" value="">請選擇門市</option>
                <option value="">桃園門市</option>
                <option value="">光壢門市</option>
                <option value="">大中原門市</option>
                <option value="">統上門市</option>
                <option value="">北原門市</option>
              </select>
            </p>
          </div>

          <div style="display:none" id="SelfBackSelf">
            <p>自取門市：
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

          <!-- <p class="fs-2">選擇付款卡</p> -->
          <!-- 選擇付款卡 -->
          <p>付款卡：
            <select class="form-select form-select-sm mt-3" max-length="10">
              <option selected="selected" disabled="disabled" style="display:none" value="">請選擇付款卡片</option>
              <option value="">184487185030836</option>
              <option value="">929197863610113</option>
              <option value="">355169898058739</option>
            </select>
          </p>

          <!-- 前往下一頁按紐 -->
          <p><input type="submit" value="下一步" class="btn btn-success" onclick="" /></p>
        </form>
      </div>
    </section>
  </main>
  <footer></footer>
  <!-- 環保愛地球，智慧喜你我 -->
</body>

</html>