
<?php
session_start();
$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bikezone";
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection



      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

      $url=$_SERVER['HTTP_REFERER'];
      $path_parts = pathinfo($url);
     $uri=$path_parts['filename'];
      

/*forAllCatagory*/
$Category =html_entity_decode($_GET['category'],null,'UTF-8');
$City = html_entity_decode($_GET['city'],null,'UTF-8');
$priceMin = $_GET['minPrice'];
$priceMax = $_GET['maxPrice'];

//echo $Category;
//echo $City;
$filter1="select
usedbikes.UsedBikeId as UsedBikeId,
usedbikes.BikeCategory as BikeCategory,
usedbikes.UsedBikeImage1 as UsedBikeImage1,
usedbikes.Brand as Brand,
usedbikes.Model as Model,
usedbikes.UserId as UserId,
usedbikes.UserName as UserName,
usedbikes.ContactNumber as ContactNumber,
usedbikes.Prize as Prize,
usedbikes.Year as Year,
usedbikes.Transmission as Transmission,
usedbikes.FuelType as FuelType,
usedbikes.EngineSize as EngineSize,
usedbikes.KilometreDriven as KilometreDriven,
usedbikes.Stroke as Stroke,
usedbikes.Location as Location,
usedbikes.PostalCode as PostalCode
from
usedbikes WHERE Status='UnBlock' and";



$filter2="select
  dealerbikes.DealerBikeId as UsedBikeId,
  dealerbikes.BikeCategory as BikeCategory,
  dealerbikes.DealerBikeImage1 as UsedBikeImage1,
  dealerbikes.Brand as Brand,
  dealerbikes.Model as Model,
dealerbikes.DealerId as UserId,
  dealerbikes.UserName as UserName,
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
  dealerbikes WHERE Status='UnBlock' and";

if($City != ""){
  $filter1=$filter1. " usedbikes.City LIKE '$City' AND";
  $filter2=$filter2. " dealerbikes.City LIKE '$City' AND";
}
if($priceMin != "" && $priceMax != ""){
    $filter2 = $filter2." dealerbikes.Prize IN (SELECT Prize from dealerbikes WHERE Prize BETWEEN $priceMin AND $priceMax)";
     $filter1 = $filter1." usedbikes.Prize IN (SELECT Prize from usedbikes WHERE Prize BETWEEN $priceMin AND $priceMax)";
}


$split = explode(" ", $filter1);
if($split[count($split)-1] == "AND"){
     $filter1 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filter1);
    $filter2 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filter2);
}

$filter=$filter1. "UNION ". $filter2;

$limit = 10; 
$sql = $filter; 
/*For No Of Rows Selected*/
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
/*----------------------*/
$rs_result = $conn->query($sql);  
$row = $rs_result->fetch_assoc();  
$total_records = $rowcount;
$total_pages = ceil($total_records / $limit);

 
if (isset($_GET["page"])) {
 $page  = $_GET["page"]; 
} else { 
  $page=1; 
}  

$start_from = ($page-1) * $limit;
$_SESSION['fetchToPagination']=$filter;
$filterQuery=$filter." LIMIT $start_from, $limit";
$_SESSION['fetchToSort']=$filterQuery;
//$_SESSION['fetchToPagination']=$filterQuery;

/*  $filterQuery= $sub." LIMIT $start_from, $limit ";*/
?>
 <div class="tab-content">
<div>
<div id="target-content" ></div>
</div>
<div>
<div id='myStyle'>
</div>
</div>
<?php

      $result = $conn->query($filterQuery);

      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 ?>


<div id="masterdiv">


<div class="item-list oldList" id="masterdiv">
    <!-- <div class="cornerRibbons featuredAds" id="masterdiv">
    </div> -->
    <div class="row" id="masterdiv">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="used_bikes_view.php?filename=<?php echo $uri;?>&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="used_bikes_view.php?filename=<?php echo $uri;?>&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">
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
          <a href="favourite.php?filename=<?php echo $uri;?>&UserId=<?php echo $row['UserId']; ?> &UsedBikeId=<?php echo $row['UsedBikeId']; ?> &Brand=<?php echo $row['Brand'];?> &Category=<?php echo $row['BikeCategory'];?> &Price=<?php echo $row['Prize'];?> &ContactNumber=<?php echo $row['ContactNumber'];?> &Fav_Userid=<?php echo $id;?>" class="btn btn-danger btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
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
</div>
<?php
}
}
?>

<div class="pagination-bar text-center">
     <nav aria-label="Page navigation " class="d-inline-b">

<ul class="pagination" id="pagination" >

<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
 if($i == 1):?>
            <li class="page-item active"  id="<?php echo $i;?>"><a class="page-link" href='pagination_fetch_data_union.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
 <?php else:?>

 <li class="page-item" id="<?php echo $i;?>"><a href='pagination_fetch_data_union.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

 <?php endif;?> 
<?php endfor;endif;?> 
</ul>
</nav>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
        currentPage : 1,
        onPageClick : function(pageNumber) {
            jQuery('#masterdiv div').hide();
            jQuery("#target-content").html('loading...');
            jQuery("#target-content").load("pagination_fetch_data_union.php?page=" + pageNumber);
        }
    });
});
</script>