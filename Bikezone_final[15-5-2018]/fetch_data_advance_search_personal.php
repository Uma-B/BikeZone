<?php
session_start();
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

if(isset($_POST['get_option3']))
{
 include "db_connection.php";

 $brand_name = $_POST['get_option3'];
 $find=mysql_query("select Model from bikemodel where Brand='$brand_name'");
 ?>
<option value=""> Select Model</option>
 <?php
 while($row=mysql_fetch_array($find))
 {
  echo "<option>".$row['Model']."</option>";
 }
 exit;
}

?>
<body>
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




$filter="select
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

if($City != ""){
  $filter=$filter. " usedbikes.City LIKE '$City' AND";
  //$filter=$filter. " dealerbikes.City LIKE '$City' AND";
}
if($priceMin != "" && $priceMax != ""){
    //$filter = $filter." dealerbikes.Prize IN (SELECT Prize from dealerbikes WHERE Prize BETWEEN $priceMin AND $priceMax)";
     $filter = $filter." usedbikes.Prize IN (SELECT Prize from usedbikes WHERE Prize BETWEEN $priceMin AND $priceMax)";
}


$split = explode(" ", $filter);
if($split[count($split)-1] == "AND"){
     $filter = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filter);
    //$filter2 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filter2);
}

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
$_SESSION['Pagination']=$filter;
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
            <li class="page-item active"  id="<?php echo $i;?>"><a class="page-link" href='pagination_fetch_data_all.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
 <?php else:?>

 <li class="page-item" id="<?php echo $i;?>"><a href='pagination_fetch_data_all.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

 <?php endif;?> 
<?php endfor;endif;?> 
</ul>
</nav>
</div>
</div>
</body>
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
            jQuery("#target-content").load("pagination_fetch_data_all.php?page=" + pageNumber);
        }
    });
});
</script>