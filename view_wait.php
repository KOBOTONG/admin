<?php

session_start();
require_once 'conec.php';
if (!isset($_SESSION['admin_login'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ!');</script>";
    echo "<script>window.location.href='login.php'</script>";
} else {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wait for Booking</title>
        <link rel="stylesheet" type="text/css" href="css/book4.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    </head>

    <body>
        
            <form action="admin.php">
                <button name="submit" class="button3">Home</button>
            </form>
            <form action="info.php">
                <button name="submit" class="button"> Information Customer</button>
            </form>

            <form action="view_booking.php">
                <button name="submit" class="button2">Booking Details </button>
            </form>

            <form action="view_wait.php">
                <button name="submit" class="button5">Wait for booking</button>
            </form>
            <form action="view_com.php">
                <button name="submit" class="button6">Booking Complete</button>
            </form>


            <div class="text-center mt-2">
                <h1>Wait for Booking</h1>
                <form action="search.php" method="get" enctype="multipart/form-data">
                    <br></br>
                    <input type="text" name="value" placeholder="Booking licsenplate" >               
                <button type="submit" name="search" value="search" class="button4">search </button>
                    
                </form>
            
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
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Slip</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php
                            

                            $select_post = "SELECT *
                            FROM booking 
                            WHERE status = 'Wait for booking' 
                           ";

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
                                $details = $row['resultmy'];
                                $status = $row['status'];
                                $slip = $row['slip'];

                            ?>

                                <tr>

                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $licsen; ?></td>
                                    <td><?php echo $name; ?> <?php echo $lname; ?></td>
                                    <td><?php echo $stmo; ?> <?php echo $styer; ?></td>
                                    <td><?php echo $tomo; ?> <?php echo $toyer; ?></td>
                                    <td><?php echo $details; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><img width="200" src="<?php echo $slip; ?>"></td>
                                    <td><a href="edit_booking.php?edit=<?php echo $id; ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="del_booking.php?del=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>

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