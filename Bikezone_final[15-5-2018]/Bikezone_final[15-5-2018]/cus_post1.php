  
<?php
include "db_connection.php";

if(isset($_GET['id']))
{
  $Stat= $_GET["id"];
   $Status= $_GET["age"];
   $UserId= $_GET["a"];
  
  $update=mysql_query("UPDATE usedbikes SET Status='$Status' WHERE UsedBikeId='$Stat'");
  if($update){
  	header("Location: cus_post.php?UserId=".$UserId);
  }
}
?>
  
