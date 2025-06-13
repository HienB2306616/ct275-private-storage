<?php
    require_once 'partials/init.php';
    //-------------------- 1. Thanh cuộn sản phẩm mới nhất--------------------
    $sql_new = "SELECT * FROM products ORDER BY ngaythem DESC LIMIT 8";
    $stmt_new = $pdo->query($sql_new);
    $products_new = $stmt_new->fetchAll(PDO::FETCH_ASSOC);

    //------------------- 2. Thanh cuộn sản phẩm sắp cháy hàng-----------------------
    $sql_low = "SELECT * FROM products WHERE soluong <= 3 ORDER BY soluong ASC LIMIT 8";
    $stmt_low = $pdo->query($sql_low);
    $products_low = $stmt_low->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PetShop - Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/imgcard.css">  
</head>
<body class="bg-light" data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>">

    <?php include 'partials/header_public.php'; ?>

    <div class="container py-5" >
        <div class="row">
            <div class="col">
                <img src="assets/general/banner1.jpg" class=" img-fluid" alt="" >
            </div>
        </div>
        
    </div>
    <main class="container py-5">
        <!------------------ Sản phẩm mới nhất --------------------->
        <h2 class="text-primary mb-3 text-center">🐾 Sản phẩm mới nhất</h2>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
            <?php foreach ($products_new as $product): ?>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 border-danger">
                        <img src="assets/products/<?php echo htmlspecialchars($product['anhchinh']); ?>"
                            class="card-img-top"
                            alt="<?php echo htmlspecialchars($product['tensp']); ?>">
                        <div class="card-body">
                            <h6 class="card-title text-truncate"><?php echo htmlspecialchars($product['tensp']); ?></h6>
                            <p class="text-danger fw-bold"><?php echo number_format($product['gia'], 0, ',', '.'); ?>đ</p>
                        </div>
                        <div class="card-footer d-flex justify-content-around flex-wrap gap-2">
                            
                            <a href="productdetail.php?id=<?php echo urlencode($product['masp']); ?>" 
                                class="btn btn-outline-secondary btn-sm require-login"><i class="bi bi-eye"></i> Xem chi tiết
                            </a>
                            <a href="cart.php" class="btn btn-primary btn-sm require-login"><i class="bi bi-cart"></i> Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>

        <!---------------------------- Sản phẩm sắp cháy hàng ------------------------------------->
        <h2 class="text-primary mt-5 mb-3 text-center">🔥 Sắp cháy hàng</h2>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
            <?php foreach ($products_low as $product): ?>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 border-danger">
                        <img src="assets/products/<?php echo htmlspecialchars($product['anhchinh']); ?>"
                            class="card-img-top"
                            alt="<?php echo htmlspecialchars($product['tensp']); ?>">
                        <div class="card-body">
                            <h6 class="card-title text-truncate"><?php echo htmlspecialchars($product['tensp']); ?></h6>
                            <p class="text-danger fw-bold"><?php echo number_format($product['gia'], 0, ',', '.'); ?>đ</p>
                        </div>
                        <div class="card-footer d-flex justify-content-around flex-wrap gap-2">
                            <a href="productdetail.php?id=<?php echo urlencode($product['masp']); ?>" 
                                class="btn btn-outline-secondary btn-sm require-login">
                                <i class=" bi bi-eye"></i> Xem chi tiết
                            </a>
                            <a href="#" class="btn btn-primary btn-sm require-login"><i class="bi bi-cart"></i>Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="products.php" class="btn btn-outline-primary">Xem tất cả sản phẩm</a>
        </div>
    </main>

    <?php include 'partials/footer_public.php'; ?>

    <script src="partials/check_btn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
