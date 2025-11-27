<?php
$con = new mysqli("localhost", "root", "", "quize");

if ($con->connect_error) {
    die("❌ Connection failed: " . $con->connect_error);
}
?>
