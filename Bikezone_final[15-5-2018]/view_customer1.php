  
<?php
include "db_connection.php";

if(isset($_GET['id']))
{
  

$status= $_GET["age"];

if($status=='Block'){

  $update=mysql_query("UPDATE userregistration SET Status='UnBlock' WHERE UserId=".$_GET['id']);
  $update=mysql_query("UPDATE usedbikes SET Post_Status='UnBlock' WHERE UserId=".$_GET['id']);

  header("Location: view_customer.php");
}

else
{
  $update=mysql_query("UPDATE userregistration SET Status='Block' WHERE UserId=".$_GET['id']);
  $update=mysql_query("UPDATE usedbikes SET Post_Status='Block' WHERE UserId=".$_GET['id']);
  header("Location: view_customer.php");
}
}  
?>
