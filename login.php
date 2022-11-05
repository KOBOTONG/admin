<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safespace</title>
    <link rel="stylesheet" type="text/css" href="css/Login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<form action="login_db.php" method="post">
<div class="mb-4">
    <h2> Login For Personnel</h2>

    </div>
    
        <div class="container">
            <section class="login-box">
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>
                <form >
                <div class="mb-3">
                    
                    <input type="email"  name="email" aria-describedby="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    
                    <input type="password"  name="password" placeholder="Password">
                </div>
                <input type="submit" value="Login" name="signin">
    </form>
    </form>
    </section>

    </div>

</body>

</html>