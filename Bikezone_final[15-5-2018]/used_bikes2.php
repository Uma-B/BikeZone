

<?php
session_start();
include_once 'db_connection.php';
?>

<?php

include('db_connection.php'); 
$limit = 1; 
$sql = "SELECT COUNT(UsedBikeId) FROM usedbikes";  
$rs_result = mysql_query($sql);  
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);


$limit = 1;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM usedbikes ORDER BY UsedBikeId ASC LIMIT $start_from, $limit";  

$rs_result = mysql_query ($sql);  


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="dist/jquery.simplePagination.js"></script>




    
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

    <!-- styles needed for carousel slider -->
    <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <!-- bxSlider CSS file -->
    <link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet"/>



</head>
<body>

<div id="wrapper">

         <div class="header">
        <nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
             role="navigation">
            <div class="container">

            <div class="navbar-identity">


                <a href="index.html" class="navbar-brand logo logo-title">
                <span class="logo-icon"><!-- <i class="icon icon-search-1 ln-shadow-logo "></i> -->
                </span>BIKE<span>ZONE </span> </a>


                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
                        type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>


                </button>


              

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

                            <span>User Name</span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                            <ul
                                    class="dropdown-menu user-menu dropdown-menu-right">
                                <li class="active dropdown-item"><a href="account-home.html"><i class="icon-home"></i> Personal Home

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
                                </li>
                                <li class="dropdown-item"><a href="login.html"><i class=" icon-logout "></i> Log out </a>
                                </li>
                            </ul>
                        </li>
                        <li class="postadd nav-item"><a class="btn btn-block   btn-border btn-post btn-danger nav-link" href="post-ads.html">Sell Your Bike</a>
                        </li>
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
                                       <select class="form-control" onchange="recp('<?php echo $row['BikeCategory']?>')">
                                            <option value="">-select--</option>
                                            <option value="Used Bikes">Used Bikes</option>
                                            <option value="New Bikes">New Bikes</option>
                                            <option value="Scooters">Scooters</option>
                                        </select>                                        
                                        </li>
                                     
                                </ul>
                            </div>
                            <!--/.categories-list-->

                            <div class="locations-list list-filter">
                                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                     <?php
                                        include_once 'db_connection.php';

                                        $query ="SELECT City FROM usedbikes UNION SELECT City FROM dealerbikes Group by City  ";
                                        $result= mysql_query($query);

                                        while($row=mysql_fetch_array($result))
                                        {                                         
                                        ?>
                                        <li>
                                        <a onClick="recp('<?php echo $row['City']?>')" href="#">
                                            <button id="button"><?php echo $row['City']?></button>
                                        </a>
                                        </li>
                                      <?php 
                                         }
                                      ?>  
                                </ul>
                            </div>
                            <!--/.locations-list-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-lg-4 col-md-12 no-padding">
                                        <input type="text" placeholder="Rs.2000" id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-1 col-md-12 no-padding text-center hidden-md"> -</div>
                                    <div class="form-group col-lg-4 col-md-12 no-padding">
                                        <input type="text" placeholder="Rs.3000" id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 no-padding">
                                        <button class="btn btn-default pull-right btn-block-md" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href=""><strong>All Ads</strong> <span
                                            class="count"><?php

                                            $count=mysql_query("SELECT UserId FROM usedbikes");
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1;
                                             ?></span></a></li>
                                    <li><a href="index_find.php">Business <span
                                            class="count">28,70 5</span></a></li>
                                    <li><a href="">Personal <span
                                            class="count">18,705</span></a></li>
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
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="active nav-item">
                                    <a  class="nav-link" href="ajax/ee.html" data-url="ajax/33.html" role="tab"
                                                      data-toggle="tab">All Ads <span class="badge badge-secondary">
                                                          
                                                          <?php

                                            $count=mysql_query("SELECT UserId FROM usedbikes");
                                                $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1; ?>
                                                      </span></a>
                                </li>
                               
                            </ul>


                            <div class="tab-filter">
                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto">
                                    <option>Sort by </option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                        <!--/.tab-box-->

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view active"><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view "><i class=" icon-th-large "></i></span></div>
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



    
    <div class="col-sm-7 add-desc-box">
    </div>
        </div>

</div>



<div>
<div id="target-content" >loading...</div>
</div>





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
         <a href="used_bikes_view.php?id=<?php echo $row['UsedBikeId']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

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
              <span class="category">Seller Name : <?php echo $row['UserName']  ?></span>

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




<!-- <div class="pagination"></div>
 -->




<div class="pagination-bar text-center">
     <nav aria-label="Page navigation " class="d-inline-b">

<ul class="pagination" id="pagination" >

<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
 if($i == 1):?>
            <li class="page-item active"  id="<?php echo $i;?>"><a class="page-link" href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
 <?php else:?>

 <li class="page-item" id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

 <?php endif;?> 
<?php endfor;endif;?> 




</ul>
</nav>

</div>
</div>






                            </div>
                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center"><a href="#"> <i class=" icon-star-empty"></i>
                            Save Search </a></div>
                    </div>

                    <div class="post-promo text-center">
                        <h2> Do you get any bike for sell ? </h2>
                        <h5>Sell your bikes online FOR FREE. It's easier than you think !</h5>
                        <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Sell my bike free</a>
                    </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
   


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>




</body>


<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
        currentPage : 1,
        onPageClick : function(pageNumber) {
            jQuery("#target-content").html('loading...');
            jQuery("#target-content").load("pagination.php?page=" + pageNumber);
        }
    });
});
</script>


</html>
    