<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UCAR 중고차 홈페이지</title>
  <style>
    /* 기본 스타일 */
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    /* 상단 네비게이션 바 */
    .top-bar {
      background-color: #fff;
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

    .logo {
      font-size: 40px;
      font-weight: bold;
      color: #333;
    }

    /* 메인 헤더 */
    header {
      background-color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
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

    /* FAQ 섹션 */
    .faq-section {
      padding: 20px;
      background-color: #f9f9f9;
      text-align: center;
    }

    .faq-header {
      margin-bottom: 20px;
    }

    .faq-header h2 {
      margin: 0;
      font-size: 1.5em;
      font-weight: bold;
    }

    .faq-search {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 10px 0;
    }

    .faq-search input {
      padding: 10px;
      font-size: 1em;
      border: 1px solid #ddd;
      border-radius: 5px 0 0 5px;
      width: 300px;
      outline: none;
    }

    .faq-search button {
      padding: 10px 20px;
      font-size: 1em;
      border: none;
      background-color: #007bff;
      color: #fff;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
    }

    .faq-search button:hover {
      background-color: #0056b3;
    }

    .faq-list {
      list-style: none;
      padding: 0;
      text-align: left;
      display: inline-block;
    }

    .faq-list li {
      margin: 5px 0;
      font-size: 1em;
    }

    .faq-list li a {
      color: #007bff;
      text-decoration: none;
    }

    .faq-list li a:hover {
      text-decoration: underline;
    }

    /* 서비스 메뉴 */
    .service-menu {
      margin: 20px auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 8px;
      width: 80%;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .service-menu h3 {
      font-size: 1.2em;
      margin-bottom: 15px;
    }

    .service-menu-items {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 20px;
    }

    .service-item {
      flex: 1 1 30%;
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 8px;
      background-color: #f9f9f9;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
      font-size: 0.9em;
    }

    .service-item:hover {
      background-color: #e6f7ff;
      cursor: pointer;
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
      margin-top: auto;
    }
  </style>
</head>
<body>
  <!-- 상단 네비게이션 바 -->
  <div class="top-bar">
    <a href="logout.php">로그아웃</a>
    <a href="mypage.php">마이페이지</a>
  </div>

  <!-- 메인 헤더 -->
  <header>
    <div class="logo"><a href="index.php" style="text-decoration: none; color: inherit;">UCAR</a></div>
    <nav>
      <a href="login1.php">내차팔기</a>
      <a href="buycar.php">내차사기</a>
      <a href="rentcar.php">렌트</a>
      <a href="finance1.php">금융</a>
      <a href="media.php">미디어</a>
    </nav>
    <div class="search-bar">
      <input type="text" placeholder="검색">
    </div>
  </header>

  <!-- FAQ 섹션 -->
  <section class="faq-section">
    <div class="faq-header">
      <h2>서비스 FAQ</h2>
    </div>
    <div class="faq-search">
      <input type="text" placeholder="FAQ 검색">
      <button>검색</button>
    </div>
    <ul class="faq-list">
      <li><a href="#">01. 차량 이전은 언제 되나요?</a></li>
      <li><a href="#">02. 신청 후 당일 배송도 가능한가요?</a></li>
      <li><a href="#">03. 접수 후 상담은 언제쯤 받을 수 있나요?</a></li>
      <li><a href="#">04. 배송은 어떻게 진행되나요?</a></li>
      <li><a href="#">05. 환불이 불가능한 경우도 있나요?</a></li>
    </ul>
  </section>

  <!-- 서비스 메뉴 섹션 -->
  <section class="service-menu">
    <h3>서비스 메뉴</h3>
    <div class="service-menu-items">
      <div class="service-item">서비스 문의</div>
      <div class="service-item">아이디어 제안</div>
      <div class="service-item">장애/오류 신고</div>
      <div class="service-item">개인정보보호 신고</div>
      <div class="service-item">게시 중단 요청</div>
      <div class="service-item">기타 문의</div>
    </div>
  </section>

  <!-- 푸터 -->
  <footer>
    <div>CUSTOMER CENTER: TEL 000-0000-0000</div>
    <div>BANK ACCOUNT: 0000000000</div>
    <div>RETURN/EXCHANGE: 서울특별시 강남구 테헤란로 000</div>
    <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
    <div>COPYRIGHT © 유카 주식회사. ALL RIGHTS RESERVED.</div>
  </footer>
</body>
</html>
