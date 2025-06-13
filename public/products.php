<?php
    require_once 'partials/init.php';
    $loai_sp = ['Chó', 'Mèo', 'Vẹt', 'Hamster'];
    $type = $_GET['type'] ?? 'all';
    if ($type === 'all') 
    {
        $sql = "SELECT * FROM products ORDER BY ngaythem DESC";
        $stmt = $pdo->query($sql);
    } else 
    {
        $sql = "SELECT * FROM products WHERE loai = :type ORDER BY ngaythem DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['type' => $type]);
    }
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm - PetShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/imgcard.css">
</head>
<body class="bg-light" data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>">

    <?php include 'partials/header_public.php'; ?>
    
    <main class="container py-5">
        <h2 class="text-center text-primary mb-4">📦 Danh sách sản phẩm</h2>
        <!------------------- Các nút lọc ngang ----------------------->
        <div class="row mb-4">
            <div class="col text-center d-flex justify-content-center flex-wrap gap-2">
                <a href="products.php?type=all" class="btn <?php echo ($type === 'all') ? 'btn-primary' 
                    : 'btn-outline-primary'; ?>">Tất cả</a>
            <?php foreach ($loai_sp as $loai): ?>
                <a href="products.php?type=<?php echo urlencode($loai); ?>" class="btn <?php echo ($type === $loai) ? 'btn-primary' 
                    : 'btn-outline-primary'; ?>">
                    <?php echo $loai; ?>
                </a>
            <?php endforeach; ?>
            </div>
        </div>
        <!------------------------ Danh sách sản phẩm --------------------------->
        <div class="row">
            <?php if (count($products) > 0): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card border-danger h-100">
                        <img src="assets/products/<?php echo htmlspecialchars($product['anhchinh']); ?>" 
                            class="card-img-top" alt="<?php echo htmlspecialchars($product['tensp']); ?>">
                        <div class="card-body">
                            <h6 class="card-title text-truncate"><?php echo htmlspecialchars($product['tensp']); ?></h6>
                            <p class="text-danger fw-bold"><?php echo number_format($product['gia'], 0, ',', '.'); ?>đ</p>
                        </div>
                        <div class="card-footer text-center d-flex flex-wrap justify-content-around gap-2">
                        <a href="productdetail.php?id=<?php echo urlencode($product['masp']); ?>" 
                            class="btn btn-outline-secondary btn-sm require-login">
                            <i class="bi bi-eye"></i> Xem chi tiết
                         </a>
                        <a href="#" class="btn btn-primary btn-sm require-login"><i class="bi bi-cart"></i>Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Không có sản phẩm nào thuộc loại <strong><?php echo htmlspecialchars($type); ?></strong>.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'partials/footer_public.php'; ?>

    <script src="partials/check_btn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
