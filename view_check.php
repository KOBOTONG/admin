<?php

session_start();
require_once 'conec.php';
if (!isset($_SESSION['personnel_login'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ!');</script>";
    echo "<script>window.location.href='login.php'</script>";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">




        <div class="text-center mt-2"> <?php
                                        $d = date("d/m/Y");
                                        $t = date("H:i:s");
                                        ?>
            <h1> Parking Details </h1>
            <h2><?php echo $d; ?> <?php echo $t; ?> </h2>
            <form action="searckCheck.php" method="get" enctype="multipart/form-data">
                <br></br>
                <input type="text" name="value" placeholder="Booking licsenplate">
                <button type="submit" name="search" value="search" class="button4">search </button>

            </form>
       <form method="post" id="insert_data" action="view_check?check_form=<?php echo $id; ?>">

        </div>
        <section class="content">
            <div class="content__grid">

                <br></br>
                <div class="showinfo">

                    <table class="table">
                        <thead class="thead-dark">

                            <tr>
                                <th>NO</th>
                                <th>Licsen Plate</th>
                                <th>Name</th>
                                <th>Start</th>
                                <th>Year</th>
                                <th>Details</th>
                                <th>Status</th>
                               
                                <th>CheckIn</th>
                                


                            </tr>
                        </thead>
                        <?php

                        $select_post = "SELECT * FROM booking ";

                        $query_post = mysqli_query($conn, $select_post);

                        while ($row = mysqli_fetch_array($query_post)) {
                            $id = $row['nobook'];
                            $licsen = $row['usernamebook'];
                            $name = $row['fnamebook'];
                            $lname = $row['lnamebook'];
                            $stmo = $row['stmonth'];
                            $styer = $row['styear'];
                            $tomo = $row['tomonth'];
                            $toyer = $row['toyear'];
                            $detail = $row['resultmy'];
                            $status = $row['status'];
                            $slip = $row['slip'];


                        ?>

                            <tr>

                                <td><?php echo $id; ?></td>
                                <td><?php echo $licsen; ?></td>
                                <td><?php echo $name; ?> <?php echo $lname; ?></td>
                                <td><?php echo $stmo; ?> <?php echo $styer; ?></td>
                                <td><?php echo $tomo; ?> <?php echo $toyer; ?></td>
                                <td><?php echo $detail; ?></td>
                                <td><?php echo $status; ?></td>
                                
                                <td>
                                      <input type="hidden" name="hidden_status" id="hidden_status" value="<?php echo $licsen = $row['usernamebook']; ?>"  />
                                        <br />
                                        <input type="submit" name="insert" id="action" class="button4" value="Checkin" /> 
                                </td>
                            </tr>
                        
                         <?php

}  
?>
</form>

                    </table>
                    <form action="logout.php">
                        <button name="submit" class="button1"> Log out</button>

                    </form>
                </div>
            </div>
        </section>

    </div>
</body>

</html>
<script>
$(document).ready(function(){
 
 $('#status').bootstrapToggle({
  on: 'CheckIn',
  off: 'CheckOut',
  onstyle: 'success',
  offstyle: 'danger'
 });

 $('#status').change(function(){
  if($(this).prop('checked'))
  {
   $('#hidden_status').val('CheckIn');
  }
  else
  {
   $('#hidden_status').val('CheckOut');
  }
 });

 $('#insert_data').on('submit', function(event){
  event.preventDefault();

 if($('#hidden_status').val() != '')
  {
var hidden_status=$('#hidden_status').val();


   $.ajax({
	   
    url:"view_insertCheck.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
		
     if(data == 'done')
     {
      $('#insert_data')[0].reset();
      $('#status').bootstrapToggle('on');
      alert("Data Inserted");
     }
    }
   });
}
 });

});
</script>