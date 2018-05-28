<?php
session_start();
                
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>Bikezone.com</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <!-- styles needed for carousel slider -->
    <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <!-- bxSlider CSS file -->
    <link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet"/>

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->
    <script>
        paceOptions = {
            elements: true
        };

        

    </script>
    <script src="assets/js/pace.min.js"></script>


</head>
<body>

<div id="wrapper">

         <?php
          include "header.php";
         ?>
    <!-- /.header -->

        <div class="search-row-wrapper">
            <div class="container ">
                <form action="#" method="GET">
                    <div class="row">


                        
                    </div>
                </form>
            </div>
        </div>

    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="categories-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
                                <ul class=" list-unstyled">
                                    <!-- seaech -->
                                    <?php
                                        include_once 'db_connection.php';

                                        $query ="SELECT BikeCategory FROM usedbikes UNION SELECT BikeCategory FROM dealerbikes Group by BikeCategory  ";
                                        $result= mysql_query($query);

                                        $row=mysql_fetch_array($result);
                                                                                
                                        ?>
                                        <li>                                        
                                        <div margin:0px auto; margin-top:30px;" >
                                                <select id="category"  style="width:80%;" onchange="category(this.value)" class="chosen form-control ">
                                            <option value=""> Select Category </option>
                                            <option value="Used Bikes"> Used Bikes</option>
                              <option value="New Bikes"> New Bikes</option>
                              <option value="Scooters"> Scooter</option>
                                        </select>
                                        </div>

                                        </li>
                                     
                                </ul>
                            </div>
                            <!--/.categories-list-->

                            <div class="locations-list list-filter" >
                                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                     <?php
                                        include_once 'db_connection.php';
                                        ?>
                                        <div margin:0px auto; margin-top:30px;" >
                                                <select id="city" class="chosen form-control" style="width:80%;" onchange="recp()">
                                                <option value=""> Select City </option>
                                                <?php
                                        $query ="SELECT City FROM usedbikes UNION SELECT City FROM dealerbikes Group by City  ";
                                        $result= mysql_query($query);

                                        while($row=mysql_fetch_array($result))
                                        {                                         
                                        ?>
                                        <li><a href="#">
                                            <option><?php echo $row['City']?></option>
                                        </a>
                                        </li>
                                        <?php 
                                         }
                                      ?>
                                                </select>
                                                </div>
                                                </ul>
                            
                            <!--/.locations-list-->

                            <div class="locations-list  list-filter" class="form-inline ">
                                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                                <!-- <form role="form" class="form-inline "> -->
                                    <div class="form-inline" >
                                        <input type="text" placeholder="Min value" id="minPrice" class="form-control">
                                   <br><br><br>
                                   
                                        <input type="text" placeholder="Max value" id="maxPrice" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group col-lg-3 col-md-12 no-padding">
                                        <button class="btn btn-default pull-right btn-block-md" onclick="recp()" type="submit" >GO
                                        </button>
                                    </div>
                              <!--   </form> -->
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="favourite_view.php"><strong>All Ads</strong> <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT (SELECT COUNT(*) FROM usedbikes) + (SELECT COUNT(*) FROM dealerbikes) as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['count'];
                                             ?></span></a></li>
                                    <li><a href="favourite_view.php">Business <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT COUNT(*) FROM dealerbikes as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['COUNT(*)'];
                                             ?></span></a></li>
                                    <li><a href="favourite_view.php">Personal <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT COUNT(*) FROM usedbikes as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['COUNT(*)'];
                                             ?></span></a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="">New <span class="count"><?php

                                            $count=mysql_query("SELECT UserId FROM usedbikes");
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows;
                                             ?></span></a>
                                    </li>
                                    <li><a href="">Used <span class="count">28,705</span></a>
                                    </li>
                                    <li><a href="">None </a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                            <div style="clear:both"></div>

                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-left">
                    <div class="category-list">
                        <div class="tab-box " >

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="active nav-item">
                                    <a  class="nav-link" href="favourite_view.php" data-url="ajax/33.html" role="tab" data-toggle="tab">Favourite Ads 
                                    <span class="badge badge-secondary">
                                    <?php
                                    $id=$_SESSION['usr_id'];
                                            $count=mysql_query("Select UserId from favourite Where Fav_UserId='$id'");
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>

                                 </ul>
                            <div class="tab-filter">
                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto" onchange="sort_by(this.value)">
                                    <option value="">Sort by </option>
                                    <option value="ASC">Price: Low to High</option>
                                    <option value="DESC">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                        <!--/.tab-box-->

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                              
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view active"><!-- <i class="  icon-th"></i> --></span> <span
                                    class="compact-view"><!-- <i class=" icon-th-list  "></i> --></span> <span
                                    class="grid-view "><!-- <i class=" icon-th-large "></i> --></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->


                        <!-- Mobile Filter bar-->
                        <div class="mobile-filter-bar col-xl-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="  icon-th-list"></i>
                                        Filters
                                    </a>
                                </li>
                                <li>


                                    <div class="dropdown"> <a data-toggle="dropdown"></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="#" rel="nofollow">Relevance</a>
                                            </li>
                                            <li class="dropdown-item"><a href="#" rel="nofollow">Date</a>
                                            </li>
                                            <li class="dropdown-item"><a href="#" rel="nofollow">Company</a>
                                            </li>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->

                        <div class="adds-wrapper">
                            <div class="tab-content">
                                <div class="tab-pane active" id="allAds"><div class="row">


<br/>
    <div class="col-md-2 no-padding photobox">
       <!--  <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/category/sample_bike.jpg" alt="img"></a>
        </div> -->
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
       
    </div>
    <!--/.add-desc-box-->
    <!--/.add-desc-box-->

        </div>

</div>
<div>
<div id="target-content" ></div>
</div>
<?php

include "db_connection.php";
$userId=$_SESSION['usr_id'];
$query="Select Fav_UserId,UserId,UsedBikeId,BikeCategory,Brand,MobileNumber,Price from favourite Where favourite.Fav_UserId=$userId";
$sql=mysql_query($query);
//pagination
$limit = 10; 
$sql = $query; 
/*For No Of Rows Selected*/
$result=mysql_query($sql);
$rowcount = mysql_num_rows($result);
/*----------------------*/
$rs_result = mysql_query($sql);  
$row = mysql_fetch_row($rs_result);  
$total_records = $rowcount;
$total_pages = ceil($total_records / $limit);

 
if (isset($_GET["page"])) {
 $page  = $_GET["page"]; 
} else { 
  $page=1; 
}  

$start_from = ($page-1) * $limit;    
$sql1 =  $query;
$sql2="LIMIT $start_from, $limit";
  echo $sql=$sql1." ".$sql2;

$_SESSION['sortPersonal']=$sql;
$_SESSION['paginationPersonal']=$sql1; 
//$rs_result = mysql_query ($sql); 
    $sqlFav=mysql_query($sql);

// while($row=mysql_fetch_array($sqlFav))
// {

while ($res=mysql_fetch_array($sqlFav)) {

   $userId=$res['UserId'];
  $bikeId=$res['UsedBikeId'];
  $BikeCategory=$res['BikeCategory'];
  $Brand=$res['Brand'];
  $ContactNumber=$res['MobileNumber'];
  $Price=$res['Price'];

echo $favouriteQuery="select
  usedbikes.UsedBikeId as UsedBikeId,
  usedbikes.BikeCategory as BikeCategory,
  usedbikes.UsedBikeImage1 as UsedBikeImage1,
  usedbikes.Brand as Brand,
  usedbikes.Model as Model,
  usedbikes.KilometreDriven as KilometreDriven,
  usedbikes.Location as Location,
  usedbikes.UserId as UserId,
  usedbikes.UserName as UserName,
  usedbikes.ContactNumber as ContactNumber,
  usedbikes.Prize as Prize
from
  usedbikes
where 
usedbikes.UsedBikeId=$bikeId AND
usedbikes.BikeCategory='$BikeCategory' AND
usedbikes.Brand= '$Brand' AND
usedbikes.ContactNumber = '$ContactNumber' AND 
usedbikes.Prize=$Price AND
usedbikes.UserId=$userId AND
usedbikes.Status='UnBlock'
UNION
select
  dealerbikes.DealerBikeId as UsedBikeId,
  dealerbikes.BikeCategory as BikeCategory,
  dealerbikes.DealerBikeImage1 as UsedBikeImage1,
  dealerbikes.Brand as Brand,
  dealerbikes.Model as Model,
  dealerbikes.KilometreDriven as KilometreDriven,
  dealerbikes.Location as Location,
  dealerbikes.DealerId as UserId,
  dealerbikes.UserName as UserName,
  dealerbikes.ContactNumber as ContactNumber,
  dealerbikes.Prize as Prize
from
  dealerbikes
where 
dealerbikes.DealerBikeId=$bikeId AND
dealerbikes.BikeCategory='$BikeCategory' AND
dealerbikes.Brand= '$Brand' AND
dealerbikes.ContactNumber = '$ContactNumber' AND 
dealerbikes.Prize=$Price AND
dealerbikes.DealerId=$userId AND
dealerbikes.Status='UnBlock'";

//$sql=mysql_query($favouriteQuery);
//pagination
$limit = 10; 
$sql = $favouriteQuery; 
/*For No Of Rows Selected*/
$result=mysql_query($sql);
$rowcount = mysql_num_rows($result);
/*----------------------*/
$rs_result = mysql_query($sql);  
$row = mysql_fetch_row($rs_result);  
$total_records = $rowcount;
$total_pages = ceil($total_records / $limit);

 
if (isset($_GET["page"])) {
 $page  = $_GET["page"]; 
} else { 
  $page=1; 
}  

$start_from = ($page-1) * $limit;    
$sql1 =  $favouriteQuery;
$sql2="LIMIT $start_from, $limit";
  echo $sql=$sql1." ".$sql2;

$_SESSION['sortPersonal']=$sql;
$_SESSION['paginationPersonal']=$sql1; 
//$rs_result = mysql_query ($sql); 
    //$sqlFav=mysql_query($sql);

    $sqlFav=mysql_query($favouriteQuery);

//echo "\n Filter Query $favouriteQuery";
//$sql=mysql_query($filterQuery);
 
while($row=mysql_fetch_array($sqlFav))
{
?>


<div class="item-list oldList">
    <div class="cornerRibbons featuredAds">
        <!--<a href=""> Featured Ads</a> -->
    </div>
    <div class="row">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="used_bikes_view.php?filename=favourite_view&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    <!--/.photobox-->
 


    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="used_bikes_view.php?filename=favourite_view&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">
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
         </div>
    <!--/.add-desc-box-->
</div>

<div id='myStyle'>
</div>

</div>
<?php }
} ?>

                            </div>
                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box save-search-bar text-center"><!-- <a href="#"> <i class=" icon-star-empty"></i>
                            Save Search </a> --></div>
                    </div>
                    <div class="pagination-bar text-center">
  <nav aria-label="Page navigation " class="d-inline-b">
  <ul class="pagination" id="pagination" >
    <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
     if($i == 1):?>
      <li class="page-item active"  id="<?php echo $i;?>"><a class="page-link" href='pagination_favourite_view.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
      <?php else:?>

       <li class="page-item" id="<?php echo $i;?>"><a href='pagination_favourite_view.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

     <?php endif;?> 
   <?php endfor;endif;?> 
 </ul>
</nav>
</div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Do you get any bike for sell ? </h2>
                        <h5>Sell your bikes online FOR FREE. It's easier than you think !</h5>
                       <?php
        if (isset($_SESSION['usr_id'])) {
          $id=$_SESSION['usr_id'];
          ?>
          <a href="popup.php " class="btn btn-lg btn-border btn-post btn-danger">Sell my bike free</a>
          
        <?php
        }
        else{
          ?>
         <a href="pop.php " class="btn btn-lg btn-border btn-post btn-danger">Sell my bike free</a>
        <?php
        }
        ?>
                  </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php
include 'footer.php';
?>



<!-- Placed at the end of the document so the pages load faster -->

<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>



<script src="choosen.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
        currentPage : 1,
        onPageClick : function(pageNumber) {
            jQuery('#masterdiv div').html('');
            jQuery("#target-content").html('loading...');
            jQuery("#target-content").load("pagination_favourite_view.php?page=" + pageNumber);
        }
    });
});
</script>
<script type="text/javascript">
  // city
  function category(category){

    if (category=="Used Bikes") {
       // document.write(category);
         window.location.replace('used_bikes.php');
    }
    else if(category=="New Bikes"){
        //document.write(category);
        window.location.replace('new_bikes.php');
  }
  else {
    //document.write(category);
    window.location.replace('scooter.php');
  }
}
  // city
function recp() {

        var category = document.getElementById('category').value;
        var city = document.getElementById('city').value;
        var min = document.getElementById('minPrice').value;
        var max = document.getElementById('maxPrice').value;
        //alert( min + max);
        jQuery('.oldList div').html('');
  $('#myStyle').load('fetch_data.php?category=' + encodeURIComponent(category) + '&city=' + encodeURIComponent(city)+ '&minPrice=' + min+ '&maxPrice=' + max);

}

function sort_by(value){
  jQuery('.oldList div').html('');
  $('#target-content').load('fetch_sort_favourite.php?value=' + encodeURIComponent(value));
}
//category
// function demo(category) {
//   $('#myStyle2').load('fetch_data.php?category=' + category);
// }
</script>
<script type="text/javascript">
$(".chosen").chosen();
</script>
<link rel="stylesheet" href="style.css">
<!-- grid problem -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- <script
  src="https://code.jquery.com/jquery-1.11.2.js"
  integrity="sha256-WMJwNbei5YnfOX5dfgVCS5C4waqvc+/0fV7W2uy3DyU="
  crossorigin="anonymous"></script> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<!-- <script src="choosen.js"></script> -->
</body>

</html>
