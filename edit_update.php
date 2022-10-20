<?php 
require_once 'conec.php';
 $id =  $_POST['nobook'];
 $licsen = $_POST['usernamebook'];
 $fname =  $_POST['fnamebook'];
 $lname =  $_POST['lnamebook'];
 $stmo = $_POST['stmonth'];
 $styer = $_POST['styear'];
 $tomo = $_POST['tomonth'];
 $toyer = $_POST['toyear'];
 $detail = $_POST['resultmy'];
 $status = $_POST['status'];



 $update_query = "UPDATE booking set stmonth='$stmo',styear='$styer',tomonth='$tomo',toyear='$toyer',status='$status'
                 WHERE nobook ='$id'";
$result=mysqli_query($conn, $update_query);
 if ($result) {
     echo "<script>alert('Post has been updated');</script>";
     header("location: view_booking.php");
 } else {
     echo "<script>alert('Something wrong!');</script>";
 }
 mysqli_close($conn);
?>