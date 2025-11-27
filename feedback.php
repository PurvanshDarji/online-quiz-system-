<?php
// ===== Database Connection =====
$con = new mysqli("localhost", "root", "", "quize");
if ($con->connect_error) {
    die("Database Connection Failed: " . $con->connect_error);
}

$message = "";

// ===== Form Submission Logic =====
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $feedback = $con->real_escape_string($_POST['feedback']);

    if (!empty($name) && !empty($email) && !empty($feedback)) {
        $sql = "INSERT INTO feedback (user_name, email, message) VALUES ('$name', '$email', '$feedback')";
        if ($con->query($sql)) {
            $message = "Thank you! Your feedback has been submitted successfully.";
        } else {
            $message = "Error: " . $con->error;
        }
    } else {
        $message = "Please fill all fields!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback</title>

<style>
:root {
  --bg-light: #ffffff;
  --bg-dark: #f5f5f5;
  --text-dark: #111;
  --text-light: #fff;
  --accent: #000;
  --shadow: rgba(0,0,0,0.15);
}

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

/* Navbar */
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

/* Feedback Container */
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

.message {
  text-align: center;
  margin-bottom: 15px;
  font-weight: 600;
  color: green;
}

form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input, textarea {
  padding: 12px 14px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 15px;
  background: #fafafa;
  transition: 0.3s;
}

input:focus, textarea:focus {
  border-color: #000;
  outline: none;
  background: #fff;
}

textarea {
  resize: vertical;
  min-height: 120px;
}

button {
  background: #000;
  color: #fff;
  border: none;
  padding: 12px;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  background: #444;
}

/* Footer */
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

<!-- Navbar -->
<nav class="navbar">
  <div class="logo">
      <img src="img/logo.png" alt="Logo">
  </div>
  <ul class="nav-links">
      <li><a href="student-deshbord.php">Dashboard</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="student-home.php">Home</a></li>
      <li><a href="student-history.php">History</a></li>
      <li><a href="index.php">Logout</a></li>
  </ul>
</nav>

<!-- Feedback Form -->
<div class="container">
    <h2>Send Us Your Feedback</h2>
    <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="email" name="email" placeholder="Enter your email" required>
        <textarea name="feedback" placeholder="Write your feedback..." required></textarea>
        <button type="submit">Submit Feedback</button>
    </form>
</div>

<!-- Footer -->
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
