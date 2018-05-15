<?php

if(!mysql_connect("localhost","root","")){
	echo "Db connection error...";
}

if(!mysql_select_db("bikezone")){
	echo "DB selection error...";
}
      // $servername = "localhost";
      // $username = "root";
      // $password = "";
      // $dbname = "bikezone";
      // $conn = new mysqli($servername, $username, $password, $dbname);
      // // Check connection
      // if ($conn->connect_error) {
      //     die("Connection failed: " . $conn->connect_error);
      // } 
?>