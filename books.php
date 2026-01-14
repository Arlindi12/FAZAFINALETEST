<?php
// ===============================
// DATA PËR MOMENTIN STATIKE
// Më vonë mund të lidhet me DB
// ===============================
$books = [
    ["title" => "Zonja Bovary", "slug" => "zonja-bovary"],
    ["title" => "Përtej Hijes", "slug" => "pertej-hijes"],
    ["title" => "Gjarpërinjtë dhe Gëzofi", "slug" => "gjarperinjte"],
    ["title" => "1984", "slug" => "1984"],
    ["title" => "Brave New World", "slug" => "brave-new-world"],
    ["title" => "Hamleti", "slug" => "hamleti"],
    ["title" => "Makbethi", "slug" => "makbethi"],
    ["title" => "Othello", "slug" => "othello"],
    ["title" => "Uliksi", "slug" => "uliksi"],
    ["title" => "Fleta e Bardhë", "slug" => "fleta-e-bardhe"],
    ["title" => "Don Kihoti", "slug" => "don-kihoti"],
    ["title" => "Triumfi i Jetës", "slug" => "triumfi-i-jetes"],
    ["title" => "Kronika e një Vdekjeje të Parapara", "slug" => "kronika-e-nje-vdekjeje"],
    ["title" => "Përtej Realitetit", "slug" => "pertej-realitetit"],
    ["title" => "Kapitulli i Parë", "slug" => "kapitulli-i-pare"],
    ["title" => "Labirinti i Mendjes", "slug" => "labirinti-i-mendjes"],
    ["title" => "Tregime të Shkurtra", "slug" => "tregime-te-shkurtra"],
    ["title" => "Shpirti i Librave", "slug" => "shpirti-i-librave"],
    ["title" => "Horizontet e Reja", "slug" => "horizontet-e-reja"],
    ["title" => "Gjurmët e Kohës", "slug" => "gjurmet-e-kohes"]
];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>BookNest | Librat</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
  <h1>BookNest</h1>
  <nav>
    <a href="index.php">Home</a>
    <a href="books.php" class="active">Librat</a>
    <a href="about.php">Rreth nesh</a>
    <a href="contact.php">Kontakt</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<section>
  <h2>Librat Tanë</h2>
  <div class="book-list">
    <?php foreach($books as $book): ?>
        <div class="book">
            <h3><?php echo $book['title']; ?></h3>
            <a href="book-details.php?book=<?php echo $book['slug']; ?>">Shiko detajet</a>
        </div>
    <?php endforeach; ?>
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
    <p>&copy; <?php echo date("Y"); ?> BookNest Library | Të gjitha të drejtat e rezervuara</p>
  </div>
</footer>

</body>
</html>
