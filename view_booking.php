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
    <title>View Booking</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
        <h1>Welcome to Admin Panel</h1>
        
        <section class="content">
        <div class="content__grid">
            <div class="sidebar">
               
                <h3><a href="admin.php">Home</a>          <a href="view_booking.php">Booking</a></h3>
            
                
            </div>
            <div class="showinfo">
            <h2>Booking</h2>
                <table class="table">
                <thead class="thead-dark">
           
                <tr>
                    <th>NO</th>
                    <th>Licsen Plate</th>
                    <th>Name</th>
                    <th>Start</th>
                    <th>Year</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Slip</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <?php
               
                    $select_post = "SELECT * FROM booking ";

                    $query_post = mysqli_query($conn, $select_post);

                    while ($row = mysqli_fetch_array($query_post)) {
                        $id = $row['nobook'];
                        $licsen = $row['usernamebook'];
                        $name = $row['fnamebook'];
                        $lname = $row['lnamebook'];
                        $stmo = $row['stmonth'];
                        $styer = $row['styear'];
                        $tomo = $row['tomonth'];
                        $toyer = $row['toyear'];
                        $detail = $row['resultmy'];
                        $status = $row['status'];
                        $slip = $row['slip'];
                        
                ?>
                
                <tr>
                
                <td><?php echo $id; ?></td>
                        <td><?php echo $licsen; ?></td>
                        <td><?php echo $name; ?> <?php echo $lname; ?></td>
                        <td><?php echo $stmo; ?> <?php echo $styer; ?></td>
                        <td><?php echo $tomo; ?> <?php echo $toyer; ?></td>
                        <td><?php echo $detail; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><img width="100"  src="<?php echo $slip; ?>"></td>
                        <td><a href="edit_booking.php?edit=<?php echo $id; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href=" " class="btn btn-danger">Delete</a></td>
                                 
                </tr>   
<?php
 }  ?>  
                </table>
                
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