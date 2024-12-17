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
            border-bottom: 1px solid #ddd;
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
      border-bottom: 1px solid #ddd;
    }

    .main-menu a {
      margin: 0 15px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }

    .main-menu a:hover {
      color: #000;
    }

    /* 컨테이너 */
    .container {
      display: flex;
      padding: 20px;
    }

    /* 왼쪽 필터 패널 */
    .filter-panel {
      width: 250px;
      border-right: 1px solid #ddd;
      padding: 20px;
      font-size: 0.9em;
    }

    .filter-panel h2 {
      font-size: 1.2em;
      color: red;
    }

    .filter-section {
      margin-bottom: 15px;
    }

    .filter-section label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .filter-section input[type="checkbox"] {
      margin-right: 5px;
    }

    /* 차량 목록 */
    .car-list {
      flex-grow: 1;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .car-item {
      background-color: #e0e0e0;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
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
  margin-top: auto; /* footer가 항상 맨 아래에 위치하도록 설정 */
}
  </style>
</head>
<body>
<div class="top-bar">
    <a href="index.php">로그아웃</a>
    <a href="mypage.php">마이페이지</a>
  </div>
  <header>
    <div class="logo">
      <div class="logo"><a href="index.php" style="text-decoration: none; color: inherit;">UCAR</a></div>
      </a>
      </div>
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
  <!-- 컨테이너 -->
  <div class="container">
    <!-- 왼쪽 필터 패널 -->
    <div class="filter-panel">
      <h2>수입차 검색</h2>
      <div class="filter-section">
        <label>차종</label>
        <input type="checkbox"> 옵션1<br>
        <input type="checkbox"> 옵션2
      </div>
      <div class="filter-section">
        <label>제조사/모델/등급</label>
        <input type="checkbox"> 옵션1<br>
        <input type="checkbox"> 옵션2
      </div>
      <div class="filter-section">
        <label>연식</label>
        <input type="checkbox"> 옵션1<br>
        <input type="checkbox"> 옵션2
      </div>
      <div class="filter-section">
        <label>주행거리</label>
        <input type="checkbox"> 옵션1<br>
        <input type="checkbox"> 옵션2
      </div>
      <div class="filter-section">
        <label>가격</label>
        <input type="checkbox"> 옵션1<br>
        <input type="checkbox"> 옵션2
      </div>
      <!-- 추가 필터들 -->
    </div>

    <!-- 차량 목록 -->
    <div class="car-list">
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
      <!-- 더 많은 차량들 -->
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