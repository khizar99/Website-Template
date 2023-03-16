<?php
session_start();

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
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['message'] = "Invalid email or password!";
        }
    } else {
        $_SESSION['message'] = "Invalid email or password!";
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

    <h1>Login</h1>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>




    
    



    <section>
    <div class="footer">
      <div class="col-1">
      <h3>Useful Links</h3>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Contact</a>
      <a href="#">Shop</a>
      </div>

      <div class="col-2">
      <h3>NewsLetter</h3>
      <form>
        <input type="email" placeholder="Your Email Address" required>
        <br>
        <button type="submit">SUBSCRIBE NOW</button>
      </form>
      </div>

      <div class="col-3">
        <h3>Contact</h3>
        <p>Huddersfield, West Yorkshire <br> United Kingdom  <br> Email us At : <br> U1975609@unimail.hud.ac.uk </p>
        <div class="social-icons">
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-behance"></i>
        </div>
        
      </div>
    </div>
    </section>

          
   
</body>
</html>

