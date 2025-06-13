CREATE TABLE products (
    masp CHAR(6) PRIMARY KEY,
    tensp VARCHAR(100) NOT NULL,
    loai VARCHAR(20) NOT NULL CHECK (loai IN ('Chó', 'Mèo', 'Vẹt', 'Hamster')),
    mota TEXT,
    soluong INT NOT NULL CHECK (soluong >= 0),
    anhchinh VARCHAR(255) NOT NULL,
    anh1 VARCHAR(255),
    anh2 VARCHAR(255),
    anh3 VARCHAR(255),
    gia INT NOT NULL CHECK (gia > 0),
    ngaythem DATE NOT NULL,
    ngaysua DATE
);

INSERT INTO products VALUES
('sp0001', 'Poodle Mini', 'Chó', 'Chó Poodle nhỏ, lông xoăn', 3, 'poodle_main.jpg', 'poodle_1.jpg', 'poodle_2.jpg', 'poodle_3.jpg', 4000000, '2025-06-01', '2025-06-05'),
('sp0002', 'Mèo Anh lông ngắn', 'Mèo', 'Mèo lông ngắn, màu xám', 2, 'meoanh_main.jpg', 'meoanh_1.jpg', 'meoanh_2.jpg', 'meoanh_3.jpg', 3500000, '2025-06-01', '2025-06-05'),
('sp0003', 'Shiba Inu Nhật Bản', 'Chó', 'Chó Shiba lông nâu đỏ, thông minh và trung thành', 4,'shiba_main.jpg', 'shiba_1.jpg', 'shiba_2.jpg', 'shiba_3.jpg', 5500000, '2025-06-02', '2025-06-06'),
('sp0004', 'Vẹt xám châu Phi', 'Vẹt', 'Vẹt thông minh, biết nói', 5, 'vet_main.jpg', 'vet_1.jpg', 'vet_2.jpg', 'vet_3.jpg', 2000000, '2025-06-02', '2025-06-06'),
('sp0005', 'Hamster Bear', 'Hamster', 'Hamster to, lông mượt', 10, 'hamster_main.jpg', 'hamster_1.jpg', 'hamster_2.jpg', 'hamster_3.jpg', 150000, '2025-06-02', '2025-06-06'),
('sp0006', 'Alaska thuần chủng', 'Chó', 'Chó Alaska cỡ lớn, khỏe mạnh', 1, 'alaska_main.jpg', 'alaska_1.jpg', 'alaska_2.jpg', 'alaska_3.jpg', 8500000, '2025-06-03', '2025-06-07'),
('sp0007', 'Corgi tai cụp', 'Chó', 'Chó Corgi chân ngắn, tai cụp', 2, 'corgi_main.jpg', 'corgi_1.jpg', 'corgi_2.jpg', 'corgi_3.jpg', 5000000, '2025-06-03', '2025-06-07'),
('sp0008', 'Mèo Munchkin chân ngắn', 'Mèo', 'Mèo dễ thương, chân ngắn', 3, 'munchkin_main.jpg', 'munchkin_1.jpg', 'munchkin_2.jpg', 'munchkin_3.jpg', 4200000, '2025-06-04', '2025-06-07'),
('sp0009', 'Vẹt Cockatiel', 'Vẹt', 'Vẹt đuôi dài, dễ huấn luyện', 4, 'cockatiel_main.jpg', 'cockatiel_1.jpg', 'cockatiel_2.jpg', 'cockatiel_3.jpg', 1500000, '2025-06-04', '2025-06-08'),
('sp0010', 'Hamster Robo', 'Hamster', 'Hamster nhỏ, nhanh nhẹn', 6, 'robo_main.jpg', 'robo_1.jpg', 'robo_2.jpg', 'robo_3.jpg', 120000, '2025-06-04', '2025-06-08');

CREATE TABLE users (
    manguoidung CHAR(8) PRIMARY KEY,
    hovaten VARCHAR(100) NOT NULL 
        CHECK (hovaten ~ '^[A-Za-zÀ-ỹ ]+$'),
    tentaikhoan VARCHAR(50) NOT NULL UNIQUE,
    matkhau VARCHAR(50) NOT NULL 
        CHECK (matkhau ~ '^(?=.*[0-9])(?=.*[^A-Za-z0-9]).{6,}$'),
    sdt VARCHAR(10) NOT NULL UNIQUE 
        CHECK (sdt ~ '^0(3|5|7|8|9)[0-9]{8}$'),
    email VARCHAR(100) NOT NULL UNIQUE 
        CHECK (email ~* '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'),
    diachi TEXT NOT NULL,
    ngaytao DATE NOT NULL,
    ngaysua DATE,
    anhdaidien VARCHAR(255)
);


INSERT INTO users VALUES
('user0001', 'Nguyễn Văn An', 'nguyenvanan', '123@abc', '0901234567', 'an@gmail.com', '12 Lê Lợi, Hà Nội', '2025-05-08', '2025-05-09', 'avatar1.jpg'),
('user0002', 'Trần Thị Bình', 'tranbinh', 'binh456@', '0912345678', 'binh@gmail.com', '45 Nguyễn Huệ, Đà Nẵng', '2025-05-09', '2025-05-10', 'avatar2.jpg'),
('user0003', 'Lê Hồng Cường', 'cuongle', 'cuong123!', '0934567890', 'cuong@gmail.com', '78 Trần Phú, TP.HCM', '2025-05-10', '2025-05-11', 'avatar3.jpg'),
('user0004', 'Phạm Minh Đức', 'ducpham', 'duc789#', '0923456781', 'duc@gmail.com', '23 Lý Thường Kiệt, Huế', '2025-05-11', '2025-05-12', 'avatar4.jpg'),
('user0005', 'Hoàng Thị Em', 'hoangem', 'em456$', '0976543210', 'em@gmail.com', '9 Hai Bà Trưng, Nha Trang', '2025-05-12', '2025-05-13', 'avatar5.jpg'),
('user0006', 'Đỗ Văn Phúc', 'phucdo', 'phuc321%', '0967890123', 'phuc@gmail.com', '33 Hoàng Diệu, Cần Thơ', '2025-05-13', '2025-05-14', 'avatar6.jpg'),
('user0007', 'Bùi Thị Giang', 'buigiang', 'giang654&', '0956789012', 'giang@gmail.com', '15 Nguyễn Trãi, Hải Phòng', '2025-05-14', '2025-05-15', 'avatar7.jpg'),
('user0008', 'Vũ Quốc Hưng', 'hunghvu', 'hung000*', '0945678901', 'hung@gmail.com', '56 Điện Biên Phủ, Vũng Tàu', '2025-05-15', '2025-05-16', 'avatar8.jpg'),
('user0009', 'Trịnh Thị Lan', 'tranlan', 'lan789^', '0932109876', 'lan@gmail.com', '88 Phan Bội Châu, Quy Nhơn', '2025-05-16', '2025-05-17', 'avatar9.jpg'),
('user0010', 'Ngô Văn Minh', 'ngominh', 'minh999@', '0912987654', 'minh@gmail.com', '60 Nguyễn Văn Cừ, Bắc Ninh', '2025-05-17', '2025-05-18', 'avatar10.jpg');



    CREATE TABLE orders (
    madonhang CHAR(6) PRIMARY KEY,
    masp VARCHAR(6) NOT NULL,
    manguoidung VARCHAR(8) NOT NULL,
    ngaydat DATE NOT NULL,
    soluong INT NOT NULL,
    FOREIGN KEY (masp) REFERENCES products(masp) ON DELETE CASCADE,
    FOREIGN KEY (manguoidung) REFERENCES users(manguoidung) ON DELETE CASCADE
);

INSERT INTO orders VALUES
('ord001', 'sp0001', 'user0001', '2025-06-05', 1),
('ord002', 'sp0002', 'user0003', '2025-06-06', 2),
('ord003', 'sp0004', 'user0005', '2025-06-06', 1),
('ord004', 'sp0005', 'user0007', '2025-06-07', 3),
('ord005', 'sp0006', 'user0002', '2025-06-07', 1),
('ord006', 'sp0007', 'user0008', '2025-06-07', 1),
('ord007', 'sp0008', 'user0004', '2025-06-07', 1),
('ord008', 'sp0009', 'user0010', '2025-06-08', 2),
('ord009', 'sp0010', 'user0006', '2025-06-08', 2),
('ord010', 'sp0001', 'user0009', '2025-06-09', 1);	





CREATE TABLE feedbacks (
    manguoidung CHAR(8) PRIMARY KEY,
    hovaten VARCHAR(100) NOT NULL CHECK (hovaten ~ '^[A-Za-zÀ-ỹ ]+$'),
    ykien TEXT,
    danhgia INT NOT NULL CHECK (danhgia BETWEEN 1 AND 5),
    FOREIGN KEY (manguoidung) REFERENCES users(manguoidung) ON DELETE CASCADE
);

INSERT INTO feedbacks (manguoidung, hovaten, ykien, danhgia) VALUES
('user0001', 'Nguyễn Văn An', 'Sản phẩm tốt, giao hàng nhanh.', 5),
('user0002', 'Trần Thị Bình', 'Mùi thơm dễ chịu, thú cưng rất thích.', 4),
('user0003', 'Lê Hồng Cường', 'Đóng gói cẩn thận, chất lượng ổn.', 4),
('user0004', 'Phạm Minh Đức', 'Chưa đúng sản phẩm mình đặt.', 2),
('user0005', 'Hoàng Thị Em', 'Sẽ ủng hộ tiếp lần sau!', 5),
('user0006', 'Đỗ Văn Phúc', 'Thức ăn không hợp khẩu vị chó nhà mình.', 3),
('user0007', 'Bùi Thị Giang', 'Tư vấn nhiệt tình, hài lòng với dịch vụ.', 5),
('user0008', 'Vũ Quốc Hưng', 'Giao hàng hơi chậm, sản phẩm tốt.', 3),
('user0009', 'Trịnh Thị Lan', 'Shop thân thiện, hàng đúng mô tả.', 4),
('user0010', 'Ngô Văn Minh', 'Chất lượng chưa như mong đợi.', 2);




CREATE TABLE admins (
    maadmin VARCHAR(6) PRIMARY KEY,
    hovaten VARCHAR(100) NOT NULL CHECK (hovaten ~ '^[A-Za-zÀ-ỹ ]+$'),
    tentaikhoan VARCHAR(50) NOT NULL UNIQUE,
    matkhau VARCHAR(50) NOT NULL
		CHECK (matkhau ~ '^(?=.*[0-9])(?=.*[^A-Za-z0-9]).{6,}$'),
    sdt VARCHAR(10) NOT NULL 
		CHECK (sdt ~ '^0((3[2-9])|(5[6|8|9])|(7[0-9])|(8[1-9])|(9[0-9]))[0-9]{7}$'),
    email VARCHAR(100) NOT NULL
		CHECK (email ~* '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'
    )
);
INSERT INTO admins (maadmin, hovaten, tentaikhoan, matkhau, sdt, email) VALUES
('ad001', 'Chung Tinh', 'chungtinh', 'chungtinh@admin2025', '0848123456', 'chungtinh2000ab@gmail.com'),
('ad002', 'Nguyễn Văn Hiền', 'vanhien', 'nguyenvanhien@admin2025', '0912345678', 'vanhien2000ab@gmail.com');



