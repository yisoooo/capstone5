<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>내차팔기</title>
  <style>
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

    .logo {
      font-size: 40px;
      font-weight: bold;
      color: #333;
    }

    /* 메인 헤더 */
    header {
      border-bottom: 1px solid #ddd;
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

    .main-visual {
      text-align: center;
      background-color: #7bbbff;
      padding: 50px 20px;
    }

    .main-visual h1 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .main-visual p {
      font-size: 18px;
      margin-bottom: 30px;
    }

    .main-visual .apply-button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      text-decoration: none;
      border-radius: 5px;
    }

    .recommend-section {
      padding: 30px 20px;
      text-align: center;
    }

    .recommend-section h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .car-box {
      display: flex;
      flex-wrap: wrap; /* Flexbox의 wrap을 활성화하여 자동으로 내려가도록 설정 */
      gap: 20px; /* 박스 간 간격 설정 */
      justify-content: center; /* 박스 정렬 (가운데 정렬) */
    }

    .car-box .car {
      width: 200px; /* 박스 너비 */
      height: 150px; /* 박스 높이 */
      background-color: #e0e0e0;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

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

  <div class="main-visual">
    <h1>내차팔기</h1>
    <p>홍보 사진</p>
    <a href="sell_car.php" class="apply-button">간편신청 ></a>
  </div>

  <div class="recommend-section">
    <h2>Recommend Car</h2>
    <div class="car-box">
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
      <div class="car"></div>
    </div>
  </div>

  <footer>
    <div>CUSTOMER CENTER: TEL 000-0000-0000</div>
    <div>BANK ACCOUNT: 0000000000</div>
    <div>RETURN/EXCHANGE: 서울특별시 강남구 테헤란로 000</div>
    <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
    <div>COPYRIGHT © 유카 주식회사. ALL RIGHTS RESERVED.</div>
</footer>
</body>
</html>
