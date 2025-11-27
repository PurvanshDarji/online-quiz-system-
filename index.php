<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Online Quiz System" />
  <meta name="author" content="Purvansh Darji" />
  <title>Online Quiz System | Home</title>

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

    /*Navbar*/
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background: var(--dark-bg);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar .logo img {
      height: 60px;
    }

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
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
    }

    .nav-links li button:hover a {
      color: #00e1ff;
    }

    /* Hero Section */
    .hero {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      padding: 80px 40px;
      gap: 50px;
      text-align: center;
    }

    .hero-text {
      flex: 1;
      min-width: 300px;
      animation: fadeIn 1.2s ease-in;
    }

    .hero-text h1 {
      font-size: 50px;
      color: #2f2f2f;
      margin-bottom: 20px;
      line-height: 1.2;
    }

    .hero-text p {
      font-size: 18px;
      color: #444;
      margin-bottom: 30px;
    }

    .hero-buttons a {
      display: inline-block;
      margin: 10px 15px 0 0;
      padding: 14px 30px;
      border-radius: 12px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .student {
      background: var(--accent);
      color: #fff;
    }

    .student:hover {
      background: #0288d1;
    }

    .teacher {
      background: var(--highlight);
      color: #4a3a3a;
      border: 2px solid #f3c623;
    }

    .teacher:hover {
      background: #f7b733;
    }

    .hero-img {
      flex: 1;
      min-width: 300px;
      animation: fadeIn 1.5s ease-in;
    }

    .hero-img img {
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }

    .hero-img img:hover {
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Scrolling Cards */
    .scrolling-cards {
      overflow: hidden;
      background: linear-gradient(135deg, #fafafa, #fff);
      position: relative;
    }

    .scrolling-wrapper {
      display: flex;
      justify-content: center;
      overflow: hidden;
    }

    .scrolling-content {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 35px;
      animation: scrollCards 35s linear infinite;
    }

    @keyframes scrollCards {
      from {
        transform: translateX(0);
      }
      to {
        transform: translateX(-50%);
      }
    }

    .card {
      width: 270px;
      padding: 30px 20px;
      border-radius: 18px;
      background: #fff;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
      text-align: center;
      transition: all 0.4s ease;
      overflow: hidden;
      position: relative;
    }

    .card:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
    }

    .card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin: 0 auto 20px;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .card:hover img {
      transform: scale(1.1);
    }

    .card h3 {
      font-size: 20px;
      font-weight: 600;
      color: var(--dark-bg);
      margin-bottom: 10px;
    }

    .card p {
      font-size: 15px;
      color: #555;
      padding: 0 8px;
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

    footer p,
    footer a {
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
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
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
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo"><img src="img/logo.png" alt="Logo"></div>
    <ul class="nav-links">
      <li><button><a href="index.php">Home</a></button></li>
      <li><button><a href="about.php">About</a></button></li>
      <li><button><a href="feature.php">Features</a></button></li>
      <li><button id="feedbackBtn"><a href="#">Feedback</a></button></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1>Study Smarter, Not Harder</h1>
      <p>Master any subject with quizzes, flashcards, and brain-boosting activities.</p>
      <div class="hero-buttons">
        <a href="student-login.php" class="student">Start Learning Now</a>
        <a href="teacher-login.php" class="teacher">Create a Quiz</a>
      </div>
    </div>
    <div class="hero-img">
      <img src="img/hero.jpg" alt="Learning Image">
    </div>
  </section>

  <!-- Scrolling Cards -->
  <section class="scrolling-cards">
    <div class="scrolling-wrapper">
      <div class="scrolling-content">
        <div class="card"><img src="img/quiz.jpeg"><h3>Flashcards</h3><p>Review key terms quickly.</p></div>
        <div class="card"><img src="img/exam.jpeg"><h3>Practice Tests</h3><p>Simulate real exams effectively.</p></div>
        <div class="card"><img src="img/study.jpeg"><h3>Study Games</h3><p>Fun learning with games.</p></div>
        <div class="card"><img src="img/quiz.jpeg"><h3>Flashcards</h3><p>Review key terms quickly.</p></div>
        <div class="card"><img src="img/exam.jpeg"><h3>Practice Tests</h3><p>Simulate real exams effectively.</p></div>
        <div class="card"><img src="img/study.jpeg"><h3>Study Games</h3><p>Fun learning with games.</p></div>
      </div>
    </div>
  </section>

  <!-- Footer -->
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

  <!-- Toast Notification -->
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
