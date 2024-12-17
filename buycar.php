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
      cursor: pointer;
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
      height:300px;
      background-color: #e0e0e0;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative; /* 하트 버튼 위치 조정을 위한 설정 */
    }

    .car-item img {
      width: 100%;
      height: 150px; /* 이미지 크기 줄임 */
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .car-item p {
      font-size: 0.9em; /* 텍스트 크기 조정 */
      color: #333;
      margin-bottom: 10px;
    }

    /* 하트 버튼 스타일 */
    .heart-button {
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1.5em;
      color: #bbb; /* 기본 하트 색상 */
      transition: color 0.3s ease;
    }

    .heart-button.liked {
      color: #ff6b6b; /* 찜한 하트 색상 */
    }

    .heart-button:focus {
      outline: none;
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
        <li><a data-category="imported">수입차</a></li>
        <li><a data-category="domestic">국산차</a></li>
        <li><a data-category="electric">전기차</a></li>
        <li><a data-category="suv">SUV</a></li>
        <li><a data-category="sedan">세단</a></li>
      </ul>
    </aside>

    <!-- 중앙 컨테이너 -->
    <div class="container" id="car-list">
      <?php
      $servername = "localhost";
      $username = "root"; // 데이터베이스 사용자명
      $password = "";     // 데이터베이스 비밀번호
      $dbname = "ucar";   // 데이터베이스 이름

      // 데이터베이스 연결
      $conn = new mysqli($servername, $username, $password, $dbname);

      // 연결 확인
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // 차량 데이터 가져오기
      $sql = "SELECT * FROM cars";
      $result = $conn->query($sql);

      // 결과 출력
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="car-item" data-category="' . htmlspecialchars($row['category']) . '">';
              echo '<button class="heart-button" onclick="toggleLike(this)">&#9829;</button>';
              echo '<img src="/' . htmlspecialchars($row['image_url']) . '" alt="Car">';
              echo '<p>' . htmlspecialchars($row['description']) . '</p>';
              echo '</div>';
          }
      } else {
          echo "No cars found.";
      }

      // 연결 종료
      $conn->close();
      ?>
    </div>
  </div>

  <footer>
    <div>CUSTOMER CENTER TEL 000 0000 0000</div>
    <div>BANK ACCOUNT DD은행 000000000</div>
    <div>RETURN / EXCHANGE 서울특별시 강남구 테헤란로 0000</div>
    <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
    <div>COPYRIGHT © 유카 주식회사 ALL RIGHTS RESERVED.</div>
  </footer>

  <script>
    // JavaScript로 탭 전환 처리
    document.querySelectorAll('.left-section a').forEach(link => {
      link.addEventListener('click', event => {
        event.preventDefault(); // 기본 동작 막기
        const category = link.getAttribute('data-category');

        // 모든 차량 숨기기
        document.querySelectorAll('.car-item').forEach(item => {
          if (item.getAttribute('data-category') === category) {
            item.style.display = 'flex'; // 선택된 카테고리 보이기
          } else {
            item.style.display = 'none'; // 다른 카테고리 숨기기
          }
        });
      });
    });

    // 찜 기능: 하트 버튼 상태 토글
    function toggleLike(button) {
      button.classList.toggle('liked'); // 'liked' 클래스 토글
      const isLiked = button.classList.contains('liked');
      console.log(isLiked ? "찜 추가" : "찜 해제");
      // 서버와 연동하려면 AJAX 요청 등을 추가할 수 있음.
    }
  </script>
</body>
</html>
