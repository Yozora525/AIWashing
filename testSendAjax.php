<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI智慧洗</title>

    <!-- 引用框架 -->
    <script src="static/lib/Frontend_lib/jquery/jquery.min.js"></script>
    <script src="static/lib/Frontend_lib/bootstrap/bootstrap4.0.0.bundle.min.js"></script>
    <!-- 引用css樣式 -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="static/css/w3.css" />
    <link rel="stylesheet" href="static/css/all.css" />
    <link rel="stylesheet" href="static/css/header.css" />

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
                        <a class="nav-link" href="/index.html">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ChooseWashMode.html">智慧洗</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Member.html">會員管理</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
    <script>
        $.ajax({
        url:"src/testGetAjax.php",
        type: "POST",
        async:true,
        dataType: "json",
        data: {'test':'test'},
        success: function(data) {
            
            console.log(data);
        },
        error: function(jqXHR) {
            alert(jqXHR.statusText);
            alert(jqXHR.responseText);
        }
    });
    </script>

    <main>
        <div class="container">
            <h1>智慧喜</h1>
        </div>
    </main>
  <footer></footer>
</body>

</html>