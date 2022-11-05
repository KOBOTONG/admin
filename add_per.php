<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/book4.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <title>Add Personnel</title>
</head>

<body>
    <form action="admin.php">
        <button name="submit" class="button3">Home</button>
    </form>
    <form action="info.php">
        <button name="submit" class="button"> Information Customer</button>
    </form>

    <form action="view_booking.php">
        <button name="submit" class="button2">Booking Details </button>
    </form>

    <form action="view_wait.php">
        <button name="submit" class="button5">Wait for booking</button>
    </form>
    <form action="view_com.php">
        <button name="submit" class="button6">Booking Complete</button>
    </form>
    <form action="logout.php">
        <button name="submit" class="button1"> Log out</button>

    </form>


    <div class="text-center "><div class="container">
        <br><br><br><br>
        <h1>Add Personnel</h1>
        <br>
        
        <form method="POST" action="add_perinsert.php">
           
            <input type="text" name="email" class="form-control" placeholder="Email"><br> 
            <input type="text" name="password" class="form-control"  placeholder="Password"><br>
            <input type="text" name="name" class="form-control"  placeholder="Name"><br>
           
            <input type="text" name="lastname" class="form-control"  placeholder="Lastname"><br>
           
            <input type="text" name="phonenumber"  class="form-control" placeholder="Phone number"><br>
            <input type="text" name="personel"  class="form-control" readonly value="Personnel"><br>

            <input  class="btn btn-success" type="submit" value="submit">

            <a href="" class="btn btn-danger">Cancel</a>
       
                                   
        </form>
    </div>
    </div>

</body>

</html>