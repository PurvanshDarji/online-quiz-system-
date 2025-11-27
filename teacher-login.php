<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Teacher Login & Signup Page for Online Quiz System">
  <meta name="keywords" content="Teacher, Login, Signup, Quiz, Education, Platform">
  <meta name="author" content="Purvansh Darji">

  <title>Teacher Access | Online Quiz System</title>
  <style>
   /* ---------------------- CSS Variables ---------------------- */
:root {
  --color-primary: #111; /* Dark black */
  --color-secondary: #888; /* Gray for accents */
  --color-accent-light: #ccc; /* Light gray highlights */
  --color-text-light: #f6f6f6; /* Near white */
  --color-background-card: #fefefe; /* White card background */
  --color-error: red;

  --space-sm: 8px;
  --space-md: 16px;
  --space-lg: 32px;

  --shadow-elevation-4: 0 8px 20px rgba(0,0,0,0.25);
}

/* ---------------------- Base Styles ---------------------- */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #f5f5f5, #dcdcdc); /* Light gray/white */
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  color: #111;
}

.logo img {
  height: 60px;
  filter: grayscale(100%);
}

/* ---------------------- Navbar ---------------------- */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-sm) var(--space-md);
  background-color: var(--color-primary);
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 1000;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 20px;
}

.nav-links a {
  text-decoration: none;
  color: var(--color-text-light);
  font-weight: 600;
  font-size: 16px;
  padding: 8px 15px;
  border-radius: 4px;
  transition: background-color 0.3s, color 0.3s;
}

.nav-links a:hover {
  color: var(--color-secondary);
  background-color: rgba(255,255,255,0.1);
}

.hamburger {
  display: none;
  flex-direction: column;
  gap: 6px;
  cursor: pointer;
  padding: 5px;
}

.hamburger .line {
  width: 30px;
  height: 3px;
  background-color: var(--color-text-light);
  border-radius: 5px;
  transition: transform 0.3s, opacity 0.3s;
}

/* Responsive Navbar */
@media (max-width: 768px) {
  .nav-links {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 70px;
    right: 0;
    background-color: var(--color-primary);
    width: 100%;
    padding: 20px 0;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }

  .nav-links.is-open {
    display: flex;
  }

  .nav-links li {
    margin: 10px 0;
    text-align: center;
  }

  .hamburger {
    display: flex;
  }
}

/* ---------------------- Main Content ---------------------- */
.container {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: var(--space-lg);
  margin-top: 70px;
  min-height: calc(100vh - 70px);
}

.box {
  background: var(--color-background-card);
  border-radius: 14px;
  box-shadow: var(--shadow-elevation-4);
  display: flex;
  overflow: hidden;
  max-width: 950px;
  width: 90%;
  min-height: 550px;
  max-height: 650px;
}

/* Image Side */
.image-side {
  flex: 1;
  background: url('img/p1.png') no-repeat center center;
  background-size: cover;
  min-width: 350px;
  filter: grayscale(100%) brightness(0.9);
}

@media (max-width: 850px) {
  .image-side {
    display: none;
  }
  .box {
    max-width: 450px;
  }
}

/* Form Side */
.form-side {
  flex: 1;
  padding: 40px 40px;
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.form-side h2 {
  margin-bottom: 25px;
  color: var(--color-primary);
  font-size: 28px;
}

/* Inputs */
input, select {
  width: 100%;
  padding: 14px;
  margin: 10px 0;
  border: 1px solid #bbb;
  border-radius: 8px;
  font-size: 16px;
  transition: border-color 0.3s;
  background-color: #fff;
  color: #111;
}

input:focus, select:focus {
  border-color: var(--color-primary);
  outline: none;
  box-shadow: 0 0 0 2px rgba(0,0,0,0.1);
}

/* Buttons */
button {
  width: 100%;
  padding: 15px;
  margin-top: 20px;
  background-color: var(--color-primary);
  color: #fff;
  border: none;
  border-radius: 10px;
  font-weight: bold;
  font-size: 17px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.1s;
}

button:hover {
  background-color: #333;
}

button:active {
  transform: scale(0.99);
}

/* Links */
.back-home {
  display: block;
  margin-top: 30px;
  color: var(--color-primary);
  text-decoration: none;
  font-weight: 600;
  font-size: 15px;
}

.back-home:hover {
  text-decoration: underline;
  color: var(--color-secondary);
}

#errorMsg {
  color: var(--color-error);
  margin-top: 15px;
  font-weight: 500;
  display: none;
}

.form-switch {
  margin-top: 15px;
  font-size: 14px;
  color: #666;
}

.form-switch a {
  color: var(--color-primary);
  font-weight: bold;
  text-decoration: none;
}

/* ---------------------- Footer ---------------------- */
footer {
  background-color: var(--color-primary);
  color: var(--color-text-light);
  padding: 50px 20px;
  margin-top: 40px;
}

.footer-container {
  max-width: 1200px;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 40px;
}

.footer-col {
  flex: 1;
  min-width: 200px;
}

footer h3 {
  margin-bottom: 15px;
  color: var(--color-accent-light);
  font-size: 18px;
}

footer p, footer a {
  font-size: 15px;
  color: var(--color-text-light);
  line-height: 1.8;
}

footer a:hover {
  text-decoration: underline;
  color: #fff;
}

hr {
  margin: 30px auto;
  width: 80%;
  border: 0.5px solid #444;
}

.socials {
  display: flex;
  align-items: center;
  margin-top: 15px;
}

.socials img {
  width: 30px;
  height: 30px;
  margin-right: 15px;
  filter: grayscale(100%) brightness(1.1);
  transition: transform 0.3s;
}

.socials img:hover {
  transform: scale(1.1);
}

.copyright {
  text-align: center;
  color: #ddd;
  margin-top: 20px;
  font-size: 14px;
}
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo">
      <img src="img/logo.png" alt="Company Logo">
    </div>

    <ul class="nav-links" id="navLinks">
      <li><a href="about.php">About Us</a></li>
      <li><a href="#">Features</a></li>
    </ul>

    <div class="hamburger" id="hamburger">
      <span class="line"></span>
      <span class="line"></span>
      <span class="line"></span>
    </div>
  </nav>

  <div class="container">
    <div class="box">
      <div class="image-side"></div> 

      <div class="form-side">
        <form id="loginForm" onsubmit="return goToDashboard()">
          <h2>Teacher Login</h2>
          <input type="text" placeholder="Teacher ID" data-form-input="id" required> 
          <input type="email" placeholder="Email Address" data-form-input="email" required>
          <input type="password" placeholder="Password" data-form-input="password" required>
          <button type="submit">Secure Login</button>
          <p id="errorMsg"></p>
        </form>
        
        <div class="form-switch">
            Don't have an account? <a href="signup.php">Register Here</a>
        </div>

        <a href="index.php" class="back-home">&larr; Back to Home</a>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-container">
      <div class="footer-col">
        <h3>Get In Touch</h3>
        <p>123 Street, Ahmedabad, India</p>
        <p>+91 12345 67890</p>
        <p>project03@google.com</p>

        <div class="socials">
          <a href="#"><img src="img/Facebook.png" alt="Facebook"></a>
          <a href="#"><img src="img/Instagram.png" alt="Instagram"></a>
          <a href="#"><img src="img/telegram.png" alt="Telegram"></a>
          <a href="#"><img src="img/YouTube.png" alt="YouTube"></a>
        </div>
      </div>

      <div class="footer-col">
        <h3>Our Courses</h3>
        <p><a href="#">Online Quizzes</a></p>
        <p><a href="#">Flashcards</a></p>
        <p><a href="#">Practice Tests</a></p>
        <p><a href="#">Study Games</a></p>
        <p><a href="#">Group Study</a></p>
      </div>

      <div class="footer-col">
        <h3>Quick Links</h3>
        <p><a href="#">Privacy Policy</a></p>
        <p><a href="#">Terms & Conditions</a></p>
        <p><a href="#">FAQs</a></p>
        <p><a href="#">Help & Support</a></p>
        <p><a href="#">Contact</a></p>
      </div>
    </div>
    <hr>
    <p class="copyright">&copy; 2025 Online Quiz System. All Rights Reserved.</p>
  </footer>

  <script>
    // High-level practice: Cache DOM elements
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');

    // Toggle Hamburger Menu using an Arrow Function (ES6)
    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('is-open'); // Using 'is-open' for semantic class naming
    });

    /**
     * Handles the teacher login process.
     * NOTE: This function's core logic (hardcoded admins) is maintained as per user request.
     * @returns {boolean} Always returns false to prevent standard form submission.
     */
    function goToDashboard() {
      // Use query selectors with data-attributes for robust selection
      const teacherID = document.querySelector('[data-form-input="id"]').value.trim();
      const email = document.querySelector('[data-form-input="email"]').value.trim();
      const password = document.querySelector('[data-form-input="password"]').value;
      const errorMsg = document.getElementById('errorMsg');

      // The hardcoded credential array (Kept untouched as requested)
      const admins = [
        { id: 'admin1', email: 'admin1@gmail.com', password: 'admin123' },
        { id: 'admin2', email: 'admin2@gmail.com', password: 'admin234' }
      ];

      const validAdmin = admins.find(admin =>
        admin.id === teacherID && admin.email === email && admin.password === password
      );

      if (validAdmin) {
        // High-level practice: Clear error message explicitly before redirect
        errorMsg.style.display = 'none';
        window.location.href = "teacher-home.php";
      } else {
        errorMsg.textContent = "Invalid Teacher ID, Email, or Password! Please check your credentials.";
        errorMsg.style.display = 'block';
      }

      return false; // Prevent form default submission
    }
  </script>

</body>
</html>