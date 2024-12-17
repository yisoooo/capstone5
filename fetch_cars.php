<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ucar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = $_GET['category'];
$sql = "SELECT * FROM cars WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="car-item">';
        echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="Car">';
        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
        echo '</div>';
    }
} else {
    echo "<p>해당 카테고리에 차량이 없습니다.</p>";
}

$stmt->close();
$conn->close();
?>
