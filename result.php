<?php
session_start();
include 'db.php';



// ✅ Get student name from session
$student_name = isset($_SESSION['student_name']) ? $_SESSION['student_name'] : 'Unknown Student';

// ✅ Get quiz data from POST
$subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : 'Unknown';
$total_questions = isset($_POST['total']) ? (int)$_POST['total'] : 0;
$score = isset($_POST['score']) ? (int)$_POST['score'] : 0;
$percentage = ($total_questions > 0) ? round(($score / $total_questions) * 100, 2) : 0;

// ✅ Insert result into DB
$sql = "INSERT INTO results (student_name, subject, total_questions, score, percentage, created_at)
        VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssiid", $student_name, $subject, $total_questions, $score, $percentage);
$stmt->execute();

// ✅ Fetch inserted result
$last_id = $stmt->insert_id;
$stmt->close();

$result_data = [];
if ($last_id > 0) {
    $res = $con->prepare("SELECT * FROM results WHERE id = ?");
    $res->bind_param("i", $last_id);
    $res->execute();
    $result = $res->get_result();
    $result_data = $result->fetch_assoc();
    $res->close();
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Result | Online Quiz System</title>

<style>
:root {
  --bg-light: #ffffff;
  --bg-dark: #f5f5f5;
  --text-dark: #111;
  --text-light: #fff;
  --accent: #000;
  --shadow: rgba(0,0,0,0.15);
}

/* ===== Reset ===== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  background: linear-gradient(135deg, var(--bg-light), var(--bg-dark));
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  color: var(--text-dark);
}

/* ===== Navbar ===== */
nav.navbar {
  background: var(--accent);
  padding: 15px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 4px 12px var(--shadow);
  position: sticky;
  top: 0;
  z-index: 1000;
}

nav .logo img {
  width: 45px;
  height: 45px;
  border-radius: 50%;
}

nav .nav-links {
  list-style: none;
  display: flex;
  gap: 30px;
}

nav .nav-links li a {
  text-decoration: none;
  color: var(--text-light);
  font-weight: 500;
  transition: 0.3s;
}

nav .nav-links li a:hover {
  color: #f6d365;
}

/* ===== Result Container ===== */
.container {
  flex: 1;
  width: 90%;
  max-width: 700px;
  margin: 60px auto;
  background: var(--bg-light);
  border-radius: 15px;
  padding: 35px 40px;
  box-shadow: 0 8px 25px var(--shadow);
  animation: fadeIn 0.4s ease-in-out;
  text-align: center;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translateY(15px);}
  to {opacity: 1; transform: translateY(0);}
}

.container h2 {
  text-align: center;
  margin-bottom: 20px;
  color: var(--accent);
  border-bottom: 2px solid #000;
  padding-bottom: 8px;
  font-weight: 600;
}

.result-box {
  margin-top: 25px;
  background: #fafafa;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.result-box table {
  width: 100%;
  border-collapse: collapse;
}

.result-box th, .result-box td {
  border-bottom: 1px solid #ccc;
  padding: 12px;
  font-size: 17px;
}

.result-box th {
  text-align: left;
  color: #000;
}

.result-box td {
  text-align: right;
  color: #333;
}

button {
  background: #000;
  color: #fff;
  border: none;
  padding: 12px 30px;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
  margin-top: 25px;
}

button:hover {
  background: #444;
}

/* ===== Footer ===== */
footer {
  background: #000;
  color: #fff;
  padding: 60px 40px 30px;
  border-top: 2px solid #333;
}

footer h3 {
  color: #f6d365;
  margin-bottom: 15px;
}

footer p, footer a {
  color: #ddd;
  font-size: 15px;
  text-decoration: none;
  transition: 0.3s;
}

footer a:hover {
  text-decoration: underline;
  color: #fff;
}

footer .socials {
  margin-top: 15px;
  display: flex;
  gap: 15px;
  align-items: center;
}

footer .socials img {
  width: 35px;
  transition: 0.3s;
}

footer .socials img:hover {
  filter: brightness(1.3);
}

hr {
  margin: 30px 0;
  border: 0.5px solid #ffffff33;
}

footer p.copy {
  text-align: center;
  margin-top: 15px;
  color: #bbb;
  font-size: 14px;
}
</style>
</head>

<body>

<!-- ===== Navbar ===== -->
<nav class="navbar">
  <div class="logo">
    <img src="img/logo.png" alt="Logo">
  </div>
  <ul class="nav-links">
    <li><a href="student-deshbord.php">Dashboard</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="student-history.php">History</a></li>
        <li><a href="student-home.php">Home</a></li>
    <li><a href="index.php">Logout</a></li>
  </ul>
</nav>

<!-- ===== Result Display ===== -->
<div class="container">
  <h2>✅ Quiz Result Saved</h2>

  <?php if (!empty($result_data)) { ?>
  <div class="result-box">
    <table>
      <tr><th>Student Name:</th><td><?= htmlspecialchars($result_data['student_name']) ?></td></tr>
      <tr><th>Subject:</th><td><?= htmlspecialchars($result_data['subject']) ?></td></tr>
      <tr><th>Total Questions:</th><td><?= $result_data['total_questions'] ?></td></tr>
      <tr><th>Score:</th><td><?= $result_data['score'] ?></td></tr>
      <tr><th>Percentage:</th><td><?= $result_data['percentage'] ?>%</td></tr>
      <tr><th>Date:</th><td><?= $result_data['created_at'] ?></td></tr>
    </table>
  </div>
  <?php } else { ?>
  <p style="color:red;">⚠️ Unable to fetch your result details.</p>
  <?php } ?>

  
</div>

<!-- ===== Footer ===== -->
<footer>
  <div style="max-width:1200px;margin:auto;display:flex;flex-wrap:wrap;justify-content:space-between;gap:40px;">
    <div style="flex:1;min-width:250px;">
      <h3>Get In Touch</h3>
      <p>123 Street, Ahmedabad, India</p>
      <p>+91 12345 67890</p>
      <p>project03@google.com</p>
      <div class="socials">
        <a href="#"><img src="img/face.png" alt="Facebook"></a>
        <a href="#"><img src="img/inst.png" alt="Instagram"></a>
        <a href="#"><img src="img/tele.png" alt="Telegram"></a>
        <a href="#"><img src="img/You.png" alt="YouTube"></a>
      </div>
    </div>

    <div style="flex:1;min-width:200px;">
      <h3>Our Courses</h3>
      <p><a href="#">Online Quizzes</a></p>
      <p><a href="#">Flashcards</a></p>
      <p><a href="#">Practice Tests</a></p>
      <p><a href="#">Study Games</a></p>
      <p><a href="#">Group Study</a></p>
    </div>

    <div style="flex:1;min-width:200px;">
      <h3>Quick Links</h3>
      <p><a href="#">Privacy Policy</a></p>
      <p><a href="#">Terms & Conditions</a></p>
      <p><a href="#">FAQs</a></p>
      <p><a href="#">Help & Support</a></p>
      <p><a href="#">Contact</a></p>
    </div>
  </div>
  <hr>
  <p class="copy">&copy; 2025 Online Quiz System. All Rights Reserved.</p>
</footer>

</body>
</html>
