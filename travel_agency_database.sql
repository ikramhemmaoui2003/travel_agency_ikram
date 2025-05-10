


-- جدول الرحلات
CREATE TABLE trips (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(100) NOT NULL,
    description TEXT,
    start_date DATE,
    end_date DATE,
    price DECIMAL(10,2),
    image VARCHAR(255)
);

-- جدول الزبائن
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20)
);

-- جدول الحجوزات
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trip_id INT,
    customer_id INT,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (trip_id) REFERENCES trips(id) ON DELETE CASCADE,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

-- جدول المدراء (اختياري لتسجيل الدخول)
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

-- بيانات تجريبية
INSERT INTO trips (destination, description, start_date, end_date, price, image) VALUES
('باريس', 'رحلة رومانسية إلى باريس.', '2025-07-01', '2025-07-10', 150000.00, 'paris.jpg'),
('إسطنبول', 'استكشاف التاريخ والطبيعة.', '2025-08-05', '2025-08-15', 120000.00, 'istanbul.jpg'),
('القاهرة', 'زيارة الأهرامات ومتاحف الفراعنة.', '2025-09-10', '2025-09-20', 100000.00, 'cairo.jpg');
