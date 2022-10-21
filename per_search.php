<?php 
session_start(); 
require_once 'config/db.php';
if (!isset($_SESSION['personnel_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
}
?>
<html>
<head>
	
	<title> Check Userparink</title>
	<link rel="stylesheet" type="text/css" href="search.css">
</head>

<body>
    
    <img src="Parking-pana.png"class = "img1" width="300px" >
<?php

$con = new PDO("mysql:host=localhost; dbname=dtb;",'dbsafespace','mt123456789');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `booking` WHERE usernamebook = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<?php 

if (isset($_SESSION['personnel_login'])) {
    $user_id = $_SESSION['personnel_login'];
    $stmt = $conn->query("SELECT * FROM `personnnel` WHERE id = $user_id");
    $stmt->execute();
    $sum = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
        <h2> Check data user by <?php echo $sum['username_per']; ?></h2>
    
        <div class="container">
        <form >
        <h3 class="mt-5">Licsen plate : <?php echo $row->usernamebook; ?></h3>
        <h3 class="mt-5">Firstname : <?php echo $row->fnamebook;  ?>              <?php echo $row->lnamebook; ?></h3>
        <h3 class="mt-5">Start : <?php echo $row->stmonth; ?>   <?php echo $row->styear; ?></h3>       
        <h3 class="mt-5">End : <?php echo  $row->tomonth; ?>     <?php echo $row->toyear; ?></h3> 
        <h3 class="mt-5">Detail : <?php echo $row->resultmy; ?></h3>
        <h3 class="mt-5">Status : <?php echo  $row->status ?></h3>
      
        
 
          <?php }
		
		
		else{
			echo "<script>alert('Not found a parking detail!');</script>";
            echo "<script>window.location.href='checkparking.php'</script>";
		}
        }?>
        </form >
    
    </div>
    <form action="checkin.php">
    <button name="in" class="button" >  check-in </button>
</form>
<form action="per_check.php">
    <button name="checkout" class="button1" value="0">  check-out </button>
    </form>
</body>
</html>