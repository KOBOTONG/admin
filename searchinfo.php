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
        <title>View Booking</title>
        <link rel="stylesheet" type="text/css" href="css/book3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <form action="admin.php">
                <button name="submit" class="button3">Home</button>
            </form>
            <form action="info.php">
                <button name="submit" class="button"> Information Customer</button>
            </form>

            <form action="view_booking.php">
                <button name="submit" class="button2">Booking Details </button>
            </form>


            <div class="text-center mt-2">
                <h1>Information Customer </h1>


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
                                    <th>Vehicle</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php
                            if (isset($_GET['search'])) {
                                $search_value = $_REQUEST['value'];
                            }
                            if (empty($search_value)) {
                                echo "<h3 style='margin-top:2rem; text-align: center; color:red;'>Oops!!, can not find any data type someting</h3>";
                            } else {
                                $search_query = "SELECT * FROM acc_user WHERE username LIKE '%$search_value%'";


                                $run_query = mysqli_query($conn, $search_query);

                                while ($search_row = mysqli_fetch_array($run_query)) {

                                    $id = $search_row['no'];
                                    $licsen = $search_row['username'];
                                    $fname = $search_row['fname'];
                                    $lname = $search_row['lname'];
                                    $mailuser = $search_row['mailuser'];
                                    $pass = $search_row['passuser'];
                                    $phone = $search_row['phone'];
                                    $iden = $search_row['iden'];
                                    $vehi = $search_row['vehicle'];

                            ?>

                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $licsen; ?></td>
                                        <td><?php echo $fname; ?> <?php echo $lname; ?></td>
                                        <td><?php echo $mailuser; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><img width="200" src="<?php echo $iden; ?>"></td>
                                        <td><img width="200" src="<?php echo $vehi; ?>"></td>
                                        <td><a href="del_info.php?del=<?php echo $id; ?>" class="btn btn-warning">Delete</a></td>



                                    </tr>
                            <?php
                                }
                            } ?>
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