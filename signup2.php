<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>가입 완료</title>
  <script>
    // 페이지 로드 시 alert를 띄우고 OK를 누르면 index.html로 이동
    function redirectToHome() {
      alert("가입이 완료되었습니다");
      window.location.href = "index.php";
    }
  </script>
</head>
<body onload="redirectToHome()">
</body>
</html>