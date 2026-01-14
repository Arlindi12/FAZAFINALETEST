<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// ===============================
// DATA (temporary static)
// ===============================
$slides = [
  ["image" => "Photo6.jpg", "caption" => ""],
  ["image" => "Photo2.jpg", "caption" => "Libri më i lexuar: Përtej Hijes"],
  ["image" => "Photo3.jpg", "caption" => ""],
  ["image" => "Photo4.jpg", "caption" => "Libri i javës: 1984"],
  ["image" => "Photo5.jpg", "caption" => ""]
];

$books = [
  ["title" => "Zonja Bovary", "category" => "romane", "description" => "Roman klasik nga Gustave Flaubert"],
  ["title" => "Përtej Hijes", "category" => "romane", "description" => "Roman modern i shumë lexuar"],
  ["title" => "Gjarpërinjtë dhe Gëzofi", "category" => "histori", "description" => "Historia e një qyteti të vjetër"],
  ["title" => "Fletë Magjike", "category" => "femije", "description" => "Libër për fëmijë me ilustrime"]
];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>BookNest | Home</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* ===========================
       NAVBAR STYLE
    ============================ */
    header {
      background: #2c3e50;
      padding: 10px 20px;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    /* Logo */
    .nav-logo h1 {
      margin: 0;
      color: white;
      font-size: 24px;
    }

    /* Right side */
    .nav-right {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .nav-links {
      display: flex;
      gap: 15px;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    .nav-links a:hover,
    .nav-links .active {
      color: #f1c40f;
    }

    .nav-user {
      display: flex;
      align-items: center;
      gap: 8px;
      color: white;
      font-size: 16px;
    }

    .nav-user .user-icon {
      width: 24px;
      height: 24px;
      background: url('images/user-icon.png') no-repeat center center;
      background-size: cover;
      border-radius: 50%;
    }

    .nav-user .username {
      display: inline-block;
    }

    .nav-user .logout-btn {
      color: white;
      background-color: #f44336;
      padding: 4px 10px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }

    .nav-user .logout-btn:hover {
      background-color: #d32f2f;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      .nav-right {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
      }

      .nav-links {
        flex-direction: column;
        gap: 5px;
      }

      .nav-user .username {
        display: none;
      }

      .nav-user .logout-btn {
        padding: 4px 6px;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="navbar">
    <!-- Logo left -->
    <div class="nav-logo">
      <h1>BookNest</h1>
    </div>

    <!-- Right side -->
    <div class="nav-right">
      <nav class="nav-links">
        <a href="index.php" class="active">Home</a>
        <a href="books.php">Librat</a>
        <a href="about.php">Rreth nesh</a>
        <a href="contact.php">Kontakt</a>
      </nav>

      <div class="nav-user">
        <div class="user-icon"></div>
        <span class="username"><?= htmlspecialchars($_SESSION["user_name"]) ?></span>
        <a href="logout.php" class="logout-btn">Logout</a>
      </div>
    </div>
  </div>
</header>

<!-- ===============================
     SLIDER
================================ -->
<section class="slider">
  <div class="slides">
    <?php foreach ($slides as $index => $slide): ?>
      <div class="slide <?= $index === 0 ? 'active' : '' ?>">
        <img src="images/<?= $slide['image'] ?>" alt="Slide">
        <?php if (!empty($slide['caption'])): ?>
          <div class="caption"><?= $slide['caption'] ?></div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
  <button id="prev">&lt;</button>
  <button id="next">&gt;</button>
</section>

<!-- ===============================
     SEARCH
================================ -->
<section class="book-search">
  <h2>Kërko Libër</h2>
  <input type="text" id="searchBook" placeholder="Shkruaj emrin e librit...">
</section>

<!-- ===============================
     CATEGORIES
================================ -->
<section class="book-categories">
  <button class="tab-btn active" data-category="romane">Romanë</button>
  <button class="tab-btn" data-category="histori">Historikë</button>
  <button class="tab-btn" data-category="femije">Fëmijë</button>
</section>

<!-- ===============================
     BOOK LIST
================================ -->
<section class="book-list" id="bookList">
  <?php foreach ($books as $book): ?>
    <div class="book" data-category="<?= $book['category'] ?>">
      <h3><?= $book['title'] ?></h3>
      <p class="info-hover"><?= $book['description'] ?></p>
    </div>
  <?php endforeach; ?>
</section>

<!-- ===============================
     FOOTER
================================ -->
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

<script src="js/script.js"></script>
<script>
document.getElementById("searchBook").addEventListener("input", function() {
  const query = this.value.toLowerCase();
  document.querySelectorAll(".book").forEach(book => {
    book.style.display = book.textContent.toLowerCase().includes(query) ? "block" : "none";
  });
});

document.querySelectorAll('.tab-btn').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.tab-btn').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');

    const category = tab.dataset.category;
    document.querySelectorAll('.book').forEach(book => {
      book.style.display =
        book.dataset.category === category ? "block" : "none";
    });
  });
});
</script>

</body>
</html>
