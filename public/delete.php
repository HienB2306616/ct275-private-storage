<?php
    require_once 'partials/db_connect.php';

    $masp = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE masp = ?");
    $stmt->execute([$masp]);

    header("Location: admin.php");
    exit();
