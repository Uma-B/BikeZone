<?php
include "db_connection.php";

if(isset($_GET['UserId']))
	$UserId=$_GET['UserId'];
$UsedBikeId=$_GET['UsedBikeId'];
$BikeCategory=$_GET['BikeCategory'];
$Brand=$_GET['Brand'];
$ContactNumber=$_GET['ContactNumber'];
$Price=$_GET['Prize'];
$UserId=$_GET['UserId'];
{
  
  $update=mysql_query("UPDATE userregistration SET Status='UnBlock' WHERE UserId=".$_GET['id']);
  $update=mysql_query("UPDATE usedbikes SET Status='UnBlock' WHERE UserId=".$_GET['id']);

}
?>