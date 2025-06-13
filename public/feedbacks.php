<?php
    require_once 'partials/init.php';
    $success = '';
    $error = '';
    $feedback = null;
//------------------Kiểm tra đăng nhập------------------------
    if (!isset($_SESSION['user_id'])) {
        $error = 'Bạn cần đăng nhập để gửi góp ý.';
    } else 
    {
        $user_id = $_SESSION['user_id'];
        $hoten = $_SESSION['hoten'];
        //------------Tạo CSRF token nếu chưa có-------------------
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        //-------------Load góp ý hiện tại------------
        $stmt = $pdo->prepare("SELECT * FROM feedbacks WHERE manguoidung = :id");
        $stmt->execute(['id' => $user_id]);
        $feedback = $stmt->fetch(PDO::FETCH_ASSOC);
        //---------------Xử lý gửi form----------------------
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $token = $_POST['csrf_token'] ?? '';
            if (!hash_equals($_SESSION['csrf_token'], $token)) {
            $error = 'CSRF token không hợp lệ!';
            } else 
            {
                $ykien = trim($_POST['ykien']);
                $danhgia = (int)$_POST['danhgia'];
                if (empty($ykien) || $danhgia < 1 || $danhgia > 5) {
                    $error = 'Vui lòng nhập đầy đủ góp ý và đánh giá hợp lệ.';
                } else 
                {
                    //-----------------Nếu đã tồn tại góp ý thì cập nhật-------------------------
                    if ($feedback) 
                    {
                    $stmt = $pdo->prepare("UPDATE feedbacks SET ykien = :ykien, danhgia = :danhgia WHERE manguoidung = :id");
                    $stmt->execute(['ykien' => $ykien, 'danhgia' => $danhgia, 'id' => $user_id]);
                    $success = 'Cập nhật góp ý thành công!';
                    } else 
                    {
                        $stmt = $pdo->prepare("INSERT INTO feedbacks (manguoidung, hovaten, ykien, danhgia) 
                            VALUES (:id, :hoten, :ykien, :danhgia)");
                        $stmt->execute(['id' => $user_id, 'hoten' => $hoten, 'ykien' => $ykien, 'danhgia' => $danhgia]);
                        $success = 'Gửi góp ý thành công!';
                    }
                    //------------------------Reload lại dữ liệu---------------------------------
                    $stmt = $pdo->prepare("SELECT * FROM feedbacks WHERE manguoidung = :id");
                    $stmt->execute(['id' => $user_id]);
                    $feedback = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Góp ý khách hàng - PetShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <?php include 'partials/header_public.php'; ?>

    <main class="container py-5">
        <h2 class="text-primary mb-4 text-center">📝 Góp ý của bạn</h2>
        <!---------------- Thông báo ---------------->
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            <!-------------------- Góp ý hiện tại ----------------------->
            <div class="mb-4">
                <h5>Góp ý hiện tại của bạn:</h5>
                <?php if ($feedback): ?>
                    <div class="border rounded p-3 bg-white shadow-sm">
                        <p><strong>Tên:</strong> <?php echo htmlspecialchars($feedback['hovaten']); ?></p>
                        <p><strong>Đánh giá:</strong> <?php echo (int)$feedback['danhgia']; ?>/5 ⭐</p>
                        <p><strong>Ý kiến:</strong><br><?php echo nl2br(htmlspecialchars($feedback['ykien'])); ?></p>
                    </div>
                <?php else: ?>
                    <p class="text-muted">Bạn chưa gửi góp ý nào.</p>
            <?php endif; ?>
            </div>
            <!-------------------- Form góp ý -------------------------->
            <div class="card p-4 shadow-sm">
                <form method="post" class="needs-validation" novalidate>
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                    <div class="mb-3">
                        <label for="ykien" class="form-label">Ý kiến góp ý</label>
                            <textarea name="ykien" id="ykien" rows="4" required class="form-control">
                                <?php echo htmlspecialchars($feedback['ykien'] ?? ''); ?></textarea>
                        </div>

                    <div class="mb-3">
                        <label for="danhgia" class="form-label">Đánh giá (1 đến 5)</label>
                        <select name="danhgia" id="danhgia" class="form-select" required>
                            <option value="">-- Chọn đánh giá --</option>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <option value="<?php echo $i; ?>" 
                                <?php echo (isset($feedback['danhgia']) && $feedback['danhgia'] == $i) ? 'selected' : ''; ?>>
                                <?php echo $i; ?> ⭐
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Gửi góp ý</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'partials/footer_public.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
