<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

      
        if (empty($email)) {
            echo "<script>alert('กรุณากรอกอีเมล!');</script>";
        echo "<script>window.location.href='login.php'</script>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           
            echo "<script>alert('รูปแบบอีเมลไม่ถูกต้อง!');</script>";
            echo "<script>window.location.href='login.php'</script>";
        } else if (empty($password)) {
            
            echo "<script>alert('กรุณากรอกรหัสผ่าน!');</script>";
        echo "<script>window.location.href='login.php'</script>";
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            
            echo "<script>alert('รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร!');</script>";
        echo "<script>window.location.href='login.php'</script>";
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM `personnnel` WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($email == $row['email']) {
                        if ( $row['password']) {
                            if ($row['role'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: admin.php");
                            } else {
                                $_SESSION['personnel_login'] = $row['id'];
                                header("location: home.php");
                            }
                        } else {                           
                            echo "<script>alert('รหัสผ่านผิด!');</script>";
                            echo "<script>window.location.href='login.php'</script>";
                        }
                    } else {
                       
                        echo "<script>alert('อีเมลผิด!');</script>";
                        echo "<script>window.location.href='login.php'</script>";
                    }
                } else {
                   
                    echo "<script>alert('ไม่มีข้อมูลในระบบ!');</script>";
                    echo "<script>window.location.href='login.php'</script>";
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
