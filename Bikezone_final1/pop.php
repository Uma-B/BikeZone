<?php
session_start();

include "db_connection.php";

 // if(isset($_POST['BtnSubmit'])) {

 //       $_SESSON['Keyword']=$_POST['Keyword'];
 //       $_SESSION['BikeCategory']=$_POST['BikeCategory'];
 //       $_SESSION['Brand']=$_POST['Brand'];
 //       $_SESSION['Model']=$_POST['Model'];
 //       $_SESSION['State']=$_POST['State'];
 //       $_SESSION['City']=$_POST['City'];
 //       $_SESSION['Prize_Minimum']=$_POST['Prize_Minimum'];
 //       $_SESSION['Prize_Maximum']=$_POST['Prize_Maximum']; 
GLOBAL $filterQuery;

 if(isset($_SESSION['BikeCategory'])) {

    $Keyword = $_SESSION['Keyword'];
    $BikeCategory= $_SESSION['BikeCategory'];
    $Brand = $_SESSION['Brand'];
    $Model = $_SESSION['Model'];
    $State = $_SESSION['State'];
    $City = $_SESSION['City'];
    $Prize_Minimum = $_SESSION['Prize_Minimum'];
    $Prize_Maximum= $_SESSION['Prize_Maximum'];
        
       }

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

$filterQuery2 = "select
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
";

if($Keyword != null){
    $filterQuery = "select
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
UNION
select
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
  dealerbikes.BikeCategory LIKE '$Keyword'
  OR dealerbikes.Brand LIKE '$Keyword'
  OR dealerbikes.Model LIKE '$Keyword'
  OR dealerbikes.State LIKE '$Keyword'
  OR dealerbikes.City LIKE '$Keyword'
";


}else{

if($BikeCategory != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.BikeCategory LIKE '$BikeCategory' AND";
    $filterQuery1 = $filterQuery1." usedbikes.BikeCategory LIKE '$BikeCategory' AND";
}
if($Brand != ""){
     $filterQuery2 = $filterQuery2." dealerbikes.Brand LIKE '$Brand' AND";
    $filterQuery1 = $filterQuery1." usedbikes.Brand LIKE '$Brand' AND";
}
if($Model != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.Model LIKE '$Model' AND";
    $filterQuery1 = $filterQuery1." usedbikes.Model LIKE '$Model' AND";
}

if($State != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.State LIKE '$State' AND";
    $filterQuery1 = $filterQuery1." usedbikes.State LIKE '$State' AND";
}
if($City != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.City LIKE '$City' AND";
    $filterQuery1 = $filterQuery1." usedbikes.City LIKE '$City' AND";
}
if($Prize_Minimum != "" && $Prize_Maximum != ""){
    $filterQuery2 = $filterQuery2." dealerbikes.Prize IN (SELECT Prize from dealerbikes WHERE Prize BETWEEN $Prize_Minimum AND $Prize_Maximum)";
    $filterQuery1 = $filterQuery1." usedbikes.Prize IN (SELECT Prize from usedbikes WHERE Prize BETWEEN $Prize_Minimum AND $Prize_Maximum)";
}
/*trim($filterQuery1);
trim($filterQuery2);*/
$split = explode(" ", $filterQuery1);
if($split[count($split)-1] == "AND"){
    $filterQuery1 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterQuery1);
    $filterQuery2 = preg_replace('/\W\w+\s*(\W*)$/', '$1', $filterQuery2);
}
$filterQuery = $filterQuery1." UNION ".$filterQuery2;

}

$_SESSION['filterQuery'] = $filterQuery;


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


    // $_SESSION['Keyword'] = $_SESSION['Keyword'];
    // $_SESSION['BikeCategory'] = $_SESSION['BikeCategory'];
    // $_SESSION['Brand'] = $_SESSION['Brand'];
    // $_SESSION['Model'] = $_SESSION['Model'];
    //  $_SESSION['State'] = $_SESSION['State'];
    // $_SESSION['City'] = $_SESSION['City'];
    // $_SESSION['Prize_Minimum'] = $_SESSION['Prize_Minimum'];
    // $_SESSION['Prize_Maximum'] = $_SESSION['Prize_Maximum'];

    
    // $_SESSION['Keyword'] = $Keyword;
    // $_SESSION['BikeCategory'] = $BikeCategory;
    // $_SESSION['Brand'] = $Brand;
    // $_SESSION['Model'] = $Model;
    // $_SESSION['State'] = $State;
    // $_SESSION['City'] = $City;
    // $_SESSION['Prize_Minimum'] = $Prize_Minimum;
    // $_SESSION['Prize_Maximum'] = $Prize_Maximum;

    //  $_SESSION['Keyword'] = $_SESSION['Keyword'];
    // $_SESSION['BikeCategory'] = $_SESSION['BikeCategory'];
    // $_SESSION['Brand'] = $_SESSION['Brand'];
    // $_SESSION['Model'] = $_SESSION['Model'];
    //  $_SESSION['State'] = $_SESSION['State'];
    // $_SESSION['City'] = $_SESSION['City'];
    // $_SESSION['Prize_Minimum'] = $_SESSION['Prize_Minimum'];
    // $_SESSION['Prize_Maximum'] = $_SESSION['Prize_Maximum'];
    
                           
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


                <!-- <button
                        class="flag-menu country-flag d-block d-md-none btn btn-secondary hidden pull-right"
                        href="#select-country" data-toggle="modal"> <span class="flag-icon flag-icon-us"></span>  <span class="caret"></span>
                </button> -->

            </div>



                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <!-- <li class="flag-menu country-flag tooltipHere hidden-xs nav-item" data-toggle="tooltip"
                            data-placement="bottom" title="Select Country"> <a href="#select-country" data-toggle="modal" class="nav-link">

                            <span class="flag-icon flag-icon-us"></span> <span class="caret"></span>

                        </a>
                        </li> -->
                      <li><a href="" class="glyphicon glyphicon-home"></a></li>
                      <li><a href="category.html">Bike for sale</a></li>
                      <li><a href="">Insurance</a></li>
                      <li><a href="">Service</a></li>
                      <li><a href="">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto navbar-right">
                        <!-- <li class="nav-item"><a href="category.html" class="nav-link"><i class="icon-th-thumb"></i> All Ads</a>
                        </li> -->
                        <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                            </a>
                            <ul
                                    class="dropdown-menu user-menu dropdown-menu-right">
                                <!-- <li class="active dropdown-item"><a href="account-home.html"><i class="icon-home"></i> Personal Home

                                </a>
                                </li>
                                <li class="dropdown-item"><a href="account-myads.html"><i class="icon-th-thumb"></i> My ads </a>
                                </li>
                                <li class="dropdown-item"><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a>
                                </li>
                                <li class="dropdown-item"><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search

                                </a>
                                </li>
                                <li class="dropdown-item"><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads

                                </a>
                                </li>
                                <li class="dropdown-item"><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending
                                    approval </a>
                                </li>
                                <li class="dropdown-item"><a href="statements.html"><i class=" icon-money "></i> Payment history </a>
                                </li> -->
                                <li class="dropdown-item"><a href="login.html"><i class=" icon-logout "></i> Log out </a>
                                </li>
                            </ul>
                        </li>
                        <?php if (isset($_SESSION['usr_name'])) { ?>
                         <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                            <span><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                            <ul
                                    class="dropdown-menu user-menu dropdown-menu-right">
                                <li class="dropdown-item"><a href="logout.php"><i class=" icon-logout "></i> Log out </a>
                                </li>
                            </ul>
                        </li>
                        <li><div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="height: 45px; width: 120px;">
    Sell your bike
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="customer_post.php">Customer</a>
    <a class="dropdown-item" href="dealer_post.php">Dealer</a>
    
  </div>
</div></li>
                <?php } else { ?>
                <li><div class="btn-group">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="height: 45px; width: 120px;">
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
</div></li>
                <?php } ?>
                        <li class="dropdown  lang-menu nav-item">
                            <!-- <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                <span class="lang-title">EN</span>

                            </button> -->
                            <ul class="dropdown-menu dropdown-menu-right user-menu" role="menu">
                                <li class="dropdown-item"><a class="active">

                                    <span class="lang-name">English</span></a>
                                </li>
                                <li class="dropdown-item"><a><span class="lang-name">Dutch</span></a>
                                </li>
                                <li class="dropdown-item"><a><span class="lang-name">fran&#xE7;ais </span></a>
                                </li>
                                <li class="dropdown-item"><a><span class="lang-name">Deutsch</span></a>
                                </li>
                                <li class="dropdown-item"><a> <span class="lang-name">Arabic</span></a>
                                </li>
                                <li class="dropdown-item"><a><span class="lang-name">Spanish</span></a>
                                </li>
                            </ul>
                        </li>
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
                                                <select id="category"  style="width:80%;" onchange="recp()" class="chosen form-control ">
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
                                                <select id="city" class="chosen" style="width:80%;" onchange="recp()">
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
                                    <li><a href="index_find.php"><strong>All Ads</strong> <span
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
                                    <li><a href="PersonalAds.php">Personal <span
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
                                <li class="active nav-item">
                                    <a  class="nav-link" href="ajax/ee.html" data-url="ajax/33.html" role="tab" data-toggle="tab">All Ads 
                                    <span class="badge badge-secondary">
                                    <?php
                                            $count=mysql_query($filterQuery);
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>

                                <li class="nav-item ">
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
                                </li>  </ul>

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


                                    <div class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle"> Short

                                        by </a>
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



    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/category/sample_bike.jpg" alt="img"></a>
        </div>
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

echo "\n Filter Query $filterQuery";
$sql=mysql_query($filterQuery);

while($row=mysql_fetch_array($sql))
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
        <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a></div>
    <!--/.add-desc-box-->
</div>

<div id='myStyle'>
</div>

</div>
<?php } ?>

                            </div>
                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box save-search-bar text-center"><a href="#"> <i class=" icon-star-empty"></i>
                            Save Search </a></div>
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
                        <a href="pop.php " class="btn btn-lg btn-border btn-post btn-danger">Sell my bike free</a>
                    </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->

<footer class="main-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                    <div class="footer-col">
                        <h4 class="footer-title">About us</h4>
                        <ul class="list-unstyled footer-nav">
                            <li><a href="#">About Company</a></li>
                            <li><a href="#">For Business</a></li>
                            <li><a href="#">Our Partners</a></li>
                            <li><a href="#">Press Contact</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                </div>

                <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                    <div class="footer-col">
                        <h4 class="footer-title">Help & Contact</h4>
                        <ul class="list-unstyled footer-nav">
                            <li><a href="#">
                                Stay Safe Online
                            </a></li>
                            <li><a href="#">
                                How to Sell</a></li>
                            <li><a href="#">
                                How to Buy
                            </a></li>
                            <li><a href="#">Posting Rules
                            </a></li>

                            <li><a href="#">
                                Promote Your Ad
                            </a></li>

                        </ul>
                    </div>
                </div>

                <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                    <div class="footer-col">
                        <h4 class="footer-title">More From Us</h4>
                        <ul class="list-unstyled footer-nav">
                            <li><a href="faq.html">FAQ
                            </a></li>
                            <li><a href="blogs.html">Blog
                            </a></li>
                            <li><a href="#">
                                Popular Searches
                            </a></li>
                            <li><a href="#"> Site Map
                            </a></li> <li><a href="#"> Customer Reviews
                        </a></li>


                        </ul>
                    </div>
                </div>
                <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                    <div class="footer-col">
                        <h4 class="footer-title">Account</h4>
                        <ul class="list-unstyled footer-nav">
                            <li><a href="account-home.html"> Manage Account
                            </a></li>
                            <li><a href="login.html">Login
                            </a></li>
                            <li><a href="signup.html">Register
                            </a></li>
                            <li><a href="account-myads.html"> My ads
                            </a></li>
                            <li><a href="seller-profile.html"> Profile
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-4 col-xl-4 col-md-4 col-12">
                    <div class="footer-col row">

                        <!-- <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                            <div class="mobile-app-content">
                                <h4 class="footer-title">Mobile Apps</h4>
                                <div class="row ">
                                    <div class="col-6  ">
                                        <a class="app-icon" target="_blank"  href="https://itunes.apple.com/">
                                            <span class="hide-visually">iOS app</span>
                                            <img src="images/site/app_store_badge.svg" alt="Available on the App Store">
                                        </a>
                                    </div>
                                    <div class="col-6  ">
                                        <a class="app-icon"  target="_blank" href="https://play.google.com/store/">
                                            <span class="hide-visually">Android App</span>
                                            <img src="images/site/google-play-badge.svg" alt="Available on the App Store">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                            <div class="hero-subscribe">
                                <h4 class="footer-title no-margin">Follow us on</h4>
                                <ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
                                    <li><a class="icon-color fb" title="Facebook" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-facebook"></i> </a></li>
                                    <li><a class="icon-color tw" title="Twitter" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-twitter"></i> </a></li>
                                    <li><a class="icon-color gp" title="Google+" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-google-plus"></i> </a></li>
                                    <li><a class="icon-color lin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-linkedin"></i> </a></li>
                                    <li><a class="icon-color pin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-pinterest-p"></i> </a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="clear: both"></div>

                <div class="col-xl-12">
                    <div class=" text-center paymanet-method-logo">

                        <img src="images/site/payment/master_card.png" alt="img">
                        <img alt="img" src="images/site/payment/visa_card.png">
                        <img alt="img" src="images/site/payment/paypal.png">
                        <img alt="img" src="images/site/payment/american_express_card.png"> <img alt="img" src="images/site/payment/discover_network_card.png">
                        <img alt="img" src="images/site/payment/google_wallet.png">
                    </div>

                    <div class="copy-info text-center">
                        &copy; Bikezone.com All Rights Reserved.
                    </div>

                </div>

            </div>
        </div>
    </div>
</footer>
    <!-- /.footer -->
</div>



<!-- Placed at the end of the document so the pages load faster -->

<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>



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
  $('#myStyle').load('fetch_data_sort.php?value=' + encodeURIComponent(value));
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


 <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example1/colorbox.css" />
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
    <script>
        function openColorBox() {
            $.colorbox({ iframe: true, width: "23%", height: "40%", href: "popup.html" });
        }

        setTimeout(openColorBox, 000);
    </script>

        
</html>
</body>

</html>
