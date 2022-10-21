<?php 

    require_once "conec.php";

    if (isset($_GET['in'])) {
        $delete_id = $_GET['in'];

        $delete_query = "UPDATE `booking` SET `parking`='Checkin' WHERE  nobook = '$delete_id'";

        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Post Has been Deleted')</script>";
            header("location: checkin.php");
        }
    }

?>