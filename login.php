<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ucar 로그인 페이지</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      font-size: 1em;
      color: #333;
      display: block;
      margin-bottom: 8px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      font-size: 1em;
      border-radius: 5px;
      border: 1px solid #ddd;
      box-sizing: border-box;
    }

    .input-group input:focus {
      outline: none;
      border-color: #00bfffc4;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background-color: #00bfffc4;
      border: none;
      border-radius: 5px;
      font-size: 1.1em;
      color: #fff;
      cursor: pointer;
    }

    .link {
      text-align: center;
      margin-top: 15px;
    }

    .link a {
      color: #007bff;
      text-decoration: none;
    }

    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>UCAR 로그인</h2>

    <!-- 로그인 폼 -->
    <form action="login3.php" method="post">
      <!-- 아이디 입력 -->
      <div class="input-group">
        <label for="username">아이디</label>
        <input type="text" id="username" name="username" required>
      </div>

      <!-- 비밀번호 입력 -->
      <div class="input-group">
        <label for="password">비밀번호</label>
        <input type="password" id="password" name="password" required>
      </div>

      <!-- 로그인 버튼 -->
      <button type="submit" class="btn">로그인</button>
    </form>

    <!-- 링크 -->
    <div class="link">
      <p>회원이 아니신가요? <a href="signup.php">회원가입</a></p>
      <p><a href="find_id.php">아이디를 잊으셨나요?</a></p>
      <p><a href="find_pw.php">비밀번호를 잊으셨나요?</a></p>
    </div>
  </div>

</body>
</html>
