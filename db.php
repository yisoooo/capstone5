<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ucar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

function db_select($query, $param = array()){
    global $conn;
    $stmt = $conn->prepare($query);
    if ($param) {
        $types = str_repeat('s', count($param));
        $stmt->bind_param($types, ...$param);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $data;
}

function db_insert($query, $param = array()){
    global $conn;
    $stmt = $conn->prepare($query);
    if ($param) {
        $types = str_repeat('s', count($param));
        $stmt->bind_param($types, ...$param);
    }
    $result = $stmt->execute();
    $last_id = $conn->insert_id;
    $stmt->close();
    return $result ? $last_id : false;
}

function db_update_delete($query, $param = array()){
    global $conn;
    $stmt = $conn->prepare($query);
    if ($param) {
        $types = str_repeat('s', count($param));
        $stmt->bind_param($types, ...$param);
    }
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
?>
