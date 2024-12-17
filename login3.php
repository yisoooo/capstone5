<?php
session_start();
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 사용자 정보 조회
    $sql = "SELECT * FROM members WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("준비된 문서 생성 실패: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_regenerate_id(true); // 세션 ID 재생성
            $_SESSION['username'] = $username;
            header("Location: index1.php"); // 로그인 성공 시 리다이렉트
            exit();
        } else {
            echo "<script>alert('잘못된 비밀번호입니다.'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('사용자 이름이 존재하지 않습니다.'); window.location.href = 'login.php';</script>";
    }

    $stmt->close();
}
?>
