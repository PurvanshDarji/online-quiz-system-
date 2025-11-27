<?php
session_start();
include 'db.php';

// अगर user login नहीं है तो redirect करो
if(!isset($_SESSION['student_name'])){
  header("Location: index.php");
  exit;
}

$student_name = $_SESSION['student_name'];

// Student के नाम से result निकालो
$sql = "SELECT id, subject, total_questions, score, percentage, created_at 
        FROM results 
        WHERE student_name = ? 
        ORDER BY created_at DESC";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $student_name);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>My Quiz History | Online Quiz System</title>
<style>
:root {
  --primary: #f0f0f0;
  --secondary: #dcdcdc;
  --dark-bg: #2f2f2f;
  --light-text: #f0f0f0;
  --accent: #2196f3;
  --highlight: #ffd54f;
}
* { margin:0; padding:0; box-sizing:border-box; font-family:"Segoe UI",sans-serif; }
body {
  background:linear-gradient(135deg, var(--primary), var(--secondary));
  color:#333; min-height:100vh; display:flex; flex-direction:column;
}
.navbar {
  display:flex; justify-content:space-between; align-items:center;
  padding:15px 40px; background:var(--dark-bg);
}
.navbar h1 { color:var(--light-text); }
.navbar a { color:var(--light-text); margin-left:20px; text-decoration:none; transition:0.3s; }
.navbar a:hover { color:#00e1ff; }
.container {
  width:90%; max-width:900px; margin:100px auto; background:#fff;
  border-radius:15px; box-shadow:0 8px 25px rgba(0,0,0,0.15);
  padding:30px;
}
h2 { text-align:center; color:#2f2f2f; margin-bottom:20px; }
table {
  width:100%; border-collapse:collapse; margin-top:20px;
}
th, td {
  padding:12px; text-align:center; border-bottom:1px solid #ccc;
}
th {
  background:#9e6e6e; color:#fff;
}
tr:hover { background:#f3eaea; }
button {
  margin-top:20px; padding:12px 30px; font-size:16px;
  background:var(--accent); color:#fff; border:none; border-radius:10px; cursor:pointer;
}
button:hover { background:#0288d1; transform:scale(1.05); }
footer {
  background:var(--dark-bg); color:var(--light-text);
  padding:60px 40px 30px; margin-top:auto;
}
footer h3 { color:var(--highlight); margin-bottom:15px; }
footer p, footer a { color:var(--light-text); }
footer a:hover { color:#fff; text-decoration:underline; }
footer hr { margin:30px 0; border:0.5px solid #ffffff44; }
.socials { display:flex; gap:15px; margin-top:10px; }
.socials img { width:30px; height:30px; }
</style>
</head>
<body>
<nav class="navbar">
  <h1>My Quiz History</h1>
  <div>
    <a href="student-home.php">Home</a>
    <a href="profile.php">Profile</a>
        <a href="student-deshbord.php">Dashboard</a>

    <a href="index.php">Logout</a>
  </div>
</nav>

<div class="container">
  <h2> <?php echo htmlspecialchars($student_name); ?>’s Quiz History</h2>

  <?php if($result->num_rows > 0) { ?>
  <table>
    <tr>
      <th>ID</th>
      <th>Subject</th>
      <th>Total</th>
      <th>Score</th>
      <th>Percentage</th>
      <th>Date</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['subject']); ?></td>
      <td><?php echo $row['total_questions']; ?></td>
      <td><?php echo $row['score']; ?></td>
      <td><?php echo $row['percentage']; ?>%</td>
      <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
  </table>
  <?php } else { ?>
    <p style="text-align:center; margin-top:30px; font-size:18px;">📭 Not result Found</p>
  <?php } ?>

  <center><button onclick="window.location.href='student-home.php'">⬅ Back to Home</button></center>
</div>

<footer>
  <div style="display:flex; flex-wrap:wrap; gap:40px; justify-content:space-between; max-width:1200px; margin:auto;">
    <div style="flex:1; min-width:250px;">
      <h3>Get In Touch</h3>
      <p>123 Street, Ahmedabad, India</p>
      <p>+91 12345 67890</p>
      <p>project03@google.com</p>
      <div class="socials">
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
  <p style="text-align:center; color:#ddd;">© 2025 Online Quiz System. All Rights Reserved.</p>
</footer>
</body>
</html>

<?php
$stmt->close();
$con->close();
?>
