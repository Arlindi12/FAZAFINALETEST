<?php
// ===============================
// DATA për momentin statike
// ===============================

// Ekipi (për momentin hard-coded, më vonë nga DB)
$team = [
    [
        "name" => "Anna Berisha",
        "role" => "Menaxhere Librarie",
        "image" => "Ekipi1.jpeg"
    ],
    [
        "name" => "Arlindi A",
        "role" => "Specialist Librash",
        "image" => "Ekipi2.avif"
    ],
    [
        "name" => "Elira Hoxha",
        "role" => "Marketing & Evente",
        "image" => "Ekipi3.avif"
    ]
];

// Galeria (slider)
$gallery = [
    "Photo1.jpg",
    "Photo2.jpg",
    "Photo3.jpg",
    "Photo4.jpg"
];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Rreth Nesh | BookNest</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===========================
           Rreth Nesh CSS
        =========================== */
        .about-intro, .about-history, .about-team, .about-gallery {
            width: 80%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            text-align: center;
        }

        .about-intro img.RrethNesh {
            width: 100%;
            max-width: 600px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        /* Ekipi */
        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .member {
            width: 200px;
            text-align: center;
        }

        .member img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Galeria */
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .gallery img {
            width: 250px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-intro, .about-history, .about-team, .about-gallery {
                width: 90%;
            }
            .member {
                width: 45%;
            }
            .gallery img {
                width: 45%;
                height: auto;
            }
        }

        @media (max-width: 480px) {
            .member, .gallery img {
                width: 100%;
            }
        }

        /* Slider për galeri */
        .slider-gallery {
            position: relative;
            max-width: 800px;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 10px;
        }

        .slides-gallery {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide-gallery {
            min-width: 100%;
            display: none;
        }

        .slide-gallery.active {
            display: block;
        }

        .slide-gallery img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        #prev-gallery, #next-gallery {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(44, 62, 80, 0.7);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
        }

        #prev-gallery { left: 10px; }
        #next-gallery { right: 10px; }

    </style>
</head>

<body>

<header>
    <h1>Libraria Online</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php" class="active">Rreth Nesh</a>
        <a href="books.php">Librat</a>
        <a href="contact.php">Kontakt</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<!-- Sekcioni intro me foto -->
<section class="about-intro">
    <img class="RrethNesh" src="images/Photo6.jpg" alt="Foto Libraria">
    <h2>Kush jemi ne?</h2>
    <p>
        Ne jemi një librari online që sjell librat më të mirë për ju.
        Synimi ynë është të ofrojmë një përvojë të paharrueshme për çdo lexues,
        duke siguruar qasje të lehtë në koleksionin tonë të librave.
    </p>
</section>

<!-- Historia e bibliotekës -->
<section class="about-history">
    <h2>Historia e Bibliotekës</h2>
    <p>
        Libraria jonë u themelua në vitin 2015 dhe që atëherë ka rritur koleksionin e saj
        duke përfshirë mbi 5000 tituj nga autorë të ndryshëm. Ne organizojmë evente leximi
        dhe klube për fëmijë dhe të rritur.
    </p>
</section>

<!-- Ekipi -->
<section class="about-team">
    <h2>Ekipi Ynë</h2>
    <div class="team-members">
        <?php foreach($team as $member): ?>
            <div class="member">
                <img src="images/<?php echo $member['image']; ?>" alt="Foto <?php echo $member['name']; ?>">
                <h3><?php echo $member['name']; ?></h3>
                <p><?php echo $member['role']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Galeria me slider -->
<section class="about-gallery">
    <h2>Galeria e Librarisë</h2>
    <div class="slider-gallery">
        <div class="slides-gallery">
            <?php foreach($gallery as $index => $img): ?>
                <div class="slide-gallery <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img src="images/<?php echo $img; ?>" alt="Foto <?php echo $index + 1; ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <button id="prev-gallery">&lt;</button>
        <button id="next-gallery">&gt;</button>
    </div>
</section>

<!-- Footer -->
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

<script src="js/script.js"></script>
</body>
</html>
