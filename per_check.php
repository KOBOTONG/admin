<?php 
session_start(); 
require_once 'config/db.php';
if (!isset($_SESSION['personnel_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
}?>
<html>
<head>
	
	<title> Booking Status </title>
	<link rel="stylesheet" type="text/css" href="check.css">
</head>

<body>
    
	<form action = "per_search.php" method="POST">
    <?php 

if (isset($_SESSION['personnel_login'])) {
    $user_id = $_SESSION['personnel_login'];
    $stmt = $conn->query("SELECT * FROM `personnnel` WHERE id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
		<h2> Booking Status  (  <?php echo $row['username_per']; ?>  )</h2>
    <input type = "search" placeholder="Booking licsenplate" name="search">
	<button name="submit"> Search </button>
	
</form>
<form action="logout.php">
<button name="submit" class="button1"> Log out</button>

</form>

</html>
