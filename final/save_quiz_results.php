<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $quiz_type = $_POST['quiz_type'];
    $score = $_POST['score'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'mental_health');

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the quiz result into the database
    $stmt = $conn->prepare("INSERT INTO quiz_results (user_id, quiz_type, score) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $user_id, $quiz_type, $score);
    $result = $stmt->execute();

    if (!$result) {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
