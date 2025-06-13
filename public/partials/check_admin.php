<?php
    session_start();

    if (!isset($_SESSION['admin_id'])) {
        // Nếu chưa đăng nhập → về trang login
        header("Location: ../log/login.php");
        exit;
    }
