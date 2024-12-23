<?php
include 'config.php'; // Include the database configuration file

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    // Execute the statement and check for errors
    if ($stmt->execute() === true) {
        echo "<script>alert('Pendaftaran berhasil! Selamat datang, " . $username . "!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
    $conn->close(); // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div class="register-container">
   <h2>Register</h2>
   <form action="register.php" method="POST" class="form">
       <div class="form-group">
           <label for="username">Username:</label>
           <input type="text" id="username" name="username" required>
       </div>
       <div class="form-group">
           <label for="email">Email:</label>
           <input type="email" id="email" name="email" required>
       </div>
       <div class="form-group">
           <label for="password">Password:</label>
           <input type="password" id="password" name="password" required>
       </div>
       <button type="submit">Register</button>
       <p>Already have an account? <a href="login.php">Login here</a></p>
   </form>
</div>
  </div>
</body>
</html>