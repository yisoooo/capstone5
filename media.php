<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UCAR - 미디어</title>
  <style>
    /* 기본 스타일 */
    body {
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  height: 100vh; /* 화면 전체를 사용 */
}

.top-bar {
      background-color: #fff; /* 상단 바 배경 흰색 */
      padding: 5px 20px;
      font-size: 0.9em;
      text-align: right;
    }

    .top-bar a {
      margin-left: 20px;
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .top-bar a:hover {
      text-decoration: underline;
    }
    /* 상단 헤더 */
    header {
      border-bottom: 1px solid #ddd;
      background-color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .logo {
      font-size: 40px;
      font-weight: bold;
      color: #333;
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

    nav {
      display: flex;
      gap: 15px;
    }

    nav a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    nav a:hover {
      color: #007bff;
    }
    /* 미디어 섹션 */
    .media-section {
      padding: 20px;
      text-align: center;
    }

    .media-section h2 {
      font-size: 1.8em;
      margin-bottom: 20px;
    }

    .media-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .media-item {
      width: 250px;
      height: 150px;
      background-color: #e0e0e0;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 1.2em;
      color: #999;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .media-item:hover {
      transform: scale(1.05);
    }

    .media-item a {
      text-decoration: none;
      color: inherit;
    }

    /* 푸터 */
    footer {
  background-color: #f9f9f9;
  padding: 20px;
  text-align: center;
  font-size: 14px;
  color: #777;
  border-top: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box;
  margin-top: auto; /* footer가 항상 맨 아래에 위치하도록 설정 */
}
  </style>
</head>
<body>
  <div class="top-bar">
    <a href="logout.php">로그아웃</a>
    <a href="mypage.php">마이페이지</a>
  </div>
  <header>
    <div class="logo"><a href="index1.php" style="text-decoration: none; color: inherit;">UCAR</a></div>
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

  <!-- 미디어 섹션 -->
  <section class="media-section">
    <h2>UCAR 미디어</h2>
    <div class="media-grid">
      <div class="media-item">
        <a href="#">뉴스 보기</a>
      </div>
      <div class="media-item">
        <a href="#">차량 리뷰</a>
      </div>
      <div class="media-item">
        <a href="#">동영상</a>
      </div>
    </div>
  </section>

  <footer>
    <div>CUSTOMER CENTER: TEL 000-0000-0000</div>
  <div>BANK ACCOUNT: 0000000000</div>
  <div>RETURN/EXCHANGE: 서울특별시 강남구 테헤란로 000</div>
  <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
  <div>COPYRIGHT © 유카 주식회사. ALL RIGHTS RESERVED.</div>
  </footer>
</body>
</html>
