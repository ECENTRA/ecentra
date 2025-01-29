<?php
$servername = "localhost";
$username = "ecentrai_gururaja";
$password = "Gururaja@369";
$dbname = "ecentrai_registration";
$name = $_POST["name"];
$regno = $_POST["regno"];
$code = $_POST["code"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="INSERT INTO crackguru (name, regno,code)
VALUES ('$name', '$regno','$code')";

	if ($conn->query($sql) === TRUE) {
    header("location: ../p1921c.html");
}
else{
    header("location: ../connfail.html");
}

	  
$conn->close();
?>
