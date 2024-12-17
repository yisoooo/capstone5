<?php
session_start();
require_once("db.php");

// 로그인 상태 체크
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // 로그인되어 있지 않으면 로그인 페이지로 리다이렉트
    exit();
}

// 세션에서 사용자명 가져오기
$username = $_SESSION['username'];

// 사용자 정보 가져오기
$sql = "SELECT name, email, password FROM members WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// 폼이 제출되었을 때
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_password_confirm = $_POST['password_confirm'];

    // 기존 비밀번호 확인
    if (!password_verify($current_password, $user['password'])) {
        $error_message = "기존 비밀번호가 일치하지 않습니다.";
    }
    // 새 비밀번호와 새 비밀번호 확인이 일치하는지 확인
    elseif ($new_password !== $new_password_confirm) {
        $error_message = "새 비밀번호와 새 비밀번호 확인이 일치하지 않습니다.";
    } else {
        // 새 비밀번호가 비어 있지 않으면 비밀번호 업데이트
        if (!empty($new_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE members SET name = ?, email = ?, password = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $new_name, $new_email, $hashed_password, $username);
        } else {
            // 비밀번호 변경 없이 이름과 이메일만 업데이트
            $sql = "UPDATE members SET name = ?, email = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $new_name, $new_email, $username);
        }

        // 업데이트 쿼리 실행
        if ($stmt->execute()) {
            echo "<script>alert('회원정보가 성공적으로 업데이트되었습니다.');</script>";
        } else {
            echo "<script>alert('회원정보 수정에 실패했습니다. 다시 시도해주세요.');</script>";
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보 수정</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-group a {
            text-decoration: none;
            color: #007bff;
            text-align: center;
            display: block;
            margin-top: 20px;
        }
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>회원정보 수정</h2>

    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="edit_profile.php" method="post">
        
        <!-- 이름 -->
        <div class="form-group">
            <label for="name">이름</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </div>

        <!-- 이메일 -->
        <div class="form-group">
            <label for="email">이메일</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <!-- 기존 비밀번호 입력 -->
        <div class="form-group">
            <label for="current_password">기존 비밀번호</label>
            <input type="password" id="current_password" name="current_password" placeholder="기존 비밀번호를 입력하세요" required>
        </div>

        <!-- 새 비밀번호 -->
        <div class="form-group">
            <label for="password">새 비밀번호</label>
            <input type="password" id="password" name="password" placeholder="새 비밀번호를 입력하세요">
        </div>

        <!-- 새 비밀번호 확인 -->
        <div class="form-group">
            <label for="password_confirm">새 비밀번호 확인</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="새 비밀번호를 다시 입력하세요">
        </div>

        <div class="form-group">
            <input type="submit" value="정보 수정">
        </div>
    </form>

    <a href="mypage.php">마이페이지로 돌아가기</a>
</div>

</body>
</html>
