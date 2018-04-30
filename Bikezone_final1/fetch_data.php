<?php

if(isset($_POST['get_option']))
{
 include "db_connection.php";

 $brand_name = $_POST['get_option'];
 $find=mysql_query("select Model from usedbikes where Brand='$brand_name' union select Model from dealerbikes where Brand='$brand_name'");
 ?>
<option value=""> Select Model</option>
 <?php
 while($row=mysql_fetch_array($find))
 {
  echo "<option>".$row['Model']."</option>";
 }
 exit;
}

if(isset($_POST['get_option2']))
{
 include "db_connection.php";

 $state = $_POST['get_option2'];
 $find=mysql_query("select City from usedbikes where State='$state' union select City from dealerbikes where State='$state'");
 ?>
<option value=""> Select City</option>
 <?php
 while($row=mysql_fetch_array($find))
 {
  echo "<option>".$row['City']."</option>";
 }
 exit;
}
?>
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
//city
$City = $_GET['city'];
      $sql = "select usedbikes.UsedBikeId as UsedBikeId, usedbikes.BikeCategory as BikeCategory, usedbikes.UsedBikeImage1 as UsedBikeImage1, usedbikes.Brand as Brand, usedbikes.Model as Model, usedbikes.KilometreDriven as KilometreDriven, usedbikes.Location as Location, usedbikes.UserId as UserId, usedbikes.UserName as UserName, usedbikes.ContactNumber as ContactNumber, usedbikes.Prize as Prize from usedbikes where usedbikes.City LIKE '$City'
       UNION 
       select dealerbikes.DealerBikeId as DealerBikeId, dealerbikes.BikeCategory as BikeCategory, dealerbikes.DealerBikeImage1 as BikeImage1, dealerbikes.Brand as Brand, dealerbikes.Model as Model, dealerbikes.KilometreDriven as KilometreDriven, dealerbikes.Location as Location, dealerbikes.DealerId as UserId, dealerbikes.UserName as UserName, dealerbikes.ContactNumber as ContactNumber, dealerbikes.Prize as Prize from dealerbikes where dealerbikes.City LIKE '$City'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 ?>


<div class="item-list">
    <div class="cornerRibbons featuredAds">
        <!--<a href=""> Featured Ads</a> -->
    </div>
    <div class="row">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="used_bikes_view.php?usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="ads-details.html">
                <?php echo $row['Brand'].'-'.$row['Model'] ;  ?></a></h5>
            <span class="info-row"> 
                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">B </span> 
                <span class="date"><i> </i>KM's Driven (<?php echo $row['KilometreDriven']. ') - <i class="fa fa-map-marker"></i>'.$row['Location']  ?></span> 
              <br><br> 
              <span class="category">Seller Name : <?php echo $row['UserName']  ?></span>

              - <span class="item-location"><i class="">
                Contact No : 
                  
              </i><?php echo $row['ContactNumber'] ?></span> </span></div>
    </div>
    <!--/.add-desc-box-->
    <div class="col-md-3 text-right  price-box">
        <h2 class="item-price">RS:-<?php echo $row['Prize']  ?></h2>
        <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a></div>
    <!--/.add-desc-box-->
</div>
</div>
<?php
}
}

//category

//city
$Category = $_GET['category'];
      $sql = "select usedbikes.UsedBikeId as UsedBikeId, usedbikes.BikeCategory as BikeCategory, usedbikes.UsedBikeImage1 as UsedBikeImage1, usedbikes.Brand as Brand, usedbikes.Model as Model, usedbikes.KilometreDriven as KilometreDriven, usedbikes.Location as Location, usedbikes.UserId as UserId, usedbikes.UserName as UserName, usedbikes.ContactNumber as ContactNumber, usedbikes.Prize as Prize from usedbikes where usedbikes.BikeCategory LIKE '$Category'
       UNION 
       select dealerbikes.DealerBikeId as DealerBikeId, dealerbikes.BikeCategory as BikeCategory, dealerbikes.DealerBikeImage1 as BikeImage1, dealerbikes.Brand as Brand, dealerbikes.Model as Model, dealerbikes.KilometreDriven as KilometreDriven, dealerbikes.Location as Location, dealerbikes.DealerId as UserId, dealerbikes.UserName as UserName, dealerbikes.ContactNumber as ContactNumber, dealerbikes.Prize as Prize from dealerbikes where dealerbikes.BikeCategory LIKE '$Category'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 ?>


<div class="item-list">
    <div class="cornerRibbons featuredAds">
        <!--<a href=""> Featured Ads</a> -->
    </div>
    <div class="row">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="used_bikes_view.php?usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="ads-details.html">
                <?php echo $row['Brand'].'-'.$row['Model'] ;  ?></a></h5>
            <span class="info-row"> 
                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">B </span> 
                <span class="date"><i> </i>KM's Driven (<?php echo $row['KilometreDriven']. ') - <i class="fa fa-map-marker"></i>'.$row['Location']  ?></span> 
              <br><br> 
              <span class="category">Seller Name : <?php echo $row['UserName']  ?></span>

              - <span class="item-location"><i class="">
                Contact No : 
                  
              </i><?php echo $row['ContactNumber'] ?></span> </span></div>
    </div>
    <!--/.add-desc-box-->
    <div class="col-md-3 text-right  price-box">
        <h2 class="item-price">RS:-<?php echo $row['Prize']  ?></h2>
        <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a></div>
    <!--/.add-desc-box-->
</div>
</div>
<?php
}
}

?>
