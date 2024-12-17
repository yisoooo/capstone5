<?php
session_start();
require_once("db.php");

if (!isset($_SESSION['username'])) {
    echo "로그인이 필요합니다.";
    exit();
}

$username = $_SESSION['username'];

// 사용자 ID 가져오기
$sql = "SELECT id FROM members WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$user_id = $user['id'];
$stmt->close();

if (isset($_POST['section'])) {
    $section = $_POST['section'];
    switch ($section) {
        case 'favorites': // 찜한 차량
            $sql = "SELECT car_name, car_price, created_at FROM favorites WHERE user_id = ?";
            $title = "찜한 차량";
            break;

        case 'recent': // 최근 본 차량
            $sql = "SELECT car_name, viewed_at FROM recent_viewed WHERE user_id = ?";
            $title = "최근 본 차량";
            break;

        case 'selling': // 판매중 차량
            $sql = "SELECT car_name, car_price, listed_at FROM selling_cars WHERE user_id = ?";
            $title = "판매중 차량";
            break;

        case 'sold': // 판매된 차량
            $sql = "SELECT car_name, sold_at FROM sold_cars WHERE user_id = ?";
            $title = "판매된 차량";
            break;

        case 'inquiry': // 구매 문의 차량
            $sql = "SELECT car_name, inquiry_date FROM inquiries WHERE user_id = ?";
            $title = "구매 문의 차량";
            break;

        default:
            echo "잘못된 섹션입니다.";
            exit();
    }

    // 데이터 가져오기
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h3>$title</h3>";
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            if (isset($row['car_price'])) {
                echo "<li>" . htmlspecialchars($row['car_name']) . " - " . number_format($row['car_price']) . "원</li>";
            } else {
                echo "<li>" . htmlspecialchars($row['car_name']) . " - " . $row['created_at'] . "</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>차량이 없습니다.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
