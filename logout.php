<!-- 紀錄曾經登入的帳號 -->
<?php 
session_start(); 
$_SESSION = array(); 
session_destroy(); 
header('location:Index.php');//改成回首頁 
?>
