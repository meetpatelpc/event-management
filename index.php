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
    <img src="assets/images/venus1.avif" alt="Event 1">
    <img src="assets/images/venus2.avif" alt="Event 2">
    <img src="assets/images/event1.jpg" alt="Event 3">
    <img src="assets/images/event2.jpg" alt="Event 4">
    <img src="assets/images/services1.jpg" alt="Event 5">
    <img src="assets/images/services2.jpg" alt="Event 6">
    <img src="assets/images/venus3.avif" alt="Event 7">
    <img src="assets/images/event3.jpg" alt="Event 7">
    <img src="assets/images/venus4.jpg" alt="Event 7">
    <img src="assets/images/services3.jpg" alt="Event 7">
    
  </div>
  <div class="overlay"></div>
  <div class="hero-content">
    <h2>Crafting Memorable Experiences</h2>
    <p>From weddings to conferences, we make every event unforgettable.</p>
    <a href="register.php" class="btn">Get Started</a>
  </div>
</section>

<!-- Venues Section -->
<section id="venues" class="venues">
  <h2>Our Venues</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="scrollCards('venuesRow', -1)">&#10094;</button>
    <div class="card-row" id="venuesRow">
      <!-- Venue cards here -->
      <div class="card"><img src="assets/images/venus1.avif"><h3>Venue 1</h3><p>Premium halls...</p></div>
      <div class="card"><img src="assets/images/venus2.avif"><h3>Venue 2</h3><p>Custom menus...</p></div>
      <div class="card"><img src="assets/images/venus3.avif"><h3>Venue 3</h3><p>Banquet style...</p></div>
      <div class="card"><img src="assets/images/venus4.jpg"><h3>Venue 4</h3><p>Modern facilities...</p></div>
      <div class="card"><img src="assets/images/venus5.jpg"><h3>Venue 5</h3><p>Historic location...</p></div>
      <div class="card"><img src="assets/images/venus6.avif"><h3>Venue 6</h3><p>Outdoor spaces...</p></div>
      <div class="card"><img src="assets/images/venus7.avif"><h3>Venue 7</h3><p>Cozy atmosphere...</p></div>
      
      <!-- Add more venue cards -->
    </div>
    <button class="carousel-btn right" onclick="scrollCards('venuesRow', 1)">&#10095;</button>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="services">
  <h2>Our Services</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="scrollCards('servicesRow', -1)">&#10094;</button>
    <div class="card-row" id="servicesRow">
      <!-- Service cards here -->
      <div class="card"><img src="assets/images/services1.jpg"><h3>Service 1</h3><p>Decoration...</p></div>
      <div class="card"><img src="assets/images/services2.jpg"><h3>Service 2</h3><p>Photography...</p></div>
      <div class="card"><img src="assets/images/services3.jpg"><h3>Service 3</h3><p>Music...</p></div>
      <div class="card"><img src="assets/images/services4.jpg"><h3>Service 4</h3><p>Music...</p></div>
      <div class="card"><img src="assets/images/services5.jpg"><h3>Service 5</h3><p>Music...</p></div>
      <div class="card"><img src="assets/images/services6.jpg"><h3>Service 6 </h3><p>Music...</p></div>
      <div class="card"><img src="assets/images/servies7.jpg"><h3>Service 7</h3><p>Music...</p></div>
      
      <!-- Add more service cards -->
    </div>
    <button class="carousel-btn right" onclick="scrollCards('servicesRow', 1)">&#10095;</button>
  </div>
</section>

<!-- Events Gallery -->
<section id="events" class="events">
  <h2>Our Event Gallery</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="scrollCards('eventsRow', -1)">&#10094;</button>
    <div class="card-row" id="eventsRow">
      <!-- Event cards here -->
      <div class="card"><img src="assets/images/event1.jpg"><h3>Event 1</h3><p>Wedding celebration...</p></div>
      <div class="card"><img src="assets/images/event2.jpg"><h3>Event 2</h3><p>Corporate conference...</p></div>
      <div class="card"><img src="assets/images/event3.jpg"><h3>Event 3</h3><p>Birthday party...</p></div>
      <div class="card"><img src="assets/images/event4.jpg"><h3>Event 4</h3><p>Corporate retreat...</p></div>
      <div class="card"><img src="assets/images/event5.jpg"><h3>Event 5</h3><p>Product launch...</p></div>
     
      <!-- Add more event cards -->
    </div>
    <button class="carousel-btn right" onclick="scrollCards('eventsRow', 1)">&#10095;</button>
  </div>
</section>

<footer class="footer">
  <p>&copy; <?= date("Y"); ?> Evently. All rights reserved.</p>
</footer>

<!-- ✅ JavaScript -->
<script>
function scrollCards(rowId, direction) {
  const row = document.getElementById(rowId);
  if (!row) return;

  const card = row.querySelector('.card');
  if (!card) return;

  const cardWidth = card.offsetWidth + 25; // card width + gap
  row.scrollBy({ left: direction * cardWidth, behavior: 'smooth' });
}
</script>

</body>
</html>
