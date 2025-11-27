<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Features | Online Quiz System" />
  <meta name="author" content="Purvansh Darji" />
  <title>Online Quiz System | Features</title>

  <style>
    :root {
      --primary: #f0f0f0;
      --secondary: #dcdcdc;
      --dark-bg: #2f2f2f;
      --light-text: #f0f0f0;
      --accent: #2196f3;
      --highlight: #ffd54f;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: #333;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      transition: 0.3s;
    }

    img {
      display: block;
      max-width: 100%;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background: var(--dark-bg);
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .logo img { height: 60px; }

    .nav-links {
      display: flex;
      gap: 25px;
      list-style: none;
    }

    .nav-links li button {
      background: transparent;
      border: none;
      padding: 8px 14px;
      cursor: pointer;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .nav-links li button a {
      color: var(--light-text);
      font-weight: 600;
      font-size: 18px;
    }

    .nav-links li button:hover {
      background: #444;
      transform: translateY(-3px);
      box-shadow: 0 4px 10px rgba(255,255,255,0.2);
    }

    .nav-links li button:hover a { color: #00e1ff; }

    /* Hero Section */
    .hero {
      text-align: center;
      padding: 80px 40px 50px;
    }

    .hero h1 {
      font-size: 50px;
      color: #2f2f2f;
      margin-bottom: 15px;
    }

    .hero p {
      font-size: 18px;
      color: #555;
      max-width: 700px;
      margin: auto;
    }

    /* Features Grid */
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
      gap: 40px;
      padding: 60px 80px;
    }

    .feature-card {
      background: #fff;
      border-radius: 20px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.18);
    }

    .feature-card img {
      width: 100px;
      height: 100px;
      margin-bottom: 20px;
      border-radius: 50%;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .feature-card:hover img {
      transform: scale(1.1);
    }

    .feature-card h3 {
      color: var(--dark-bg);
      font-size: 22px;
      margin-bottom: 10px;
    }

    .feature-card p {
      color: #555;
      font-size: 15px;
    }

    /* Footer */
    footer {
      background: var(--dark-bg);
      color: var(--light-text);
      padding: 60px 40px 30px;
      margin-top: 50px;
    }

    footer h3 {
      color: var(--highlight);
      margin-bottom: 20px;
    }

    footer p, footer a {
      font-size: 15px;
      color: var(--light-text);
    }

    footer a:hover {
      color: #fff;
      text-decoration: underline;
    }

    footer hr {
      margin: 30px 0;
      border: 0.5px solid #ffffff44;
    }

    .socials {
      display: flex;
      gap: 15px;
      margin-top: 15px;
      align-items: center;
    }

    .socials a img {
      width: 35px;
      height: 35px;
    }

    /* Toast Notification */
    #toast {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background: #333;
      color: #fff;
      padding: 14px 24px;
      border-radius: 8px;
      font-size: 16px;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.4s, bottom 0.4s;
      z-index: 999;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    #toast.show {
      opacity: 1;
      visibility: visible;
      bottom: 50px;
    }

    #toast.error {
      background: #f44336;
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo"><img src="img/logo.png" alt="Logo"></div>
    <ul class="nav-links">
      <li><button><a href="index.php">Home</a></button></li>
      <li><button><a href="about.php">About</a></button></li>
      <li><button><a href="feature.php">Features</a></button></li>
      <li><button id="feedbackBtn"><a href="#">Feedback</a></button></li>
    </ul>
  </nav>

  <section class="hero">
    <h1>Our Features</h1>
    <p>Explore the tools and technologies that make our Online Quiz System smart, efficient, and easy to use.</p>
  </section>

  <section class="features">
    <div class="feature-card">
      <img src="img/quiz.jpeg" alt="Feature 1">
      <h3>Interactive Quizzes</h3>
      <p>Engaging multiple-choice quizzes to test and enhance your knowledge.</p>
    </div>

    <div class="feature-card">
      <img src="img/result.jpg" alt="Feature 2">
      <h3>Instant Results</h3>
      <p>View your performance immediately after submission with accurate scores.</p>
    </div>

    <div class="feature-card">
      <img src="img/study.jpeg" alt="Feature 3">
      <h3>Smart Learning</h3>
      <p>Adaptive difficulty levels help you learn at your own pace effectively.</p>
    </div>

    <div class="feature-card">
      <img src="img/exam.jpeg" alt="Feature 4">
      <h3>Admin Dashboard</h3>
      <p>Manage quizzes, students, and teachers easily through a clean dashboard.</p>
    </div>

    <div class="feature-card">
      <img src="img/security.jpg" alt="Feature 5">
      <h3>Secure Login</h3>
      <p>All users are verified through secure authentication systems.</p>
    </div>

    <div class="feature-card">
      <img src="img/data.jpg" alt="Feature 6">
      <h3>Data Insights</h3>
      <p>Get valuable insights from performance analytics and reports.</p>
    </div>
  </section>

  <footer>
    <div style="display:flex; flex-wrap:wrap; gap:40px; justify-content:space-between; max-width:1200px; margin:auto;">
      <div style="flex:1; min-width:250px;">
        <h3>Get In Touch</h3>
        <p>123 Street, Ahmedabad, India</p>
        <p>+91 12345 67890</p>
        <p>project03@google.com</p>
        <div class="socials">
          <a href="#"><img src="img/face.png"></a>
          <a href="#"><img src="img/inst.png"></a>
          <a href="#"><img src="img/tele.png"></a>
          <a href="#"><img src="img/You.png"></a>
        </div>
      </div>
      <div style="flex:1; min-width:200px;">
        <h3>Our Courses</h3>
        <p><a href="#">Online Quizzes</a></p>
        <p><a href="#">Flashcards</a></p>
        <p><a href="#">Practice Tests</a></p>
        <p><a href="#">Study Games</a></p>
      </div>
      <div style="flex:1; min-width:200px;">
        <h3>Quick Links</h3>
        <p><a href="#">Privacy Policy</a></p>
        <p><a href="#">Terms & Conditions</a></p>
        <p><a href="#">FAQs</a></p>
        <p><a href="#">Help & Support</a></p>
      </div>
    </div>
    <hr />
    <p style="text-align:center; color:#ddd; margin-top:20px;">&copy; 2025 Online Quiz System. All Rights Reserved.</p>
  </footer>

  <div id="toast"></div>

  <script>
    function showToast(message, type = "error") {
      const toast = document.getElementById("toast");
      toast.textContent = message;
      toast.className = "show " + type;
      setTimeout(() => toast.className = toast.className.replace("show", ""), 3000);
    }

    document.getElementById("feedbackBtn").addEventListener("click", (e) => {
      e.preventDefault();
      showToast("⚠️ Please login first to give feedback", "error");
    });
  </script>
</body>
</html>
