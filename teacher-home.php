<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Teacher Home Page">
<meta name="keywords" content="HTML, CSS, JavaScript, Quiz, Education, Teacher">
<meta name="author" content="Purvansh Darji">

<title>Teacher Dashboard | Home</title>

<style>
/* Reset & Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: linear-gradient(135deg, #f5f5f5, #dcdcdc); /* light gray / white combo */
    color: #111; /* dark text for contrast */
    line-height: 1.6;
}

/* Navbar */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #1a1a1a; /* dark black */
    padding: 15px 40px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
    position: sticky;
    top: 0;
    z-index: 100;
}

.navbar .logo img {
    height: 60px;
    transition: transform 0.3s;
}

.navbar .logo img:hover {
    transform: scale(1.1);
}

.nav-links {
    list-style: none;
    display: flex;
    align-items: center;
}

.nav-links li {
    margin-left: 30px;
}

.nav-links a {
    text-decoration: none;
    color: #fff;
    font-weight: 600;
    font-size: 17px;
    padding: 8px 12px;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.nav-links a:hover {
    background-color: #fff;
    color: #000;
}

/* Hero Section */
.hero {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    padding: 80px 20px;
    gap: 50px;
    background: #fefefe;
}

.hero-text {
    flex: 1;
    min-width: 300px;
    text-align: center;
    animation: fadeIn 1.5s ease-in-out;
}

.hero-text h1 {
    font-size: 48px;
    margin-bottom: 20px;
    color: #111;
}

.hero-text p {
    font-size: 18px;
    margin-bottom: 25px;
    color: #333;
}

.hero-buttons a {
    display: inline-block;
    margin: 10px;
    padding: 14px 28px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    border: 1px solid #111;
}

.start-quiz {
    background-color: #111;
    color: #fff;
}

.start-quiz:hover {
    background-color: #fff;
    color: #111;
    transform: translateY(-3px);
}

.logout {
    background-color: #fff;
    color: #111;
    border: 1px solid #111;
}

.logout:hover {
    background-color: #111;
    color: #fff;
    transform: translateY(-3px);
}

.hero-img {
    flex: 1;
    min-width: 280px;
    text-align: center;
}

.hero-img img {
    width: 100%;
    max-width: 400px;
    border-radius: 25px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    transition: transform 0.5s ease;
}

.hero-img img:hover {
    transform: scale(1.05);
}

/* Cards Section */
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    padding: 70px 20px;
    background-color: #f8f8f8;
}

.card {
    background-color: #fff;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    padding: 30px 20px;
    width: 260px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.card img {
    width: 75px;
    margin-bottom: 15px;
}

.card h3 {
    margin-bottom: 12px;
    font-size: 21px;
    color: #111;
}

.card p {
    font-size: 15px;
    color: #555;
}

/* Footer */
footer {
    background-color: #1a1a1a;
    color: #fff;
    padding: 50px 20px;
    margin-top: 40px;
}

footer h3 {
    margin-bottom: 15px;
    color: #ddd;
}

footer p,
footer a {
    font-size: 15px;
    color: #ccc;
    text-decoration: none;
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

.socials img {
    width: 35px;
    margin-right: 10px;
}



.socials a {
    margin: 0 8px;
}

/* Animations */
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(-20px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 900px) {
    .hero {
        flex-direction: column-reverse;
    }
}
@media (max-width: 600px) {
    .nav-links li {
        margin-left: 15px;
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
        <li><a href="teacher-profile.php">Profile</a></li>
        <li><a href="feedback-add.php">Student Feedback</a></li>
        <li><a href="view-student.php">View Student</a></li>
        <li><a href="watch-result.php">Results</a></li>
        <li><a href="index.php">Logout</a></li>
    </ul>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <h1>Welcome Back, Teacher!</h1>
        <p>Manage your quizzes, review student feedback, and track their progress in one place. Enhance your teaching with real-time data.</p>
        <p>Stay connected with your students and continuously improve your teaching methods using our interactive tools!</p>
        <div class="hero-buttons">
            <a href="teacher-deshbord.php" class="start-quiz">Manage Quizzes</a>
            <a href="index.php" class="logout">Logout</a>
        </div>
    </div>
    <div class="hero-img">
        <img src="img/hero.jpg" alt="Teacher Dashboard">
    </div>
</section>

<!-- Cards Section -->
<img src="img/n.png" alt="Overlay Image" style="width:100%; display:block; margin-top:40px;">
<div class="card-container">
    <div class="card">
        <img src="img/quiz.jpeg" alt="Manage Quizzes">
        <h3>Manage Quizzes</h3>
        <p>Create, edit, or delete quizzes easily. Customize question types and options for a personalized quiz experience.</p>
    </div>
    <div class="card">
        <img src="img/exam.jpeg" alt="Student Feedback">
        <h3>Student Feedback</h3>
        <p>View and analyze student feedback to improve your teaching strategies. Get valuable insights from their answers.</p>
    </div>
    <div class="card">
        <img src="img/study.jpeg" alt="Track Results">
        <h3>Track Results</h3>
        <p>Monitor student performance and track progress over time. Easily identify areas where students may need extra help.</p>
    </div>
</div>

<!-- Overlay Image Section -->
<img src="img/overlay-top.png" alt="Overlay Image" style="width:100%; display:block; margin-top:0px;">

<!-- Footer -->
<footer>
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;">
    <div style="flex:1; min-width:250px;">
      <h3>Get In Touch</h3>
      <p>123 Street, Ahmedabad, India</p>
      <p>+91 12345 67890</p>
      <p>project03@google.com</p>
      <div class="socials" style="margin-top:15px;">
        <a href="#"><img src="img/Face.png" alt="Facebook"></a>
        <a href="#"><img src="img/Inst.png" alt="Instagram"></a>
        <a href="#"><img src="img/tele.png" alt="Telegram"></a>
        <a href="#"><img src="img/You.png" alt="YouTube"></a>
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
