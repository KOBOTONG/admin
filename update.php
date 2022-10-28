<?php 
    session_start();
    include 'include/db.php'; 
     date_default_timezone_set("Asia/Kolkata"); 
?>
<?php
$status="1";
if(((null!=$_GET['statusid'])) AND (null==$_GET['status']))
{

	
	$date=trim(date('F d , Y h:i:s A'));
    


   
          $sql = "insert into reportparking(statusid) values('" . $_GET['statusid'] . "')";
         if ($stmt = $conn->query($sql)) {
       header("location:home.php");
    }
}
    else if(((null!=$_GET['statusid']) AND (null!=$_GET['status'])))
    {
       
        $sql="delete from reportparking where statusid='".$_GET['statusid']."' ";
        
         if ($stmt = $conn->query($sql)) {
       header("location:home.php");
    }
    }else
    {
        echo "Something......went wrong";
    }
    
	
        
              


    ?>