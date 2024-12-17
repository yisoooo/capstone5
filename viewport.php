<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UCAR 차량 판매 상세 페이지</title>
  <style>
    /* 기본 스타일 */
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      color: #333;
      line-height: 1.6;
    }
    a {
      text-decoration: none;
      color: inherit;
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
    /* 메인 컨테이너 */
    .container {
      width: 90%;
      max-width: 800px;
      margin: 30px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    h2, h3 {
      color: #00bfffc4;
      margin-bottom: 10px;
    }
    .car-info, .seller-info, .review-section, .option-section {
      margin-bottom: 20px;
    }
    h3 {
      border-bottom: 2px solid #00bfffc4;
      padding-bottom: 5px;
    }
    p {
      margin: 8px 0;
      font-size: 1.1em;
    }

    /* 차량 이미지 스타일 */
    .car-images {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 10px;
    }
    .car-images img {
      width: 100%;
      max-width: 250px;
      height: auto;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* 버튼 스타일 */
    .button-container {
      display: flex;
      gap: 10px;
      margin: 20px 0;
    }
    button {
      background-color: #00bfffc4;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1.1em;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #0099dd;
    }

    /* 옵션 스타일 */
    ul {
      list-style: none;
      padding: 0;
    }
    li::before {
      content: '✔ ';
      color: #00bfffc4;
    }

    /* 리뷰 */
    .review-section .review {
      background-color: #f4f4f4;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 10px;
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
      margin-top: 30px;
    }
  </style>
</head>
<body>

 <!-- 메인 헤더 -->
 <header>
    <div class="logo"><a href="index.html" style="text-decoration: none; color: inherit;">UCAR</a></div>
    <nav>
      <a href="login1.html">내차팔기</a>
      <a href="buycar.html">내차사기</a>
      <a href="rentcar.html">렌트</a>
      <a href="finance1.html">금융</a>
      <a href="media.html">미디어</a>
    </nav>
    <div class="search-bar">
      <input type="text" placeholder="검색">
  </div>
  </header>

  <!-- 메인 컨테이너 -->
  <div class="container">
    <!-- 차량 이미지 -->
    <div>
      <h3>차량 사진</h3>
      <div class="car-images">
        <img src="car_image1.jpg" alt="차량 사진 1">
        <img src="car_image2.jpg" alt="차량 사진 2">
        <img src="car_image3.jpg" alt="차량 사진 3">
      </div>
    </div>

    <!-- 차량 정보 -->
    <div class="car-info">
      <h3>차량 정보</h3>
      <p><strong>제조사:</strong> 현대</p>
      <p><strong>모델:</strong> 소나타</p>
      <p><strong>연식:</strong> 2022</p>
      <p><strong>차량 번호:</strong> 12가 3456</p>
      <p><strong>주행거리:</strong> 50,000 km</p>
      <p><strong>판매 가격:</strong> 1,500 만원</p>
      <p><strong>차량 설명:</strong> 깨끗하고 잘 관리된 차량입니다. 사고 이력 없으며 주행 성능이 매우 좋습니다.</p>
      <p><strong>평균 시세:</strong> 약 1,450 ~ 1,550 만원</p>
      
      <!-- 버튼 -->
      <div class="button-container">
        <button onclick="alert('보험 이력을 조회합니다.')">보험 이력 조회</button>
        <button onclick="alert('사고 이력을 조회합니다.')">사고 이력 조회</button>
      </div>
    </div>

    <!-- 옵션 정보 -->
    <div class="option-section">
      <h3>주요 옵션</h3>
      <ul>
        <li>스마트 키</li>
        <li>네비게이션</li>
        <li>후방 카메라</li>
        <li>열선 시트</li>
        <li>통풍 시트</li>
        <li>전동 시트</li>
        <li>크루즈 컨트롤</li>
        <li>자동 주차 보조</li>
      </ul>
    </div>

    <!-- 차량 특징 -->
    <div class="option-section">
      <h3>이 차량의 특징</h3>
      <p>현대 소나타 2022년형은 넓은 실내 공간과 뛰어난 연비로 잘 알려진 모델입니다. 이 차량은 사고 이력 없이 깨끗하게 관리되었으며, 장거리 운전에 적합합니다.</p>
      <p>특히 옵션이 풍부해 통풍 시트와 열선 시트, 후방 카메라 등 다양한 기능이 제공됩니다.</p>
    </div>

    <!-- 판매자 정보 -->
    <div class="seller-info">
      <h3>판매자 정보</h3>
      <p><strong>이름:</strong> 홍길동</p>
      <p><strong>연락처:</strong> 010-1234-5678</p>
      <p><strong>위치:</strong> 서울특별시 강남구</p>
    </div>

    <!-- 리뷰 섹션 -->
    <div class="review-section">
      <h3>이 차량에 대한 리뷰</h3>
      <div class="review">
        <strong>이** 님:</strong>
        <p>이 차량을 2년간 운전했는데 정말 만족스러웠습니다. 연비도 좋고 운전하기 편리했어요!</p>
      </div>
      <div class="review">
        <strong>박** 님:</strong>
        <p>가족 여행용으로 사용했는데 넓은 실내 공간이 마음에 들었습니다. 장거리 운전에도 편안합니다.</p>
      </div>
      <div class="review">
        <strong>최** 님:</strong>
        <p>가격 대비 성능이 뛰어납니다. 큰 문제 없이 잘 탔던 차량이에요!</p>
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
