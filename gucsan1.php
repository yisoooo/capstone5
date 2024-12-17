<?php
// DB 연결
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ucar";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 폼 제출 시 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 폼 데이터 가져오기
    $car_number = $_POST['car-number'];
    $car_name = $_POST['car-name'];
    $distance = $_POST['distance'];
    $applicant_name = $_POST['applicant-name'];
    $phone_number = $_POST['phone-number'];
    $region = $_POST['region'];
    
    // 체크박스 값 처리
    $parking = isset($_POST['parking']) ? 1 : 0;
    $transaction_location = isset($_POST['transaction-location']) ? 1 : 0;
    $within_30m = isset($_POST['within-30m']) ? 1 : 0;
    
    $age_check = isset($_POST['age-check']) ? 1 : 0;
    $terms_check = isset($_POST['terms-check']) ? 1 : 0;

    // DB에 데이터 삽입
    $sql = "INSERT INTO car_sale_requests (car_number, car_name, distance, applicant_name, phone_number, region, parking, transaction_location, within_30m, age_check, terms_check)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $car_number, $car_name, $distance, $applicant_name, $phone_number, $region, $parking, $transaction_location, $within_30m, $age_check, $terms_check);
    
    // 쿼리 실행
    if ($stmt->execute()) {
        // 성공 시 alert 메시지 표시 후 index1.php로 이동
        echo "<script>
                alert('신청이 완료되었습니다!');
                window.location.href = 'index1.php';
              </script>";
    } else {
        echo "<script>
                alert('오류가 발생했습니다. 다시 시도해주세요.');
              </script>";
    }

    // 연결 종료
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>내차팔기 신청하기</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background-color: white;
      border-bottom: 1px solid #ccc;
    }

    header a {
      text-decoration: none;
      color: #333;
      margin-right: 15px;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
    }

    .main-content {
      padding: 30px 20px;
    }

    .main-content h1 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
    }

    .form-container {
      max-width: 500px;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 10px;
      background-color: #f9f9f9;
    }

    .form-container label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      font-size: 14px;
    }

    .form-container input,
    .form-container select,
    .form-container button {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    .form-container .small-group {
      display: flex;
      gap: 10px;
      justify-content: space-between;
    }

    .form-container .small-group button {
      width: 32%;
    }

    .checkbox {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .checkbox input {
      width: auto;
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
      margin-top: auto;
    }
  </style>
</head>
<body>
  <header>
        <div class="logo"><a href="index1.php" style="text-decoration: none; color: inherit;">UCAR</a></div>
    <nav>
      <a href="gucsan.php">내차팔기</a>
      <a href="buycar.php">내차사기</a>
      <a href="rentcar.php">렌트</a>
      <a href="finance.php">금융</a>
      <a href="media.php">미디어</a>
    </nav>
  </header>

  <div class="main-content">
    <h1>내차팔기 신청하기</h1>
    <div class="form-container">
      <form method="POST" action="">
        <label for="car-number">차량번호</label>
        <input type="text" id="car-number" name="car-number" placeholder="예) 123가 1234" required>

        <label for="car-name">차량명</label>
        <input type="text" id="car-name" name="car-name" placeholder="예) 소나타 DN8" required>

        <label for="distance">주행거리</label>
        <input type="text" id="distance" name="distance" placeholder="예) 10,000 km" required>

        <label for="applicant-name">신청자명</label>
        <input type="text" id="applicant-name" name="applicant-name" placeholder="예) 홍길동" required>
        
        <label for="phone-number">휴대전화번호</label>
        <input type="text" id="phone-number" name="phone-number" placeholder="예) 010-1234-5678" required>

        <label for="region">방문진단 요청지역</label>
        <select id="region" name="region" required>
          <option value="" disabled selected>시/도 선택</option>
          <option value="seoul">서울</option>
          <option value="busan">부산</option>
          <option value="daegu">대구</option>
          <option value="incheon">인천</option>
          <option value="gwangju">광주</option>
          <option value="daejeon">대전</option>
          <option value="ulsan">울산</option>
          <option value="sejong">세종</option>
          <option value="gyeonggi">경기도</option>
          <option value="gangwon">강원도</option>
          <option value="chungbuk">충청북도</option>
          <option value="chungnam">충청남도</option>
          <option value="jeonbuk">전라북도</option>
          <option value="jeonnam">전라남도</option>
          <option value="gyeongbuk">경상북도</option>
          <option value="gyeongnam">경상남도</option>
          <option value="jeju">제주특별자치도</option>
        </select>

        <div class="checkbox">
          <label>옵션:</label>
          <input type="checkbox" id="parking" name="parking">
          <label for="parking">주차</label>

          <input type="checkbox" id="transaction-location" name="transaction-location">
          <label for="transaction-location">거래 위치</label>

          <input type="checkbox" id="within-30m" name="within-30m">
          <label for="within-30m">30미터 이내</label>
        </div>

        <div class="checkbox">
          <input type="checkbox" id="age-check" name="age-check" required>
          <label for="age-check">만 19세 이상입니다 (필수)</label>
        </div>

        <div class="checkbox">
          <input type="checkbox" id="terms-check" name="terms-check" required>
          <label for="terms-check">개인정보 수집 및 이용 동의 (필수)</label>
        </div>

        <button type="submit">신청하기</button>
      </form>
    </div>
  </div>

  <footer>
    <p>고객센터 TEL 000-0000-0000</p>
    <p>BANK ACCOUNT 000은행 0000000000</p>
    <p>RETURN / EXCHANGE 서울특별시 강남구 테헤란로 000</p>
    <p>© 유카 주식회사 ALL RIGHTS RESERVED.</p>
  </footer>
</body>
</html>