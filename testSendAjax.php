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
    <?php
    include('templates/frame/header.php');
    ?>
    <script>
        $.ajax({
            url: "src/testGetAjax.php",
            type: "POST",
            async: true,
            dataType: "json",
            data: {
                'test': 'test'
            },
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