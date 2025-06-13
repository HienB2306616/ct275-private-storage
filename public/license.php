<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PetShop - Về chúng tôi </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <?php include 'partials/header_public.php'; ?>
    <main class="container py-5">
    <h2 class="text-center text-primary mb-4">📄 Giấy phép kinh doanh</h2>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="bg-white p-4 rounded shadow-sm border-start border-4 border-success">
                <p class="fs-5">PetShop hoạt động hợp pháp theo <strong>Giấy chứng nhận đăng ký hộ kinh doanh số 0123456789</strong> 
                    do Sở Kế hoạch & Đầu tư Hậu Giang cấp ngày 01/01/2025.
                </p>
                <p>Địa chỉ đăng ký: Trường Đại học Cần Thơ, xã Hòa An, huyện Phụng Hiệp, Hậu Giang.</p>
                <p>Người đại diện: Nguyễn Văn Thú Cưng</p>

                <iframe src="assets/giayphepkinhdoanh.pdf" width="90%" height="600px">
                    Trình duyệt của bạn không hỗ trợ xem PDF. 
                    <a href="assets/general/giayphepkinhdoanh.pdf" target="_blank">Tải file PDF tại đây</a>.
                </iframe>
            </div>
        </div>
    </div>
    </main>
    <?php include 'partials/footer_public.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

