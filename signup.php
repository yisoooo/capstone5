<?php
session_start();
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];

    // 사용자명 중복 확인
    $sql = "SELECT * FROM members WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error_message = "이미 존재하는 아이디입니다.";
    } else {
        // 사용자 정보 삽입
        $sql = "INSERT INTO members (name, username, password, email, phone, birthdate) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $username, $password, $email, $phone, $birthdate);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            header("Location: signup2.php"); // 회원가입 성공 시 signup2.php로 리다이렉트
            exit();
        } else {
            $error_message = "회원가입에 실패했습니다.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입</title>
  <style>
    /* 기존 CSS 유지 */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .signup-container {
      background-color: #fff;
      border-radius: 8px;
      padding: 40px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 400px;
      max-width: 100%;
    }

    .signup-container h2 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      margin-bottom: 15px;
      display: flex;
      flex-direction: column;
    }

    .input-group label {
      font-size: 14px;
      color: #555;
      margin-bottom: 5px;
    }

    .input-group input {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
    }

    .input-group input:focus {
      outline: none;
      border-color: #007bff;
    }

    .input-group .button-group {
      display: flex;
      justify-content: flex-start;
      gap: 10px;
    }

    .input-group button {
      padding: 10px 15px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    .input-group button:hover {
      background-color: #0056b3;
    }

    .signup-container button[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #00bfffc4;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .signup-container button[type="submit"]:hover {
      background-color: #218838;
    }

    .signup-container .link {
      display: flex;
      justify-content: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .signup-container .link a {
      color: #007bff;
      text-decoration: none;
    }

    .signup-container .link a:hover {
      text-decoration: underline;
    }

    /* 반응형 디자인 */
    @media (max-width: 480px) {
      .signup-container {
        padding: 20px;
        width: 90%;
      }
    }
  </style>
</head>
<body>

  <div class="signup-container">
    <h2>UCAR 회원가입</h2>
    <?php if (isset($error_message)): ?>
      <p style="color: red;"><?= $error_message ?></p>
    <?php endif; ?>
    <form id="signupForm" action="signup.php" method="post">
      <!-- 이름 -->
      <div class="input-group">
        <label for="name">이름</label>
        <input type="text" id="name" name="name" placeholder="이름을 입력하세요" required>
      </div>

      <!-- 아이디 -->
      <div class="input-group">
        <label for="username">아이디</label>
        <input type="text" id="username" name="username" placeholder="아이디를 입력하세요" required>
        <div class="button-group">
          <button type="button" id="checkUsernameBtn">아이디 중복확인</button>
        </div>
        <small id="usernameError" class="error"></small>
      </div>

      <!-- 비밀번호 -->
      <div class="input-group">
        <label for="password">비밀번호</label>
        <input type="password" id="password" name="password" placeholder="비밀번호를 입력하세요" required>
        <small class="error" id="passwordError"></small>
      </div>

      <!-- 비밀번호 확인 -->
      <div class="input-group">
        <label for="passwordConfirm">비밀번호 확인</label>
        <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="비밀번호를 확인하세요" required>
        <small class="error" id="passwordConfirmError"></small>
      </div>

      <!-- 이메일 -->
      <div class="input-group">
        <label for="email">이메일</label>
        <input type="email" id="email" name="email" placeholder="이메일을 입력하세요" required>
      </div>

      <!-- 전화번호 -->
      <div class="input-group">
        <label for="phone">전화번호</label>
        <input type="tel" id="phone" name="phone" placeholder="전화번호를 입력하세요" required>
      </div>

      <!-- 생년월일 -->
      <div class="input-group">
        <label for="birthdate">생년월일</label>
        <input type="date" id="birthdate" name="birthdate" required>
      </div>

      <!-- 가입 버튼 -->
      <button type="submit">가입하기</button>
    </form>

    <div class="link">
      <p>이미 계정이 있으신가요? <a href="login.php">로그인</a></p>
    </div>
  </div>

</body>
</html>
