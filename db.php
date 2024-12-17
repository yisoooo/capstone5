<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ucar";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

// 오류를 로그 파일에 기록하는 함수
function log_error($message) {
    error_log($message, 3, '/path/to/error.log');  // 로그 파일에 기록 (파일 경로 수정 필요)
}

// 데이터 조회 함수
function db_select($query, $param = array()){
    global $conn;
    $stmt = $conn->prepare($query);
    if ($param) {
        $types = ''; // 동적으로 타입을 생성
        foreach ($param as $value) {
            if (is_int($value)) {
                $types .= 'i'; // 정수형
            } elseif (is_double($value)) {
                $types .= 'd'; // 실수형
            } elseif (is_string($value)) {
                $types .= 's'; // 문자열
            } else {
                $types .= 'b'; // 기타 (블롭 데이터 처리)
            }
        }
        $stmt->bind_param($types, ...$param);
    }
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        log_error("DB Select Error: " . $stmt->error);
        return false;  // 실패 시 false 반환
    }
    $stmt->close();
    return $data;
}

// 데이터 삽입 함수
function db_insert($query, $param = array()){
    global $conn;
    $stmt = $conn->prepare($query);
    if ($param) {
        $types = ''; // 동적으로 타입을 생성
        foreach ($param as $value) {
            if (is_int($value)) {
                $types .= 'i'; // 정수형
            } elseif (is_double($value)) {
                $types .= 'd'; // 실수형
            } elseif (is_string($value)) {
                $types .= 's'; // 문자열
            } else {
                $types .= 'b'; // 기타 (블롭 데이터 처리)
            }
        }
        $stmt->bind_param($types, ...$param);
    }
    $result = $stmt->execute();
    $last_id = $conn->insert_id;
    $stmt->close();
    return $result ? $last_id : false;
}

// 데이터 업데이트 및 삭제 함수
function db_update_delete($query, $param = array()){
    global $conn;
    $stmt = $conn->prepare($query);
    if ($param) {
        $types = ''; // 동적으로 타입을 생성
        foreach ($param as $value) {
            if (is_int($value)) {
                $types .= 'i'; // 정수형
            } elseif (is_double($value)) {
                $types .= 'd'; // 실수형
            } elseif (is_string($value)) {
                $types .= 's'; // 문자열
            } else {
                $types .= 'b'; // 기타 (블롭 데이터 처리)
            }
        }
        $stmt->bind_param($types, ...$param);
    }
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
?>
