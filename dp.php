<!-- db.php -->
<?php
$servername = "localhost"; // Assuming localhost; change if different
$username = "upbek8wm1lktc";
$password = "wkctga6nhgu8";
$dbname = "dbwbcuka7s6wek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
