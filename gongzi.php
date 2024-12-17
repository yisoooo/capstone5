<?php
require_once("db.php");  // db.php를 포함시켜서 연결된 $conn을 사용

// 예시: 공지사항 데이터를 가져오는 쿼리
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;  // 한 페이지에 보여줄 공지사항 개수
$offset = ($page - 1) * $limit;  // 페이지에 맞게 오프셋 설정

// 공지사항을 가져오는 쿼리
$query = "SELECT * FROM notices ORDER BY created_at DESC LIMIT ?, ?";
$notices = db_select($query, array($offset, $limit));

// 공지사항의 총 개수 (페이징용)
$countQuery = "SELECT COUNT(*) as total FROM notices";
$totalNoticesResult = db_select($countQuery);
$totalNotices = $totalNoticesResult[0]['total'];  // 총 공지사항 개수

// 페이지 계산
$totalPages = ceil($totalNotices / $limit);

// 이후 HTML 코드와 동일
?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>공지사항</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    /* 상단 네비게이션 바 */
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

    /* 메인 헤더 */
    header {
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

    /* 공지사항 영역 스타일 */
    .notice-section {
      width: 80%;
      margin: 30px auto;
      font-family: Arial, sans-serif;
      color: #333;
    }

    .notice-section h1 {
      font-size: 1.5em;
      margin-bottom: 20px;
    }

    .notice-section .total-count {
      font-size: 0.9em;
      margin-bottom: 10px;
      color: #777;
    }

    .notice-table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
    }

    .notice-table th, .notice-table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      font-size: 0.9em;
    }

    .notice-table th {
      background-color: #f6f6f6;
      font-weight: bold;
    }

    .notice-table tr:nth-child(odd) {
      background-color: #fcfcfc;
    }

    .notice-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .notice-table .badge {
      background-color: #ddd;
      border-radius: 4px;
      padding: 2px 6px;
      font-size: 0.8em;
      color: #555;
    }

    .notice-table .badge.notice {
      background-color: #007bff;
      color: #fff;
    }

    /* 페이징 스타일 */
    .pagination {
      margin-top: 20px;
      text-align: center;
    }

    .pagination a {
      text-decoration: none;
      margin: 0 5px;
      color: #007bff;
      font-weight: bold;
    }

    .pagination a:hover {
      text-decoration: underline;
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
      margin-top: auto;
    }

    footer div {
      margin-bottom: 5px;
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
            <a href="login1.php">내차팔기</a>
            <a href="buycar.php">내차사기</a>
            <a href="rentcar.php">렌트</a>
            <a href="finance.php">금융</a>
            <a href="media.php">미디어</a>
        </nav>
    </header>

    <!-- 공지사항 영역 -->
    <section class="notice-section">
        <h1>공지사항</h1>
        <div style="text-align: right; margin-bottom: 10px;">
            <a href="write.php" style="
                display: inline-block;
                padding: 8px 12px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
            ">작성하기</a>
        </div>

        <div class="total-count">총 <?= htmlspecialchars($totalNotices) ?> 건</div>
        <table class="notice-table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>등록일</th>
                    <th>조회수</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($notices)): ?>
                    <tr>
                        <td colspan="4">공지사항이 없습니다.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($notices as $notice): ?>
                        <tr style="<?= $notice['is_notice'] ? 'font-weight:bold; background-color:#f0f8ff;' : '' ?>">
                            <td>
                                <?php if ($notice['is_notice']): ?>
                                    <span class="badge notice">공지</span>
                                <?php else: ?>
                                    <?= htmlspecialchars($notice['id']) ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="notice-detail.php?id=<?= htmlspecialchars($notice['id']) ?>">
                                    <?= htmlspecialchars($notice['title']) ?>
                                </a>
                            </td>
                            <td><?= htmlspecialchars(date('Y/m/d', strtotime($notice['created_at']))) ?></td>
                            <td><?= htmlspecialchars($notice['views']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- 페이지네이션 -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" <?= $i === $page ? 'style="font-weight:bold; color:red;"' : '' ?>>
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    </section>

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
