<?php
session_start();
      include "db_connection.php";

$userid=$_SESSION['usr_id'];

 $favouriteQuery="select
  usedbikes.UserId as UserId,
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
  usedbikes.Prize as Prize,
  usedbikes.Amount as Amount
from
  usedbikes
where Status LIKE 'UnBlock' AND Post_Status LIKE 'UnBlock' AND
  usedbikes.UserId in (
    SELECT
      userid
    FROM
      `favourite`
    where
      favourite.Fav_UserId = $userid
  )
  and usedbikes.UsedBikeId in (
    SELECT
      usedbikeid
    FROM
      `favourite`
    where
      favourite.Fav_UserId = $userid
  )
UNION
select
  dealerbikes.DealerId as UserId,
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
  dealerbikes.Prize as Prize,
  dealerbikes.Amount as Amount
from
  dealerbikes
where Status LIKE 'UnBlock' AND Post_Status LIKE 'UnBlock' AND
  dealerbikes.DealerId in (
    SELECT
      userid
    FROM
      `favourite`
    where
      favourite.Fav_UserId = $userid
  )
  and dealerbikes.DealerBikeId in (
    SELECT
      usedbikeid
    FROM
      `favourite`
    where
      favourite.Fav_UserId = $userid
  )
";
    $sqlFav=mysql_query($favouriteQuery);

    $_SESSION['favourite']=$favouriteQuery;
//$sql=mysql_query("Select Fav_UserId,UserId,UsedBikeId,BikeCategory,Brand,MobileNumber,Price from favourite Where favourite.Fav_UserId=$userId");                      
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
<style>
.dropbtn {
  background-color: #d9534f;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  text-align: center;
  width:100%;

}
.dropbutton {
  background-color: #d9534f;
  color: white;
  padding: 12px;
  font-size: 15px;
  border: none;
  cursor: pointer;

}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn  {
  background-color: #d9534f;
}
</style>

</head>
<body>
<div class="header">
      <nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
         role="navigation">
        <div class="container">

            <div class="navbar-identity">


          <a href="index.php" class="navbar-brand logo logo-title">
          <span class="logo-icon"><!-- <i class="icon icon-search-1 ln-shadow-logo "></i> -->
          </span>BIKE<span>ZONE </span> </a>

          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
              type="button">

            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>


          </button>
            </div>



          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                      <li><a href="" class="glyphicon glyphicon-home"></a></li>
                      <li><a href="bike_sale_all.php">Bike for sale</a></li>
                      <li><a href="">Insurance</a></li>
                      <li><a href="">Service</a></li>
                      <li><a href="">Help</a></li>
            </ul>
            <ul class="nav navbar-nav ml-auto navbar-right">
              <!-- <li class="nav-item"><a href="category.html" class="nav-link"><i class="icon-th-thumb"></i> All Ads</a>
              </li> -->
              <!-- <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                <span>User Name</span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>   
                <ul
                    class="dropdown-menu user-menu dropdown-menu-right">
    
                </ul>
              </li> -->
                         <?php if (isset($_SESSION['usr_name'])) { ?>
                         <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                            <span>Signed in as <?php echo $_SESSION['usr_name']; ?></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                            <ul
                                    class="dropdown-menu user-menu dropdown-menu-right">
                                    <li class="dropdown-item"><a href="favourite_view.php"><i class=" icon-money "></i>Featured Ads</a>
                                </li>
                                <li class="dropdown-item"><a href="logout.php"><i class=" icon-logout "></i> Log out </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        <div class="dropdown">
                            <?php

                                if (isset($_SESSION['dealer_type'])) {
                                    ?>

                                    &nbsp;&nbsp;&nbsp; &nbsp;<a href="dealer_post.php" class="dropbutton " style="height: 45px; width: 120px;" >Sell your Bike</a>
                                    <?php
                                }
                                else{
                                    ?>
                                    &nbsp;&nbsp;&nbsp; &nbsp;<a href="customer_post.php" class="dropbutton " style="height: 45px; width: 120px;" >Sell your Bike</a>
                                    <?php
                                }
                            ?>
                                
  
 
</div><!-- <div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="height: 45px; width: 120px;">
    Sell your bike
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="customer_post.php">Customer</a>
    <a class="dropdown-item" href="dealer_post.php">Dealer</a>
    
  </div>
</div> --></li>
                <?php } else { ?>
                <li>
                    <!-- <div class="btn-group">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="height: 45px; width: 120px;">
    Login
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="UserLogin.php">User</a>
    <a class="dropdown-item" href="CompanyLogin.php">Company</a>
    
  </div>
</div>  </li>
                <li><div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style=" height: 45px; width: 120px; margin-left: 20px;">
    Register
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="UserRegistration.php">User</a>
    <a class="dropdown-item" href="delear.php">Company</a>
    
  </div>
</div></li> -->
 <div class="dropdown">
  &nbsp;&nbsp;&nbsp; &nbsp;<button class="dropbtn" style="width: 120px;" >Login
</button>
 <div class="dropdown-content">
    <a class="dropdown-item" href="UserLogin.php" style="background-color: white;width: 170px;text-align: left">User</a>
   <a class="dropdown-item" href="CompanyLogin.php" style="background-color: white;width: 170px;text-align: left">Dealer</a>
   </div>
</div><!-- <div class="btn-group">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="height: 45px; width: 120px;">
 </button>
 <div class="dropdown-menu">
   
 </div>
</div> -->  </li>
               <li>

<div class="dropdown">
 <button class="dropbtn" style=" width: 120px; margin-left: 20px;">
   Register</button>
 <div class="dropdown-content">
  <a class="dropdown-item" href="UserRegistration.php" style="background-color: white;width: 170px;text-align: left">User</a>
   <a class="dropdown-item" href="delear.php" style="background-color: white;width: 170px;text-align: left">Dealer</a>
   
   </div>
</div>

      </li> 
                <?php } ?>    
            </ul> 
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </div>
        
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
                                        $query ="select usedbikes.City as City from
  usedbikes where usedbikes.UserId in (SELECT userid FROM `favourite` where favourite.Fav_UserId = 10) and  usedbikes.UsedBikeId in (SELECT usedbikeid FROM `favourite` where favourite.Fav_UserId = 10) UNION select dealerbikes.City as City from
  dealerbikes where dealerbikes.DealerId in (SELECT userid FROM `favourite` where favourite.Fav_UserId = 10) and  dealerbikes.DealerId in (SELECT usedbikeid FROM `favourite` where favourite.Fav_UserId = 10) ";
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
                                    <li><a href="favourite_view.php"><strong>Favourite ads</strong> <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT COUNT(*) from favourite");
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
      <div class="tab-box  oldList">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="active nav-item">
                                    <a  class="nav-link" href="favourite_view.php" data-url="ajax/33.html" role="tab" data-toggle="tab">Favourite Ads 
                                    <span class="badge badge-secondary" style="display:inline-block;">
                                    <?php
                                             $res=mysql_query($favouriteQuery);
                                            $num=mysql_num_rows($res);
                                            echo $num;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>

                                <!-- <li class="nav-item ">
                                    <a  href="BuisnessAds.php" class= "nav-link" role="tab" >Business Ads 
                                    <span class="badge badge-secondary">
                                    <?php
                                            $count=mysql_query($filterQuery2);
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>
                               <li class="nav-item ">
                                 <a href="PersonalAds.php" class="nav-link" role="tab">Personal
                                    <span class="badge badge-secondary">
                             <?php
                                            $count=mysql_query($filterQuery1);
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>  --> </ul>

                                <!-- <a href="BuisnessAds.php"><button>Business Ads</button></a> -->
                                <!-- <li class="nav-item"><a class="nav-link"  href="BuisnessAds.php" role="tab" data-toggle="tab">Business
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

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                               <!--  <div class="breadcrumb-list"><a href="#" class="current"> <span>All ads</span></a>
                                    in

                                    cityName will replace with selected location/area from location modal 
                                    <span class="cityName"> New York </span> <a href="#selectRegion" id="dropdownMenu1"
                                                                                data-toggle="modal"> <span
                                            class="caret"></span> </a></div> -->
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
<?php


// while ($res=mysql_fetch_array($sql)) {

//    $userId=$res['UserId'];
//   $bikeId=$res['UsedBikeId'];
//   $BikeCategory=$res['BikeCategory'];
//   $Brand=$res['Brand'];
//   $ContactNumber=$res['MobileNumber'];
//   $Price=$res['Price'];

 
//echo "\n Filter Query $favouriteQuery";
//$sql=mysql_query($filterQuery);
 
while($row=mysql_fetch_array($sqlFav))
{
   // $_SESSION['Keyword'] = $row['Keyword'];
   //  $_SESSION['BikeCategory'] = $row['BikeCategory'];
   //  $_SESSION['Brand'] = $row['Brand'];
   //  $_SESSION['Model'] = $row['Model'];
   //   $_SESSION['State'] = $row['State'];
   //  $_SESSION['City'] = $row['City'];
   //  $_SESSION['Prize_Minimum'] = $row['Prize_Minimum'];
   //  $_SESSION['Prize_Maximum'] = $row['Prize_Maximum'];
?>


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
        
</div>

<!-- <div id='myStyle'>
  
</div> -->
</div>
</div>
<?php 
}
//} 
?>

                            </div>
                        </div>
                        <!--/.adds-wrapper-->
                    </div>
                    <!-- <div class="pagination-bar text-center">
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
                    </div> -->
                    <!--/.pagination-bar -->
</div>
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
<script src="assets/
/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>



<script src="choosen.js"></script>
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
          jQuery('#masterdiv div').hide();
  $('#myStyle').load('fetch_data_favourite.php?category=' + encodeURIComponent(category) + '&city=' + encodeURIComponent(city)+ '&minPrice=' + min+ '&maxPrice=' + max);

}

function sort_by(value){
  jQuery('.oldList div').html('');
  jQuery('#masterdiv div').hide();
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
