<?php
// ===============================
// LIDHJA ME DB
// ===============================
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "libraria";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

 //Merr slug nga URL
$slug = isset($_GET['book']) ? $conn->real_escape_string($_GET['book']) : '';

// Merr të dhënat e librit nga DB
$sql = "SELECT * FROM books WHERE slug='$slug' LIMIT 1";
$result = $conn->query($sql);

// Nëse libri nuk gjendet, merr librin e parë
if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
} else {
    $default = $conn->query("SELECT * FROM books LIMIT 1");
    $book = $default->fetch_assoc();
}

// Merr librat për navigim next / previous
$allBooks = $conn->query("SELECT slug FROM books ORDER BY id ASC");
$slugs = [];
while ($row = $allBooks->fetch_assoc()) {
    $slugs[] = $row['slug'];
}
$currentIndex = array_search($book['slug'], $slugs);
$prevSlug = $slugs[($currentIndex - 1 + count($slugs)) % count($slugs)];
$nextSlug = $slugs[($currentIndex + 1) % count($slugs)];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Detajet e librit | <?= htmlspecialchars($book['title']); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #bookDetails {
            max-width: 700px;
            margin: 30px auto;
            padding: 20px;
            background: #f8f8f8;
            border-radius: 10px;
            text-align: center;
        }
        #bookDetails img {
            width: 100%;
            max-width: 400px;
            margin: 0 auto 20px auto;
            border-radius: 5px;
        }
        #bookDetails h2 { margin-bottom: 10px; }
        #bookDetails p { font-size: 16px; margin: 5px 0; }
        #bookDetails button {
            margin: 10px 5px;
            padding: 10px 25px;
            background: #2c3e50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        #bookDetails button:hover { background: #34495e; }
    </style>
</head>
<body>

<header>
    <h1>BookNest</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">Rreth Nesh</a>
        <a href="books.php">Librat</a>
        <a href="contact.php">Kontakt</a>
    </nav>
</header>

<section id="bookDetails">
    <h2><?= htmlspecialchars($book['title']); ?> — Detajet</h2>
    <img src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
    <p><strong>Autori:</strong> <?= htmlspecialchars($book['author']); ?></p>
    <p><strong>Çmimi:</strong> <?= htmlspecialchars($book['price']); ?></p>
    <p><strong>Përshkrimi:</strong> <?= htmlspecialchars($book['description']); ?></p>
    <button onclick="alert('<?= addslashes($book['title']); ?> u shtua në karrocë!')">Shto në karrocë</button>
    <div>
        <a href="book-details.php?book=<?= $prevSlug; ?>"><button>Previous</button></a>
        <a href="book-details.php?book=<?= $nextSlug; ?>"><button>Next</button></a>
    </div>
</section>

<footer>
  <div class="footer-container">
    <div class="footer-column">
      <h3>Rreth Nesh</h3>
      <p>BookNest është libraria juaj online me librat më të mirë për çdo moshë.</p>
    </div>
    <div class="footer-column">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="books.php">Librat</a></li>
        <li><a href="about.php">Rreth Nesh</a></li>
        <li><a href="contact.php">Kontakt</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h3>Na ndiqni</h3>
      <p>
        <a href="#">Facebook</a> | 
        <a href="#">Instagram</a> | 
        <a href="#">Twitter</a>
      </p>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; <?= date("Y"); ?> BookNest Library | Të gjitha të drejtat e rezervuara</p>
  </div>
</footer>

</body>
</html>
