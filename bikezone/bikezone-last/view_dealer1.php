  
<?php
include "db_connection.php";

if(isset($_GET['id']))
{
  

$status= $_GET["age"];

if($status=='Block'){

  $update=mysql_query("UPDATE dealerregistration SET Status='UnBlock' WHERE DealerId=".$_GET['id']);
  $update=mysql_query("UPDATE dealerbikes SET Post_Status='UnBlock' WHERE DealerId=".$_GET['id']);
  
  header("Location: view_dealer.php");
}

else
{
  $update=mysql_query("UPDATE dealerregistration SET Status='Block' WHERE DealerId=".$_GET['id']);
  $update=mysql_query("UPDATE dealerbikes SET Post_Status='Block' WHERE DealerId=".$_GET['id']);
  header("Location: view_dealer.php");
}
}  
?>
