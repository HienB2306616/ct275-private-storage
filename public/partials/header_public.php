<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $current_page = basename($_SERVER['PHP_SELF']);
    $is_logged_in = isset($_SESSION['user_id']) || isset($_SESSION['admin_id']);
    $avatar = $_SESSION['anhdaidien'] ?? 'default_avatar.jpg';
?>

<header>
    <div class="container-fluid bg-white border-bottom border-danger border-2">
        <div class="row d-flex justify-content-center align-items-center">
        <!------------------------ Logo -------------------------->
            <div class="col-12 col-lg-3 order-3 order-lg-1 d-none d-lg-flex justify-content-center">
                <a href="index.php"> <img src="/../assets/general/logo-2.jpeg" alt="logo" 
                    class="img-fluid p-3 mx-auto rounded-circle" style="height: 150px;"> </a>     
            </div>
        <!--------------------- Search + Nav ----------------->
            <div class="col-12 col-lg-6 order-2 order-lg-2">
                <div class="row mb-2">
                    <div class="col px-lg-4">
                        <form class="d-flex shadow-sm" role="search">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm...">
                                <button class="btn btn-primary btn-danger" type="submit">
                                    <i class="bi bi-search-heart-fill"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a class="navbar-brand d-lg-none" style="min-width: 50%; max-width: 35%;" href="index.php">
                                    <img src="/../assets/general/logo-2-horizontal.png" alt="logo" class="img-fluid">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavDropdown">
                                    <ul class="navbar-nav nav-pills">
                                        <li class="nav-item px-md-2">
                                            <a class="nav-link fw-bold ps-2 <?= ($current_page === 'index.php') ? 'active text-white' 
                                            : 'text-primary' ?>" href="index.php">TRANG CHỦ</a>
                                        </li>
                                        <li class="nav-item px-md-2 dropdown">
                                            <a class="nav-link dropdown-toggle fw-bold ps-1 <?= ($current_page === 'products.php') ? 'active text-white' 
                                                : 'text-primary' ?>" href="#" data-bs-toggle="dropdown">THÚ CƯNG</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-danger fw-bold" href="products.php">Tất cả</a></li>
                                                <li><a class="dropdown-item text-danger fw-bold" href="products.php?type=Chó">Chó</a></li>
                                                <li><a class="dropdown-item text-danger fw-bold" href="products.php?type=Mèo">Mèo</a></li>
                                                <li><a class="dropdown-item text-danger fw-bold" href="products.php?type=Vẹt">Vẹt</a></li>
                                                <li><a class="dropdown-item text-danger fw-bold" href="products.php?type=Hamster">Hamster</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item px-md-2">
                                            <a class="nav-link fw-bold ps-1 <?= ($current_page === 'about.php') ? 'active text-white' 
                                                : 'text-primary' ?>" href="about.php">GIỚI THIỆU</a>
                                        </li>
                                        <li class="nav-item px-md-2">
                                            <a class="nav-link fw-bold ps-1 <?= ($current_page === 'feedbacks.php') ? 'active text-white' 
                                                : 'text-primary' ?>" href="feedbacks.php">GÓP Ý</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        <!-- Avatar hoặc Đăng nhập -->
            <div class="col-12 col-lg-3 order-1 order-lg-3">
                <div class="row">
                    <?php if ($is_logged_in): ?>
                    <div class="col d-flex justify-content-center">
                        <a class="btn" href="account.php">
                            <img src="assets/users/<?php echo htmlspecialchars($avatar); ?>" 
                                class="rounded-circle" alt="avatar" style="width: 50px; height: 50px; object-fit: cover;">
                            <p class="m-0 fw-bold text-primary"><?php echo htmlspecialchars($_SESSION['hoten']); ?></p>
                        </a>
                    </div>
                    <?php else: ?>
                    <div class="col d-flex justify-content-center">
                        <a class="btn" href="log/login.php">
                            <p class="m-0"><i class="bi bi-person fs-2 text-primary"></i></p>
                            <p class="m-0 text-primary fw-bold">Đăng nhập</p>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="col d-flex justify-content-center">
                        <a class="btn" href="cart.php">
                            <div class="position-relative">
                                <p class="m-0"><i class="bi bi-cart fs-2 text-primary"></i></p>
                                <p class="m-0 text-primary fw-bold">Giỏ hàng</p>
                                <p class="position-absolute top-0 end-0 badge bg-danger p-1 rounded-circle text-white" 
                                    style="width: 26px; height: 24px; line-height: 16px; font-size: 0.75rem;">0</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</header>
