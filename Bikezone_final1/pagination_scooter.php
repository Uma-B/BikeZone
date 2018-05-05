<!DOCTYPE html>
<html>
<head>

<body>

	<?php
include('db_connection.php');

$limit = 1;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM dealerbikes WHERE BikeCategory = 'Scooter' ORDER BY DealerBikeId ASC LIMIT $start_from, $limit";

$rs_result = mysql_query ($sql);  
?>





<?php  
while ($row = mysql_fetch_assoc($rs_result)) {  
?>  
      



<div class="item-list">
    <div class="cornerRibbons featuredAds">
        <!--<a href=""> Featured Ads</a> -->
    </div>
    <div class="row">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="new_bikes_view.php?id=<?php echo $row['DealerBikeId']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['DealerBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    
    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="ads-details.html">
                <?php echo $row['Brand'].'-'.$row['Model'] ;  ?></a></h5>
            <span class="info-row"> 
                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">B </span> 

                <span class="date"><i> </i>KM's Driven (<?php echo $row['KilometreDriven']. ') - <i class="fa fa-map-marker"></i>'.$row['Location']  ?></span> 
              <br><br> 
              <span class="category">Seller Name : <?php echo $row['Username']  ?></span>

              - <span class="item-location"><i class="">
                Contact No : 
                  
              </i><?php echo $row['ContactNumber'] ?></span> </span></div>
    </div>

    <div class="col-md-3 text-right  price-box">
        <h2 class="item-price">RS:-<?php echo $row['Prize']  ?></h2>
        <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a></div>
 
</div>
</div>



<?php  
};  
?>  
</body>
</html>