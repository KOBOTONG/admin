<?php
session_start();
require_once 'conec.php';
if (!isset($_SESSION['admin_login'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ!');</script>";
    echo "<script>window.location.href='login.php'</script>";
}
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$lastname= $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$role = 'personel';


$sql="INSERT INTO `personnnel`( `email`, `password`, `name`, `lastname`, `phonenumber`, `role`)
 VALUES ('$email','$password','$name','$lastname','$phonenumber','$role') ";
$result = mysqli_query($conn,$sql);
if ($result) {
   echo "<script>alert('บันทึกข้อมูลสำเร็จ');<script>";
   echo "<script>window.location='add_per.php';<script>";
} else {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');<script>";
}
mysqli_close($conn)


?>