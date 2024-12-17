<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ucar 중고차 목록</title>
  <style>
    /* 기본 스타일 */
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

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

    header {
      border-bottom: 1px solid #ddd;
      background-color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
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

    /* 전체 레이아웃 */
    .main {
      display: flex;
      flex: 1;
      background-color: #f9f9f9;
    }

    /* 왼쪽 섹션 */
    .left-section {
      width: 250px;
      background-color: #f0f0f0;
      padding: 20px;
      border-right: 1px solid #ddd;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .left-section h3 {
      font-size: 1.2em;
      margin-bottom: 20px;
      color: #333;
    }

    .left-section ul {
      list-style: none;
      padding: 0;
    }

    .left-section ul li {
      margin-bottom: 15px;
    }

    .left-section ul li a {
      text-decoration: none;
      color: #007bff;
      font-size: 1em;
    }

    .left-section ul li a:hover {
      text-decoration: underline;
    }

    /* 중앙 컨테이너 */
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
      flex: 1;
      justify-content: center;
    }

    /* 차량 목록 */
    .car-item {
      width: 200px;
      background-color: #e0e0e0;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .car-item img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .car-item p {
      font-size: 1em;
      color: #333;
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

  <div class="main">
    <!-- 왼쪽 섹션 -->
    <aside class="left-section">
      <h3>카테고리</h3>
      <ul>
        <li><a href="imported.php">수입차</a></li>
        <li><a href="gucsanb.php">국산차</a></li>
        <li><a href="electric.php">전기차</a></li>
        <li><a href="suv.php">SUV</a></li>
        <li><a href="sedan.php">세단</a></li>
      </ul>
    </aside>

    <!-- 중앙 컨테이너 -->
    <div class="container">
      <!-- 차량 아이템 -->
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
      <div class="car-item">
        <img src="https://via.placeholder.com/200x150" alt="Car">
        <p>차량 내용</p>
      </div>
    </div>
  </div>

  <footer>
    <div>CUSTOMER CENTER TEL 000 0000 0000</div>
    <div>BANK ACCOUNT DD은행 000000000</div>
    <div>RETURN / EXCHANGE 서울특별시 강남구 테헤란로 0000</div>
    <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
    <div>COPYRIGHT © 유카 주식회사 ALL RIGHTS RESERVED.</div>
  </footer>
</body>
</html>
