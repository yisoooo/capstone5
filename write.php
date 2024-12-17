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

// 게시글 작성 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $is_notice = isset($_POST['is_notice']) ? 1 : 0;

    if (!empty($title) && !empty($content)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO notices (title, content, is_notice) VALUES (:title, :content, :is_notice)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':is_notice', $is_notice, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: gongzi.php");
            exit();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    } else {
        $error = "제목과 내용을 모두 입력해주세요.";
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>글 작성</title>
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

        .form-container {
            background-color: #fff;
            width: 50%;
            margin: 40px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        /* 폼 스타일 */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            background-color: #f7f7f7;
            outline: none;
        }

        textarea {
            resize: none;
        }

        input[type="checkbox"] {
            margin-bottom: 20px;
        }

        /* 버튼 스타일 */
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-btn {
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

        /* 에러 메시지 */
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- UCAR 로고 -->
    <div class="header">
        <img src="logo.png" alt="UCAR 로고">
    </div>

    <div class="form-container">
        <h1>글 작성</h1>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="POST" action="write.php">
            <label for="title">제목</label>
            <input type="text" id="title" name="title" placeholder="제목을 입력하세요" required>

            <label for="content">내용</label>
            <textarea id="content" name="content" rows="8" placeholder="내용을 입력하세요" required></textarea>

            <label>
                <input type="checkbox" name="is_notice" value="1"> 공지사항으로 설정
            </label>

            <div class="button-container">
                <button type="submit">작성 완료</button>
            </div>
        </form>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="gongzi.php" class="back-btn">돌아가기</a>
    </div>
</body>
</html>
