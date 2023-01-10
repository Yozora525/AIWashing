<header>
    <nav class="navbar navbar-expand-lg navbar-default bg-amos" role="navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="static/img/washing-machine.png" width="50" alt="AI智慧喜"
                    class="d-inline-block align-text-top" id="logo-img"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" data-target-sidebar=".side-collapse-right">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--頁面選單-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ChooseWashMode.php">智慧洗</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            會員管理
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="Member.php">會員管理</a></li>
                            <li><a class="dropdown-item" href="OrderManage.php">訂單管理</a></li>
                            <li><a class="dropdown-item" href="CardManage.php">付款卡管理</a></li>
                            <li><a class="dropdown-item" href="WashBagManage.php">AI洗衣袋管理</a></li>
                        </ul>
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