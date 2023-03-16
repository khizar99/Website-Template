<?php
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'mental_health');

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email already exists
    $email_check = $conn->prepare("SELECT email FROM users WHERE email=?");
    $email_check->bind_param("s", $email);
    $email_check->execute();
    $email_check->store_result();

    if ($email_check->num_rows > 0) {
        $_SESSION['message'] = "Email is already taken. Please use a different email address.";
        $email_check->close();
    } else {
        $email_check->close();

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        $result = $stmt->execute();

        if ($result) {
            $_SESSION['message'] = "Registration successful!";
            $stmt->close();
            $conn->close();
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['message'] = "Error: " . $stmt->error;
            $stmt->close();
            $conn->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>SaltHealth</title>
</head>
<body>
    <header>

        <a href="index.html" class="logo">Salt Health</a>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="Understanding Mental Health.html">Understanding Mental Health</a></li>
            <li><a href="#">Treatment and Support</a></li>
            <li><a href="Coping Strategies.html">Self-Care and Coping</a></li>
            <li><a href="#">Resources</a></li>
            <li><a href="about.html">About Salt Health</a></li>
        </ul>
    </header>
    <section>
        <img src="banner.png" id="mainimage">
        <h2 id="text">Dashboard</h2>
    </section>

    <h1>Register</h1>


<?php if (isset($_SESSION['message'])): ?>
    <div class="error-message">
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<form action="register.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit" name="register">Register</button>
</form>  
   
</body>
</html>