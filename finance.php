<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>할부 및 리스</title>
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

    .finance-section {
      padding: 30px;
      background-color: #f7f7f7;
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
    }

    .finance-section h2 {
      text-align: center;
      font-size: 24px;
      color: #333;
    }

    .tabs-container {
      display: flex;
      justify-content: center;
      margin: 20px 0;
      border-bottom: 2px solid #ddd;
    }

    .tab {
      flex: 1;
      text-align: center;
      padding: 10px;
      cursor: pointer;
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }

    .tab.active {
      color: #fff;
      background-color: #007bff;
      border-radius: 5px 5px 0 0;
      border-bottom: 2px solid #007bff;
    }

    .tab-content {
      display: none;
      padding: 20px;
      text-align: center;
      font-size: 16px;
      color: #555;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .tab-content.active {
      display: block;
    }

    /* 보험료 조회 버튼 스타일 */
    .insurance-button {
      position: fixed;
      top: 50%;
      right: 20px;
      transform: translateY(-50%);
      padding: 8px 15px;
      background-color: #00bfffc4;
      color: white;
      font-size: 14px;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .insurance-button:hover {
      background-color: #007bff;
    }

    /* 보험료 링크 섹션 스타일 */
    .insurance-links {
      display: none;
      position: fixed;
      top: 50%;
      right: 60px;
      transform: translateY(-50%);
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 200px;
      padding: 10px;
    }

    .insurance-links h3 {
      font-size: 14px;
      margin-bottom: 10px;
      color: #333;
      text-align: center;
    }

    .insurance-links a {
      display: block;
      font-size: 12px;
      color: #007bff;
      text-decoration: none;
      margin: 5px 0;
      text-align: center;
    }

    .insurance-links a:hover {
      text-decoration: underline;
    }

    .insurance-links .close-btn {
      display: block;
      text-align: center;
      margin-top: 10px;
      font-size: 12px;
      color: #333;
      cursor: pointer;
    }

    .insurance-links .close-btn:hover {
      color: #007bff;
    }

    /* 직영 리스 스타일 */
    .lease-section {
      padding: 20px;
    }

    .section-title {
      font-size: 20px;
      margin: 20px 0;
      font-weight: bold;
    }

    .info-section {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .info-box {
      width: 30%;
      background: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .info-box img {
      width: 300px;
      height: 200;
      margin-bottom: 10px;
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
<!-- 헤더 -->
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

<!-- 할부 및 리스 섹션 -->
 <!--할부-->
<div class="finance-section">
  <h2>내 상황에 딱 맞춘 나만의 금융 설계</h2>
  <div class="tabs-container">
    <div class="tab active" onclick="showTab('installment')">할부</div>
    <div class="tab" onclick="showTab('lease')">리스</div>
  </div>
  <div id="installment" class="tab-content active">
          <img  src="image\finance1.png" width= "1200" height= "650" alt="부담 없는 납부">
          <p><strong>할부 금액별 차량 검색</strong></p>
        <div class="info-box">
          
        </div>
      </div>
    </div>
  </div>

<!--리스 -->
  <div id="lease" class="tab-content">
    <img src="image\lease main.png" width="1300" height= "400"  alt="40% 할인">
    <h2 class="section-title">직영 리스 상품 안내</h2>
    <div class="info-section">
      <div class="info-box">
        <img src="image\lease1.png"  alt="40% 할인">
      </div>
      <div class="info-box">
        <img src="image\lease2.png" alt="부담 없는 납부">
        
      </div>
      <div class="info-box">
        <img src="image\lease3.png" alt="만기 시">
        
      </div>
    </div>
    <hr>
    <div style="text-align : center;">
      <img src="image\lease4.png" width="800" height= "300"  alt="40% 할인">
 </div>
    
  </div>
</div>


<!-- 보험료 조회 버튼 -->
<button class="insurance-button" onclick="toggleInsuranceLinks()">보험료 조회</button>

<!-- 보험료 링크 섹션 -->
<div class="insurance-links" id="insuranceLinks">
  <h3>보험사 링크</h3>
  <a href="https://www.directdb.co.kr" target="_blank">DB손해보험 다이렉트</a>
  <a href="http://meritdirect.co.kr/" target="_blank">메리츠손해보험 다이렉트</a>
  <a href="https://direct.kbinsure.co.kr" target="_blank">KB손해보험 다이렉트</a>
  <a href="https://direct.hi.co.kr"target="_blank">현대해상 다이렉트</a>
  <div class="close-btn" onclick="toggleInsuranceLinks()">닫기</div>
</div>

<script>
  function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(content => {
      content.classList.remove('active');
    });
    document.querySelectorAll('.tab').forEach(tab => {
      tab.classList.remove('active');
    });

    document.getElementById(tabId).classList.add('active');
    document.querySelector(`.tab[onclick="showTab('${tabId}')"]`).classList.add('active');
  }

  function toggleInsuranceLinks() {
    const links = document.getElementById('insuranceLinks');
    if (links.style.display === 'block') {
      links.style.display = 'none';
    } else {
      links.style.display = 'block';
    }
  }
</script>
<footer>
  <div>CUSTOMER CENTER: TEL 000-0000-0000</div>
  <div>BANK ACCOUNT: 0000000000</div>
  <div>RETURN/EXCHANGE: 서울특별시 강남구 테헤란로 000</div>
  <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
  <div>COPYRIGHT © 유카 주식회사. ALL RIGHTS RESERVED.</div>
</footer>

</body>

</html>
