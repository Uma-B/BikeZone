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




$filter="select dealerbikes.DealerBikeId as UsedBikeId, dealerbikes.BikeCategory as BikeCategory, dealerbikes.DealerBikeImage1 as UsedBikeImage1, dealerbikes.Brand as Brand, dealerbikes.Model as Model, dealerbikes.DealerId as UserId, dealerbikes.Username as UserName, dealerbikes.ContactNumber as ContactNumber, dealerbikes.Prize as Prize, dealerbikes.Year as Year, dealerbikes.Transmission as Transmission, dealerbikes.FuelType as FuelType, dealerbikes.EngineSize as EngineSize, dealerbikes.KilometreDriven as KilometreDriven, dealerbikes.Stroke as Stroke, dealerbikes.Location as Location, dealerbikes.PostalCode as PostalCode, dealerbikes.Amount as Amount from dealerbikes WHERE BikeCategory = 'Scooters' AND Status LIKE 'UnBlock' AND Post_Status LIKE 'UnBlock' AND";

if($City != "0"){
  //$filter1=$filter1. " usedbikes.City LIKE '$City' AND";
  $filter=$filter. " dealerbikes.City LIKE '$City' AND";
}
if($priceMin != "" && $priceMax != ""){
    $filter = $filter." dealerbikes.Prize IN (SELECT Prize from dealerbikes WHERE Prize BETWEEN $priceMin AND $priceMax)";
     //$filter1 = $filter1." usedbikes.Prize IN (SELECT Prize from usedbikes WHERE Prize BETWEEN $priceMin AND $priceMax)";
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
$_SESSION['fetchToPagination']=$filter;
$filterQuery=$filter." LIMIT $start_from, $limit";
$_SESSION['fetchToSort']=$filterQuery;
//$_SESSION['fetchToPagination']=$filterQuery;

/*  $filterQuery= $sub." LIMIT $start_from, $limit ";*/
?>

 <div class="tab-content">

<div id="masterdiv">
 <div class="category-list" id="masterdiv">
<div class="tab-box  oldList">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="active nav-item">
                                    <a  class="nav-link" href="ajax/ee.html" data-url="ajax/33.html" role="tab"
                                                      data-toggle="tab">Scooter Ads <span class="badge badge-secondary" style="display:inline-block">
                                                          
                                                          <?php

                                            $count=mysqli_query($conn,$sql);
                                                $num_rows = mysqli_num_rows($count);
                                             echo  $num_rows; ?>
                                                      </span></a>
                                </li>
                               <!--  <li class="nav-item"><a class="nav-link"  href="ajax/33.html" data-url="ajax/33.html" role="tab" data-toggle="tab">Business
                                    <span class="badge badge-secondary" style="display:inline-block">22,805</span></a></li>
                                <li class="nav-item"><a class="nav-link"  href="ajax/33.html" data-url="ajax/33.html" role="tab" data-toggle="tab">Personal
                                    <span class="badge badge-secondary" style="display:inline-block">18,705</span></a></li> -->
                            </ul>


                            <div class="tab-filter">
                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto" onchange="sort_by(this.value)">
                                    <option value="-1">Sort by </option>
                                    <option value="ASC">Price: Low to High</option>
                                    <option value="DESC">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
<?php

      $result = $conn->query($filterQuery);

      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 ?>


<div>


<div class="item-list">
     <?php
      if($row['Amount']!=""){
       
  ?>
    <div class="cornerRibbons featuredAds">
        <a href=""> Dealer Ads</a>
    </div>
    <?php
  }
    ?>
    <div class="row">
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
                <span class="date">
                    <?php
                      if($row['KilometreDriven']!="0"){
                    ?>
                  <i class=" icon-clock"> </i>KM's Driven (
                  <?php 
                  echo $row['KilometreDriven']?>) - <?php
                              }
                                ?><i class="fa fa-map-marker"></i>
                  Location : <?php echo $row['Location'] ; ?></span>  
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
</div>
</div>
<div class="pagination-bar text-center">
     <nav aria-label="Page navigation " class="d-inline-b">

<ul class="pagination" id="pagination" >

<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
 if($i == 1):?>
            <li class="page-item active"  id="<?php echo $i;?>"><a class="page-link" href='pagination_all.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
 <?php else:?>

 <li class="page-item" id="<?php echo $i;?>"><a href='pagination_all.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

 <?php endif;?> 
<?php endfor;endif;?> 
</ul>
</nav>
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
            jQuery("#target-content").load("pagination_all.php?page=" + pageNumber);
        }
    });
});
</script>