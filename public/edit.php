<?php
    require_once 'partials/db_connect.php';

    $masp = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE masp = ?");
    $stmt->execute([$masp]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        die("Không tìm thấy sản phẩm");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $tensp = $_POST['tensp'];
        $loai = $_POST['loai'];
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        $anhchinh = $_POST['anhchinh'];
        $gia = $_POST['gia'];
        $ngaysua = date('Y-m-d');

        $stmt = $pdo->prepare("UPDATE products SET tensp=?, loai=?, mota=?, soluong=?, anhchinh=?, gia=?, ngaysua=? WHERE masp=?");
        $stmt->execute([$tensp, $loai, $mota, $soluong, $anhchinh, $gia, $ngaysua, $masp]);

        header("Location: admin.php");
        exit();
    }
?>

<form method="POST" class="container mt-4">
    <h2>Sửa sản phẩm</h2>
    <div class="mb-2"><input type="text" name="tensp" class="form-control" value="<?php echo $product['tensp']; ?>" required></div>
    <div class="mb-2">
        <select name="loai" class="form-select">
            <?php foreach (['Chó', 'Mèo', 'Vẹt', 'Hamster'] as $loai): ?>
                <option value="<?php echo $loai; ?>" <?php if ($loai == $product['loai']) echo "selected"; ?>><?php echo $loai; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-2"><textarea name="mota" class="form-control"><?php echo $product['mota']; ?></textarea></div>
    <div class="mb-2"><input type="number" name="soluong" class="form-control" value="<?php echo $product['soluong']; ?>"></div>
    <div class="mb-2"><input type="text" name="anhchinh" class="form-control" value="<?php echo $product['anhchinh']; ?>"></div>
    <div class="mb-2"><input type="number" name="gia" class="form-control" value="<?php echo $product['gia']; ?>"></div>
    <button class="btn btn-primary" type="submit">Cập nhật</button>
    <a href="admin.php" class="btn btn-secondary">Hủy</a>
</form>
