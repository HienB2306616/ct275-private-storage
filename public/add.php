<?php
    require_once 'partials/db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        $loai = $_POST['loai'];
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        $anhchinh = $_POST['anhchinh'];
        $gia = $_POST['gia'];
        $ngaythem = date('Y-m-d');
        $stmt = $pdo->prepare("INSERT INTO products (masp, tensp, loai, mota, soluong, anhchinh, gia, ngaythem) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$masp, $tensp, $loai, $mota, $soluong, $anhchinh, $gia, $ngaythem]);
        header("Location: admin.php");
        exit();
    }
?>

<form method="POST" class="container mt-4">
    <h2>Thêm sản phẩm</h2>
    <div class="mb-2"><input type="text" name="masp" class="form-control" placeholder="Mã sản phẩm" required></div>
    <div class="mb-2"><input type="text" name="tensp" class="form-control" placeholder="Tên sản phẩm" required></div>
        <div class="mb-2">
            <select name="loai" class="form-select">
                <option value="Chó">Chó</option>
                <option value="Mèo">Mèo</option>
                <option value="Vẹt">Vẹt</option>
                <option value="Hamster">Hamster</option>
            </select>
        </div>
    <div class="mb-2"><textarea name="mota" class="form-control" placeholder="Mô tả"></textarea></div>
    <div class="mb-2"><input type="number" name="soluong" class="form-control" placeholder="Số lượng" required></div>
    <div class="mb-2"><input type="text" name="anhchinh" class="form-control" placeholder="Tên file ảnh chính"></div>
    <div class="mb-2"><input type="number" name="gia" class="form-control" placeholder="Giá" required></div>

    <button class="btn btn-primary" type="submit">Lưu</button>
    <a href="admin.php" class="btn btn-secondary">Hủy</a>
</form>
