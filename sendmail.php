<?php
$to = "";
$subject = "New Password";
$txt = "";
$roll = $_REQUEST["q"];
$servername = "localhost";
$username = "Gurmeet";
$password = "WINDOWSTEN";
$dbname = "studentdb";
$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array(); 
$alphaLength = strlen($alphabet) - 1; 
for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
}
$txt=implode($pass); 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT Email FROM class WHERE Roll=$roll";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$to = $row["Email"];
	mail($to,$subject,$txt);
	echo "Mail has been sent";
}
else{
	echo "Invalid roll number";
}
?>