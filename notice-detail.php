<?php
// 데이터베이스 연결
$host = 'localhost';
$dbname = 'ucar';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// 조회수 증가 및 게시글 상세 보기
$id = $_GET['id'] ?? null;

if ($id) {
    // 조회수 증가
    $updateStmt = $pdo->prepare("UPDATE notices SET views = views + 1 WHERE id = :id");
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $updateStmt->execute();

    // 게시글 데이터 가져오기
    $stmt = $pdo->prepare("SELECT * FROM notices WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $notice = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("잘못된 접근입니다.");
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($notice['title'] ?? '공지사항') ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* 헤더 */
        .header {
            background-color: #fff;
            border-bottom: 2px solid #ddd;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header img {
            width: 150px;
        }

        /* 본문 스타일 */
        .content-container {
            background-color: #fff;
            width: 70%;
            margin: 40px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #555;
            font-size: 1em;
            line-height: 1.6;
            margin: 10px 0;
        }

        hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        a {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
            text-align: center;
            margin-top: 20px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .info {
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="UCAR 로고">
    </div>

    <div class="content-container">
        <?php if ($notice): ?>
            <h1><?= htmlspecialchars($notice['title']) ?></h1>
            <p class="info">작성일: <?= htmlspecialchars(date('Y-m-d H:i', strtotime($notice['created_at']))) ?></p>
            <p class="info">조회수: <?= htmlspecialchars($notice['views']) ?></p>
            <hr>
            <p><?= nl2br(htmlspecialchars($notice['content'])) ?></p>
        <?php else: ?>
            <p>존재하지 않는 게시글입니다.</p>
        <?php endif; ?>

        <a href="gongzi.php">목록으로 돌아가기</a>
    </div>
</body>
</html>
