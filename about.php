<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Online Quiz System" />
  <meta name="author" content="Purvansh Darji" />
  <title>About Page</title>

  <style>
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Segoe UI", Tahoma, sans-serif;
      background: linear-gradient(135deg, #fefefe, #f5f5f5);
      color: #222;
      line-height: 1.6;
    }

    /*Navbar*/
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #3a3a3a;
      padding: 15px 30px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .logo img {
      height: 60px;
    }

    .nav-links {
      list-style: none;
      display: flex;
    }

    .nav-links li {
      margin-left: 25px;
    }

    .nav-links a {
      color: #f4f4f4;
      font-weight: 600;
      font-size: 18px;
      text-decoration: none;
      transition: 0.3s;
      cursor: pointer;
    }

    .nav-links a:hover {
      color: #d0d0d0;
    }

    /*Hero Section*/
    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      padding: 40px 10%;
      gap: 40px;
    }

    .hero-text {
      flex: 1;
      min-width: 300px;
    }

    .hero-text h1 {
      font-size: 40px;
      margin-bottom: 20px;
      color: #333;
    }

    .hero-text h2 {
      font-size: 28px;
      margin: 20px 0 10px;
      color: #555;
    }

    .hero-text p {
      font-size: 18px;
      margin-bottom: 12px;
      color: #666;
    }

    .hero-img {
      flex: 1;
      min-width: 280px;
      text-align: center;
    }

    .hero-img img {
      width: 100%;
      max-width: 450px;
      border-radius: 20px;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
    }

    /*Footer*/
    footer {
      background: #3a3a3a;
      color: #eee;
      padding: 50px 20px;
      margin-top: 40px;
    }

    footer h3 {
      margin-bottom: 15px;
    }

    footer p,
    footer a {
      font-size: 15px;
      color: #ccc;
      text-decoration: none;
      transition: 0.3s;
    }

    footer a:hover {
      color: #fff;
      text-decoration: underline;
    }

    hr {
      margin: 30px auto;
      width: 80%;
      border: 0.5px solid #ffffff1a;
    }

    .socials img {
      width: 10%;
      filter: invert(0.8);
      transition: 0.3s;
    }

    .socials img:hover {
      opacity: 0.7;
    }

    .socials a {
      margin: 0 10px;
    }

    /* Notification  */
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

    #toast.success {
      background: #4caf50;
    }

    #toast.info {
      background: #2196f3;
    }
  </style>
</head>

<body>
  <!--Navbar-->
  <nav class="navbar">
    <div class="logo">
      <img src="img/logo.png" alt="Logo" />
    </div>

    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="feature.php">Features</a></li>
      <li><a id="feedbackBtn">Feedback</a></li>
    </ul>
  </nav>

  <!--Hero Section-->
  <section class="hero">
    <div class="hero-img">
      <img src="img/Online courses design _ Premium Vector.jpeg" alt="Learning Image" />
    </div>

    <div class="hero-text">
      <h1>About Our Online Quiz System</h1>
      <p>
        Our Online Quiz System helps users test their knowledge with easy-to-use quizzes,
        instant results, and interactive learning.
      </p>

      <h2>Designed For:</h2>
      <p>• Students to practice and improve learning.</p>
      <p>• Teachers to create and manage quizzes easily.</p>
      <p>• Organizations to conduct tests online efficiently.</p>
    </div>
  </section>

  <!--Footer-->
  <footer>
    <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;">
      <div style="flex:1; min-width:250px;">
        <h3>Get In Touch</h3>
        <p>123 Street, Ahmedabad, India</p>
        <p>+91 12345 67890</p>
        <p>project03@google.com</p>

        <div class="socials" style="margin-top:15px;">
          <a href="#"><img src="img/Face.png" alt="Facebook" /></a>
          <a href="#"><img src="img/Inst.png" alt="Instagram" /></a>
          <a href="#"><img src="img/tele.png" alt="Telegram" /></a>
          <a href="#"><img src="img/You.png" alt="YouTube" /></a>
        </div>
      </div>

      <div style="flex:1; min-width:200px;">
        <h3>Our Courses</h3>
        <p><a href="#">Online Quizzes</a></p>
        <p><a href="#">Flashcards</a></p>
        <p><a href="#">Practice Tests</a></p>
        <p><a href="#">Study Games</a></p>
        <p><a href="#">Group Study</a></p>
      </div>

      <div style="flex:1; min-width:200px;">
        <h3>Quick Links</h3>
        <p><a href="#">Privacy Policy</a></p>
        <p><a href="#">Terms & Conditions</a></p>
        <p><a href="#">FAQs</a></p>
        <p><a href="#">Help & Support</a></p>
        <p><a href="#">Contact</a></p>
      </div>
    </div>

    <hr />
    <p style="text-align:center; color:#aaa; margin-top:20px;">
      &copy; 2025 Online Quiz System. All Rights Reserved.
    </p>
  </footer>

  
  <div id="toast"></div>

  <script>
    
    function showToast(message, type = "info") {
      const toast = document.getElementById("toast");
      toast.textContent = message;
      toast.className = "show " + type;

      setTimeout(() => {
        toast.className = toast.className.replace("show", "");
      }, 3000);
    }

    
    document.getElementById("feedbackBtn").addEventListener("click", () => {
      showToast("⚠️ Please login first to give feedback", "error");
    });
  </script>
</body>
</html>
