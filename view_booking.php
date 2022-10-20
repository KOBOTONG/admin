<?php 

    session_start();
    require_once 'conec.php';
    if (!isset($_SESSION['admin_login'])) {
        echo "<script>alert('กรุณาเข้าสู่ระบบ!');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
        <h1>Welcome to Admin Panel</h1>
        
        <section class="content">
        <div class="content__grid">
            <div class="sidebar">
               <img src="Admin-cuate.png"class = "img1" width="200px" >
                <h3><a href="admin.php">Home</a></h3>
                <h3><a href="view_booking.php">View Booking</a></h3>
                
            </div>
            <div class="showinfo">
           <br>
                <tr>
                    <th>NO</th>
                    <th>Licsen Plate</th>
                    <th>Firstname</th>
                                
                </tr>
                </br>
                <?php
               
                    $select_post = "SELECT * FROM booking order by 1 DESC";

                    $query_post = mysqli_query($conn, $select_post);

                    while ($row = mysqli_fetch_array($query_post)) {
                        $id = $row['nobook'];
                        $licsen = $row['usernamebook'];
                        $name = $row['fnamebook'];
                        $status = $row['status'];
                        $slip = $row['slip'];
                        
                ?>
                <br>
                <tr>
                
                <td><?php echo $id; ?></td>
                        <td><?php echo $licsen; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><img width="100"  src="<?php echo $slip; ?>"></td>
                                 
                </tr> </br>   
<?php
 }  ?>  
            
                
            </div>
        </div>
    </section>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
<?php
}
?>   