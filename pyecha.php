<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>폐차 서비스</title>
  <style>
    /* 기본 스타일 */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }

    

    /* 헤더 */
    header {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    .logo {
      font-size: 35px;
      font-weight: bold;
      color: #333;
    }

    nav {
      display: flex;
      gap: 15px;
    }

    nav a {
      text-decoration: none;
      color: #333;
    }

    nav a:hover {
      color: #007bff;
    }

    .search-bar {
      border: 1px solid #ddd;
      border-radius: 20px;
      padding: 5px 15px;
      display: flex;
      align-items: center;
    }

    .search-bar input {
      border: none;
      outline: none;
      font-size: 15px;
    }

    .search-bar input::placeholder {
      color: #676767;
    }

    /* 메인 콘텐츠 */
    .content {
      padding: 120px 20px 60px;
      text-align: center;
    }

    .service-box {
      background-color: #e0e0e0;
      margin: 20px auto;
      width: 90%;

      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .service-box h1 {
      font-size: 18px;
      color: #000;
      margin-bottom: 15px;
    }

    .phone-box {
      background-color: #f9f9f9;
      padding: 10px;
      border: 1px solid #ddd;
      margin-bottom: 20px;
      font-size: 18px;
      font-weight: bold;
    }

    .step {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
      margin: 15px 0;
    }

    .step div {
      background-color: #ccc;
      padding: 15px;
      border-radius: 5px;
      font-size: 14px;
      font-weight: bold;
    }

    .input-group {
      margin: 20px 0;
    }

    .input-group input {
      width: 48%;
      padding: 10px;
      margin: 5px 1%;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 14px;
    }

    /* 푸터 */
    footer {
      font-size: 12px;
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 15px;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }

    footer div {
      margin: 5px 0;
    }
  </style>
</head>
<body>

  <!-- 상단 네비게이션 -->
  <div class="top-bar">
    <a href="logout.php">로그아웃</a>
    <a href="mypage.php">마이페이지</a>
  </div>
  <!-- 헤더 -->
  <header>
    <div class="logo">UCAR</div>
    <nav>
      <a href="gucsan.php">내차팔기</a>
      <a href="buycar.php">내차사기</a>
      <a href="rentcar.php">렌트</a>
      <a href="finance.php">금융</a>
      <a href="media.php">미디어</a>
    </nav>
    <div class="search-bar">
      <input type="text" placeholder="검색">
    </div>
  </header>

  <!-- 메인 콘텐츠 -->
  <div class="content">
    <div class="service-box">
      <h1>신청만 하면 끝! 간편한 폐차 서비스</h1>
      <div class="phone-box">010-1234-5678</div>
      <div class="step">
        <div>STEP 1</div>
        <div>STEP 1</div>
        <div>STEP 1</div>
        <div>STEP 1</div>
      </div>
      <div class="input-group">
        <input type="text" placeholder="제조사">
        <input type="text" placeholder="모델">
        <input type="text" placeholder="연식">
      </div>
    </div>
  </div>

  <!-- 푸터 -->
  <footer>
    <div>CUSTOMER CENTER TEL 000 0000 0000</div>
    <div>BANK ACCOUNT DD은행 000000000</div>
    <div>RETURN / EXCHANGE 서울특별시 강남구 테헤란로 0000</div>
    <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
    <div>COPYRIGHT © 유카 주식회사 ALL RIGHTS RESERVED.</div>
  </footer>

</body>
</html>
