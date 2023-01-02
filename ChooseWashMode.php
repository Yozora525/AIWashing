<!DOCTYPE html>

<html lang="en">

<head>
    <?php include('templates/frame/head.html') ?>
</head>
<?php
// session 判斷，若無登入不可使用本功能

require_once('connect.php');
// get wash mode
$sql = "select * from wash_mode";
$getWashMode = mysqli_query($conn, $sql);

// get bag
// if ($_SESSION['MemId']) {
//     $sql = "select * from bag_borrow_record where return_time = null and mem_id = " + "get MemId from session";
//     $getBag = mysqli_query($conn, $sql);
//         if ($getBag->num_rows == 0) {
<<<<<<< HEAD
# alert if you want to wash cloth, you need having a bag
=======
            # alert if you want to wash cloth, you need having a bag
>>>>>>> 80af200cb2b93a3cf257f745495ec9951ea6b44d
//         }
// }

// get delivery mode
$sql = "select * from delivery_method";
$getDeliveryMode = mysqli_query($conn, $sql);

// get payment
// if ($_SESSION['MemId']) {
//     $sql = "select * from payment where card_status = 1 and mem_id = " + "get MemId from session";
//     $getPayment = mysqli_query($conn, $sql);
//         if ($getBag->num_rows == 0) {
<<<<<<< HEAD
# alert if you want to wash cloth, you need setting payment
=======
            # alert if you want to wash cloth, you need setting payment
>>>>>>> 80af200cb2b93a3cf257f745495ec9951ea6b44d
//         }
// }
?>

<body>
    <?php include('templates/frame/header.html') ?>

<<<<<<< HEAD
    <main>
        <section style="padding:.5 rem">
            <div class="container">
                <br>
=======
<main>
    <section style="padding:.5 rem">
    <div class="container">
        <br>
        <?php
            // 將洗衣模式存在陣列中，下方用陣列方式存取
            $washMode = array();
            $i = 0;
            
            while($row = $getWashMode->fetch_assoc()) {
                $washMode[$i] = $row;
                $i++;
            }

            // 將洗衣模式存在陣列中，下方用陣列方式存取
            $deliveryMode = array();
            $i = 0;
            
            while($row = $getDeliveryMode->fetch_assoc()) {
                $deliveryMode[$i] = $row;
                $i++;
            }
        ?>
        <form method="post" action="SendToWash_Cabinetcopy.php">
        <!-- 洗衣模式:洗滌 -->
        <!-- <h2>選擇洗衣模式</h2> -->
        <p>洗滌模式：
            <select class="form-select form-select-sm mt-3" name="WashMode_" data-select="washMode">
                <?php 
                    for ($i=0; $i < count($washMode); $i++)
                    {
                        if($washMode[$i]['mode_type'] == 1){
                ?>
                        <option value="<?php echo $washMode[$i]['mode_id']; ?>"><?php echo $washMode[$i]['mode_name']; ?></option>
>>>>>>> 80af200cb2b93a3cf257f745495ec9951ea6b44d
                <?php
                // 將洗衣模式存在陣列中，下方用陣列方式存取
                $washMode = array();
                $i = 0;

                while ($row = $getWashMode->fetch_assoc()) {
                    $washMode[$i] = $row;
                    $i++;
                }

                // 將洗衣模式存在陣列中，下方用陣列方式存取
                $deliveryMode = array();
                $i = 0;

                while ($row = $getDeliveryMode->fetch_assoc()) {
                    $deliveryMode[$i] = $row;
                    $i++;
                }
                ?>
                <form method="post" action="SendToWash_Cabinetcopy.php">
                    <!-- 洗衣模式:洗滌 -->
                    <!-- <h2>選擇洗衣模式</h2> -->
                    <p>洗滌模式：
                        <select class="form-select form-select-sm mt-3" name="WashMode_" data-select="washMode">
                            <?php
                            for ($i = 0; $i < count($washMode); $i++) {
                                if ($washMode[$i]['mode_type'] == 1) {
                            ?>
                                    <option value="<?php echo $washMode[$i]['mode_id']; ?>"><?php echo $washMode[$i]['mode_name']; ?></option>
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
                            for ($i = 0; $i < count($washMode); $i++) {
                                if ($washMode[$i]['mode_type'] == 2) {
                            ?>
                                    <option value="<?php echo $washMode[$i]['mode_id']; ?>"><?php echo $washMode[$i]['mode_name']; ?></option>
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
                            for ($i = 0; $i < count($washMode); $i++) {
                                if ($washMode[$i]['mode_type'] == 4) {
                            ?>
                                    <option value="<?php echo $washMode[$i]['mode_id']; ?>"><?php echo $washMode[$i]['mode_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 選擇AI洗衣袋 -->
                    <p>AI洗衣袋：
                        <select class="form-select form-select-sm mt-3" max-length="10" name="ai_laundry_bag">
                            <!--NAME重複了!-->

                        </select>
                    </p>

                    <!-- <p class="fs-2">選擇送/領方式</p> -->
                    <!-- 選擇送洗方式 -->
                    <!-- To後端:value值要給領回方式的id編號 -->

<<<<<<< HEAD
                    <p>送洗方式：
                        <select name="SendTo_Way" class="form-select form-select-sm mt-3" data-send="sendToWay1">
                            <?php
                            for ($i = 0; $i < count($deliveryMode); $i++) {
                                if ($deliveryMode[$i]['delivery_type'] == 1) {
                            ?>
                                    <option value="<?php echo $deliveryMode[$i]['delivery_id']; ?>"><?php echo $deliveryMode[$i]['delivery_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 輸入送洗詳細資料 -->
                    <!-- <p>外送地址: -->
=======
          <p>送洗方式：
            <select name="SendTo_Way" class="form-select form-select-sm mt-3" data-send="sendToWay1">
                <?php 
                    for ($i=0; $i < count($deliveryMode); $i++)
                    {
                        if($deliveryMode[$i]['delivery_type'] == 1){
                ?>
                        <option value="<?php echo $deliveryMode[$i]['delivery_id']; ?>"><?php echo $deliveryMode[$i]['delivery_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
          </p>
>>>>>>> 80af200cb2b93a3cf257f745495ec9951ea6b44d

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

<<<<<<< HEAD
                    <!-- 選擇領回方式 -->
                    <!-- To後端:value值要給領回方式的id編號 -->
                    <p>領回方式：
                        <select name="SendBack_Way" class="form-select form-select-sm mt-3" data-send="sendBackWay2">
                            <?php
                            for ($i = 0; $i < count($deliveryMode); $i++) {
                                if ($deliveryMode[$i]['delivery_type'] == 2) {
                            ?>
                                    <option value="<?php echo $deliveryMode[$i]['delivery_id']; ?>"><?php echo $deliveryMode[$i]['delivery_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 輸入送洗詳細資料 -->
                    <!-- <div class="A-4" id="tab2_1">
=======
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
                <?php 
                    for ($i=0; $i < count($deliveryMode); $i++)
                    {
                        if($deliveryMode[$i]['delivery_type'] == 2){
                ?>
                        <option value="<?php echo $deliveryMode[$i]['delivery_id']; ?>"><?php echo $deliveryMode[$i]['delivery_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
        </p>

          <!-- 輸入送洗詳細資料 -->
          <!-- <div class="A-4" id="tab2_1">
>>>>>>> 80af200cb2b93a3cf257f745495ec9951ea6b44d
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