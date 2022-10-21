<?php
session_start();
require_once 'conec.php';
if (!isset($_SESSION['admin_login'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ!');</script>";
    echo "<script>window.location.href='login.php'</script>";
}
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_query = "SELECT * FROM `booking` WHERE nobook = '$edit_id'";

    $run_edit = mysqli_query($conn, $edit_query);

    while ($edit_row = mysqli_fetch_array($run_edit)) {
        $id = $edit_row['nobook'];
        $licsen = $edit_row['usernamebook'];
        $fname = $edit_row['fnamebook'];
        $lname = $edit_row['lnamebook'];
        $stmo = $edit_row['stmonth'];
        $styer = $edit_row['styear'];
        $tomo = $edit_row['tomonth'];
        $toyer = $edit_row['toyear'];
        $detail = $edit_row['resultmy'];
        $status = $edit_row['status'];
        $slip = $edit_row['slip'];
    }
}
if (isset($_POST['submit'])) {
    $id =  $_GET['nobook'];
 $licsen = $_POST['usernamebook'];
 $fname =  $_POST['fnamebook'];
 $lname =  $_POST['lnamebook'];
 $stmo = $_POST['stmonth'];
 $styer = $_POST['styear'];
 $tomo = $_POST['tomonth'];
 $toyer = $_POST['toyear'];
 $detail = $_POST['resultmy'];
 $status = $_POST['status'];



 $update_query = "UPDATE `booking` SET `stmonth`='$stmo',`styear`='$styer',`tomonth`='$tomo',
                 `toyear`='$toyer',`status`='$status' WHERE `nobook`='$id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Post has been updated');</script>";
        header("location: view_booking.php");
    } else {
        echo "<script>alert('Something wrong!');</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    
    <link rel="stylesheet" type="text/css" href="editbook.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    
</head>

<body>
    <img src="Toggle-bro.png"class = "img1" width="400px" >
    <div class="container">
        <div class="center">
        <div class="row">
            <div class="col-sm-6">
            
                <h2>Edit booking Details</h2>
                <form method="post" action="edit_booking.php?edit_form=<?php echo $id; ?>" enctype="multipart/form-data">
                <hr>

                    <label>No</label></p>
                    <input type="text" name="no" class="form-control" readonly value="<?php echo $licsen; ?>"></p>

                    <label>Firstname</label></p>
                    <input type="text" name="fnamebook" class="form-control" readonly value="<?php echo $fname; ?>"></p>
                    <label>Lastname</label></p>
                    <input type="text" name="lnamebook" class="form-control" readonly value="<?php echo $lname; ?>"></p>
                    <label>Start Month</label></p>
                    <input type="text" name="stmonth" class="form-control" value="<?php echo $stmo; ?>"></p>
                    <label>Start Year</label></p>
                    <input type="text" name="styear" class="form-control" value="<?php echo $styer; ?>"></p>
                    <label>To Month</label></p>
                    <input type="text" name="tomonth" class="form-control" value="<?php echo $tomo; ?>"></p>
                    <label>To Year</label></p>
                    <input type="text" name="toyear" class="form-control" value="<?php echo $toyer; ?>"></p>
                    <label>Status</label></p>
                    <input type="text" name="status" class="form-control" value="<?php echo $status; ?>"></p>
                
                        <br>
                        <input type="submit" name="submit" value="Update Now">

                        </br></p>
                   
                </form>

</div>

            </div>
        </div>
    </div>
</body>

</html>