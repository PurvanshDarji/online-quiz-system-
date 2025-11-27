<?php
$con = new mysqli("localhost","root","","quize"); 
if($con->connect_error){ die("DB Connection failed: ".$con->connect_error); }

$message = "";
$subjects = ["HTML", "CSS", "JavaScript", "PHP"];

if(isset($_POST['new_subject'])){
    $newSubject = ucfirst(trim($_POST['new_subject']));
    if(!in_array($newSubject, $subjects) && $newSubject != ""){
        $subjects[] = $newSubject;
        $message = "✅ New subject '$newSubject' added successfully!";
    } else {
        $message = "⚠️ Subject already exists or invalid.";
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['subject']) && !isset($_POST['new_subject'])){
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
        $stmt = $con->prepare("INSERT INTO quiz_questions (subject,question,optionA,optionB,optionC,optionD,correct) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss",$subject,$question,$optionA,$optionB,$optionC,$optionD,$correct);
        $message = ($stmt->execute()) 
            ? "✅ Question added successfully for <strong>$subject</strong>!" 
            : "❌ Error: ".$stmt->error;
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher Dashboard | Online Quiz System</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}
body{background:#f7f7f7;color:#000;display:flex;flex-direction:column;min-height:100vh}
nav{display:flex;align-items:center;justify-content:space-between;background:#000;color:#fff;padding:15px 30px}
nav img{height:40px}
nav ul{display:flex;list-style:none;gap:25px}
nav ul li a{color:#fff;text-decoration:none;font-weight:500;transition:.3s}
nav ul li a:hover{color:#ccc}
.container{flex:1;display:flex;justify-content:center;align-items:center;padding:40px}
.card{background:#fff;border-radius:16px;box-shadow:0 4px 12px rgba(0,0,0,0.15);padding:30px;max-width:600px;width:100%}
.card h2{text-align:center;margin-bottom:25px;font-size:22px}
form{display:flex;flex-direction:column;gap:15px}
input,textarea,select{padding:10px;border:1px solid #ccc;border-radius:8px;font-size:14px;width:100%}
button{background:#000;color:#fff;border:none;padding:12px;border-radius:8px;cursor:pointer;transition:.3s;font-size:15px}
button:hover{background:#333}
.add-btn{background:#fff;color:#000;border:1px solid #000;font-weight:600;margin-top:10px}
.add-btn:hover{background:#000;color:#fff}
#addSubjectForm{display:none;margin-top:20px}
.message{text-align:center;margin-bottom:15px;font-weight:500}
footer{background:#000;color:#fff;padding:40px 20px 20px;margin-top:auto}
footer h3{margin-bottom:10px;color:#fff}
footer p,footer a{color:#ddd;text-decoration:none;font-size:14px;line-height:1.6}
footer a:hover{text-decoration:underline}
.socials img{height:24px;width:24px;margin-right:8px;}

hr{border:none;border-top:1px solid #444;margin-top:30px}
</style>
</head>
<body>
<nav>
  <img src="img/logo.png" alt="Logo">
  <ul>
    <li><a href="teacher-home.php">Home</a></li>
    <li><a href="edit-questions.php">Manage Questions</a></li>
      <li><a href="feedback-add.php">Feedback</a></li>
    <li><a href="index.php">Logout</a></li>
  </ul>
</nav>

<div class="container">
  <div class="card">
    <h2>Add New Question</h2>
    <?php if($message!="") echo "<div class='message'>$message</div>"; ?>

    <form method="POST">
      <select name="subject" required>
        <option value="">-- Select Subject --</option>
        <?php foreach($subjects as $s){ echo "<option value='$s'>$s</option>"; } ?>
      </select>

      <textarea name="question" placeholder="Enter Question" required></textarea>
      <input type="text" name="optionA" placeholder="Option A" required>
      <input type="text" name="optionB" placeholder="Option B" required>
      <input type="text" name="optionC" placeholder="Option C" required>
      <input type="text" name="optionD" placeholder="Option D" required>
      <input type="text" name="correct" placeholder="Correct Option (A/B/C/D)" required>
      <button type="submit">Add Question</button>
    </form>

    <button class="add-btn" id="toggleSubject">+ Add New Subject</button>

    <form method="POST" id="addSubjectForm">
      <input type="text" name="new_subject" placeholder="Enter New Subject"><br><br>
      <button type="submit">Add Subject</button>
    </form>
  </div>
</div>

<footer>
  <div style="display:flex; flex-wrap:wrap; gap:40px; justify-content:space-between; max-width:1200px; margin:auto;">
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
document.getElementById("toggleSubject").addEventListener("click", function(){
  const form = document.getElementById("addSubjectForm");
  form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none";
});
</script>
</body>
</html>
