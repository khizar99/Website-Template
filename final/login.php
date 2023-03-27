<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'mental_health');

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email exists and verify the password
    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Successful login
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $email;
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['message'] = "Invalid email or password!";
        }
    }
        $stmt->close();
        $conn->close();
        
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="registration.css">
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
        
    </section>

    <h1 id="registerid1">Login</h1>
    <div class="container">
        <?php if(isset($_SESSION['message'])): ?>
            <div class="error"><?php echo $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
        <div class="footer">
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
    </div>




    
    


          
   
</body>
</html>

