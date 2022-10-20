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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<header>
        <div class="container">
            <h1>Welcome to Admin Page Mr. <?php echo $_SESSION['username']; ?> </h1>
        </div>
    </header>

    <section class="content">
        <div class="content__grid">
            <div class="sidebar">
                <h1>Welcome : </h1>
                <h3><a href="index.php">Home</a></h3>
                <h3><a href="view_booking.php">View Booking</a></h3>
                
            </div>
            <div class="showinfo">
                <h1>Welcome to Admin Panel</h1>

                <img width="640" height="360" src="img/admin.jpg" alt="">
            </div>
        </div>
    </section>
</body>
</html>