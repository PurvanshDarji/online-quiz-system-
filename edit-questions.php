<?php
$con = new mysqli("localhost","root","","quize");
if($con->connect_error){ die("DB Connection failed: ".$con->connect_error); }

$message = "";

// Delete question
if(isset($_GET['delete_id'])){
    $id = intval($_GET['delete_id']);
    $con->query("DELETE FROM quiz_questions WHERE id=$id");
    $message = ($con->affected_rows>0) ? "🗑️ Question deleted successfully!" : "❌ Error deleting question!";
}

// Update question
if(isset($_POST['update'])){
    $id = intval($_POST['id']);
    $subject = ucfirst(strtolower(trim($_POST['subject'])));
    $question = trim($_POST['question']);
    $optionA = trim($_POST['optionA']);
    $optionB = trim($_POST['optionB']);
    $optionC = trim($_POST['optionC']);
    $optionD = trim($_POST['optionD']);
    $correct = strtoupper(substr(trim($_POST['correct']),0,1));

    if(!in_array($correct,['A','B','C','D'])){
        $message = "❌ Correct option must be A / B / C / D";
    } else {
        $stmt = $con->prepare("UPDATE quiz_questions SET subject=?, question=?, optionA=?, optionB=?, optionC=?, optionD=?, correct=? WHERE id=?");
        $stmt->bind_param("sssssssi",$subject,$question,$optionA,$optionB,$optionC,$optionD,$correct,$id);
        $message = ($stmt->execute()) ? "✅ Question updated successfully!" : "❌ Update failed!";
        $stmt->close();
    }
}

// Edit form data
$editData = null;
if(isset($_GET['edit_id'])){
    $id = intval($_GET['edit_id']);
    $res = $con->query("SELECT * FROM quiz_questions WHERE id=$id");
    if($res && $res->num_rows>0){
        $editData = $res->fetch_assoc();
    }
}

// Get distinct subjects for dropdown
$subjects = [];
$subRes = $con->query("SELECT DISTINCT subject FROM quiz_questions ORDER BY subject");
if($subRes){
    while($row = $subRes->fetch_assoc()){
        $subjects[] = $row['subject'];
    }
}

// Filter by subject
$selectedSubject = isset($_GET['subject']) ? $_GET['subject'] : "";
$sql = "SELECT * FROM quiz_questions";
if($selectedSubject != ""){
    $sql .= " WHERE subject='".$con->real_escape_string($selectedSubject)."'";
}
$sql .= " ORDER BY subject, id DESC";
$questions = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Questions | Online Quiz System</title>
<style>
:root {
  --bg-light: #ffffff;
  --bg-dark: #f5f5f5;
  --text-dark: #111;
  --text-light: #fff;
  --accent: #000;
  --shadow: rgba(0,0,0,0.15);
}
* {margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif;}
body {
  background: linear-gradient(135deg, var(--bg-light), var(--bg-dark));
  min-height: 100vh;
  display: flex; flex-direction: column;
  color: var(--text-dark);
}
nav.navbar {
  background: var(--accent);
  padding: 15px 40px;
  display: flex; justify-content: space-between; align-items: center;
  box-shadow: 0 4px 12px var(--shadow);
}
nav .logo img { width: 45px; height: 45px; border-radius: 50%; }
nav .nav-links { list-style: none; display: flex; gap: 30px; }
nav .nav-links li a {
  text-decoration: none; color: var(--text-light);
  font-weight: 500; transition: 0.3s;
}
nav .nav-links li a:hover { color: #f6d365; }

.container {
  flex: 1;
  width: 90%;
  max-width: 1000px;
  margin: 60px auto;
  background: var(--bg-light);
  border-radius: 15px;
  padding: 35px 40px;
  box-shadow: 0 8px 25px var(--shadow);
}
.container h2 {
  text-align: center; margin-bottom: 25px;
  color: var(--accent); border-bottom: 2px solid #000;
  padding-bottom: 8px; font-weight: 600;
}
form {display: grid; gap: 15px; margin-bottom: 30px;}
form input, form textarea, select {
  padding: 10px; border: 1px solid #aaa; border-radius: 8px; font-size: 15px;
}
form button {
  background: var(--accent); color: #fff; border: none;
  padding: 12px; border-radius: 8px; cursor: pointer; transition: 0.3s; font-weight: 500;
}
form button:hover { background: #222; }
.message { text-align: center; margin-bottom: 20px; color: #333; font-weight: 500; }

.filter-form {
  display:flex; gap:10px; align-items:center;
  margin-bottom:25px; justify-content:center;
}
.filter-form select, .filter-form button {
  padding:8px 12px; border-radius:8px; border:1px solid #aaa; font-size:15px;
}
.filter-form button {
  background:#000; color:#fff; cursor:pointer; transition:0.3s;
}
.filter-form button:hover { background:#222; }

table { width: 100%; border-collapse: collapse; }
th, td {
  padding: 10px; border-bottom: 1px solid #ddd; text-align: left;
}
th { background: #000; color: #fff; }
td a {
  color: #0077ff; text-decoration: none; font-weight: bold; margin-right: 10px;
}
td a.delete { color: red; }
td a:hover { text-decoration: underline; }

footer {
  background: #000; color: #fff;
  padding: 60px 40px 30px; border-top: 2px solid #333;
}
footer h3 { color: #f6d365; margin-bottom: 15px; }
footer p, footer a {
  color: #ddd; font-size: 15px; text-decoration: none; transition: 0.3s;
}
footer a:hover { text-decoration: underline; color: #fff; }
footer .socials {
  margin-top: 15px; display: flex; gap: 15px; align-items: center;
}
footer .socials img { width: 35px; transition: 0.3s; }
footer .socials img:hover { filter: brightness(1.3); }
hr { margin: 30px 0; border: 0.5px solid #ffffff33; }
footer p.copy { text-align: center; margin-top: 15px; color: #bbb; font-size: 14px; }
</style>
</head>
<body>

<nav class="navbar">
  <div class="logo"><img src="img/logo.png" alt="Logo"></div>
  <ul class="nav-links">
      <li><a href="teacher-deshbord.php">Dashboard</a></li>
      <li><a href="feedback-add.php">Feedback</a></li>
       <li><a href="teacher-home.php">Home</a></li>
      <li><a href="index.php">Logout</a></li>
  </ul>
</nav>

<div class="container">
  <h2>Edit or Manage Questions</h2>
  <?php if($message): ?><p class="message"><?= $message ?></p><?php endif; ?>

  <form class="filter-form" method="GET">
      <select name="subject">
          <option value="">-- Select Subject --</option>
          <?php foreach($subjects as $sub): ?>
              <option value="<?= htmlspecialchars($sub) ?>" <?= ($sub==$selectedSubject)?'selected':'' ?>><?= htmlspecialchars($sub) ?></option>
          <?php endforeach; ?>
      </select>
      <button type="submit">Filter</button>
      <a href="edit-questions.php" style="text-decoration:none;"><button type="button">Show All</button></a>
  </form>

  <?php if($editData): ?>
  <form method="POST">
      <input type="hidden" name="id" value="<?= $editData['id'] ?>">
      <input type="text" name="subject" value="<?= htmlspecialchars($editData['subject']) ?>" required>
      <textarea name="question" rows="3" required><?= htmlspecialchars($editData['question']) ?></textarea>
      <input type="text" name="optionA" value="<?= htmlspecialchars($editData['optionA']) ?>" required>
      <input type="text" name="optionB" value="<?= htmlspecialchars($editData['optionB']) ?>" required>
      <input type="text" name="optionC" value="<?= htmlspecialchars($editData['optionC']) ?>" required>
      <input type="text" name="optionD" value="<?= htmlspecialchars($editData['optionD']) ?>" required>
      <input type="text" name="correct" value="<?= htmlspecialchars($editData['correct']) ?>" maxlength="1" required>
      <button type="submit" name="update">Update Question</button>
  </form>
  <?php endif; ?>

  <table>
      <tr>
          <th>ID</th>
          <th>Subject</th>
          <th>Question</th>
          <th>Correct</th>
          <th>Actions</th>
      </tr>
      <?php if($questions && $questions->num_rows>0): ?>
          <?php while($row = $questions->fetch_assoc()): ?>
              <tr>
                  <td><?= $row['id'] ?></td>
                  <td><?= htmlspecialchars($row['subject']) ?></td>
                  <td><?= htmlspecialchars($row['question']) ?></td>
                  <td><?= htmlspecialchars($row['correct']) ?></td>
                  <td>
                      <a href="?subject=<?= urlencode($selectedSubject) ?>&edit_id=<?= $row['id'] ?>">Edit</a>
                      <a href="?subject=<?= urlencode($selectedSubject) ?>&delete_id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Are you sure to delete this question?')">Delete</a>
                  </td>
              </tr>
          <?php endwhile; ?>
      <?php else: ?>
          <tr><td colspan="5" style="text-align:center;">No questions found.</td></tr>
      <?php endif; ?>
  </table>
</div>

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
