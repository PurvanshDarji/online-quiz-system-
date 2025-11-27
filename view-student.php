<?php
include 'db.php';

// Fetch all students
$sql = "SELECT id, fullname, email, gender, photo FROM studentss ORDER BY id ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Students | Teacher Dashboard</title>

<style>
/* ===== THEME (Black & White) ===== */
:root {
  --bg: #f5f5f5;
  --card-bg: #fff;
  --text: #111;
  --accent: #000;
  --footer-bg: #000;
  --footer-text: #ccc;
}

body {
  background: var(--bg);
  color: var(--text);
  margin: 0;
  font-family: "Segoe UI", Tahoma, sans-serif;
}

/* ===== NAVBAR ===== */
.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: var(--accent);
  padding: 15px 40px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.25);
  position: sticky;
  top: 0;
  z-index: 1000;
}
.navbar .logo img {
  height: 55px;
}
.nav-links {
  list-style: none;
  display: flex;
  gap: 25px;
}
.nav-links a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  transition: 0.3s;
}
.nav-links a:hover {
  color: #ddd;
  text-decoration: underline;
}

/* ===== TABLE SECTION ===== */
.container {
  width: 95%;
  max-width: 1100px;
  margin: 60px auto;
  background: var(--card-bg);
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 0 15px rgba(0,0,0,0.15);
}
h2 {
  text-align: center;
  margin-bottom: 25px;
  border-bottom: 1px solid var(--accent);
  padding-bottom: 10px;
}
table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
}
th, td {
  padding: 12px;
  border-bottom: 1px solid #ccc;
}
th {
  background: #111;
  color: #fff;
}
td img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #000;
}

/* ===== FOOTER ===== */
footer {
  background: var(--footer-bg);
  color: var(--footer-text);
  padding: 50px 30px 25px;
  margin-top: 60px;
}
footer h3 {
  color: #fff;
  margin-bottom: 15px;
}
footer p,
footer a {
  font-size: 15px;
  color: var(--footer-text);
  text-decoration: none;
}
footer a:hover {
  color: #fff;
  text-decoration: underline;
}
hr {
  margin: 25px 0;
  border: 0.5px solid #ffffff44;
}
footer .socials {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}
footer .socials img {
  width: 35px;
 
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
    <li><a href="teacher-home.php">Home</a></li>
    <li><a href="feedback-add.php">Student Feedback</a></li>
    <li><a href="#">Profile</a></li>
    <li><a href="watch-result.php">Result</a></li>
    <li><a href="index.php">Logout</a></li>
  </ul>
</nav>

<!-- Student List -->
<div class="container">
  <h2>Student List</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Photo</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Gender</th>
    </tr>

    <?php
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $photoPath = !empty($row['photo']) ? 'uploads/' . $row['photo'] : 'https://via.placeholder.com/60';
        echo "<tr>
                <td>{$count}</td>
                <td><img src='$photoPath' alt='Profile Photo'></td>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['gender']}</td>
              </tr>";
        $count++;
    }
    ?>
  </table>
</div>

<!-- Footer -->
<footer>
  <div style='max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;'>
    <div style='flex:1; min-width:250px;'>
      <h3>Get In Touch</h3>
      <p>123 Street, Ahmedabad, India</p>
      <p>+91 12345 67890</p>
      <p>project03@google.com</p>
      <div class='socials'>
        <a href='#'><img src='img/Face.png' alt='Facebook'></a>
        <a href='#'><img src='img/Inst.png' alt='Instagram'></a>
        <a href='#'><img src='img/tele.png' alt='Telegram'></a>
        <a href='#'><img src='img/You.png' alt='YouTube'></a>
      </div>
    </div>

    <div style='flex:1; min-width:200px;'>
      <h3>Our Courses</h3>
      <p><a href='#'>Online Quizzes</a></p>
      <p><a href='#'>Flashcards</a></p>
      <p><a href='#'>Practice Tests</a></p>
      <p><a href='#'>Study Games</a></p>
      <p><a href='#'>Group Study</a></p>
    </div>

    <div style='flex:1; min-width:200px;'>
      <h3>Quick Links</h3>
      <p><a href='#'>Privacy Policy</a></p>
      <p><a href='#'>Terms & Conditions</a></p>
      <p><a href='#'>FAQs</a></p>
      <p><a href='#'>Help & Support</a></p>
      <p><a href='#'>Contact</a></p>
    </div>
  </div>
  <hr>
  <p style='text-align:center; color:#ddd; margin-top:20px;'>&copy; 2025 Online Quiz System. All Rights Reserved.</p>
</footer>

</body>
</html>
