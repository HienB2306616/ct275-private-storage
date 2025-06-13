<?php
session_start();

// Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}
