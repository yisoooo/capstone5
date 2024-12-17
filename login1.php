<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>마이페이지</title>
  <script>
    // 페이지 로드 시 alert를 띄우고 OK를 누르면 login.html로 이동
    function redirectToLogin() {
      alert("로그인을 해주세요");
      window.location.href = "login.php";
    }
  </script>
</head>
<body onload="redirectToLogin()">
</body>
</html>