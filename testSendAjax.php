<!DOCTYPE html>
<!-- <?php
    require_once('connect.php');
?> -->

<html lang="en">
<?php include('templates/frame/head.html') ?>

<body>
<?php include('templates/frame/header.html') ?>
    <script>
        $.ajax({
        url:"/testGetAjax.php",
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