<?php
$servername = "localhost";
$username = "root"; // 데이터베이스 사용자명
$password = "";     // 데이터베이스 비밀번호
$dbname = "ucar";   // 데이터베이스 이름

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// AJAX 요청으로 전달받은 car_id와 liked 값
$car_id = $_POST['car_id'];
$liked = $_POST['liked'];

// 찜 상태를 데이터베이스에 저장
if ($liked == 'true') {
    $sql = "INSERT INTO likes (car_id) VALUES ('$car_id')";
} else {
    $sql = "DELETE FROM likes WHERE car_id = '$car_id'";
}

if ($conn->query($sql) === TRUE) {
    echo "찜 상태 저장 성공";
} else {
    echo "Error: " . $conn->error;
}

// 연결 종료
$conn->close();
?>
