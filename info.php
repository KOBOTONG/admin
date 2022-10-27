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
    <title>Information Customer</title>
    <link rel="stylesheet" type="text/css" href="css/book2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container"> 
        <form action="admin.php" >
                <button name="submit" class="button3">Home</button>
            </form>
    <form action="info.php" >
                <button name="submit" class="button"> Information Customer</button>
            </form> 
               
                <form action="view_booking.php" >
                <button name="submit" class="button2">Booking Details </button>
            </form> 
            
            
         <div class="text-center mt-2">      
        <h1>Information Customer</h1>
        <form action="searchinfo.php" method="get" enctype="multipart/form-data">
                    <br></br>
                    <input type="text" name="value" placeholder="Information Customer" >               
                <button type="submit" name="search" value="search" class="button4">search </button>
                    
                </form>
        </div> 
        <section class="content">
        <div class="content__grid">
           
            <br></br>
            <div class="showinfo">
           
                <table class="table">
                <thead class="thead-dark">
           
                <tr>
                    <th>NO</th>
                    <th>Licsen Plate</th>
                    <th>Name</th>
                    <th>Mail</th>
                   
                    <th>Phone</th>
                    <th>Idenficical</th>
                    <th>vehicle</th>
                    
                </tr>
                </thead>
                <?php
               
                    $select_post = "SELECT * FROM `acc_user` ";

                    $query_post = mysqli_query($conn, $select_post);

                    while ($row = mysqli_fetch_array($query_post)) {
                        $id = $row['no'];
                        $licsen = $row['username'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $mailuser = $row['mailuser'];
                        $pass = $row['passuser'];
                        $phone = $row['phone'];
                        $iden = $row['iden'];
                        $vehi = $row['vehicle'];
                        
                        
                ?>
                
                <tr>
                
                <td><?php echo $id; ?></td>
                        <td><?php echo $licsen; ?></td>
                        <td><?php echo $fname; ?> <?php echo $lname; ?></td>
                        <td><?php echo $mailuser; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><img width="200"  src="<?php echo $iden; ?>"></td>
                        <td><img width="200"  src="<?php echo $vehi; ?>"></td>
                        <td><a href="del_info.php?del=<?php echo $id; ?>" class="btn btn-warning">Delete</a></td>
                                 
                </tr>   
<?php
 }  ?>   
                </table>
                 <form action="logout.php">
<button name="submit" class="button1"> Log out</button>

</form>
            </div>
        </div>
    </section>
  
    </div>
</body>
</html>
<?php
}
?>   