<?php
session_start();
require_once 'conec.php';
if (isset($_POST['in'])) {
    $update_id = $_GET['edit_form'];
    $parking = 'Checkin';
    $parking_date = date('y-m-d');
  



 $update_query = "UPDATE booking SET parking='$parking' checkin_date='$parking_date'  WHERE nobook='$update_id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Post has been updated');</script>";
        header("location: view_check.php");
    } else {
        echo "<script>alert('Something wrong!');</script>";
    }

}


?>