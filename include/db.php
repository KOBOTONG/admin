<?php
$conn=new mysqli("localhost", "dbsafespace", "mt123456789", "dtb");
if($conn->connect_error)
    echo "connection failed to connect!!";
?>