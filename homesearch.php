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
if (isset($_GET['search'])) {
    $search_value = $_REQUEST['value'];
} if (empty($search_value)) {
    echo "<h3 style='margin-top:2rem; text-align: center; color:red;'>Oops!!, can not find any data type someting</h3>";
} else {
    $search_query = "SELECT * FROM booking WHERE usernamebook LIKE '%$search_value%'";


    $run_query = mysqli_query($conn, $search_query);

    while ($search_row = mysqli_fetch_array($run_query)) {

    $id = $search_row['nobook'];
    $licsen = $search_row['usernamebook'];
    $name = $search_row['fnamebook'];
    $lname = $search_row['lnamebook'];
    $stmo = $search_row['stmonth'];
    $styer = $search_row['styear'];
    $tomo = $search_row['tomonth'];
    $toyer = $search_row['toyear'];
    $detail = $search_row['resultmy'];
    $status =$search_row['status'];
    $slip = $search_row['slip'];

?>

    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $licsen; ?></td>
        <td><?php echo $name; ?> <?php echo $lname; ?></td>
        
        <td><?php echo $stmo; ?></td>
        <td><?php echo $styer; ?></td>
        <td><?php echo $tomo; ?> </td>
        <td> <?php echo $toyer; ?></td>
        
        <td><?php echo $status; ?></td>

         
          <?php
            if (in_array($id, $values))
            {
              ?>

          <td><a class="btn btn-danger"  href="update.php?statusid=<?php echo $id; ?>&status=<?php echo $licsen; ?>" onclick="return unsub();"><?php echo "Check-out" ?></a></td>
                     <?php } else { ?>
                     <td><a class="btn btn-primary"  href="update.php?statusid=<?php echo $id; ?>" onclick="return sub();"><?php echo "Check-in" ?></a></td>
       
                    
    </tbody> 
    <?php } } } ?>
    
  </table> 
  
  <form action="logout.php">
                            <button name="submit" class="button1"> Log out</button>

                        </form>
  </br>
  

	 
    </div>
	</div>
  </div>