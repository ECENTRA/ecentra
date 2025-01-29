<?php
$servername = "localhost";
$username = "ecentrak_fest";
$password = "tadi_ECE@18";
$dbname = "ecentrak_un";
$name1 = $_POST["name1"];
$id1 = $_POST["id1"];
$name2 = $_POST["name2"];
$id2 = $_POST["id2"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$acc = $_POST["acc"];
$college = $_POST["college"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
		$sql = "INSERT INTO cisco (name1, id1, name2, id2, email, phone, acc, college)
VALUES ('$name1', '$id1', '$name2', '$id2', '$email', '$phone', '$acc', '$college')";
		if ($conn->query($sql) === TRUE) {
    header("location:http://ecentra2k18.in/successful.html");
} else {
    header("location:http://ecentra2k18.in/unsuccessful.html");
}

$conn->close();
?>