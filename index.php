<?php
// Check if a session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: ../feature/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>PEPAN - Donation Platform</title>
</head>
<body>
    <!-- Header -->
    <header>
      <div><img src="assets/logo.png" width="50px" height="50px" alt="Logo" /></div>
      <div class="logo">PeduliPangan</div>
      <nav>
        <ul class="nav-links">
          <li><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#donate" style="color: #5b8d4d">Donate</a></li>
          <li><a href="account.php">Akun</a></li>
        </ul>
        <div class="burger" onclick="toggleMenu()">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </header>

    <!-- Section -->
    <section class="hero">
      <h1>Make a difference</h1>
      <p>Join the mission to support those in need</p>
      <a href="#services" class="view-services-btn">View Services</a>
    </section>


    <!-- About Section -->
    <div class="about" id="about">
      <div class="about-content">
        <h3>Empowering generosity</h3>
        <h2>Transforming donations into impact</h2>
        <p> 
          Pepan is a dynamic donation platform based in Yogyakarta, 
          ID, dedicated to fostering a culture of giving. 
          We connect generous donors with those in need, 
          facilitating monetary and food donations seamlessly. 
          Our platform empowers users through three distinct roles: 
          Admin, Donor, and Recipient. With features like donor registration, 
          intuitive donation forms, and recipient dashboards, 
          Pepan makes it easy to manage donations and requests. 
          Join us in making a difference today!
        </p>
        <p>
          Our team is committed to ensuring every donation reaches the right
          hands, helping to alleviate poverty, provide education, and offer
          disaster relief where it is needed most.
        </p>
        
        <!-- Ikon Section -->
        <div class="about-icons">
          <div>
            <i class="fas fa-heart"></i>
            <p>Compassionate Giving</p>
          </div>
          <div>
            <i class="fas fa-users"></i>
            <p>Community Support</p>
          </div>
          <div>
            <i class="fas fa-hand-holding-heart"></i>
            <p>Empowering Lives</p>
          </div>
        </div>
      </div>
    </div>

      <!-- Blog Section -->
      <div class="blog" id="blog">
        <h2>Join the mission to support those in need</h2>
        <div class="blog-posts">
          <article>
            <h3>How Your Donations Make a Difference</h3>
            <p>
              Your contributions help provide essential supplies to underserved
              communities. Read about our latest success stories and see how
              you're changing lives.
            </p>
            <a href="#" class="read-more">Read More</a>
          </article>
          <article>
            <h3>Volunteer Spotlight</h3>
            <p>
              Meet the inspiring individuals who are dedicating their time to
              making the world a better place through PeduliPangan.
            </p>
            <a href="#" class="read-more">Read More</a>
          </article>
        </div>
      </div>

      <!-- Testimonials Section -->
      <div class="testimonials" id="testimonials">
        <h2>Testimonials</h2>
        <div class="testimonial-cards">
          <div class="testimonial">
            <p>
              "PeduliPangan has made it easy for me to contribute to causes I care
              about. I'm thrilled to see the impact my donations have made."
            </p>
            <span>- Alex M., Donor</span>
          </div>
          <div class="testimonial">
            <p>
              "Thanks to PeduliPangan, my community received the food and supplies
              we desperately needed. We are forever grateful."
            </p>
            <span>- Sarah L., Recipient</span>
          </div>
        </div>
      </div>

      <!-- Contact Section -->
      <section class="contact" id="contact">
        <div class="container">
            <div class="section-header">
                <h2>Get In Touch</h2>
                <p>We'd love to hear from you!</p>
            </div>

            <div class="contact-wrapper">
                <!-- Contact Info Cards -->
                <div class="contact-info">
                    <div class="info-card">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Our Address</h3>
                        <p>Yogyakarta, Indonesia</p>
                    </div>

                    <div class="info-card">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email Us</h3>
                        <p>info@pepan.com</p>
                    </div>

                    <div class="info-card">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3>Call Us</h3>
                        <p>+62 123 456 789</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <form action="process.php" method="POST" novalidate>
                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Your Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Your Email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-phone"></i>
                                <input type="tel" name="phone" placeholder="Your Phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <i class="fas fa-comment-alt"></i>
                                <textarea name="message" placeholder="Your Message" required></textarea>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
     <p>Web design by MbuhWes</p> 
    </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
