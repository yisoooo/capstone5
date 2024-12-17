<?php
require_once("db.php"); // 데이터베이스 연결 파일 포함

if (isset($_GET['car_id'])) {
    $car_id = intval($_GET['car_id']);

    // 데이터베이스에서 해당 차량 정보 조회
    $sql = "SELECT * FROM car_sales WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
    } else {
        echo "차량 정보를 찾을 수 없습니다.";
        exit;
    }

    $stmt->close();
} else {
    echo "차량 ID가 없습니다.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UCAR 차량 등록 완료</title>
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

    /* 헤더 */
    header {
      background-color: #00bfffc4;
      color: #fff;
      text-align: center;
      padding: 15px;
      font-size: 1.8em;
      font-weight: bold;
    }

    /* 메인 콘텐츠 */
    .container {
      width: 90%;
      max-width: 600px;
      margin: 30px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    h2 {
      text-align: center;
      color: #00bfffc4;
      margin-bottom: 20px;
    }

    .car-info {
      margin-bottom: 20px;
    }

    .car-info p {
      font-size: 1.1em;
      margin: 10px 0;
    }

    .car-image {
      text-align: center;
      margin-bottom: 20px;
    }

    .car-image img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* 버튼 스타일 */
    .buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
    }

    button {
      background-color: #00bfffc4;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1em;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #00bfffc4;
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

  <!-- 헤더 -->
  <header>
    차량 등록 완료
  </header>

  <!-- 메인 컨테이너 -->
  <div class="container">
    <h2>차량이 성공적으로 등록되었습니다!</h2>

    <!-- 차량 이미지 표시 -->
    <div class="car-image">
      <?php if (isset($car['image_path']) && $car['image_path']): ?>
        <img src="<?php echo $car['image_path']; ?>" alt="등록된 차량 이미지">
      <?php else: ?>
        <img src="https://via.placeholder.com/400x300" alt="등록된 차량 이미지">
      <?php endif; ?>
    </div>

    <!-- 차량 정보 -->
    <div class="car-info">
      <p><strong>제조사:</strong> <?php echo htmlspecialchars($car['manufacturer']); ?></p>
      <p><strong>모델:</strong> <?php echo htmlspecialchars($car['model']); ?></p>
      <p><strong>연식:</strong> <?php echo htmlspecialchars($car['year']); ?></p>
      <p><strong>주행거리:</strong> <?php echo number_format($car['mileage']); ?> km</p>
      <p><strong>판매 가격:</strong> <?php echo number_format($car['price']); ?> 만원</p>
      <p><strong>설명:</strong> <?php echo htmlspecialchars($car['car_description']); ?></p>
      <p><strong>판매자:</strong> <?php echo htmlspecialchars($car['seller_name']); ?></p>
      <p><strong>연락처:</strong> <?php echo htmlspecialchars($car['contact']); ?></p>
    </div>

    <!-- 주요 옵션 표시 (HTML에서 자바스크립트로 처리) -->
    <div class="car-options">
      <p><strong>주요 옵션:</strong></p>
      <ul id="options-list"></ul>
    </div>

    <script>
      // PHP에서 전달한 옵션을 HTML로 출력
      const options = "<?php echo htmlspecialchars($car['options']); ?>";
      const optionsArray = options ? options.split(', ') : [];
      const optionsList = document.getElementById('options-list');

      optionsArray.forEach(option => {
        const li = document.createElement('li');
        li.textContent = option;
        optionsList.appendChild(li);
      });
    </script>

    <!-- 버튼 -->
    <div class="buttons">
      <button onclick="window.location.href='index.php'">메인으로 돌아가기</button>
      <button onclick="window.location.href='sell_car.php'">다른 차량 등록</button>
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
