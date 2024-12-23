<?php
session_start();
include 'config.php'; // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // 's' indicates that the parameter is a string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the entered password with the hashed password in the database
        if (password_verify($password, $user['password'])) {
            // Password is correct, start the session
            $_SESSION['user'] = $user['id']; // Store the user ID
            $_SESSION['username'] = $user['username']; // Store the username from the user record
            // Set a session variable to show the alert
            // $_SESSION['login_success'] = "Selamat datang, " . $_SESSION['username'] . "! Anda telah berhasil login."; // Comment this line
            header("Location: index.php"); // Redirect to index.php
            exit();
        } else {
            echo "<script>alert('Password salah');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }

    $stmt->close(); // Close the statement
    $conn->close(); // Close the database connection
}

// Add this block to handle the alert after login
if (isset($_SESSION['login_success'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('alertMessage').innerText = 'Selamat datang, " . $_SESSION['username'] . "! Anda telah berhasil login.';
            document.getElementById('alertModal').style.display = 'block';
        });
    </script>";
    unset($_SESSION['login_success']); // Unset the session variable after displaying
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <form action="login.php" method="POST" class="form">
      <h2>Login</h2>
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
      <button type="submit">Login</button>
      <p>Don't have an account? <a href="register.php">Register here</a></p>
    </form>
  </div>

  <!-- Alert Modal -->
  <div id="alertModal" class="alert-modal" style="display:none;">
    <div class="alert-content">
      <span class="close-alert" onclick="closeAlert()">&times;</span>
      <p id="alertMessage"></p>
    </div>
  </div>

  <script src="script.js"></script>
  <script>
    // Check if the session variable is set and show the alert
    <?php if (isset($_SESSION['login_success'])): ?>
        document.getElementById('alertMessage').innerText = "<?php echo $_SESSION['login_success']; ?>";
        document.getElementById('alertModal').style.display = 'block';
        <?php unset($_SESSION['login_success']); // Unset the session variable after displaying ?>
    <?php endif; ?>

    function closeAlert() {
      document.getElementById('alertModal').style.display = 'none';
    }
  </script>
</body>
</html>