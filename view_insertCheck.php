<?php
//view_insertCheck.php

$servername = "localhost";
$username = "dbsafespace";
$password = "mt123456789";
$dbname = "dtb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST["hidden_status"]))
{
	$status=$_POST['hidden_status'];
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user_status(status) VALUES ('".$status."')";
//$sql = "INSERT INTO booking(parking) VALUES ('".$status."')";

if ($conn->query($sql) === TRUE) {
    echo 'done';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
}
?>
