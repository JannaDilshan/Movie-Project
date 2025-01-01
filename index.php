<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.">
  <meta name="keywords" content="Movie">
  <meta name="author" content="Janith Dilshan">

  <link rel="stylesheet" href="./css/styles.css">

  <!-- Slick Slider CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Slick Slider JavaScript -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


  <script type="text/javascript" src="./js/movie.js"></script>

  <title>Movie Library</title>
</head>

<body>
  <!-- Header Section -->
  <header>
    <div class="logo"><img src="./assets/images/Logo.png" alt=""></div>

    <!-- Main Navigation (Desktop Only) -->
    <nav class="main-menu">
      <a href="#home">Home</a>
      <a href="#our-screens">Our Screens</a>
      <a href="#schedule">Schedule</a>
      <a href="#movie-library">Movie Library</a>
      <a href="#location">Location & Contact</a>
      <div class="hamburger" onclick="toggleDesktopMenu()">
        <i class="fas fa-bars mobile-icon"></i>

        <!-- Desktop Toggle Links -->
        <div class="desktop-toggle-menu" id="desktopToggleMenu">
          <a href="#menu1">Menu 1</a>
          <a href="#menu2">Menu 2</a>
          <a href="#menu3">Menu 3</a>
        </div>
      </div>
    </nav>

    <!-- Mobile Navigation -->
    <nav class="mobile-menu" id="mobileMenu">
      <a href="#home">Home</a>
      <a href="#our-screens">Our Screens</a>
      <a href="#schedule">Schedule</a>
      <a href="#movie-library">Movie Library</a>
      <a href="#location">Location & Contact</a>
      <a href="#menu1">Menu 1</a>
      <a href="#menu2">Menu 2</a>
      <a href="#menu3">Menu 3</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="slider">
      <div><img src="./assets/images/banner.png" alt="Banner 1"></div>
      <div><img src="./assets/images/header-Slide2.jpg" alt="Banner 2"></div>
      <div><img src="./assets/images/header-Slide3.jpg" alt="Banner 3"></div>
    </div>
    <div class="content">
      <h1>MOVIE LIBRARY</h1>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
        et dolore magna aliquyam erat, sed diam voluptua.</p>
    </div>
  </section>

  <!-- Favorite Section -->
  <div class="container">
    <div class="search-section">
      <h1>Collect your favourites</h1>
      <div class="search-wrapper">
        <i class="fa fa-search" onclick="handleSearch()"></i>
        <input type="text" id="search-input" placeholder="Search for shows...">
      </div>
    </div>
    <hr>
    <div id="show-details"></div>
  </div>

  <!-- Contact us -->
  <section class="contact">
    <div class="contact-title">
      <h2>How to reach us</h2>
      <p>Lorem ipsum dolor sit amet, consectetur.</p>
    </div>
    <div class="contact-container">
      <div class="contact-form-container">

        <form class="contact-form" method="POST" action="contact_form.php">
          <div class="form-group">
            <input type="text" name="first-name" placeholder="First Name *" required>
            <input type="text" name="last-name" placeholder="Last Name *" required>
          </div>
          <input type="email" name="email" placeholder="Email *" required>
          <input type="tel" name="phone" placeholder="Telephone">
          <textarea name="message" placeholder="Message *" required></textarea>
          <p>*required fields</p>
          <label class="terms-label">
            <input type="checkbox" name="terms" required>
            <span>I agree to the <a href="#">Terms & Conditions</a></span>
          </label>
          <button type="submit">SUBMIT</button>
        </form>
      </div>
      <div class="map-container">
        <div class="mapouter">
          <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=eBEYONDS eBusiness & Digital Solutions&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://sprunkin.com/">Sprunki Incredibox</a></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer  -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-left">
        <h3>IT Group</h3>
        <p>
          C. Salvador de Madariaga, 1 <br>
          28027 Madrid <br>
          Spain</p>
      </div>
      <div class="footer-right">
        <h4>Follow us on</h4>
        <div class="social-links">
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="fa-youtube-play" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
    <hr>
    <div class="footer-bottom">
      <p>Copyright &copy; 2022 IT Hote ls. All rights reserved.</p>
      <p>
        Photos by Felix Mooneeram &
        <a href="#">Serge Kutuzov</a> on
        <a href="#">Unsplash</a>
      </p>
    </div>
  </footer>
  </div>
</body>

</html>