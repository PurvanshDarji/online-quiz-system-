<?php
session_start();
include 'db.php'; // Database connection

// Handle Login
$login_error = "";
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM studentss WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password, $user['password'])){
            // ✅ Store full name and username in session
            $_SESSION['student_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['student_name'] = $user['fullname']; // <-- Added line

            header("Location: student-home.php");
            exit;
        } else {
            $login_error = "Incorrect password!";
        }
    } else {
        $login_error = "Username not found!";
    }
}

// Handle Signup
$signup_error = $signup_success = "";
if(isset($_POST['signup'])){
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);

    if($password !== $cpassword){
        $signup_error = "Passwords do not match!";
    } else {
        $check = mysqli_query($con, "SELECT * FROM studentss WHERE username='$username' OR email='$email'");
        if(mysqli_num_rows($check) > 0){
            $signup_error = "Username or Email already exists!";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO studentss (fullname, username, email, password, gender) VALUES ('$fullname','$username','$email','$hashedPassword','$gender')";
            if(mysqli_query($con, $sql)){
                // ✅ Automatically log in after signup
                $new_id = mysqli_insert_id($con);
                $_SESSION['student_id'] = $new_id;
                $_SESSION['username'] = $username;
                $_SESSION['student_name'] = $fullname; // <-- Added line

                header("Location: student-home.php");
                exit;
            } else {
                $signup_error = "Error: ".mysqli_error($con);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login & Signup</title>
<style>
:root {
  --primary: #f0f0f0;
  --secondary: #dcdcdc;
  --dark-bg: #2f2f2f;
  --light-text: #f0f0f0;
  --accent: #2196f3;
  --highlight: #ffd54f;
}

/* ===== Reset & Base ===== */
* {margin:0; padding:0; box-sizing:border-box; font-family:"Segoe UI",sans-serif;}
body {background: linear-gradient(135deg,var(--primary),var(--secondary)); color:#333; min-height:100vh; display:flex; flex-direction:column;}

/* ===== Navbar ===== */
.navbar {
  display:flex; justify-content:space-between; align-items:center;
  padding:15px 40px; background-color: var(--dark-bg);
  box-shadow: 0 4px 10px rgba(0,0,0,0.1); position:sticky; top:0; z-index:100;
}
.navbar .logo img {height:60px;}
.nav-links {display:flex; list-style:none; margin-left:auto;}
.nav-links li {margin-left:25px;}
.nav-links li button {background:transparent; border:none; padding:8px 14px; cursor:pointer; border-radius:8px; transition:0.3s;}
.nav-links li button a {color:var(--light-text); text-decoration:none; font-weight:600; font-size:18px;}
.nav-links li button:hover {background:#444; transform:translateY(-2px);}
.nav-links li button:hover a {color:#00e1ff;}

/* ===== Container / Box ===== */
.container {flex:1; display:flex; justify-content:center; align-items:center; padding:50px; margin-top:80px;}
.box {display:flex; overflow:hidden; max-width:1000px; width:100%; min-height:550px; border-radius:14px; box-shadow:0 8px 20px rgba(0,0,0,0.25); background:#fff;}
.image-side {flex:1; background:url('img/p1.png') no-repeat center center; background-size:cover;}
.form-side {flex:1; padding:40px 30px; text-align:center; background-color: var(--primary);}

/* ===== Form Elements ===== */
h2 {margin-bottom:25px; color:var(--dark-bg); font-size:26px;}
input, select {width:100%; padding:12px; margin:10px 0; border:1px solid #ccc; border-radius:8px; font-size:15px;}
button {width:100%; padding:14px; margin-top:15px; border:none; border-radius:10px; font-weight:bold; font-size:16px; cursor:pointer; box-shadow:0 4px 15px rgba(0,0,0,0.15);}
button[name="login"] {background-color: var(--accent); color:#fff;}
button[name="login"]:hover {background-color:#0288d1;}
button[name="signup"] {background-color: var(--highlight); color:#4a3a3a; border:2px solid #f3c623;}
button[name="signup"]:hover {background-color:#f7b733;}

/* ===== Switch Buttons ===== */
.switch-btns {display:flex; justify-content:space-between; margin-bottom:20px;}
.switch-btns button {flex:1; margin:0 5px; background-color: var(--dark-bg); color: var(--light-text); border:none; font-weight:bold; border-radius:8px; cursor:pointer; padding:10px 0;}
.switch-btns button:hover {background-color:#444;}

/* ===== Hidden Class ===== */
.hidden {display:none;}

/* ===== Error/Success Messages ===== */
.msg {margin-bottom:15px; font-weight:bold;}
.error {color:red;}
.success {color:green;}

/* ===== Back to Home ===== */
.back-home {display:block; margin-top:25px; color: var(--dark-bg); text-decoration:none; font-weight:bold;}
.back-home:hover {color:#00e1ff;}

/* ===== Footer ===== */
footer {background: var(--dark-bg); color: var(--light-text); padding:60px 40px 30px; margin-top:50px;}
footer h3 {color: var(--highlight); margin-bottom:20px;}
footer p, footer a {font-size:15px; color:var(--light-text); text-decoration:none;}
footer a:hover {text-decoration:underline; color:#fff;}
hr {margin:30px 0; border:0.5px solid #ffffff44;}
footer .socials {margin-top:15px; display:flex; gap:15px; align-items:center;}
footer .socials img {width:35px;}
footer .socials a:hover {filter:brightness(1.2);}
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="logo"><img src="img/logo.png" alt="Logo"></div>
  <ul class="nav-links">
    <li><button><a href="index.php">Home</a></button></li>
    <li><button><a href="about.php">About</a></button></li>
  </ul>
</nav>

<!-- Main Box -->
<div class="container">
  <div class="box">
    <div class="image-side"></div>
    <div class="form-side">
      <div class="switch-btns">
        <button type="button" onclick="showLogin()">Login</button>
        <button type="button" onclick="showSignup()">Sign Up</button>
      </div>

      <!-- Login Form -->
      <form id="loginForm" method="POST" class="<?php if(isset($signup_success)){echo 'hidden';} ?>">
        <h2>Student Login</h2>
        <?php if($login_error){echo '<p class="msg error">'.$login_error.'</p>';} ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
      </form>

      <!-- Signup Form -->
      <form id="signupForm" method="POST" class="<?php if(!isset($signup_success)){echo 'hidden';} ?>">
        <h2>Student Sign Up</h2>
        <?php 
          if($signup_error){echo '<p class="msg error">'.$signup_error.'</p>';} 
          if($signup_success){echo '<p class="msg success">'.$signup_success.'</p>';} 
        ?>
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="cpassword" placeholder="Confirm Password" required>
        <select name="gender" required>
          <option value="">Select Gender</option>
          <option value="Man">Man</option>
          <option value="Woman">Woman</option>
          <option value="Other">Other</option>
        </select>
        <button type="submit" name="signup">Sign Up</button>
      </form>

      <a href="index.php" class="back-home">&larr; Back to Home</a>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;">
    <div style="flex:1; min-width:250px;">
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

<script>
function showLogin(){
  document.getElementById('loginForm').classList.remove('hidden');
  document.getElementById('signupForm').classList.add('hidden');
}
function showSignup(){
  document.getElementById('signupForm').classList.remove('hidden');
  document.getElementById('loginForm').classList.add('hidden');
}
document.getElementById('hamburger').addEventListener('click', function(){
  document.querySelector('.nav-links').classList.toggle('active');
});
</script>
</body>
</html>
