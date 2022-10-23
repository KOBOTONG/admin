<?php 
   require_once 'conec.php';
if (isset($_POST['submit'])) {
    $update_id = $_GET['id_form'];
 $licsen = $_POST['usernamebook'];
 $fname =  $_POST['fnamebook'];
 $lname =  $_POST['lnamebook'];
 $stmo = $_POST['stmonth'];
 $styer = $_POST['styear'];
 $tomo = $_POST['tomonth'];
 $toyer = $_POST['toyear'];
 $detail = $_POST['resultmy'];
 $status = $_POST['status'];
 $checkin = date('Y-m-d H:i:s');


 $update_query = "UPDATE booking SET parking='$checkin' WHERE nobook='$update_id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Post has been updated');</script>";
        header("location: view_booking.php");
    } else {
        echo "<script>alert('Something wrong!');</script>";
    }

}

?>