<?php 
include "db_connection.php";



if(isset($_POST['get_option']))
{
  $status = $_POST['get_option'];
  // $UserId=$_POST['get_option2'];


if($status=='Block'){

  $update=mysql_query("UPDATE userregistration SET Status='Block' WHERE UserId=1");
}

else
{
	$update=mysql_query("UPDATE userregistration SET Status='Unblock' WHERE UserId=1");
}
}	
	
?>