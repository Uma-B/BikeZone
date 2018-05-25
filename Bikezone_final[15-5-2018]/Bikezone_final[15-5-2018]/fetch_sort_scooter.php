<?php

session_start();


$filter="select
  dealerbikes.DealerBikeId as UsedBikeId,
  dealerbikes.BikeCategory as BikeCategory,
  dealerbikes.DealerBikeImage1 as UsedBikeImage1,
  dealerbikes.Brand as Brand,
  dealerbikes.Model as Model,
dealerbikes.DealerId as UserId,
  dealerbikes.Username as UserName,
dealerbikes.ContactNumber as ContactNumber,
dealerbikes.Prize as Prize,
  dealerbikes.Year as Year,
  dealerbikes.Transmission as Transmission,
  dealerbikes.FuelType as FuelType,
  dealerbikes.EngineSize as EngineSize,
  dealerbikes.KilometreDriven as KilometreDriven,
  dealerbikes.Stroke as Stroke,
  dealerbikes.Location as Location,
  dealerbikes.PostalCode as PostalCode 
from
  dealerbikes WHERE BikeCategory = 'Scooter' and Status='UnBlock'";

 


$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bikezone";
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

$value= $_GET['value'];


if($value != null){
  
$filterQuery =  $filter . " ORDER BY Prize $value ";
}
$result = $conn->query($filterQuery);
      

      if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
 ?>


<div class="item-list">
    <div class="cornerRibbons featuredAds">
    </div>
    <div class="row">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="used_bikes_view.php?filename=scooter&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="used_bikes_view.php?filename=scooter&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">
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
       <?php

        if (isset($_SESSION['usr_id'])) {
          $id=$_SESSION['usr_id'];
          ?>
          <a href="favourite.php?filename=scooter&UserId=<?php echo $row['UserId']; ?> &UsedBikeId=<?php echo $row['UsedBikeId']; ?> &Brand=<?php echo $row['Brand'];?> &Category=<?php echo $row['BikeCategory'];?> &Price=<?php echo $row['Prize'];?> &ContactNumber=<?php echo $row['ContactNumber'];?> &Fav_Userid=<?php echo $id;?>" class="btn btn-danger btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a>
        <?php
        }
        else{
          ?>
          <a href onclick="myFunction()" class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a>
       <!--  <button onclick="myFunction()">Try it</button> -->

<script>
function myFunction() {
    alert("Please login before adding favourites");
}
</script>
        <?php
        }
        ?>
         
        </div>
    <!--/.add-desc-box-->
</div>
</div>
<?php
}
}

?>