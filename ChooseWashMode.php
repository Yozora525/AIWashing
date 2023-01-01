<!DOCTYPE html>

<html lang="en">

<head>
    <?php include('templates/frame/head.html') ?>

</head>
<?php
// session_start();
require_once('connect.php');
$sql = "select * from wash_mode";
$getWashMode = mysqli_query($conn, $sql);
// if ($_SESSION['MemId']) {
//     $sql = "select * from bag_borrow_record where return_time = null and mem_id = " + "get MemId from session";
//     $getBag = mysqli_query($conn, $sql);
// }

?>

<body>
    <?php include('templates/frame/header.html') ?>

<main>
    <section style="padding:.5 rem">
    <div class="container">
        <br>
        <?php 
            
        ?>
        <form method="post" action="SendToWash_Cabinetcopy.php">
        <!-- 洗衣模式:洗滌 -->
        <!-- <h2>選擇洗衣模式</h2> -->
        <p>洗滌模式：
            <select class="form-select form-select-sm mt-3" name="WashMode_" data-select="washMode">
                <?php 
                    while($row = $getWashMode->fetch_assoc()) {
                        if($row['mode_type'] == 1){
                ?>
                        <option value="<?php echo $row['mode_id']; ?>"><?php echo $row['mode_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
        </p>
        <!-- 洗衣模式:脫水 -->
        <p>脫水模式：
            <select class="form-select form-select-sm mt-3" name="DehydrationMode_">
              <?php while ($Dehydration = mysqli_fetch_array($DehydrationMode_, MYSQLI_ASSOC)) :; ?>
                <option value="<?php echo $Dehydration['phone']; ?>">
                  <!-- ['phone']改欄位名稱 -->
                  <?php echo $Dehydration['phone']; ?>
                </option>
              <?php endwhile; ?>
            </select>
        </p>
        <!-- 洗衣模式:乾衣 -->
        <p>乾衣模式：
        <select class="form-select form-select-sm mt-3" name="DryMode_">
                <?php 
                    while($row = $getWashMode->fetch_assoc()) {
                        if($row['mode_type'] == 2){
                ?>
                        <option value="<?php echo $row['mode_id']; ?>"><?php echo $row['mode_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
        </p>
        <!-- 洗衣模式:折衣 -->
        <p>折衣模式：
            <select class="form-select form-select-sm mt-3" name="FoldMode_Way">
                <?php 
                    while($row = $getWashMode->fetch_assoc()) {
                        if($row['mode_type'] == 4){
                ?>
                        <option value="<?php echo $row['mode_id']; ?>"><?php echo $row['mode_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
        </p>

        <!-- 選擇AI洗衣袋 -->
        <p>AI洗衣袋：
            <select class="form-select form-select-sm mt-3" max-length="10" name="ai_laundry_bag"><!--NAME重複了!-->

            </select>
          </p>

          <!-- <p class="fs-2">選擇送/領方式</p> -->
          <!-- 選擇送洗方式 -->
          <!-- To後端:value值要給領回方式的id編號 -->

          <p>送洗方式：
            <select name="SendTo_Way" class="form-select form-select-sm mt-3" data-send="sendToWay1">
              <option selected="selected" disabled="disabled" style="display:none" value="">請選擇送洗方式</option>

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
              </select>
            </p>
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
              </select>
            </p>
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