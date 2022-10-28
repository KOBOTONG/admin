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
        $details = $edit_row['resultmy'];
        $status = $edit_row['status'];
        $slip = $edit_row['slip'];
    }
}
if (isset($_POST['submit'])) {
    $update_id = $_GET['edit_form'];
 $licsen = $_POST['usernamebook'];
 $fname =  $_POST['fnamebook'];
 $lname =  $_POST['lnamebook'];
 $stmo = $_POST['stmonth'];
 $styer = $_POST['styear'];
 $tomo = $_POST['tomonth'];
 $toyer = $_POST['toyear'];
 $details = $_POST['resultmy'];
 $status = $_POST['status'];



 $update_query = "UPDATE booking SET stmonth='$stmo',styear='$styer',tomonth='$tomo',
                 toyear='$toyer',status='$status' WHERE nobook='$update_id'";
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
    
    <link rel="stylesheet" type="text/css" href="css/editbook.css">
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
                    <!--<input type="text" name="stmonth" class="form-control" value="<?php echo $stmo; ?>"></p>-->
                    <select name="stmonth" class="btn btn-success dropdown-toggle" >
                    <option value="<?php echo $stmo; ?>"><?php echo $stmo; ?></option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select><br></br>
                    <label>Start Year</label></p>
                    <select name="styear" class="btn btn-success dropdown-toggle" >
                    <option value="<?php echo $styer; ?>"><?php echo $styer; ?></option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>

                    </select><br></br>
                    <!--<input type="text" name="styear" class="form-control" value="<?php echo $styer; ?>"></p>-->
                    <label>To Month</label></p>
                    <select name="tomonth" class="btn btn-success dropdown-toggle" >
                    <option value="<?php echo $tomo; ?>"><?php echo $tomo; ?></option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select><br></br>
                    <!--<input type="text" name="tomonth" class="form-control" value="<?php echo $tomo; ?>"></p>-->
                    <label>To Year</label></p>
                    <select name="toyear" class="btn btn-success dropdown-toggle" >
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>

                    </select><br></br>
                    
                    <label>Detail</label></p> 
                    <select name="details" class="btn btn-success dropdown-toggle">
                    <option value="<?php echo $details; ?>"><?php echo $details; ?></option>
                    
                      <option value="1 Month 2800 Bath">1 Month 2800 Bath</option>
                        <option value="2 Month 5600 Bath">2 Month 5600 Bath</option>
                        <option value="3 Month 8400 Bath">3 Month 8400 Bath</option>
                    </select><br></br>
                    <label>Status</label></p>
                    <!--<input type="text" name="status" class="form-control" value="<?php echo $status; ?>"></p>-->
                    <div class="dropdown">
                    <select name="status" class="btn btn-success dropdown-toggle"> 
                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                        <option value="Wait for booking">Wait for booking</option>
                        <option value="Complete">Complete</option>
                      
                        
                    </select></div><br></br>
                
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