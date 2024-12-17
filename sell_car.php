<?php
session_start();
require_once("db.php"); // 데이터베이스 연결 파일 포함

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 입력값 받기 및 유효성 검사
    $manufacturer = trim($_POST['manufacturer']);
    $model = trim($_POST['model']);
    $year = intval($_POST['year']);
    $mileage = intval($_POST['mileage']);
    $price = intval($_POST['price']);
    $seller_name = trim($_POST['seller-name']);
    $contact = trim($_POST['contact']);
    $car_description = trim($_POST['car-description']);
    $options = isset($_POST['options']) ? implode(", ", $_POST['options']) : "";

    // 이미지 처리
    if (!empty($_FILES['car-image']['name'])) {
        $image_name = $_FILES['car-image']['name'];
        $image_tmp = $_FILES['car-image']['tmp_name'];
        $upload_dir = "uploads/";
        $image_path = $upload_dir . basename($image_name);

        // 업로드 디렉토리가 없으면 생성
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // 파일 업로드
        if (!move_uploaded_file($image_tmp, $image_path)) {
            die("이미지 업로드 실패!");
        }
    } else {
        $image_path = null;
    }

    // 필수 필드 확인
    if (empty($manufacturer) || empty($model) || empty($year) || empty($mileage) || empty($price) || empty($seller_name) || empty($contact)) {
        die("모든 필수 항목을 입력해주세요.");
    }

    if (!isset($_POST['personal-agreement'])) {
        die("개인정보 수집 및 이용에 동의해야 등록이 가능합니다.");
    }

    // SQL 데이터베이스에 삽입
    $sql = "INSERT INTO car_sales (manufacturer, model, year, mileage, price, seller_name, contact, car_description, image_path, options, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL 준비 중 오류 발생: " . $conn->error);
    }

    $stmt->bind_param("ssiiisssss", $manufacturer, $model, $year, $mileage, $price, $seller_name, $contact, $car_description, $image_path, $options);

    if ($stmt->execute()) {
        // 차량 ID를 가져옵니다
        $last_id = $conn->insert_id;

        // 차량 등록이 성공한 후, 해당 차량의 ID를 포함한 페이지로 리다이렉트
        echo "<script>alert('차량 등록이 완료되었습니다!'); window.location.href = 'sellcar2.php?car_id=" . $last_id . "';</script>";
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
    body { margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f9fa; color: #333; }
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
    <form method="POST" action="sell_car.php" enctype="multipart/form-data">
      <label for="manufacturer">제조사</label>
      <input type="text" id="manufacturer" name="manufacturer" placeholder="예: 현대, 기아" required>

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

      <label for="car-description">차량 상세 설명</label>
      <textarea id="car-description" name="car-description" rows="5" placeholder="차량 상태, 특이사항 등을 작성하세요"></textarea>

      <label for="car-image">차량 이미지 업로드</label>
      <input type="file" id="car-image" name="car-image" accept="image/*">

      <label>주요 옵션</label>
      <div class="checkbox-group">
        <label><input type="checkbox" name="options[]" value="스마트 키"> 스마트 키</label><br>
        <label><input type="checkbox" name="options[]" value="네비게이션"> 네비게이션</label><br>
        <label><input type="checkbox" name="options[]" value="후방 카메라"> 후방 카메라</label><br>
        <label><input type="checkbox" name="options[]" value="열선 시트"> 열선 시트</label><br>
        <label><input type="checkbox" name="options[]" value="통풍 시트"> 통풍 시트</label><br>
        <label><input type="checkbox" name="options[]" value="크루즈 컨트롤"> 크루즈 컨트롤</label><br>
      </div>

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
