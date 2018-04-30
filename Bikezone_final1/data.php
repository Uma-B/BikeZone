<?php

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bikezone";
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection



      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
    
$id = $_GET['id'];

      $sql = "SELECT * FROM usedbikes WHERE UserId='1'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($res = $result->fetch_assoc()) {


 echo $res['BikeCategory'];
 echo $id;

}
}
?>