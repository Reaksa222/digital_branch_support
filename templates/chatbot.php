<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatbotv2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userMessage = $conn->real_escape_string($_POST['msg']);

$sql = "SELECT answer FROM view WHERE error = ? or question = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $userMessage, $userMessage);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = $row['answer'];
} else {
    $response = "We don't have answer for that question.Please contact by aviya";
}

$stmt->close();
$conn->close();

error_log("User Message: " . $userMessage);
error_log("Response: " . $response);

echo $response;
?>
