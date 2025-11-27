<?php
$con = new mysqli("localhost","root","","quize"); // ✅ same DB
if($con->connect_error){ die("DB Connection failed: ".$con->connect_error); }

$subject = $_GET['subject'] ?? '';
if(!$subject){ echo json_encode([]); exit; }

$stmt = $con->prepare("SELECT * FROM quiz_questions WHERE LOWER(subject) = LOWER(?)");
$stmt->bind_param("s",$subject);
$stmt->execute();
$result = $stmt->get_result();
$questions = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

header('Content-Type: application/json');
echo json_encode($questions);
?>
