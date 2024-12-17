<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ucar 비밀번호 찾기</title>
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

    .find-container {
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

  <div class="find-container">
    <h2>비밀번호 찾기</h2>

    <!-- 비밀번호 찾기 폼 -->
    <form action="find-password-result.php" method="post">
      <!-- 아이디 입력 -->
      <div class="input-group">
        <label for="username">아이디</label>
        <input type="text" id="username" name="username" required>
      </div>

      <!-- 이메일 입력 -->
      <div class="input-group">
        <label for="email">등록된 이메일</label>
        <input type="email" id="email" name="email" required>
      </div>

      <!-- 비밀번호 찾기 버튼 -->
      <button type="submit" class="btn">비밀번호 찾기</button>
    </form>

    <!-- 링크 -->
    <div class="link">
      <p>비밀번호를 기억하시나요? <a href="login.php">로그인</a></p>
    </div>
  </div>

</body>
</html>