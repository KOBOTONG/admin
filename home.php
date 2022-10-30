<?php 
    session_start();
    include 'include/db.php'; 
     date_default_timezone_set("Asia/Kolkata"); 
	  
?>

<link href="style.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Josefin+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript">
            function unsub()
            {
            var ans=confirm("กรุณาตรวจสอบข้อมูลก่อนทำการเช็คเอ้าท์");
                if(ans==true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
                return false;
            }
            function sub()
            {
            var ans=confirm("เช็คอินสำเร็จ");
                if(ans==true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
                return false;
            }

        </script>

<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="ce">
<div class="container">
   
	
       
       <?php
           $d = date("d/m/Y");
           $t = date("H:i:s");
        ?>
            <h1> Parking Details </h1>
            <h1><?php echo $d; ?> <?php echo $t; ?> </h1> 
	   <br></br>
       <form action="homesearch.php" method="get" enctype="multipart/form-data">
                    <br></br>
                    <input type="text" name="value" placeholder="Booking licsenplate" >               
                <button type="submit" name="search" value="search" class="button4">search </button>
                    
                </form>
	<?php

$values=array();
  if($stmt=$conn->query("SELECT * from reportparking "))
        {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {  
                 $values[]=$r['statusid'];   
                      
        
        }}

?>

	
	 <div>
	
        <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Licsen</th>
        <th>Name</th>
        <th>Start</th>
        <th>Year</th>
        <th>To</th>
        <th>Year</th>
        <th>Status Booking</th>
        <th>Check Status</th>
      </tr>
    </thead>
    <tbody>



<?php
$ctr=0;
      if($stmt=$conn->query("SELECT * from booking"))
        {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {    
          $ctr++;
           


          ?>
          <tr>
            <td><?php echo $ctr; ?></td>
          <td><?php echo $r['usernamebook']; ?></td>
          <td><?php echo $r['fnamebook']; ?> <?php echo $r['lnamebook']; ?></td>
          <td><?php echo $r['stmonth']; ?></td>
          <td><?php echo $r['styear']; ?></td>
          <td><?php echo $r['tomonth']; ?></td>
          <td><?php echo $r['toyear']; ?></td>
          <td><?php echo $r['status']; ?></td>
          
          <?php
            if (in_array($r['nobook'], $values))
            {
              ?>
          <td><a class="btn btn-danger"  href="update.php?statusid=<?php echo $r['nobook']; ?>&status=<?php echo $r['usernamebook']; ?>" onclick="return unsub();"><?php echo "Check-out" ?></a></td>
                     <?php } else { ?>
                     <td><a class="btn btn-primary"  href="update.php?statusid=<?php echo $r['nobook']; ?>" onclick="return sub();"><?php echo "Check-in" ?></a></td>
                  </tr>
                    
    </tbody> <?php }  } }?>
  </table> 
  <form action="logout.php">
                            <button name="submit" class="button1"> Log out</button>

                        </form>
  </br>
  

	 
    </div>
	</div>
  </div>