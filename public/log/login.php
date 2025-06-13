<?php
    require_once '../partials/init.php';

    $error = '';
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $token = $_POST['csrf_token'] ?? '';
        if (!hash_equals($_SESSION['csrf_token'], $token))  {
            $error = 'CSRF token không hợp lệ.';
        } else 
        {
            $login_input = trim($_POST['login'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($login_input) || empty($password)) {
            $error = 'Vui lòng nhập đầy đủ tên đăng nhập/email và mật khẩu.';
            } else 
            {
            //-------------------ADMIN -----------------------------
                $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = :input OR tentaikhoan = :input");
                $stmt->execute(['input' => $login_input]);
                $admin = $stmt->fetch();

                if ($admin && $admin['matkhau'] === $password) 
                {
                    $_SESSION['admin_id'] = $admin['maadmin'];
                    $_SESSION['hoten'] = $admin['hovaten'];
                    $_SESSION['anhdaidien'] = 'admin_avatar.jpg'; // nếu có avatar admin
                    header("Location: ../admin.php");
                    exit;
                }
            //------------------- USER ------------------------------------
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :input OR tentaikhoan = :input");
                $stmt->execute(['input' => $login_input]);
                $user = $stmt->fetch();
                if ($user && $user['matkhau'] === $password) 
                {
                    $_SESSION['user_id'] = $user['manguoidung'];
                    $_SESSION['hoten'] = $user['hovaten'];
                    $_SESSION['anhdaidien'] = $user['anhdaidien'] ?? 'default_avatar.jpg';
                    header("Location: ../index.php");
                    exit;
                }
                $error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - PetShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Đăng nhập</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        <form method="post">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                            <div class="mb-3">
                                <label for="login" class="form-label">Tên đăng nhập hoặc Email</label>
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                            <div class="row my-3">
                                <div class="col">
                                    <p class="d-inline ">Bạn chưa có tài khoản? <a href="signup.php">Đăng kí tại đây</a></p>
                                </div>
                                <div class="col text-end">
                                    <a href="/../index.php">Về trang chủ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
