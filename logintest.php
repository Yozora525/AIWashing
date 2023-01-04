<!DOCTYPE html>
<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location:member.php");//改成會員界面
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>php登入測試</title>
</head>

<body>
    <form action="memberlogin.php" method="POST">
        <label>帳號：</label>
        <input type="text" name="account" /> <br />
        <label>密碼：</label>
        <input type="password" name="password" /> <br />
        <input type="submit" value="提交" />
        <a href="signup.html">還沒有帳號？現在就註冊！</a>
    </form>
</body>

</html>