<?php
// student-deshbord.php
$con = new mysqli("localhost","root","","quize");
if($con->connect_error){ die("DB Connection failed: ".$con->connect_error); }

$subjects = [];
$result = $con->query("SELECT DISTINCT subject FROM quiz_questions ORDER BY subject");
if($result){
    while($row = $result->fetch_assoc()){
        $subjects[] = $row['subject'];
    }
}
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard | Premium</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
:root {
  --bg-color: #ffffff;
  --text-color: #111111;
  --card-bg: #f9f9f9;
  --accent: #000000;
  --button-bg: #000000;
  --button-hover: #444444;
  --footer-bg: #000000;
  --footer-text: #dddddd;
}

/* ====== BASE ====== */
body {
  font-family: 'Poppins', Arial, sans-serif;
  background-color: var(--bg-color);
  color: var(--text-color);
  margin: 0;
  padding: 0;
  transition: background 0.3s, color 0.3s;
}

/* ===== NAVBAR ===== */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: var(--accent);
  padding: 15px 40px;
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 3px 10px rgba(0,0,0,0.2);
}

.navbar .logo img {
  height: 45px;
}

.navbar ul {
  list-style: none;
  display: flex;
  gap: 30px;
  margin: 0;
  padding: 0;
}

.navbar ul li a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  letter-spacing: 0.5px;
  transition: 0.3s;
}

.navbar ul li a:hover {
  color: #ccc;
  border-bottom: 2px solid #fff;
  padding-bottom: 3px;
}

/* ===== CONTAINER ===== */
.container {
  width: 90%;
  max-width: 700px;
  margin: 70px auto;
  background: var(--card-bg);
  padding: 35px;
  border-radius: 14px;
  box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

h2 {
  text-align: center;
  margin-bottom: 25px;
  border-bottom: 2px solid var(--accent);
  padding-bottom: 10px;
  font-size: 1.8rem;
  color: var(--accent);
}

button, input, select {
  font-family: inherit;
  font-size: 15px;
}

/* ===== SUBJECT BUTTONS ===== */
#subjects {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  justify-content: center;
}

#subjects button {
  background: var(--button-bg);
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 600;
  letter-spacing: 0.3px;
  transition: all 0.3s ease;
}

#subjects button:hover {
  background: var(--button-hover);
  transform: translateY(-2px);
}

/* ===== QUIZ QUESTIONS ===== */
#quiz-container {
  margin-top: 40px;
}

#quiz-container h3 {
  color: var(--accent);
  text-align: center;
  font-size: 1.6rem;
  margin-bottom: 10px;
}

.question {
  background: #fff;
  border-radius: 12px;
  padding: 20px 25px;
  margin-bottom: 25px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  transition: transform 0.2s ease, box-shadow 0.3s ease;
}

.question:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(0,0,0,0.15);
}

.question h3 {
  margin-bottom: 15px;
  color: #111;
  font-size: 1.1rem;
}

.question label {
  display: block;
  background: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 10px 15px;
  margin-bottom: 10px;
  cursor: pointer;
  transition: all 0.3s;
}

.question input[type="radio"] {
  margin-right: 10px;
}

.question label:hover {
  background: #f1f1f1;
  border-color: #aaa;
}

.question input[type="radio"]:checked + span {
  color: var(--accent);
  font-weight: 600;
}

#quiz-container button {
  display: block;
  margin: 20px auto;
  background: var(--button-bg);
  color: #fff;
  padding: 12px 30px;
  font-size: 16px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  letter-spacing: 0.3px;
  transition: background 0.3s, transform 0.2s;
}

#quiz-container button:hover {
  background: var(--button-hover);
  transform: translateY(-2px);
}

/* ===== FOOTER ===== */
footer {
  background: var(--footer-bg);
  color: var(--footer-text);
  padding: 60px 40px 30px;
  margin-top: 70px;
  font-size: 15px;
  letter-spacing: 0.3px;
}

footer h3 {
  color: #fff;
  margin-bottom: 20px;
  font-size: 18px;
}

footer p, footer a {
  color: var(--footer-text);
  text-decoration: none;
  line-height: 1.6;
}

footer a:hover {
  color: #fff;
  text-decoration: underline;
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

hr {
  margin: 30px 0;
  border: 0.5px solid #ffffff33;
}
</style>
</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar">
  <div class="logo">
    <img src="img/logo.png" alt="Logo">
  </div>
  <ul class="nav-links">
    <li><a href="profile.php">Profile</a></li>
    <li><a href="feedback.php">Feedback</a></li>
    <li><a href="student-home.php">Home</a></li>
    <li><a href="student-history.php">History</a></li>
    <li><a href="index.php">Logout</a></li>
  </ul>
</nav>

<!-- ===== CONTAINER ===== -->
<div class="container">
  <h2>Select a Subject</h2>
  <div id="subjects">
    <?php foreach($subjects as $sub): ?>
      <button onclick="selectSubject('<?php echo htmlspecialchars($sub); ?>')">
        <?php echo htmlspecialchars($sub); ?>
      </button>
    <?php endforeach; ?>
  </div>

  <div id="quiz-container"></div>
</div>

<!-- ===== FOOTER ===== -->
<footer>
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;">
    <div style="flex:1; min-width:250px;">
      <h3>Get In Touch</h3>
      <p>123 Street, Ahmedabad, India</p>
      <p>+91 12345 67890</p>
      <p>project03@google.com</p>
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
  <p style="text-align:center; color:#888; margin-top:20px;">&copy; 2025 Online Quiz System. All Rights Reserved.</p>
</footer>

<!-- ===== SCRIPT ===== -->
<script>
let currentQuizData = [];
let currentSubject = "";

async function selectSubject(subject){
  currentSubject = subject;
  try {
    const res = await fetch("get-quize.php?subject=" + encodeURIComponent(subject));
    if(!res.ok) throw new Error(`HTTP error! status: ${res.status}`);
    const data = await res.json();
    currentQuizData = data;
    renderQuiz(data, subject);
  } catch(err){
    console.error("Error:", err);
    document.getElementById("quiz-container").innerHTML = 
      `<p style="color:red;text-align:center;">Failed to load questions for ${subject}.</p>`;
  }
}

function renderQuiz(quizList, subject){
  const container = document.getElementById("quiz-container");
  container.innerHTML = `
    <h3>Quiz on: ${subject}</h3>
    <hr style="margin:10px 0 25px 0; border-color:#000;">
  `;

  if(quizList.length === 0){
    container.innerHTML += "<p style='text-align:center; color:#000;'>No questions found.</p>";
    return;
  }

  quizList.forEach((q, index) => {
    const div = document.createElement("div");
    div.className = "question";
    div.innerHTML = `
      <h3>${index + 1}. ${q.question}</h3>
      <label><input type="radio" name="q${index}" value="A"><span>${q.optionA}</span></label>
      <label><input type="radio" name="q${index}" value="B"><span>${q.optionB}</span></label>
      <label><input type="radio" name="q${index}" value="C"><span>${q.optionC}</span></label>
      <label><input type="radio" name="q${index}" value="D"><span>${q.optionD}</span></label>
    `;
    container.appendChild(div);
  });

  const submitBtn = document.createElement("button");
  submitBtn.textContent = "Submit Quiz";
  submitBtn.onclick = submitQuiz;
  container.appendChild(submitBtn);
}

function submitQuiz(){
  if(currentQuizData.length===0){ alert("Select a quiz first!"); return; }
  let score=0, total=currentQuizData.length;
  currentQuizData.forEach((q,index)=>{
    const sel = document.querySelector(`input[name="q${index}"]:checked`);
    if(sel && sel.value===q.correct) score++;
  });
  const percentage = Math.round((score/total)*100);
  const form = document.createElement("form");
  form.method="POST"; form.action="result.php";
  form.innerHTML = `
    <input type="hidden" name="subject" value="${currentSubject}">
    <input type="hidden" name="total" value="${total}">
    <input type="hidden" name="score" value="${score}">
    <input type="hidden" name="percentage" value="${percentage}">
  `;
  document.body.appendChild(form); form.submit();
}
</script>
</body>
</html>
