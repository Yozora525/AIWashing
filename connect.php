<?php
  $server_name = 'localhost';
  $username = 'root';
  $password = 'sa2022';
  $db_name = 'sa_aiwashing';

  // mysqli 的四個參數分別為：伺服器名稱、帳號、密碼、資料庫名稱
  $conn = new mysqli($server_name, $username, $password, $db_name,3307);

  if (!empty($conn->connect_error)) {
    die('資料庫連線錯誤:' . $conn->connect_error);    // die()：終止程序
  }
?>