<?php
session_start();
include "db_connection.php";

GLOBAL $filterQuery2;
       if(isset($_SESSION['BikeCategory'])) {

        $Keyword=$_SESSION['Keyword'];
        $BikeCategory=$_SESSION['BikeCategory'];
        $Brand=$_SESSION['Brand'];
        $Model=$_SESSION['Model'];
        $State=$_SESSION['State'];
        $City=$_SESSION['City'];
        $Prize_Minimum=$_SESSION['Prize_Minimum'];
        $Prize_Maximum=$_SESSION['Prize_Maximum'];
        

       }


// $filterQuery1 = "select
//   usedbikes.UsedBikeId as UsedBikeId,
//   usedbikes.BikeCategory as BikeCategory,
//   usedbikes.UsedBikeImage1 as UsedBikeImage1,
//   usedbikes.Brand as Brand,
//   usedbikes.Model as Model,
//   usedbikes.KilometreDriven as KilometreDriven,
//   usedbikes.Location as Location,
//   usedbikes.UserId as UserId,
//   usedbikes.UserName as UserName,
//   usedbikes.ContactNumber as ContactNumber,
//   usedbikes.Prize as Prize
// from
//   usedbikes
// where
// ";

$filterQuery2 = "select
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
where Status LIKE 'UnBlock' and
";

//keyword
if($Keyword != null){

     $filterQuery2 ="select
  dealerbikes.DealerBikeId as UsedBikeId,
  dealerbikes.BikeCategory as BikeCategory,
  dealerbikes.DealerBikeImage1 as BikeImage1,
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
  dealerbikes.Status LIKE 'UnBlock'
  OR dealerbikes.BikeCategory LIKE '$Keyword'
  OR dealerbikes.Brand LIKE '$Keyword'
  OR dealerbikes.Model LIKE '$Keyword'
  OR dealerbikes.State LIKE '$Keyword'
  OR dealerbikes.City LIKE '$Keyword'
";


}
else{

if($BikeCategory != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.BikeCategory LIKE '$BikeCategory' AND";
    // $filterQuery1 = $filterQuery1." usedbikes.BikeCategory LIKE '$BikeCategory' AND";
}
if($Brand != ""){
     $filterQuery2 = $filterQuery2." dealerbikes.Brand LIKE '$Brand' AND";
    // $filterQuery1 = $filterQuery1." usedbikes.Brand LIKE '$Brand' AND";
}
if($Model != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.Model LIKE '$Model' AND";
    // $filterQuery1 = $filterQuery1." usedbikes.Model LIKE '$Model' AND";
}
// if($KilometreDriven != ""){
//     $filterQuery2 = $filterQuery2." dealerbikes.KilometreDriven LIKE '$KilometreDriven' AND";
//     $filterQuery1 = $filterQuery1." usedbikes.KilometreDriven LIKE '$KilometreDriven' AND";
// }
if($State != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.State LIKE '$State' AND";
    // $filterQuery1 = $filterQuery1." usedbikes.State LIKE '$State' AND";
}
if($City != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.City LIKE '$City' AND";
    // $filterQuery1 = $filterQuery1." usedbikes.City LIKE '$City' AND";
}
if($Prize_Minimum != "" && $Prize_Maximum != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.Prize IN (SELECT Prize from dealerbikes WHERE Prize BETWEEN $Prize_Minimum AND $Prize_Maximum)";
    // $filterQuery1 = $filterQuery1." usedbikes.Prize IN (SELECT Prize from usedbikes WHERE Prize BETWEEN $Prize_Minimum AND $Prize_Maximum)";
}
/*trim($filterQuery1);
trim($filterQuery2);*/
$split = explode(" ", $filterQuery2);
if($split[count($split)-1] == "AND"){
    // $filterQuery1 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterQuery1);
    $filterQuery2 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterQuery2);
}
}

$_SESSION['filterQuery2'] = $filterQuery2;


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


$limit = 10; 
$sql = $filterQuery2; 
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
$sql1 =  $filterQuery2;
$sql2="LIMIT $start_from, $limit";
 $sql=$sql1." ".$sql2;
$rs_result = mysql_query ($sql);
$_SESSION['fetchToSort']=$sql;
$_SESSION['fetchToPagination']=$sql1;
                           
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
 <?php
            include "header.php";
         ?>

</head>
<body>

 

        
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
                                                <select id="category" onchange="category(this.value)"  class="chosen form-control" style="width:80%;" onchange="recp()">
                                            <option value="-1"> Select Category </option>
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
                                                <option value="-1"> Select City </option>
                                                <?php
                                        $query ="SELECT City FROM dealerbikes Group by City  ";
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
                                    <li><a href="index_find.php">All Ads <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT (SELECT COUNT(*) FROM usedbikes Where Status='UnBlock') + (SELECT COUNT(*) FROM dealerbikes Where Status='UnBlock') as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['count'];
                                             ?></span></a></li>
                                    <li><a href="BusinessAds.php"><strong>Business </strong><span
                                            class="count"><?php

                                            $count=mysql_query("SELECT COUNT(*) FROM dealerbikes as count Where Status='UnBlock'");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['COUNT(*)'];
                                             ?></span></a></li>
                                    <li><a href="PersonalAds.php">Personal <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT COUNT(*) FROM usedbikes as count Where Status='UnBlock'");
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
                <div class="col-md-9 page-content col-thin-left" >
                    <div id="target-content" ></div>

<!-- city and price change values will print here -->

                        <div id='myStyle'></div>
                          <div id="masterdiv">
                    <div class="category-list" >
                        <!-- sorting values will print here -->

                        <div class="tab-box  oldList">
                            <!-- Nav tabs -->
                           <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="nav-item">
                                  <a  href="index_find.php" class= "nav-link" role="tab" >

                                    All Ads 
                                    <span class="badge badge-secondary" style="display:inline-block;">
                                    <?php

                                          $count=mysql_query("SELECT (SELECT COUNT(*) FROM usedbikes Where Status='UnBlock') + (SELECT COUNT(*) FROM dealerbikes Where Status='UnBlock') as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['count'];
                                             ?>
                                                 
                                    </span>
                                    </a>
                                </li>

                                <li class=" active nav-item ">
                                    <a  href="BusinessAds.php" class= "nav-link" role="tab" >Business Ads 
                                    <span class="badge badge-secondary" style="display:inline-block;">
                                    <?php
                                               $result=mysql_query($filterQuery2);
                                           $res=mysql_num_rows($result);
                                            echo  $res;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>
                               <li class="nav-item ">
                                 <a href="PersonalAds.php" class="nav-link" role="tab">Personal
                                    <span class="badge badge-secondary" style="display:inline-block;">
                             <?php
                                              $count=mysql_query("SELECT COUNT(*) FROM usedbikes as count Where Status='UnBlock'");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['COUNT(*)'];
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>  </ul>

                                <!-- <a href="BusinessAds.php"><button>Business Ads</button></a> -->
                                <!-- <li class="nav-item"><a class="nav-link"  href="BusinessAds.php" role="tab" data-toggle="tab">Business
                                    <span class="badge badge-secondary">22,805</span></a></li> -->
<!--                                  <a href="PersonalAds.php"><button>Personal</button></a>
 -->                                <!-- <li class="nav-item"><a class="nav-link"  href="ajax/33.html" data-url="ajax/33.html" role="tab" data-toggle="tab">Personal
                                    <span class="badge badge-secondary">18,705</span></a></li> -->


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
                           <!--  </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view active"><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view "><i class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div> -->
                        <!--/.listing-filter-->


                        <!-- Mobile Filter bar-- this is me hide >
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
                        <!-Mobile Filter bar End-->

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
<!-- <div>
<div id="target-content" ></div>
</div>
<div>
<div id='myStyle'></div>
</div> -->
</div>
<?php
while($row=mysql_fetch_array($rs_result))
{
   
?>


<div>

<div class="item-list">
    <!-- <div class="cornerRibbons featuredAds" > -->
        <!--<a href=""> Featured Ads</a>
    </div> -->
    <div class="row">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
           <a href="used_bikes_view.php?filename=BusinessAds&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    <!--/.photobox-->
 


    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title">  <a href="used_bikes_view.php?filename=BusinessAds&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">
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
          <a href="favourite.php?filename=BusinessAds&UserId=<?php echo $row['UserId']; ?> &UsedBikeId=<?php echo $row['UsedBikeId']; ?> &Brand=<?php echo $row['Brand'];?> &Category=<?php echo $row['BikeCategory'];?> &Price=<?php echo $row['Prize'];?> &ContactNumber=<?php echo $row['ContactNumber'];?> &Fav_Userid=<?php echo $id;?>" class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
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
</div></div>

</div>
<?php } ?>
</div>
</div>
</div>
<div class="pagination-bar text-center">
  <nav aria-label="Page navigation " class="d-inline-b">
  <ul class="pagination" id="pagination" >
    <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
     if($i == 1):?>
      <li class="page-item active"  id="<?php echo $i;?>"><a class="page-link" href='pagination_index_business.php.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
      <?php else:?>

       <li class="page-item" id="<?php echo $i;?>"><a href='pagination_index_business.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

     <?php endif;?> 
   <?php endfor;endif;?> 
 </ul>
</nav>
</div>              <!--/.pagination-bar -->

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
                </div></div></div></div>
           <?php
include 'footer.php';
?>
    <!-- /.main-container -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="dist/jquery.simplePagination.js"></script>
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
            jQuery("#target-content").load("pagination_index_business.php?page=" + pageNumber);
        }
    });
});
</script> 
<script type="text/javascript">
  // city1
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
     jQuery('.oldList div').html('');
          jQuery('#masterdiv div').hide();
          jQuery('#pagination').hide();
  $('#myStyle').load('fetch_data_business.php?category=' + encodeURIComponent(category) + '&city=' + encodeURIComponent(city)+ '&minPrice=' + min+ '&maxPrice=' + max);
}

function sort_by(value){
  jQuery('.oldList div').html('');
  jQuery('#masterdiv div').hide();
  //jQuery('#pagination').hide();
  $('#target-content').load('fetch_sorting_index_business.php?value=' + encodeURIComponent(value));
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
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<script src="choosen.js"></script>
</body>

</html>