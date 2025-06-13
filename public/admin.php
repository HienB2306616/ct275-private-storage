<?php
    require_once 'partials/db_connect.php';

    $sql = "SELECT * FROM products ORDER BY ngaythem DESC";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Pet Shop - Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include 'partials/navbar_admin.php'; ?>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Sản phẩm mới nhất</h2>
            <a href="add.php" class="btn btn-success">➕ Thêm sản phẩm</a>
        </div>

        <div class="row">
        <?php if (count($products) > 0): ?>
            <?php foreach ($products as $row): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="images/<?php echo htmlspecialchars($row['anhchinh']); ?>" class="card-img-top" 
                            alt="<?php echo htmlspecialchars($row['tensp']); ?>">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['tensp']); ?></h5>
                        <p class="card-text">
                            <strong>Loại:</strong> <?php echo htmlspecialchars($row['loai']); ?><br>
                            <strong>Giá:</strong> <?php echo number_format($row['gia'], 0, ',', '.'); ?> VND<br>
                            <strong>Số lượng:</strong> <?php echo (int)$row['soluong']; ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="edit.php?id=<?php echo $row['masp']; ?>" class="btn btn-warning btn-sm">✏️ Sửa</a>
                        <a href="delete.php?id=<?php echo $row['masp']; ?>" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?');">🗑️ Xóa</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
        </div>
    </div>

    <footer class="bg-primary text-white text-center py-3 mt-5">
        &copy; 2025 Pet Shop. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
