<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add your CSS file here -->
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'mental_health');

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the user's quiz results
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT quiz_type, score, timestamp FROM quiz_results WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($quiz_type, $score, $timestamp);
    ?>

    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <h2>Quizzes</h2>
    <ul>
        <li><a href="depression.html">Depression Quiz</a></li>
        <li><a href="anxiety.html">Anxiety Quiz</a></li>
        <li><a href="adhd.html">ADHD Quiz</a></li>
    </ul>

    <h2>Your Quiz Results</h2>
    <table>
        <thead>
            <tr>
                <th>Quiz Type</th>
                <th>Score</th>
                <th>Percentage</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($stmt->fetch()) {
                $percentage = ($score / 45) * 100; // Assuming each quiz has a maximum score of 45
                echo "<tr>";
                echo "<td>" . htmlspecialchars($quiz_type) . "</td>";
                echo "<td>" . htmlspecialchars($score) . "</td>";
                echo "<td>" . htmlspecialchars(number_format($percentage, 2)) . "%</td>";
                echo "<td>" . htmlspecialchars($timestamp) . "</td>";
                echo "</tr>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
