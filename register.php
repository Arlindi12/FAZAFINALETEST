<?php
$conn = new mysqli("localhost", "root", "", "libraria");
if ($conn->connect_error) die("DB error");

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $pass = $_POST["password"];

    if (strlen($name) < 3) {
        $error = "Emri duhet të ketë të paktën 3 karaktere.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email nuk është valid.";
    } elseif (strlen($pass) < 6) {
        $error = "Fjalëkalimi duhet të ketë minimum 6 karaktere.";
    } else {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed);

        if ($stmt->execute()) {
            $success = "Regjistrimi u krye me sukses!";
        } else {
            $error = "Ky email ekziston tashmë.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>Register | BookNest</title>
  <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<div class="auth-container">
  <div class="auth-card">
    <h2>Regjistrimi në BookNest</h2>

    <?php if($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
    <?php if($success): ?><p class="success"><?= $success ?></p><?php endif; ?>

    <form method="POST">
      <label>Emri:</label>
      <input type="text" name="name" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <button type="submit">Register</button>

      <div class="link">
        Ke llogari? <a href="login.php">Hyr këtu</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>
