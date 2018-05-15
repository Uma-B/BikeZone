<?php
session_start();
include "db_connection.php";

GLOBAL $filterQuery1;
if(isset($_SESSION['BikeCategory'])) {

        $Keyword=$_SESSION['Keyword'];
        $BikeCategory=$_SESSION['BikeCategory'];
        $Brand=$_SESSION['Brand'];
        $Model=$_SESSION['Model'];
        $Prize_Minimum=$_SESSION['Prize_Minimum'];
        $Prize_Maximum=$_SESSION['Prize_Maximum'];
        $State=$_SESSION['State'];
        $City=$_SESSION['City'];
       }

        // $Keyword=$_SESSION['Keyword'];
        // $BikeCategory=$_SESSION['BikeCategory'];
        // $Brand=$_SESSION['Brand'];
        // $Model=$_SESSION['Model'];
        // $Prize_Minimum=$_SESSION['Prize_Minimum'];
        // $Prize_Maximum=$_SESSION['Prize_Maximum'];
        // $State=$_SESSION['State'];
        // $City=$_SESSION['City'];

$filterQuery1 = "select
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
";

// $filterQuery2 = "select
//   dealerbikes.DealerBikeId as UsedBikeId,
//   dealerbikes.BikeCategory as BikeCategory,
//   dealerbikes.DealerBikeImage1 as BikeImage1,
//   dealerbikes.Brand as Brand,
//   dealerbikes.Model as Model,
//   dealerbikes.KilometreDriven as KilometreDriven,
//   dealerbikes.Location as Location,
//   dealerbikes.DealerId as UserId,
//   dealerbikes.UserName as UserName,
//   dealerbikes.ContactNumber as ContactNumber,
//   dealerbikes.Prize as Prize
// from
//   dealerbikes
// where
// ";

if($Keyword != null){
    $filterQuery1 = "select
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
  usedbikes.BikeCategory LIKE '$Keyword'
  OR usedbikes.Brand LIKE '$Keyword'
  OR usedbikes.Model LIKE '$Keyword'
  OR usedbikes.State LIKE '$Keyword'
  OR usedbikes.City LIKE '$Keyword'
";


}else{


if($BikeCategory != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.BikeCategory LIKE '$BikeCategory' AND";
    $filterQuery1 = $filterQuery1." usedbikes.BikeCategory LIKE '$BikeCategory' AND";
}
if($Brand != ""){
     // $filterQuery2 = $filterQuery2." dealerbikes.Brand LIKE '$Brand' AND";
    $filterQuery1 = $filterQuery1." usedbikes.Brand LIKE '$Brand' AND";
}
if($Model != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.Model LIKE '$Model' AND";
    $filterQuery1 = $filterQuery1." usedbikes.Model LIKE '$Model' AND";
}
// if($KilometreDriven != ""){
//     $filterQuery2 = $filterQuery2." dealerbikes.KilometreDriven LIKE '$KilometreDriven' AND";
//     $filterQuery1 = $filterQuery1." usedbikes.KilometreDriven LIKE '$KilometreDriven' AND";
// }
if($State != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.State LIKE '$State' AND";
    $filterQuery1 = $filterQuery1." usedbikes.State LIKE '$State' AND";
}
if($City != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.City LIKE '$City' AND";
    $filterQuery1 = $filterQuery1." usedbikes.City LIKE '$City' AND";
}
if($KilometreDriven != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.KilometreDriven LIKE '$KilometreDriven' AND";
    $filterQuery1 = $filterQuery1." usedbikes.KilometreDriven LIKE '$KilometreDriven' AND";
}
if($Transmission != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.Transmission LIKE '$Transmission' AND";
    $filterQuery1 = $filterQuery1." usedbikes.Transmission LIKE '$Transmission' AND";
}
if($FuelType != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.FuelType LIKE '$FuelType' AND";
    $filterQuery1 = $filterQuery1." usedbikes.FuelType LIKE '$FuelType' AND";
}

if($Stroke != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.Stroke LIKE '$Stroke' AND";
    $filterQuery1 = $filterQuery1." usedbikes.Stroke LIKE '$Stroke' AND";
}
if($EngineSize != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.EngineSize LIKE '$EngineSize' AND";
    $filterQuery1 = $filterQuery1." usedbikes.EngineSize LIKE '$EngineSize' AND";
}
if($Location != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.Location LIKE '$Location' AND";
    $filterQuery1 = $filterQuery1." usedbikes.Location LIKE '$Location' AND";
}
if($PostalCode != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.PostalCode LIKE '$PostalCode' AND";
    $filterQuery1 = $filterQuery1." usedbikes.PostalCode LIKE '$PostalCode' AND";
}
if($Prize_Minimum != "" && $Prize_Maximum != ""){
    // $filterQuery2 = $filterQuery2." dealerbikes.Prize IN (SELECT Prize from dealerbikes WHERE Prize BETWEEN $Prize_Minimum AND $Prize_Maximum)";
    $filterQuery1 = $filterQuery1." usedbikes.Prize IN (SELECT Prize from usedbikes WHERE Prize BETWEEN $Prize_Minimum AND $Prize_Maximum)";
}
/*trim($filterQuery1);
trim($filterQuery2);*/
$split = explode(" ", $filterQuery1);
if($split[count($split)-1] == "AND"){
    $filterQuery1 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterQuery1);
    // $filterQuery2 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterQuery2);
}
}
// $filterQuery = $filterQuery1." UNION ".$filterQuery2;
$_SESSION['filterQuery1'] = $filterQuery1;

        $_SESSION['Keyword'] = $Keyword;
    $_SESSION['BikeCategory'] = $BikeCategory;
    $_SESSION['Brand'] = $Brand;
    $_SESSION['Model'] = $Model;
     $_SESSION['State'] = $State;
    $_SESSION['City'] = $City;
    $_SESSION['Prize_Minimum'] = $Prize_Minimum;
    $_SESSION['Prize_Maximum'] = $Prize_Maximum;

    $_SESSION['Keyword'] = $_SESSION['Keyword'];
    $_SESSION['BikeCategory'] = $_SESSION['BikeCategory'];
    $_SESSION['Brand'] = $_SESSION['Brand'];
    $_SESSION['Model'] = $_SESSION['Model'];
     $_SESSION['State'] = $_SESSION['State'];
    $_SESSION['City'] = $_SESSION['City'];
    $_SESSION['Prize_Minimum'] = $_SESSION['Prize_Minimum'];
    $_SESSION['Prize_Maximum'] = $_SESSION['Prize_Maximum'];

    

                            
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
                                                <select id="category" class="chosen form-control" style="width:80%;" onchange="recp()">
                                            <option value=""> Select Category </option>
                                            <option value="Used Bikes"> Used Bikes</option>
                              <option value="New Bikes"> New Bikes</option>
                              <option value="Scooter"> Scooter</option>
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

                             </select>
                            </div>
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
                                    <li><a href="index_find.php">All Ads<span
                                            class="count"><?php

                                            $count=mysql_query("SELECT (SELECT COUNT(*) FROM usedbikes) + (SELECT COUNT(*) FROM dealerbikes) as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['count'];
                                             ?></span></a></li>
                                    <li><a href="BuisnessAds.php">Business <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT COUNT(*) FROM dealerbikes as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['COUNT(*)'];
                                             ?></span></a></li>
                                    <li><a href="PersonalAds.php"><strong> Personal </strong><span
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
                                             echo $num_rows+1;
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
                                <li class="nav-item">
                                   <a  href="index_find.php" class= "nav-link" role="tab" >All Ads 
                                    <span class="badge badge-secondary">
                                    <?php
                                            $count=mysql_query("SELECT UserId FROM usedbikes");
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a  href="BuisnessAds.php" class= "nav-link" role="tab" >Business Ads 
                                    <span class="badge badge-secondary">
                                    <?php
                                            $count=mysql_query("SELECT UserId FROM usedbikes");
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>
                               <li class="active nav-item ">
                                 <a href="PersonalAds.php" class="nav-link" role="tab">Personal
                                    <span class="badge badge-secondary">
                             <?php
                                            $count=mysql_query("SELECT UserId FROM usedbikes");
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>  </ul>

                            <div class="tab-filter">
                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto" onchange="sort_by(this.value)">
                                    <option value="-1">Sort by </option>
                                    <option value="ASC">Price: Low to High</option>
                                    <option value="DESC">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                        <!--/.tab-box-->

                       <!--  <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                         -->       <!--  <div class="breadcrumb-list"><a href="#" class="current"> <span>All ads</span></a>
                                    in

                                    cityName will replace with selected location/area from location modal 
                                    <span class="cityName"> New York </span> <a href="#selectRegion" id="dropdownMenu1"
                                                                                data-toggle="modal"> <span
                                            class="caret"></span> </a></div> -->
                          <!--   </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view active"><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view "><i class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div> -->
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


                                    <div class="dropdown"> <a data-toggle="dropdown"> </a>
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
        <!-- <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/category/sample_bike.jpg" alt="img"></a>
        </div> -->
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
       
    </div>
    <!--/.add-desc-box-->
    <!--/.add-desc-box-->

        </div>

</div>
<?php

include "db_connection.php";

//echo "\n Filter Query $filterQuery1";
$sql=mysql_query($filterQuery1);
while($row=mysql_fetch_array($sql))
{
   
?>


<div class="item-list oldList">
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
        <?php
        if (isset($_SESSION['usr_id'])) {
          $id=$_SESSION['usr_id'];
          ?>
          <a href="favourite.php?filename=PersonalAds&UserId=<?php echo $row['UserId']; ?> &UsedBikeId=<?php echo $row['UsedBikeId']; ?> &Brand=<?php echo $row['Brand'];?> &Category=<?php echo $row['BikeCategory'];?> &Price=<?php echo $row['Prize'];?> &ContactNumber=<?php echo $row['ContactNumber'];?> &Fav_Userid=<?php echo $id;?>" class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
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

<div id='myStyle'>
</div>

</div>
<?php } ?>

                            </div>
                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box save-search-bar text-center"><!-- <a href="#"> <i class=" icon-star-empty"></i>
                            Save Search </a> --></div>
                    </div>
                    <div class="pagination-bar text-center">
                        <nav aria-label="Page navigation " class="d-inline-b">
                            <ul class="pagination">

                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
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
    <!-- /.footer -->

<!-- /.wrapper -->

<!-- Modal Change City -->

<div class="modal fade modalHasList" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p>Popular cities in <strong>New York</strong>
                        </p>

                        <div style="clear:both"></div>
                        <div class="col-sm-6 no-padding">
                            <select class="form-control selecter  " id="region-state" name="region-state">
                                <option value="">All States/Provinces</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="District of Columbia">District of Columbia</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option selected value="New York">New York</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virgin Islands">Virgin Islands</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                            </select>
                        </div>
                        <div style="clear:both"></div>

                        <hr class="hr-thin">
                    </div>
                    <div class="col-md-4">
                        <ul class="list-link list-unstyled">
                            <li><a href="#" title="">All Cities</a></li>
                            <li><a href="#" title="Albany">Albany</a></li>
                            <li><a href="#" title="Altamont">Altamont</a></li>
                            <li><a href="#" title="Amagansett">Amagansett</a></li>
                            <li><a href="#" title="Amawalk">Amawalk</a></li>
                            <li><a href="#" title="Bellport">Bellport</a></li>
                            <li><a href="#" title="Centereach">Centereach</a></li>
                            <li><a href="#" title="Chappaqua">Chappaqua</a></li>
                            <li><a href="#" title="East Elmhurst">East Elmhurst</a></li>
                            <li><a href="#" title="East Greenbush">East Greenbush</a></li>
                            <li><a href="#" title="East Meadow">East Meadow</a></li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-link list-unstyled">
                            <li><a href="#" title="Elmont">Elmont</a></li>
                            <li><a href="#" title="Elmsford">Elmsford</a></li>
                            <li><a href="#" title="Farmingville">Farmingville</a></li>
                            <li><a href="#" title="Floral Park">Floral Park</a></li>
                            <li><a href="#" title="Flushing">Flushing</a></li>
                            <li><a href="#" title="Fonda">Fonda</a></li>
                            <li><a href="#" title="Freeport">Freeport</a></li>
                            <li><a href="#" title="Fresh Meadows">Fresh Meadows</a></li>
                            <li><a href="#" title="Fultonville">Fultonville</a></li>
                            <li><a href="#" title="Gansevoort">Gansevoort</a></li>
                            <li><a href="#" title="Garden City">Garden City</a></li>


                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-link list-unstyled">
                            <li><a href="#" title="Oceanside">Oceanside</a></li>
                            <li><a href="#" title="Orangeburg">Orangeburg</a></li>
                            <li><a href="#" title="Orient">Orient</a></li>
                            <li><a href="#" title="Ozone Park">Ozone Park</a></li>
                            <li><a href="#" title="Palatine Bridge">Palatine Bridge</a></li>
                            <li><a href="#" title="Patterson">Patterson</a></li>
                            <li><a href="#" title="Pearl River">Pearl River</a></li>
                            <li><a href="#" title="Peekskill">Peekskill</a></li>
                            <li><a href="#" title="Pelham">Pelham</a></li>
                            <li><a href="#" title="Penn Yan">Penn Yan</a></li>
                            <li><a href="#" title="Peru">Peru</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Change City -->

<div class="modal fade modalHasList" id="select-country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    
    </div>
</div>

<!-- /.modal -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- dropdown -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="choosen.js"></script>
  <script type="text/javascript">
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
  $('#myStyle').load('fetch_sort_personal.php?value=' + encodeURIComponent(value));
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="choosen.js"></script>
</body>

</html>
