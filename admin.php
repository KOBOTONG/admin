<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        echo "<script>alert('กรุณาเข้าสู่ระบบ!');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="admin2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet"></head>

<body>
    <div class="container">
        <?php 

            if (isset($_SESSION['admin_login'])) {
                $admin_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM `personnnel` WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <h1 >Welcome Admin, <?php echo $row['name'] . ' ' . $row['lastname'] ?></h1>
        <br>
        
               <img src="Admin-cuate.png"class = "img1" width="250px" >
               <img src="Toggle-bro.png"class = "img2" width="250px" ></br>
              <form action="info.php" >
                <button name="submit" class="button"> Information Customer</button>
            </form> 
               
                <form action="view_booking.php" >
                <button name="submit" class="button2">Booking Details </button>
            </form> 
                
               
             
                
            
    <form action="logout.php">
<button name="submit" class="button1"> Log out</button>

</form>
    </div>
</body>
</html>