<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
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
    <title>SaltHealth</title>
</head>
<body>
    <header>

        <a href="index.html" class="logo">Salt Health</a>
        <ul>
        <li><a href="index.html" class=>Home</a></li>
            <li><a href="Understanding Mental Health.html">Understanding Mental Health</a></li>
            <li><a href="Coping Strategies.html">Self-Care and Coping</a></li>
            <li><a href="Resources.html">Resources</a></li>
            <li><a href="about.html">About Salt Health</a></li>
            <li><a href="login.php"><i class="fas fa-user"></i></a></li>
        </ul>
    </header>
    <section>
        <img src="banner.png" id="mainimage">
        <h2 id="text">User Dashboard</h2>
    </section>


    <section class="quiz-section">
  <h2>Quizzes</h2>
  <p>Our quizzes are designed to help you better understand your mental health and identify any potential issues. We recommend taking the quiz in a quiet place where you can focus and answer the questions honestly.</p>
  <div class="quiz-buttons">
    <a href="depression.html" class="quiz-button">Depression Quiz</a>
    <a href="anxiety.html" class="quiz-button">Anxiety Quiz</a>
    <a href="adhd.html" class="quiz-button">ADHD Quiz</a>
  </div>
</section>


<h2 style="text-align: center; padding-top: 20px; padding-bottom: 20px">Your Quiz Results</h2>

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
    <a href="logout.php" class="logout-btn">Logout</a>
</body>
</html>
