<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "travel_agency";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM trips");
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>وكالة السفر</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 20px; }
        .trip { background: white; padding: 15px; margin: 10px 0; border-radius: 10px; box-shadow: 0 2px 5px #aaa; }
        .trip img { max-width: 100%; border-radius: 10px; }
        form { margin-top: 10px; }
        input, button { display: block; margin: 5px 0; padding: 8px; width: 100%; }
    </style>
</head>
<body>
    <h1>مرحبا بكم في وكالة السفر</h1>

    <?php while($row = $result->fetch_assoc()): ?>
        <div class="trip">
            <h2><?= $row['destination'] ?></h2>
            <img src="images/<?= $row['image'] ?>" alt="<?= $row['destination'] ?>">
            <p>السعر: <?= $row['price'] ?> دينار</p>
            <p>الوصف: <?= $row['description'] ?></p>

            <form method="POST" action="book.php">
                <input type="hidden" name="trip_id" value="<?= $row['id'] ?>">
                <input type="text" name="name" placeholder="اسمك" required>
                <input type="email" name="email" placeholder="بريدك الإلكتروني" required>
                <input type="text" name="phone" placeholder="هاتفك" required>
                <button type="submit">احجز الآن</button>
            </form>
        </div>
    <?php endwhile; ?>
</body>
</html>
