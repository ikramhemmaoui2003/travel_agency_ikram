<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "travel_agency";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_id = $_POST["trip_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);
    $stmt->execute();
    $customer_id = $stmt->insert_id;

    $stmt = $conn->prepare("INSERT INTO bookings (trip_id, customer_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $trip_id, $customer_id);
    $stmt->execute();

    echo "تم الحجز بنجاح!";
    $stmt->close();
    $conn->close();
} else {
    echo "طلب غير صالح.";
}
?>
