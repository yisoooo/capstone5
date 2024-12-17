<?php
session_start();
require_once("db.php"); // 데이터베이스 연결 파일 포함

// POST 데이터 처리
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 입력값 받기 및 유효성 검사
    $manufacturer = trim($_POST['manufacturer']);
    $model = trim($_POST['model']);
    $year = intval($_POST['year']);
    $mileage = intval($_POST['mileage']);
    $price = intval($_POST['price']);
    $seller_name = trim($_POST['seller-name']);
    $contact = trim($_POST['contact']);

    // 필수 필드 확인
    if (empty($manufacturer) || empty($model) || empty($year) || empty($mileage) || empty($price) || empty($seller_name) || empty($contact)) {
        die("모든 필수 항목을 입력해주세요.");
    }

    // 개인정보 동의 확인
    if (!isset($_POST['personal-agreement'])) {
        die("개인정보 수집 및 이용에 동의해야 등록이 가능합니다.");
    }

    // SQL 데이터베이스에 삽입
    $sql = "INSERT INTO car_sales (manufacturer, model, year, mileage, price, seller_name, contact, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL 준비 중 오류 발생: " . $conn->error);
    }

    $stmt->bind_param("ssiiiss", $manufacturer, $model, $year, $mileage, $price, $seller_name, $contact);

    if ($stmt->execute()) {
        // 성공 시 다음 페이지로 이동
        echo "<script>alert('차량 등록이 완료되었습니다!'); window.location.href = 'sellcar2.php';</script>";
        exit();
    } else {
        die("등록 실패: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UCAR 차량 판매 등록</title>
  <style>
    /* 동일한 CSS 스타일 */
    body { margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f9fa; color: #333; }
    a { text-decoration: none; color: inherit; }
    header { background-color: #00bfffc4; color: #fff; text-align: center; padding: 15px; font-size: 1.8em; font-weight: bold; }
    .container { width: 90%; max-width: 600px; margin: 30px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
    h2 { text-align: center; color: #00bfffc4; margin-bottom: 20px; }
    form { display: flex; flex-direction: column; }
    label { margin-bottom: 5px; font-weight: bold; }
    input, select, textarea { margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em; }
    button { background-color: #00bfffc4; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1em; font-weight: bold; transition: background-color 0.3s; }
    button:hover { background-color: #0099dd; }
    .checkbox-group { margin-bottom: 15px; }
    footer { background-color: #f9f9f9; padding: 20px; text-align: center; font-size: 14px; color: #777; border-top: 1px solid #ccc; }
  </style>
</head>
<body>

  <!-- 헤더 -->
  <header>
    Ucar 차량 판매 등록
  </header>

  <!-- 메인 컨테이너 -->
  <div class="container">
    <h2>판매할 차량 정보를 입력하세요</h2>
    <form method="POST" action="sell_car.php">
      <label for="manufacturer">제조사</label>
      <select id="manufacturer" name="manufacturer" required>
        <option value="">선택</option>
        <option value="현대">현대</option>
        <option value="기아">기아</option>
        <option value="BMW">BMW</option>
      </select>

      <label for="model">모델</label>
      <input type="text" id="model" name="model" placeholder="예: 소나타, A6" required>

      <label for="year">연식</label>
      <input type="number" id="year" name="year" placeholder="예: 2022" min="1900" max="2024" required>

      <label for="mileage">주행거리 (km)</label>
      <input type="number" id="mileage" name="mileage" placeholder="예: 50000" required>

      <label for="price">판매 가격 (만원)</label>
      <input type="number" id="price" name="price" placeholder="예: 1500" required>

      <label for="seller-name">이름</label>
      <input type="text" id="seller-name" name="seller-name" placeholder="이름을 입력하세요" required>

      <label for="contact">연락처</label>
      <input type="tel" id="contact" name="contact" placeholder="예: 010-1234-5678" required>

      <div class="checkbox-group">
        <label>
          <input type="checkbox" id="personal-agreement" name="personal-agreement" required>
          필수: 개인정보 수집 및 이용에 동의합니다.
        </label>
      </div>

      <button type="submit">차량 등록하기</button>
    </form>
  </div>

  <!-- 푸터 -->
  <footer>
    <div>COPYRIGHT © 유카 주식회사 ALL RIGHTS RESERVED.</div>
  </footer>

</body>
</html>
