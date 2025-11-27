<?php
session_start();
include 'db.php';

// ✅ Check login
if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit;
}

$student_id = intval($_SESSION['student_id']);
$msg = "";

// ✅ Handle profile update
if (isset($_POST['update_profile'])) {
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";

    // ✅ Handle photo upload
    $photo_sql = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo_name = time() . "_" . basename($_FILES['photo']['name']);
        $target = "uploads/" . $photo_name;

        if (!is_dir("uploads")) mkdir("uploads", 0777, true);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $photo_sql = ", photo='$photo_name'";
        } else {
            $msg = "❌ Error uploading photo.";
        }
    }

    // ✅ Build update query
    $update = "UPDATE studentss SET fullname='$fullname', email='$email', gender='$gender'";
    if (!empty($password)) $update .= ", password='$password'";
    $update .= " $photo_sql WHERE id=$student_id";

    if (mysqli_query($con, $update)) {
        $msg = "✅ Profile updated successfully!";
    } else {
        $msg = "❌ Update failed.";
    }
}

// ✅ Get student info
$sql = "SELECT * FROM studentss WHERE id=$student_id";
$result = mysqli_query($con, $sql);
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile</title>
<style>
:root {
  --bg-color: #f5f5f5;
  --text-color: #111;
  --card-bg: #ffffff;
  --accent: #333;
  --button-bg: #111;
  --button-hover: #444;
  --footer-bg: #111;
  --footer-text: #ccc;
}

body {
  font-family: Arial, sans-serif;
  background-color: var(--bg-color);
  color: var(--text-color);
  margin: 0;
  padding: 0;
}

/* ===== NAVBAR ===== */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #000;
  padding: 15px 40px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
  position: sticky;
  top: 0;
  z-index: 1000;
}
.navbar .logo img {
  height: 45px;
}
.navbar ul {
  list-style: none;
  display: flex;
  gap: 25px;
  margin: 0;
  padding: 0;
}
.navbar ul li a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  transition: 0.3s;
}
.navbar ul li a:hover {
  color: #ddd;
  text-decoration: underline;
}

/* ===== PROFILE CARD ===== */
.container {
  width: 90%;
  max-width: 700px;
  margin: 60px auto;
  background: var(--card-bg);
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 0 15px rgba(0,0,0,0.15);
}
h2 {
  text-align: center;
  margin-bottom: 20px;
  border-bottom: 1px solid var(--accent);
  padding-bottom: 10px;
}
.profile-pic {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}
.profile-pic img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  border: 2px solid var(--accent);
  object-fit: cover;
}
.profile-details {
  text-align: center;
  line-height: 1.8;
  color: #333;
  margin-bottom: 20px;
}
button, input, select {
  font-family: inherit;
}
button {
  background: var(--button-bg);
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s;
}
button:hover {
  background: var(--button-hover);
}
.msg {
  text-align: center;
  margin-top: 10px;
  font-weight: bold;
  color: #333;
}

/* ===== EDIT FORM ===== */
.edit-form {
  display: none;
  flex-direction: column;
  gap: 15px;
  margin-top: 20px;
  opacity: 0;
  transform: scale(0.98);
  transition: opacity 0.4s ease, transform 0.3s ease;
}
.edit-form.show {
  display: flex;
  opacity: 1;
  transform: scale(1);
}
input, select {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background: #fff;
  color: var(--text-color);
}
input[type=file] {
  background: none;
  color: #555;
}
input[type=password] {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  background: #fff;
  color: #111;
  transition: 0.3s;
}
input[type=password]:focus {
  border-color: #111;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

.logout {
  display: block;
  text-align: center;
  margin-top: 15px;
  color: #333;
  text-decoration: none;
  font-weight: 600;
}
.logout:hover {
  color: #000;
  text-decoration: underline;
}

/* ===== FOOTER ===== */
footer {
  background: var(--footer-bg);
  color: var(--footer-text);
  padding: 60px 40px 30px;
  margin-top: 60px;
}
footer h3 {
  color: #fff;
  margin-bottom: 20px;
}
footer p,
footer a {
  font-size: 15px;
  color: var(--footer-text);
  text-decoration: none;
}
footer a:hover {
  text-decoration: underline;
  color: #fff;
}
hr {
  margin: 30px 0;
  border: 0.5px solid #ffffff44;
}
footer .socials {
  margin-top: 15px;
  display: flex;
  gap: 15px;
  align-items: center;
}
footer .socials img {
  width: 35px;
  
}

</style>
</head>
<body>

<nav class="navbar">
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <ul class="nav-links">
        <li><a href="student-home.php">Home</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="student-history.php">History</a></li>    
        <li><a href="index.php">Logout</a></li>
    </ul>
</nav>

<div class="container">
    <h2>My Profile</h2>

    <div class="profile-pic">
        <img src="<?php echo (!empty($student['photo'])) ? 'uploads/' . $student['photo'] : 'https://via.placeholder.com/120'; ?>" alt="Profile Photo">
    </div>

    <div class="profile-details">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($student['fullname']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($student['gender']); ?></p>
    </div>

    <div style="text-align:center;">
        <button id="editBtn">Edit Profile</button>
    </div>

    <?php if (!empty($msg)) echo "<p class='msg'>$msg</p>"; ?>

    <form method="POST" enctype="multipart/form-data" class="edit-form" id="editForm">
        <input type="text" name="fullname" value="<?php echo htmlspecialchars($student['fullname']); ?>" placeholder="Full Name" required>
        <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" placeholder="Email" required>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Man" <?php if ($student['gender'] == 'Man') echo 'selected'; ?>>Man</option>
            <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if ($student['gender'] == 'Other') echo 'selected'; ?>>Other</option>
        </select>
        <input type="password" name="password" placeholder="Enter new password (optional)">
        <input type="file" name="photo">
        <button type="submit" name="update_profile">Update Profile</button>
    </form>

    
</div>

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
const editBtn = document.getElementById("editBtn");
const editForm = document.getElementById("editForm");

editBtn.addEventListener("click", () => {
  editForm.classList.toggle("show");
  editBtn.textContent = editForm.classList.contains("show") ? "Cancel Edit" : "Edit Profile";
});
</script>
</body>
</html>
