<?php
  session_start();
  if (empty($_SESSION['user_id'])) {
      header("Location: log/login.php");
    exit;
  }
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PetShop - Tài khoản </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <?php include 'partials/header_public.php'; ?>

    <div class="container py-5">
    <h2 class="mb-4">Cài đặt người dùng </h2>
    <form>
        <div class="row mb-4">
            <div class="col-md-6">
                <h4>Thông tin cá nhân </h4>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="fullName" value="John Doe">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Địa chỉ email </label>
                    <input type="email" class="form-control" id="email" value="john.doe@example.com">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại </label>
                    <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                </div>
            </div>
            <div class="col-md-6">
                <h4>Ảnh đại diện </h4>
                <div class="mb-3">
                    <img src="/api/placeholder/150/150" alt="Profile Picture" class="img-thumbnail mb-2">
                    <input class="form-control" type="file" id="profilePicture">
                </div>
            </div>
        </div>

        <hr>

        <div class="row mb-4">
            <div class="col-md-6">
                <h4>Cài đặt Email </h4>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="newsletterCheck" checked>
                    <label class="form-check-label" for="newsletterCheck">Nhận thông báo mới </label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="promotionsCheck">
                    <label class="form-check-label" for="promotionsCheck">Nhận email quảng cáo </label>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Cài đặt bảo mật </h4>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="profileVisibilityCheck" checked>
                    <label class="form-check-label" for="profileVisibilityCheck">Hiển thị hồ sơ với người khác</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="activityTrackingCheck" checked>
                    <label class="form-check-label" for="activityTrackingCheck">Cho phép theo dõi hoạt động của bạn </label>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mb-4">
            <div class="col-md-6">
                <h4>Thay đổi mật khẩu </h4>
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Mật khẩu hiện tại </label>
                    <input type="password" class="form-control" id="currentPassword">
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="newPassword">
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Nhập lại mật khẩu mới </label>
                    <input type="password" class="form-control" id="confirmPassword">
                </div>
            </div>
            
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-secondary me-md-2">Hủy </button>
            <button type="submit" class="btn btn-primary">Lưu </button>
        </div>
    </form>

    <hr>

    <div>
        <p>Bạn có thể đăng xuất tại đây.</p>
            <a href="log/logout.php" class="btn btn-danger">Đăng xuất</a>
    </div>
</div>



                


    <?php include 'partials/footer_public.php'; ?>
    
</body>
</html>
