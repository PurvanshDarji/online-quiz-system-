<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Student Home Page">
<meta name="keywords" content="HTML, CSS, JavaScript, Quiz, Education">
<meta name="author" content="Purvansh Darji">

<title>Student Dashboard | Home</title>

<style>
:root {
  --primary: #f0f0f0;
  --secondary: #dcdcdc;
  --dark-bg: #2f2f2f;           /* main dark background */
  --light-text: #f0f0f0;        /* text on dark bg */
  --accent: #2196f3;            /* buttons / highlights */
  --highlight: #ffd54f;         /* secondary highlight */
  --card-shadow: rgba(0, 0, 0, 0.12);
}

/* Reset & Base */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
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
  background-color: var(--dark-bg);
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
  list-style: none;
}

.nav-links li {
  margin-left: 25px;
}

.nav-links a {
  color: var(--light-text);
  font-weight: 600;
  font-size: 18px;
}

.nav-links a:hover {
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
}

.hero-text h1 {
  font-size: 50px;
  color: var(--dark-bg);
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

.start-quiz {
  background-color: var(--accent);
  color: #fff;
}

.start-quiz:hover {
  background-color: #0288d1;
}

.logout {
  background-color: var(--highlight);
  color: #4a3a3a;
  border: 2px solid #f3c623;
}

.logout:hover {
  background-color: #f7b733;
}

.hero-img {
  flex: 1;
  min-width: 300px;
}

.hero-img img {
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

.hero-img img:hover {
  transform: scale(1.05);
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
  text-decoration: underline;
  color: #fff;
}

hr {
  margin: 30px 0;
  border: 0.5px solid #ffffff44;
}

.socials {
  margin-top: 15px;
  display: flex;
  flex-wrap: nowrap;
  gap: 15px;
  align-items: center;
}

.socials a img {
  width: 35px; /* unchanged, footer logos untouched */
}

.socials a:hover {
  filter: brightness(1.2);
}

/* Responsive */
@media (max-width: 900px) {
  .hero {
    text-align: center;
  }

  .hero-buttons {
    justify-content: center;
  }
}
</style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <ul class="nav-links">
        <li><a href="profile.php">Profile</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="student-history.php">History</a></li>      
        <li><a href="index.php">Logout</a></li>
    </ul>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <h1>Welcome Back, Student!</h1>
       <p style="font-size:20px; line-height:1.8; color:#333;">
  Access all your quizzes, practice tests, flashcards, and study games in one place. 
  Track your progress, improve your skills, and enjoy a fun, interactive learning experience every day!
</p>
        <div class="hero-buttons">
            <a href="student-deshbord.php" class="start-quiz">Start Quiz</a>
            <a href="index.php" class="logout">Logout</a>
        </div>
    </div>
    <div class="hero-img">
        <img src="img/hero.jpg" alt="Learning Image">
    </div>
</section>

<!-- Features Section -->
<section style="padding:80px 40px; background:#fff;">
  <h2 style="text-align:center; color:#2f2f2f; font-size:36px; margin-bottom:50px;">Why Choose Our Quiz Platform?</h2>
  
  <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px; max-width:1200px; margin:auto;">
    
    <div style="flex:1; min-width:280px; max-width:350px; background:#fafafa; border-radius:14px; box-shadow:0 6px 15px rgba(0,0,0,0.1); padding:30px; text-align:center;">
      <img src="img/qp1.png" alt="Interactive Quizzes" style="width:100%; border-radius:10px; margin-bottom:20px;">
      <h3 style="color:#2196f3; margin-bottom:15px;">Interactive Quizzes</h3>
      <p>Engage in interactive quizzes designed to test and strengthen your knowledge across multiple subjects with real-time feedback.</p>
    </div>
    
    <div style="flex:1; min-width:280px; max-width:350px; background:#fafafa; border-radius:14px; box-shadow:0 6px 15px rgba(0,0,0,0.1); padding:30px; text-align:center;">
      <img src="img/qp2.png" alt="Performance Analytics" style="width:100%; border-radius:10px; margin-bottom:20px;">
      <h3 style="color:#2196f3; margin-bottom:15px;">Performance Analytics</h3>
      <p>Track your progress through detailed reports and insights that help identify strengths and improvement areas.</p>
    </div>
    
    <div style="flex:1; min-width:280px; max-width:350px; background:#fafafa; border-radius:14px; box-shadow:0 6px 15px rgba(0,0,0,0.1); padding:30px; text-align:center;">
      <img src="img/qp3.png" alt="Gamified Learning" style="width:100%; border-radius:10px; margin-bottom:20px;">
      <h3 style="color:#2196f3; margin-bottom:15px;">Gamified Learning</h3>
      <p>Make learning fun with badges, leaderboards, and rewards that motivate you to achieve more every day.</p>
    </div>
  </div>
</section>

<!-- Achievements Section -->
<section style="padding:80px 40px; background:linear-gradient(135deg, #e3f2fd, #bbdefb);">
  <h2 style="text-align:center; color:#2f2f2f; font-size:36px; margin-bottom:50px;">Our Achievements</h2>
  
  <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:50px; max-width:1000px; margin:auto;">
    <div style="flex:1; min-width:200px; text-align:center;">
      <img src="img/oa1.png" style="width:80px; margin-bottom:10px;">
      <h3 style="font-size:28px; color:#2196f3;">5K+</h3>
      <p>Active Students</p>
    </div>
    <div style="flex:1; min-width:200px; text-align:center;">
      <img src="img/oa2.png" style="width:80px; margin-bottom:10px;">
      <h3 style="font-size:28px; color:#2196f3;">1K+</h3>
      <p>Quizzes Completed</p>
    </div>
    <div style="flex:1; min-width:200px; text-align:center;">
      <img src="img/oa3.png" style="width:80px; margin-bottom:10px;">
      <h3 style="font-size:28px; color:#2196f3;">98%</h3>
      <p>Success Rate</p>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section style="padding:80px 40px; background:#fff;">
  <h2 style="text-align:center; color:#2f2f2f; font-size:36px; margin-bottom:50px;">What Our Students Say</h2>
  
  <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px; max-width:1100px; margin:auto;">
    
    <div style="flex:1; min-width:300px; max-width:350px; background:#fafafa; border-radius:12px; padding:25px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <p style="font-style:italic;">“This platform made learning so much fun! The quizzes are challenging and the progress tracker keeps me motivated.”</p>
      <h4 style="margin-top:15px; color:#2196f3;">— Raj gondliya</h4>
    </div>
    
    <div style="flex:1; min-width:300px; max-width:350px; background:#fafafa; border-radius:12px; padding:25px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <p style="font-style:italic;">“I love how detailed the analytics are. I can see exactly where I need to improve!”</p>
      <h4 style="margin-top:15px; color:#2196f3;">— Prathmesh Patil</h4>
    </div>
    
    <div style="flex:1; min-width:300px; max-width:350px; background:#fafafa; border-radius:12px; padding:25px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <p style="font-style:italic;">“Beautiful design, great user experience, and excellent study material. Highly recommended!”</p>
      <h4 style="margin-top:15px; color:#2196f3;">— Kava Abhiskek </h4>
    </div>
  </div>
</section>


<footer>
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;">
    <div style="flex:1; min-width:250px;">
      <h3>Get In Touch</h3>
      <p> 123 Street, Ahmedabad, India</p>
      <p> +91 12345 67890</p>
      <p> project03@google.com</p>

      <div class="socials" style="margin-top:15px;">
        <a href="#"><img src="img/Face.png"></a>
        <a href="#"><img src="img/Inst.png"></a>
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
  <hr>
  <p style="text-align:center; color:#ddd; margin-top:20px;">&copy; 2025 Online Quiz System. All Rights Reserved.</p>
</footer>

</body>
</html>
