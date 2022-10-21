<?php 

    require_once "conec.php";

    if (isset($_GET['del'])) {
        $delete_id = $_GET['del'];

        $delete_query = "DELETE FROM `booking` WHERE nobook = '$delete_id'";

        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Post Has been Deleted')</script>";
            header("location: view_booking.php");
        }
    }

?>