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
  height: 100vh; /* 화면 전체를 사용 */
}

    /* 상단 네비게이션 바 */
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

    /* 메인 메뉴 */
    .main-menu {
      display: flex;
      justify-content: center;
      background-color: #ffffff;
      padding: 10px 0;
    }

    .main-menu a {
      margin: 0 15px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }

    .main-menu a:hover {
      color: #00bfffc4;
    }

    /* Best 섹션 */
    .best-section {
      background-color: #00bfffc4;
      padding: 20px 0;
      text-align: center;
      font-size: 1.8em;
      font-weight: bold;
      color: #fff;
    }

    /* 차량 이미지 및 검색 섹션 */
    .search-section {
      text-align: center;
      padding: 20px 0;
    }

    .car-images {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 20px;
    }

    .car-images img {
      width: 200px;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .search-filters select, .search-filters button {
      padding: 10px;
      margin: 0 5px;
      font-size: 1em;
      border-radius: 5px;
    }

    .search-filters select {
      border: 1px solid #ddd;
    }

    .search-filters button {
      background-color: #00bfffc4;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    /* 추천 차량 섹션 */
    .recommend-section {
      padding: 20px;
      text-align: center;
    }

    .recommend-section h2 {
      font-size: 1.5em;
      margin-bottom: 20px;
      color: #000000c4;
    }

    .recommend-cars {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .recommend-car {
      width: 300px;
      height: 200px;
      background-color: #e0e0e0;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2em;
      color: #999;
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
  <!-- 상단 네비게이션 바 -->
  <div class="top-bar">
    <a href="logout.php">로그아웃</a>
    <a href="mypage.php">마이페이지</a>
  </div>

  <!-- 메인 헤더 -->
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

  <!-- Best 섹션 -->
  <div class="best-section">
    Best
  </div>

  <!-- 차량 이미지 및 검색 섹션 -->
  <div class="search-section">
    <div class="car-images">
      <img src="https://via.placeholder.com/200x150" alt="Car 1">
      <img src="https://via.placeholder.com/200x150" alt="Car 2">
      <img src="https://via.placeholder.com/200x150" alt="Car 3">
    </div>
    <h2>원하는 차량 조회</h2>
    <div class="search-filters">
      <select>
        <option>국산</option>
        <option>수입</option>
      </select>
      <select>
        <option>제조사</option>
        <option>현대</option>
        <option>기아</option>
        <option>대우/GM</option>
        <option>쌍용</option>
      </select>
      <select>
        <option>모델</option>
      </select>
      <select>
        <option>세부모델</option>
      </select>
      <button>검색하기</button>
    </div>
  </div>

  <!-- 추천 차량 섹션 -->
  <div class="recommend-section">
    <h2>Recommend Car</h2>
    <div class="recommend-cars">
      <div class="recommend-car">추천 차량 1</div>
      <div class="recommend-car">추천 차량 2</div>
    </div>
  </div>
  <div class="recommend-section">
    <div class="recommend-cars">
      <div class="recommend-car">추천 차량 3</div>
      <div class="recommend-car">추천 차량 4</div>
    </div>
  </div>

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
