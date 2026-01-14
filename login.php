<?php
session_start();
$conn = new mysqli("localhost", "root", "", "libraria");
if ($conn->connect_error) die("DB error");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $pass = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($pass, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            header("Location: index.php");
            exit;
        }
    }
    $error = "Email ose fjalëkalim i gabuar.";
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>Login | BookNest</title>
  <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<div class="auth-container">
  <div class="auth-card">
    <h2>Hyrja në BookNest</h2>

    <?php if($error): ?><p class="error"><?= $error ?></p><?php endif; ?>

    <form method="POST">
      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <button type="submit">Login</button>

      <div class="link">
        Nuk ke llogari? <a href="register.php">Regjistrohu këtu</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>
