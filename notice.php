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

// 페이지네이션 관련 변수
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10; // 페이지당 공지사항 수
$offset = ($page - 1) * $limit;

// 공지사항 목록 가져오기
$stmt = $pdo->prepare("
    SELECT * 
    FROM notices 
    ORDER BY is_notice DESC, created_at DESC 
    LIMIT :limit OFFSET :offset
");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 전체 공지사항 수
$countStmt = $pdo->query("SELECT COUNT(*) FROM notices");
$totalNotices = $countStmt->fetchColumn();
$totalPages = ceil($totalNotices / $limit);

// PHP 변수를 HTML로 전달
include 'gongzi.php';
