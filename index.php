<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Evently - Event Management</title>
  <link rel="stylesheet" href="assets/css/landing.css">
</head>
<body>

<header class="header">
  <h1>Evently</h1>
  <nav>
    <a href="#home">Home</a>
    <a href="#venues">Venues</a>
    <a href="#services">Services</a>
    <a href="#events">Events</a>
    <a href="pages/login.php">Login</a>
    <a href="pages/register.php">Register</a>
  </nav>
</header>

<!-- Hero Section -->
<section id="home" class="hero">
  <div class="hero-slideshow">
    <img src="assets/images/im1.png" alt="Event 1">
    <img src="assets/images/im2.png" alt="Event 2">
    <img src="assets/images/im3.png" alt="Event 3">
    <img src="assets/images/im4.png" alt="Event 4">
    <img src="assets/images/im5.png" alt="Event 5">
    <img src="assets/images/im6.png" alt="Event 6">
    <img src="assets/images/im7.png" alt="Event 7">
  </div>
  <div class="overlay"></div>
  <div class="hero-content">
    <h2>Crafting Memorable Experiences</h2>
    <p>From weddings to conferences, we make every event unforgettable.</p>
    <a href="register.php" class="btn">Get Started</a>
  </div>
</section>

<!-- Services Section -->
<section id="venues" class="venues">
  <h2>Our Venues</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="scrollCards(-1)">&#10094;</button>

    <div class="card-row" id="cardRow">
      <div class="card">
        <img src="assets/images/im1.png" alt="Venue 1">
        <h3>Venue 1</h3>
        <p>Choose from premium halls, outdoor spaces, and conference rooms.</p>
      </div>
      <div class="card">
        <img src="assets/images/im2.png" alt="Venue 2">
        <h3>Venue 2</h3>
        <p>Custom menus for every occasion — veg, non‑veg, buffet, or mixed.</p>
      </div>
      <div class="card">
        <img src="assets/images/im3.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
      </div>
    <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Venue 4</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Venue 5</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Venue 6</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
      </div>
      <div class="card">
        <img src="assets/images/im6.png" alt="Venue 3">
        <h3>Venue 7</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
      </div>
      <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Venue 8</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
      </div>
      <!-- Add more cards as needed -->
    </div>
    <button class="carousel-btn right" onclick="scrollCards(1)">&#10095;</button>
  </div>
</section>


<section id="services" class="services">
  <h2>Our Services</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="scrollCards(-1)">&#10094;</button>
    <div class="card-row" id="cardRow">  
      <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Services 1</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Services 2</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Services 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im6.png" alt="Venue 3">
        <h3>Services 4</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Secvices 5</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <!-- Add more cards as needed -->
    </div>
</div>
    <button class="carousel-btn right" onclick="scrollCards(1)">&#10095;</button>
  </div>
</section>

<section id="venues" class="venues">
  <h2>Our Venues</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="scrollCards(-1)">&#10094;</button>

    <div class="card-row" id="cardRow">
      <div class="card">
        <img src="assets/images/im1.png" alt="Venue 1">
        <h3>Venue 1</h3>
        <p>Choose from premium halls, outdoor spaces, and conference rooms.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">Explore Venues</a>
      </div>

      <div class="card">
        <img src="assets/images/im2.png" alt="Venue 2">
        <h3>Venue 2</h3>
        <p>Custom menus for every occasion — veg, non‑veg, buffet, or mixed.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">View Menus</a>
      </div>

      <div class="card">
        <img src="assets/images/im3.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
    <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im6.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <!-- Add more cards as needed -->
    </div>

    <button class="carousel-btn right" onclick="scrollCards(1)">&#10095;</button>
  </div>
</section>


<!-- Events Gallery -->
<section id="venues" class="venues">
  <h2>Our Venues</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="scrollCards(-1)">&#10094;</button>

    <div class="card-row" id="cardRow">
      <div class="card">
        <img src="assets/images/im1.png" alt="Venue 1">
        <h3>Venue 1</h3>
        <p>Choose from premium halls, outdoor spaces, and conference rooms.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">Explore Venues</a>
      </div>

      <div class="card">
        <img src="assets/images/im2.png" alt="Venue 2">
        <h3>Venue 2</h3>
        <p>Custom menus for every occasion — veg, non‑veg, buffet, or mixed.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">View Menus</a>
      </div>

      <div class="card">
        <img src="assets/images/im3.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
    <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im5.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im6.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <div class="card">
        <img src="assets/images/im4.png" alt="Venue 3">
        <h3>Venue 3</h3>
        <p>Banquet, theater, classroom, or round tables tailored to your event.</p>
        <a href="<?php echo $isLoggedIn ? 'dashboard.php' : 'login.php'; ?>" class="btn">See Options</a>
      </div>
      <!-- Add more cards as needed -->
    </div>

    <button class="carousel-btn right" onclick="scrollCards(1)">&#10095;</button>
  </div>
</section>


<footer class="footer">
  <p>&copy; <?= date("Y"); ?> Evently. All rights reserved.</p>
</footer>
<script>
function scrollCards(direction) {
  const row = document.getElementById('cardRow');
  const cardWidth = row.querySelector('.card').offsetWidth + 25; // card + gap
  row.scrollBy({ left: direction * cardWidth, behavior: 'smooth' });
}

</script>

</body>
</html>
