<?php 

    require_once "conec.php";

    if (isset($_GET['del'])) {
        $delete_id = $_GET['del'];

        $delete_query = "DELETE FROM `acc_user` WHERE no = '$delete_id'";

        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Post Has been Deleted')</script>";
            header("location: info.php");
        }
    }

?>