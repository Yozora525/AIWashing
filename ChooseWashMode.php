<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
if (isset($_SESSION['login']) == false) {
    header('location:login.php');
    exit; //記得要跳出來，不然會重複轉址過多次
}
$memid = $_SESSION['login'];
$sql = "SELECT `mem_name`,`mem_id` FROM `member` WHERE `mem_id`='{$memid}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$mem_id = $row['mem_id'];



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
    <script src="static/js/ChooseWashModecopy.js"></script>
    <title>選擇模式</title>
</head>

<body>
    <?php
    include('templates/frame/header.php');
    ?>

    <main>
        <section style="padding:.5 rem">
            <div class="container">
                <br>
                <?php
                $sql = "SELECT * FROM `wash_mode`";
                $getWashMode = mysqli_query($conn, $sql);
                $wash_mode = array();
                $i = 0;
                while ($wash_mode[$i] = $getWashMode->fetch_assoc()) {
                    $i++;
                }
                ?>
                <form method="post" action="orderadd.php">
                    <!-- 洗衣模式:洗滌 -->
                    <p>洗滌模式：
                        <select class="form-select form-select-sm mt-3" name="WashMode_" data-select="washMode">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇洗滌模式
                            </option>
                            <?php
                            for ($i = 0; $i < count($wash_mode); $i++) {
                                if ($wash_mode[$i]['mode_type'] == 1) {
                            ?>
                                    <option value="<?php echo $wash_mode[$i]['mode_name']; ?>"><?php echo $wash_mode[$i]['mode_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 洗衣模式:脫水 -->
                    <p>脫水模式：
                        <select class="form-select form-select-sm mt-3" name="DehydrationMode_">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇脫水模式
                            </option>
                            <?php
                            for ($i = 0; $i < count($wash_mode); $i++) {
                                if ($wash_mode[$i]['mode_type'] == 2) {
                            ?>
                                    <option value="<?php echo $wash_mode[$i]['mode_name']; ?>"><?php echo $wash_mode[$i]['mode_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 洗衣模式:乾燥 -->
                    <p>乾燥模式：
                        <select class="form-select form-select-sm mt-3" name="DryMode_">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇乾燥模式
                            </option>
                            <?php
                            for ($i = 0; $i < count($wash_mode); $i++) {
                                if ($wash_mode[$i]['mode_type'] == 3) {
                            ?>
                                    <option value="<?php echo $wash_mode[$i]['mode_name']; ?>"><?php echo $wash_mode[$i]['mode_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 洗衣模式:折衣 -->
                    <p>折衣模式：
                        <select class="form-select form-select-sm mt-3" name="FoldMode_Way">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇折衣模式
                            </option>
                            <?php
                            for ($i = 0; $i < count($wash_mode); $i++) {
                                if ($wash_mode[$i]['mode_type'] == 4) {
                            ?>
                                    <option value="<?php echo $wash_mode[$i]['mode_name']; ?>"><?php echo $wash_mode[$i]['mode_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 選擇AI洗衣袋 -->
                    <p>AI洗衣袋：
                        <select class="form-select form-select-sm mt-3" max-length="10" name="Aibag">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇AI洗衣袋
                            </option>
                            <?php
                            $sql = "SELECT * FROM `bag_borrow_record`";
                            $laundry_bag_result = mysqli_query($conn, $sql);
                            if ($laundry_bag_result->num_rows > 0) {
                                while ($laundry_bag_row = $laundry_bag_result->fetch_assoc()) {
                                    if ($mem_id == $laundry_bag_row['mem_id']) {
                                        if ($laundry_bag_row['borrow_status'] == '1') {
                            ?>
                                            <option value="<?php echo $laundry_bag_row['bag_id'] ?>"><?php echo $laundry_bag_row['bag_id'] ?></option>
                            <?php      }
                                    }
                                }
                            } ?>
                        </select>
                    </p>

                    <!-- 選擇送洗方式 -->
                    <!-- To後端:value值要給領回方式的id編號 -->

                    <?php
                    $sql = "SELECT * FROM `delivery_method`";
                    $getdeliverymethod = mysqli_query($conn, $sql);
                    $delivery_method = array();
                    $i = 0;
                    while ($delivery_method[$i] = $getdeliverymethod->fetch_assoc()) {
                        $i++;
                    }
                    ?>
                    <!-- 選擇送洗方式 -->
                    <p>送洗方式：
                        <select name="SendTo_Way" class="form-select form-select-sm mt-3" data-send="sendToWay1">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇送洗方式 </option>
                            <?php
                            for ($i = 0; $i < count($delivery_method); $i++) {
                                if ($delivery_method[$i]['delivery_type'] == 1) {
                            ?>
                                    <option value="<?php echo $delivery_method[$i]['delivery_name']; ?>"><?php echo $delivery_method[$i]['delivery_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 輸入送洗詳細資料 -->
                    <div id="SentToPanda" class="input-group input-group-sm mb-3 A-4" style="display:none">
                        <span class="input-group-text">外送地址：</span>
                        <input type="text" name="SendTo_Panda" class="form-control" value="" placeholder="請輸入外送地址" maxlength="50" size="30">
                    </div>

                    <?php
                    $sql = "SELECT * FROM `serve_store`";
                    $getserverstore = mysqli_query($conn, $sql);
                    $server_store = array();
                    $i = 0;
                    while ($server_store[$i] = $getserverstore->fetch_assoc()) {
                        $i++;
                    }
                    ?>
                    <div id="SentToCabinet" style="display:none">
                        <p>集中櫃門市：
                            <select max-length="10" name="SendTo_Cabinet">
                                <option selected="selected" disabled="disabled" style="display:none" value="">請選擇門市 </option>
                                <?php
                                for ($i = 0; $i < count($server_store); $i++) {
                                    if ($server_store[$i]['store_type'] == 2) {
                                ?>
                                        <option value="<?php echo $server_store[$i]['store_name']; ?>"><?php echo $server_store[$i]['store_name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </p>
                    </div>

                    <div id="SentToSelf" style="display:none">
                        <p>自送門市：
                            <select max-length="10" name="SendTo_Self">
                                <option selected="selected" disabled="disabled" style="display:none" value="">請選擇門市 </option>
                                <?php
                                for ($i = 0; $i < count($server_store); $i++) {
                                    if ($server_store[$i]['store_type'] == 1) {
                                ?>
                                        <option value="<?php echo $server_store[$i]['store_name']; ?>"><?php echo $server_store[$i]['store_name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </p>
                    </div>

                    <!-- 選擇領回方式 -->
                    <!-- To後端:value值要給領回方式的id編號 -->
                    <p>領回方式：
                        <select name="SendBack_Way" class="form-select form-select-sm mt-3" data-send="sendBackWay2">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇領回方式 </option>
                            <?php
                            for ($i = 0; $i < count($delivery_method); $i++) {
                                if ($delivery_method[$i]['delivery_type'] == 2) {
                            ?>
                                    <option value="<?php echo $delivery_method[$i]['delivery_name']; ?>"><?php echo $delivery_method[$i]['delivery_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </p>

                    <!-- 輸入送洗詳細資料 -->

                    <div class="input-group input-group-sm mb-3 A-4" style="display:none" id="SelfBackPanda">
                        <span class="input-group-text">外送地址：</span>
                        <input type="text" name="SendBack_Panda" class="form-control" value="" placeholder="請輸入外送地址" maxlength="50" size="30">
                        <!-- </div><input type="text" value="" placeholder="請輸入外送地址" minlength="8" maxlength="50" size="30"></p> -->
                    </div>
                    <div id="SelfBackCabinet" style="display:none">
                        <p>集中櫃門市：
                            <select name="SendBack_Cabinet" max-length="10">
                                <option selected="selected" disabled="disabled" style="display:none" value="">請選擇門市 </option>
                                <?php
                                for ($i = 0; $i < count($server_store); $i++) {
                                    if ($server_store[$i]['store_type'] == 2) {
                                ?>
                                        <option value="<?php echo $server_store[$i]['store_name']; ?>"><?php echo $server_store[$i]['store_name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </p>
                    </div>

                    <div style="display:none" id="SelfBackSelf">
                        <p>自取門市：
                            <select max-length="10" name="SendBack_Self">
                                <option selected="selected" disabled="disabled" style="display:none" value="">請選擇門市 </option>
                                <?php
                                for ($i = 0; $i < count($server_store); $i++) {
                                    if ($server_store[$i]['store_type'] == 1) {
                                ?>
                                        <option value="<?php echo $server_store[$i]['store_name']; ?>"><?php echo $server_store[$i]['store_name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </p>
                    </div>

                    <!-- 選擇付款卡 -->
                    <p>付款卡：
                        <select class="form-select form-select-sm mt-3" max-length="10" name="creditcard">
                            <option selected="selected" disabled="disabled" style="display:none" value="">請選擇付款卡片
                            </option>
                            <?php
                            $sql = "SELECT * FROM `payment`";
                            $payment_result = mysqli_query($conn, $sql);
                            if ($payment_result->num_rows > 0) {
                                while ($payment_row = $payment_result->fetch_assoc()) {
                                    if ($mem_id == $payment_row['mem_id']) {
                            ?>
                                        <option value="<?php echo $payment_row['card_name'] ?>"><?php echo $payment_row['card_name'] ?>&nbsp;<?php echo $payment_row['card_num'] ?></option>
                            <?php }
                                }
                            } ?>
                        </select>
                    </p>

                    <!-- 前往下一頁按紐 -->
                    <p><input type="submit" name="submit" value="下一步" class="btn btn-success" onclick="" /></p>

                </form>
            </div>
        </section>
    </main>
    <footer></footer>
    <!-- 環保愛地球，智慧喜你我 -->
</body>

</html>