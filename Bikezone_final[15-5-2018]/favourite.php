<?php
include "db_connection.php";

if(isset($_GET['UserId'])){
	$fileName=$_GET['filename'];
	$UserId=$_GET['UserId'];
	$UsedBikeId=$_GET['UsedBikeId'];
	$BikeCategory=$_GET['Category'];
	$Brand=$_GET['Brand'];
	$ContactNumber=$_GET['ContactNumber'];
	$Price=$_GET['Price'];
	$FavUserId=$_GET['Fav_Userid'];
	
	$insert=mysql_query("INSERT INTO favourite values ($FavUserId,$UserId, $UsedBikeId,'$BikeCategory','$Brand', '$ContactNumber',$Price)");
	if($insert){
		$fileName=$fileName . ".php";
		header("Location:$fileName");
	}

}
?>