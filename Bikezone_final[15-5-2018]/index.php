<?php
session_start();
include_once 'db_connection.php';

if (isset($_POST['BtnSubmit'])){
       $Keyword=$_POST['Keyword'];
       $BikeCategory=$_POST['BikeCategory'];
       $Brand=$_POST['Brand'];
       $Model=$_POST['Model'];
       $State=$_POST['State'];
       $City=$_POST['City'];
       $Prize_Minimum=$_POST['Prize_Minimum'];
       $Prize_Maximum=$_POST['Prize_Maximum'];

$_SESSION['Keyword'] = $Keyword;
    $_SESSION['BikeCategory'] = $BikeCategory;
    $_SESSION['Brand'] = $Brand;
    $_SESSION['Model'] = $Model;
     $_SESSION['State'] = $State;
    $_SESSION['City'] = $City;
    $_SESSION['Prize_Minimum'] = $Prize_Minimum;
    $_SESSION['Prize_Maximum'] = $Prize_Maximum;

    header("Location: index_find.php");
}

else{
        $Keyword="";
        $BikeCategory="";
        $Brand="";
        $Model="";
        $State="";
        $City="";
        $Prize_Minimum="";
        $Prize_Maximum="";
}


 
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
    <link href="bootstrap.css" rel="stylesheet">


    <link href="assets/css/style.css" rel="stylesheet">

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

    <!-- dependent dropdown link -->
 

    <script>
        paceOptions = {
            elements: true
        };

</script>
    <script src="assets/js/pace.min.js"></script>



</head>

<body>
<div id="wrapper">
    <div class="themeControll ">

    	<h3 style=" color:#fff; font-size: 10px; line-height: 12px;" class="uppercase color-white text-center">
    		<a target="_blank" href="index.php">  All
    		Pages</a> </h3>

    	<div class="linkinner linkScroll scrollbar" style="height: 265px">
    		<!-- <a target="_blank" href="blogs.html"> Blog</a>
    		<a target="_blank" href="blog-details.html"> Blog Details</a>
    		 --><a target="_blank" href=""> about us</a>
    		<a target="_blank" href=""> account my ads</a>
    		<a target="_blank" href="ads-details.html"> ads details</a>

    		</a>
    		<!-- <a target="_blank" href=""> Contact</a>
    		 --><a target="_blank" href=""> Faq</a>
    		<a target="_blank" href=""> Sign Up</a>
    		<a target="_blank" href="statements.html"> Sign In<span class="label label-success " style="font-size: 10px"></span></a>
    	<!-- 	<a target="_blank" href="seller-profile.html"> Seller profile
    			<span class="label label-success " style="font-size: 10px"><em>NEW</em></span></a> -->

    		
    	</div>
    	<p class="tbtn"><i class="fa fa-angle-double-left"></i></p>
    </div>
    <!--themeControll-->


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
    					href="#select-country" data-toggle="modal">	<span class="flag-icon flag-icon-us"></span>  <span class="caret"></span>
    			</button> -->

            </div>



    			<div class="navbar-collapse collapse">
    				<ul class="nav navbar-nav navbar-left">
    					<!-- <li class="flag-menu country-flag tooltipHere hidden-xs nav-item" data-toggle="tooltip"
    						data-placement="bottom" title="Select Country">	<a href="#select-country" data-toggle="modal" class="n
                av-link">

    						<span class="flag-icon flag-icon-us"></span> <span class="caret"></span>

    					</a>
    					</li> -->
                      <li><a href="" class="glyphicon glyphicon-home"></a></li>
                      <li><a href="bike_sale_all.php">Bike for sale</a></li>
                      <li><a href="">Insurance</a></li>
                      <li><a href="">Service</a></li>
                      <li><a href="">Help</a></li>
    				</ul>
    				<ul class="nav navbar-nav ml-auto navbar-right">
    					<!-- <li class="nav-item"><a href="category.html" class="nav-link"><i class="icon-th-thumb"></i> All Ads</a>
    					</li> -->
    					<li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

    						<!-- <span>User Name</span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i> --></a>
    						<ul
    								class="dropdown-menu user-menu dropdown-menu-right">
    							<!-- <li class="active dropdown-item"><a href="account-home.html"><i class="icon-home"></i> Personal Home

    							</a>
    							</li> -->
    							<!-- <li class="dropdown-item"><a href="account-myads.html"><i class="icon-th-thumb"></i> My ads </a>
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
    							<li class="dropdown-item"><a href="logout.php"><i class=" icon-logout "></i> Log out </a>
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

    <div class="intro" style="background-image: url(images/bg3.jpg);">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title"> Find your next bike </h1>

                  
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
                    <div class="row">
                        <div class="col-xl-3 col-sm-3 search-col relative locationicon">
                            <!-- <i class="icon-location-2 icon-append"></i> -->
                            <input type="text" name="Keyword" id="autocomplete-ajax"
                                   class="form-control locinput input-rel searchtag-input has-icon"
                                   placeholder="Keyword Search..." value="">

                        </div>
                         <div class="col-xl-3 col-sm-3 search-col relative">
                            <select id="autocomplete-ajax" class="form-control" name="BikeCategory" >
                            
                              <option value=""> Select Category</option>
                              <option value="Used Bikes"> Used Bikes</option>
                              <option value="New Bikes"> New Bikes</option>
                              <option value="Scooters"> Scooters</option>
                                  
                             </select>
                        </div>
                       <div class="col-xl-3 col-sm-3 search-col relative">
                     <select class="form-control" name="Brand" onchange="fetch_select(this.value);" placeholder="Select Brand">
                   <option value=""> Select Brand  </option> 
                    <?php
                    include "db_connection.php";

                    $select=mysql_query("select Brand from usedbikes UNION select Brand from dealerbikes");
                    while($row=mysql_fetch_array($select))
                    {
                     echo "<option>".$row['Brand']."</option>";
                    }
                   ?>
                 </select>
                 </div>
                 <div class="col-xl-3 col-sm-3 search-col relative">
    <select name="Model" id="new_select" class="form-control">
    <option value="">Select Model</option>
    </select>
                     </div>
                     
                     
    </div>
    <br>
    <div class="row">
                        <div class="col-xl-3 col-sm-3 search-col relative locationicon">
                             <input id="Prize Minimum" name="Prize_Minimum"
                                          placeholder="Prize Minimum" class="form-control input-md"
                                           type="text">
                        </div>
                        <div class="col-xl-3 col-sm-3 search-col relative">
                             <input id="Prize Maximum" name="Prize_Maximum"
                                          placeholder="Prize Maximum" class="form-control input-md"
                                       type="text">
                        </div>
                        <div class="col-xl-3 col-sm-3 search-col relative">
                            <select id="autocomplete-ajax" class="form-control " name="State" onchange="fetch_selecting(this.value);">                            
                              <option value="">Select State</option>
                                  <?php
                                 
                                  $select=mysql_query("SELECT State FROM usedbikes UNION SELECT State FROM dealerbikes");
                                  while($row=mysql_fetch_array($select))
                                  {
                                   echo "<option>".$row['State']."</option>";
                                  }
                                 ?>
                             </select>
                        </div>
                         <div class="col-xl-3 col-sm-3 search-col relative">
                            <select id="new_select2" class="form-control " name="City">
                            <option value="">Select City</option>                                
                             </select>
                        </div>
                        </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-12 col-sm-12 search-col">
                            <!-- <button class="btn btn-primary btn-search btn-block"><i
                                    class="icon-search" name="BtnSubmit"></i><strong>Find</strong></button> -->
                                    
                                    <input class="btn btn-primary btn-search btn-block" class="icon-search" type="submit" name="BtnSubmit" value="Find" >
<!--                                     <a href="category.php" class="btn btn-primary btn-search btn-block" class="icon-search"><strong>Find</strong></a> -->
                        </div>
                    </div>
        </form>

        <div class="col-md-3 bottom-right">
            <a href="Advance_Search.php">Advanced Search</a>
        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.intro -->

    <div class="main-container">
        <div class="container">

            <div class="col-xl-12 content-box ">
                <div class="row row-featured row-featured-category">
                    <div class="col-xl-12  box-title no-border">
                        <div class="inner"><h2><span>Browse by</span>
                            Bike type <a href="bike_sale_all.php" class="sell-your-item"> View more <i
                                    class="  icon-th-list"></i> </a></h2>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4 col-sm-4 col-xs-4 f-category">
                        <a href="scooter.php"><img src="images/category/sample_bike.jpg" class="img-responsive" alt="img">
                            <h6>  Scooters </h6></a>
                    </div>

                    <div class="col-xl-4 col-md-4 col-sm-4 col-xs-4 f-category">
                        <a href="used_bikes.php"><img src="images/category/sample_bike.jpg" class="img-responsive"
                                                     alt="img"> <h6> Used Bikes </h6></a>
                    </div>

                    <div class="col-xl-4 col-md-4 col-sm-4 col-xs-4 f-category">
                        <a href="new_bikes.php"><img src="images/category/sample_bike.jpg" class="img-responsive" alt="img">
                            <h6> New Bikes </h6></a>
                    </div>

                    <!-- <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/sample_bike.jpg" class="img-responsive" alt="img"> <h6>
                            Electronics </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/sample_bike.jpg" class="img-responsive" alt="img">
                            <h6> Computer Accessories </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="property-list.html"><img src="images/category/sample_bike.jpg" class="img-responsive"
                                                          alt="img">
                            <h6> Real Estate </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/sample_bike.jpg"
                                                     class="img-responsive" alt="img"> <h6> Home Appliances </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/camera.jpg" class="img-responsive" alt="img">
                            <h6> Cameras </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/fashion.jpg" class="img-responsive" alt="img">
                            <h6> Fashion & Beauty </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/toy.jpg" class="img-responsive" alt="img">
                            <h6> Kids & Baby Products </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/jobs.jpg" class="img-responsive" alt="img">
                            <h6> Jobs </h6></a>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="category.html"><img src="images/category/catalog.jpg" class="img-responsive" alt="img">
                            <h6> Home & Furniture </h6></a>
                    </div> -->

                </div>


            </div>

            <div style="clear: both"></div>





            <div class="col-xl-12 content-box ">
                <div class="row row-featured">
                    <div class="col-xl-12  box-title ">
                        <div class="inner"><h2><span>Dealer</span>
                            Bike Ads <a href="bike_sale_buisness.php" class="sell-your-item"> View more <i
                                    class="  icon-th-list"></i> </a></h2>

                        </div>
                    </div>

                    <div style="clear: both"></div>

                    <div class=" relative  content featured-list-row  w100">

                        <nav class="slider-nav has-white-bg nav-narrow-svg">
                            <a class="prev">
                                <span class="nav-icon-wrap"></span>

                            </a>
                            <a class="next">
                                <span class="nav-icon-wrap"></span>
                            </a>
                        </nav>

                        <div class="no-margin featured-list-slider ">
                        <?php
                            $sql=mysql_query("SELECT * FROM dealerbikes ORDER BY Date DESC LIMIT 8;");
                            while ($res=mysql_fetch_array($sql)) {
                              ?>
                              <div class="item"><a href="used_bikes_view.php">
                     <span class="item-carousel-thumb">
                      <?php 
                                echo '<img alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($res['DealerBikeImage1']).'"/>'
                                ?>
                     </span>
                                <span class="item-name"> <?php echo $res['Brand'];?>  </span>
                                <span class="price">  <?php echo $res['Prize'];?> </span>
                            </a>
                            </div>
                              <?php
                            }
                        ?>
                            

                            <!-- <div class="item">

                                <a href="ads-details.html">
                     <span class="item-carousel-thumb">
                    	<img class="img-responsive" src="images/category/sample_bike.jpg" alt="img">
                     </span>
                                    <span class="item-name"> Bike Ad 2 </span>
                                    <span class="price"> Rs.260000 </span>
                                </a>
                            </div> -->

                            <!-- <div class="item"><a href="ads-details.html">
                                <span class="item-carousel-thumb"> <img class="item-img"
                                                                        src="images/category/sample_bike.jpg" alt="img"> </span>
                                <span class="item-name"> Bike Ad 3 </span>
                                <span class="price"> Rs.240000 </span></a></div> -->


                        <!--     <div class="item"><a href="ads-details.html">
                                <span class="item-carousel-thumb"> <img class="item-img"
                                                                        src="images/category/sample_bike.jpg" alt="img"> </span>
                                <span class="item-name"> Bike Ad 4  </span> <span class="price"> Rs.140000</span></a>
                            </div> -->

                            <!-- <div class="item"><a href="ads-details.html">
                                <span class="item-carousel-thumb"> <img class="item-img"
                                                                        src="images/category/sample_bike.jpg" alt="img">  </span><span
                                    class="item-name"> Bike Ad 5  </span> <span
                                    class="price"> Rs.1602342 </span></a></div> -->

                            <!-- <div class="item"><a href="ads-details.html">
                                <span class="item-carousel-thumb"> <img class="item-img" src="images/category/sample_bike.jpg"
                                                                        alt="img"> </span> <span class="item-name"> Bike Ad 6  </span>
                                <span class="price"> Rs.220097 </span></a></div> -->

                            <!-- <div class="item"><a href="ads-details.html">
                                <span class="item-carousel-thumb"> <img class="item-img" src="images/category/sample_bike.jpg"
                                                                        alt="img"> </span> <span class="item-name"> Bike Ad 7  </span>
                                <span class="price"> Rs.1254787 </span></a></div> -->

                            <!-- <div class="item"><a href="ads-details.html">
                                <span class="item-carousel-thumb"> <img class="item-img" src="images/category/sample_bike.jpg" alt="img"> </span> 
                                <span class="item-name"> Bike Ad 8 </span>
                                <span class="price"> Rs.251534 </span></a></div> -->
                        </div>
                    </div>



                </div>
            </div>

          <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner-box category-content">
                        <h2 class="title-2">Find bikes by category </h2>

                        <div class="row">
                            <div class="col-md-4 col-sm-4 ">
                                <div class="cat-list">

                                    <h3 class="cat-title"><a href="category.html"><i class="fa fa-car ln-shadow"></i>
                                        XXXXXX <span class="count">277,959</span> </a>

                                        <span data-target=".cat-id-1" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse  cat-id-1">
                                        <li><a href="category.html">xxxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx xxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx, xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx</a></li>
                                         <li><a href="category.html">xxxxxx xxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx, xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx</a></li>
                                    </ul>

                                </div>
                                <!-- <div class="cat-list">

                                    <h3 class="cat-title"><a href="category.html"><i class="icon-home ln-shadow"></i>
                                        Property <span class="count">228,705</span></a> <span data-target=".cat-id-2"
                                                                                              aria-expanded="true"  data-toggle="collapse"
                                                                                              class="btn-cat-collapsed collapsed">   <span
                                            class=" icon-down-open-big"></span> </span></h3>


                                    <ul class="cat-collapse collapse show cat-id-2">
                                        <li><a href="category.html">House for Rent</a></li>
                                        <li><a href="category.html">House for Sale </a></li>
                                        <li><a href="category.html"> Apartments For Sale </a></li>
                                        <li><a href="category.html">Apartments for Rent </a></li>
                                        <li><a href="category.html">Farms-Ranches </a></li>
                                        <li><a href="category.html">Land </a></li>
                                        <li><a href="category.html">Vacation Rentals </a></li>
                                        <li><a href="category.html">Commercial Building</a></li>
                                    </ul>

                                </div> -->
                                <!-- <div class="cat-list">
                                    <h3 class="cat-title"><a href="category.html"><i class="icon-home ln-shadow"></i>
                                        Jobs <span class="count">6375</span></a>

                                        <span data-target=".cat-id-3" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse show cat-id-3">
                                        <li><a href="category.html">Full Time Jobs</a></li>
                                        <li><a href="category.html">Internet Jobs </a></li>
                                        <li><a href="category.html">Learn &amp; Earn jobs </a></li>
                                        <li><a href="category.html"> Manual Labor Jobs </a></li>
                                        <li><a href="category.html">Other Jobs </a></li>
                                        <li><a href="category.html">OwnBusiness </a></li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="cat-list">
                                     <h3 class="cat-title"><a href="category.html"><i class="fa fa-car ln-shadow"></i>
                                        XXXXXX <span class="count">277,959</span> </a>

                                        <span data-target=".cat-id-1" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse  cat-id-1">
                                        <li><a href="category.html">xxxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx xxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx, xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx</a></li>
                                    </ul>
                                </div>
                                <!-- <div class="cat-list">
                                    <h3 class="cat-title"><a href="category.html"><i
                                            class="icon-book-open ln-shadow"></i> Learning <span
                                            class="count">26,529</span></a> <span data-target=".cat-id-5"
                                                                                  aria-expanded="true"  data-toggle="collapse"
                                                                                  class="btn-cat-collapsed collapsed">   <span
                                            class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse show cat-id-5">
                                        <li><a href="category.html"> Automotive Classes </a></li>
                                        <li><a href="category.html"> Computer Multimedia Classes </a></li>
                                        <li><a href="category.html"> Sports Classes </a></li>
                                        <li><a href="category.html"> Home Improvement Classes </a></li>
                                        <li><a href="category.html"> Language Classes </a></li>
                                        <li><a href="category.html"> Music Classes </a></li>
                                        <li><a href="category.html"> Personal Fitness </a></li>
                                        <li><a href="category.html"> Other Classes </a></li>
                                    </ul>
                                </div>
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="category.html"><i
                                            class="icon-guidedog ln-shadow"></i> Pets <span class="count">42,111</span></a>
                                        <span data-target=".cat-id-6" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse show cat-id-6">
                                        <li><a href="category.html">Pets for Sale</a></li>
                                        <li><a href="category.html">Petsitters &amp; Dogwalkers</a></li>
                                        <li><a href="category.html">Equipment &amp; Accessories</a></li>
                                        <li><a href="category.html">Missing, Lost &amp; Found</a></li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="col-md-4 col-sm-4   last-column">
                                <div class="cat-list">
                                     <h3 class="cat-title"><a href="category.html"><i class="fa fa-car ln-shadow"></i>
                                        XXXXXX <span class="count">277,959</span> </a>

                                        <span data-target=".cat-id-1" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse  cat-id-1">
                                        <li><a href="category.html">xxxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx xxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx, xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx</a></li>
                                         <li><a href="category.html">xxxxxx xxxx &amp; xxxxxx</a></li>
                                        <li><a href="category.html">xxxxx, xxxxx &amp; xxxxx</a></li>
                                        <li><a href="category.html">xxxxxx</a></li>
                                    </ul>
                                </div>
                              <!--   <div class="cat-list ">
                                    <h3 class="cat-title"><a href="category.html"><i
                                            class=" icon-theatre ln-shadow"></i> Community <span
                                            class="count">5,30</span> </a> <span data-target=".cat-id-8"
                                                                                 aria-expanded="true"  data-toggle="collapse"
                                                                                 class="btn-cat-collapsed collapsed">   <span
                                            class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse show cat-id-8">
                                        <li><a href="category.html">Announcements </a></li>
                                        <li><a href="category.html">Car Pool - Bike Ride </a></li>
                                        <li><a href="category.html">Charity - Donate - NGO </a></li>
                                        <li><a href="category.html">Lost - Found </a></li>
                                        <li><a href="category.html">Tender Notices </a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="inner-box has-aff relative">
                        <a class="dummy-aff-img" href="category.html"><img src="images/site/app3.jpg" class="img-responsive"
                                                                           alt=" aff"> </a>

                    </div>
                </div>
                <div class="col-md-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box no-padding">
                            <div class="inner-box-content"><a href="#"><img class="img-responsive"
                                                                            src="images/site/app2.png" alt="Vendor ad displayed here"></a>
                            </div>
                        </div>

                        <!-- <div class="inner-box">
                            <h2 class="title-2">Popular Categories </h2>

                            <div class="inner-box-content">
                                <ul class="cat-list arrow">
                                    <li><a href="sub-category-sub-location.html"> Apparel (1,386) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Art (1,163) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Business Opportunities (4,974) </a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html"> Community and Events (1,258) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Electronics and Appliances
                                        (1,578) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Jobs and Employment (3,609) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Motorcycles (968) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Pets (1,188) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Services (7,583) </a></li>
                                    <li><a href="sub-category-sub-location.html"> Vehicles (1,129) </a></li>
                                </ul>
                            </div>
                        </div> -->
    <br>
                        <div class="inner-box no-padding"><img class="img-responsive" src="images/site/app2.png" alt="Vendor ad displayed here">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

    <div class="page-info hasOverly" style="background: url(images/bg.jpg); background-size:cover">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>2200</span></h5>

                                    <div class="iconbox-wrap-text">Trusted Seller</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>100</span></h5>

                                    <div class="iconbox-wrap-text">Categories</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>700</span></h5>

                                    <div class="iconbox-wrap-text">Location</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon icon-facebook"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>50,000</span></h5>

                                    <div class="iconbox-wrap-text"> Facebook Fans</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">

            <!-- <div class="page-bottom-info-content text-center">
                <h1>If you have any questions, comments or concerns, please call the Classified Advertising department
                    at (000) 555-5556</h1>
                <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                    <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (000) 555-5555 </a>
            </div> -->

        </div>
    </div>

   <?php
include 'footer.php';
   ?>

</div>
<!-- /.wrapper -->


<!-- Modal Change City -->

<div class="modal fade modalHasList" id="select-country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title uppercase font-weight-bold" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
		<!-- 	<div class="modal-body">
				<div class="row">
					<div class="row" style="padding: 0 20px">
						<ul class="cat-list col-sm-3 col-xs-6 ">
							<li>
								<span  class="flag-icon flag-icon-af"> </span>
								<a href="#AF">
									Afghanistan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-al"> </span>
								<a href="#AL">
									Albania
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-dz"> </span>
								<a href="#DZ">
									Algeria
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ad"> </span>
								<a href="#AD">
									Andorra
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ao"> </span>
								<a href="#AO">
									Angola
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ar"> </span>
								<a href="#AR">
									Argentina
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-am"> </span>
								<a href="#AM">
									Armenia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-au"> </span>
								<a href="#AU">
									Australia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-at"> </span>
								<a href="#AT">
									Austria
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-az"> </span>
								<a href="#AZ">
									Azerbaijan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bs"> </span>
								<a href="#BS">
									Bahamas
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bh"> </span>
								<a href="#BH">
									Bahrain
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bd"> </span>
								<a href="#BD">
									Bangladesh
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-by"> </span>
								<a href="#BY">
									Belarus
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-be"> </span>
								<a href="#BE">
									Belgium
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bz"> </span>
								<a href="#BZ">
									Belize
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bj"> </span>
								<a href="#BJ">
									Benin
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bo"> </span>
								<a href="#BO">
									Bolivia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ba"> </span>
								<a href="#BA">
									Bosnia and Herzegovina
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bw"> </span>
								<a href="#BW">
									Botswana
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-br"> </span>
								<a href="#BR">
									Brazil
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bn"> </span>
								<a href="#BN">
									Brunei
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bg"> </span>
								<a href="#BG">
									Bulgaria
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bf"> </span>
								<a href="#BF">
									Burkina Faso
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-bi"> </span>
								<a href="#BI">
									Burundi
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-kh"> </span>
								<a href="#KH">
									Cambodia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cm"> </span>
								<a href="#CM">
									Cameroon
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ca"> </span>
								<a href="#CA">
									Canada
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cv"> </span>
								<a href="#CV">
									Cape Verde
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cf"> </span>
								<a href="#CF">
									Central African Republic
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-td"> </span>
								<a href="#TD">
									Chad
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cl"> </span>
								<a href="#CL">
									Chile
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cn"> </span>
								<a href="#CN">
									China
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-co"> </span>
								<a href="#CO">
									Colombia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-km"> </span>
								<a href="#KM">
									Comoros
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cg"> </span>
								<a href="#CG">
									Congo - Brazzaville
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cd"> </span>
								<a href="#CD">
									Congo - Kinshasa
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cr"> </span>
								<a href="#CR">
									Costa Rica
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-hr"> </span>
								<a href="#HR">
									Croatia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cu"> </span>
								<a href="#CU">
									Cuba
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cy"> </span>
								<a href="#CY">
									Cyprus
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-cz"> </span>
								<a href="#CZ">
									Czech Republic
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ci"> </span>
								<a href="#CI">
									Côte d’Ivoire
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-dk"> </span>
								<a href="#DK">
									Denmark
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-dj"> </span>
								<a href="#DJ">
									Djibouti
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-dm"> </span>
								<a href="#DM">
									Dominica
								</a>
							</li>
						</ul>
						<ul class="cat-list col-sm-3 col-xs-6 ">
							<li>
								<span  class="flag-icon flag-icon-do"> </span>
								<a href="#DO">
									Dominican Republic
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ec"> </span>
								<a href="#EC">
									Ecuador
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-eg"> </span>
								<a href="#EG">
									Egypt
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gq"> </span>
								<a href="#GQ">
									Equatorial Guinea
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-er"> </span>
								<a href="#ER">
									Eritrea
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ee"> </span>
								<a href="#EE">
									Estonia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-et"> </span>
								<a href="#ET">
									Ethiopia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-fj"> </span>
								<a href="#FJ">
									Fiji
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-fi"> </span>
								<a href="#FI">
									Finland
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-fr"> </span>
								<a href="#FR">
									France
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ga"> </span>
								<a href="#GA">
									Gabon
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gm"> </span>
								<a href="#GM">
									Gambia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ge"> </span>
								<a href="#GE">
									Georgia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-de"> </span>
								<a href="#DE">
									Germany
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gh"> </span>
								<a href="#GH">
									Ghana
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gi"> </span>
								<a href="#GI">
									Gibraltar
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gr"> </span>
								<a href="#GR">
									Greece
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gl"> </span>
								<a href="#GL">
									Greenland
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gd"> </span>
								<a href="#GD">
									Grenada
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gp"> </span>
								<a href="#GP">
									Guadeloupe
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gu"> </span>
								<a href="#GU">
									Guam
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gt"> </span>
								<a href="#GT">
									Guatemala
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gn"> </span>
								<a href="#GN">
									Guinea
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gw"> </span>
								<a href="#GW">
									Guinea-Bissau
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gy"> </span>
								<a href="#GY">
									Guyana
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ht"> </span>
								<a href="#HT">
									Haiti
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-hn"> </span>
								<a href="#HN">
									Honduras
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-hk"> </span>
								<a href="#HK">
									Hong Kong SAR China
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-hu"> </span>
								<a href="#HU">
									Hungary
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-is"> </span>
								<a href="#IS">
									Iceland
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-in"> </span>
								<a href="#IN">
									India
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-id"> </span>
								<a href="#ID">
									Indonesia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ir"> </span>
								<a href="#IR">
									Iran
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-iq"> </span>
								<a href="#IQ">
									Iraq
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ie"> </span>
								<a href="#IE">
									Ireland
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-il"> </span>
								<a href="#IL">
									Israel
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-it"> </span>
								<a href="#IT">
									Italy
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-jm"> </span>
								<a href="#JM">
									Jamaica
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-jp"> </span>
								<a href="#JP">
									Japan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-jo"> </span>
								<a href="#JO">
									Jordan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-kz"> </span>
								<a href="#KZ">
									Kazakhstan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ke"> </span>
								<a href="#KE">
									Kenya
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ki"> </span>
								<a href="#KI">
									Kiribati
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-kw"> </span>
								<a href="#KW">
									Kuwait
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-kg"> </span>
								<a href="#KG">
									Kyrgyzstan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-la"> </span>
								<a href="#LA">
									Laos
								</a>
							</li>
						</ul>
						<ul class="cat-list col-sm-3 col-xs-6 ">
							<li>
								<span  class="flag-icon flag-icon-lv"> </span>
								<a href="#LV">
									Latvia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-lb"> </span>
								<a href="#LB">
									Lebanon
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ls"> </span>
								<a href="#LS">
									Lesotho
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-lr"> </span>
								<a href="#LR">
									Liberia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ly"> </span>
								<a href="#LY">
									Libya
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-li"> </span>
								<a href="#LI">
									Liechtenstein
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-lt"> </span>
								<a href="#LT">
									Lithuania
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-lu"> </span>
								<a href="#LU">
									Luxembourg
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mk"> </span>
								<a href="#MK">
									Macedonia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mg"> </span>
								<a href="#MG">
									Madagascar
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mw"> </span>
								<a href="#MW">
									Malawi
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-my"> </span>
								<a href="#MY">
									Malaysia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mv"> </span>
								<a href="#MV">
									Maldives
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ml"> </span>
								<a href="#ML">
									Mali
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mt"> </span>
								<a href="#MT">
									Malta
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mq"> </span>
								<a href="#MQ">
									Martinique
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mr"> </span>
								<a href="#MR">
									Mauritania
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mu"> </span>
								<a href="#MU">
									Mauritius
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-yt"> </span>
								<a href="#YT">
									Mayotte
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mx"> </span>
								<a href="#MX">
									Mexico
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-fm"> </span>
								<a href="#FM">
									Micronesia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-md"> </span>
								<a href="#MD">
									Moldova
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mc"> </span>
								<a href="#MC">
									Monaco
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mn"> </span>
								<a href="#MN">
									Mongolia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-me"> </span>
								<a href="#ME">
									Montenegro
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ma"> </span>
								<a href="#MA">
									Morocco
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mz"> </span>
								<a href="#MZ">
									Mozambique
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-mm"> </span>
								<a href="#MM">
									Myanmar [Burma]
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-na"> </span>
								<a href="#NA">
									Namibia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-np"> </span>
								<a href="#NP">
									Nepal
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-nl"> </span>
								<a href="#NL">
									Netherlands
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-nc"> </span>
								<a href="#NC">
									New Caledonia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-nz"> </span>
								<a href="#NZ">
									New Zealand
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ni"> </span>
								<a href="#NI">
									Nicaragua
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ne"> </span>
								<a href="#NE">
									Niger
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ng"> </span>
								<a href="#NG">
									Nigeria
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-kp"> </span>
								<a href="#KP">
									North Korea
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-no"> </span>
								<a href="#NO">
									Norway
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-om"> </span>
								<a href="#OM">
									Oman
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-pk"> </span>
								<a href="#PK">
									Pakistan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ps"> </span>
								<a href="#PS">
									Palestinian Territories
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-pa"> </span>
								<a href="#PA">
									Panama
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-pg"> </span>
								<a href="#PG">
									Papua New Guinea
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-py"> </span>
								<a href="#PY">
									Paraguay
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-pe"> </span>
								<a href="#PE">
									Peru
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ph"> </span>
								<a href="#PH">
									Philippines
								</a>
							</li>
						</ul>
						<ul class="cat-list col-sm-3 col-xs-6 ">
							<li>
								<span  class="flag-icon flag-icon-pl"> </span>
								<a href="#PL">
									Poland
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-pt"> </span>
								<a href="#PT">
									Portugal
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-pr"> </span>
								<a href="#PR">
									Puerto Rico
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-qa"> </span>
								<a href="#QA">
									Qatar
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ro"> </span>
								<a href="#RO">
									Romania
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ru"> </span>
								<a href="#RU">
									Russia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-rw"> </span>
								<a href="#RW">
									Rwanda
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-re"> </span>
								<a href="#RE">
									Réunion
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ws"> </span>
								<a href="#WS">
									Samoa
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sa"> </span>
								<a href="#SA">
									Saudi Arabia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sn"> </span>
								<a href="#SN">
									Senegal
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-rs"> </span>
								<a href="#RS">
									Serbia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sl"> </span>
								<a href="#SL">
									Sierra Leone
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sg"> </span>
								<a href="#SG">
									Singapore
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sk"> </span>
								<a href="#SK">
									Slovakia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-si"> </span>
								<a href="#SI">
									Slovenia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-so"> </span>
								<a href="#SO">
									Somalia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-za"> </span>
								<a href="#ZA">
									South Africa
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-kr"> </span>
								<a href="#KR">
									South Korea
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-es"> </span>
								<a href="#ES">
									Spain
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-lk"> </span>
								<a href="#LK">
									Sri Lanka
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sd"> </span>
								<a href="#SD">
									Sudan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sz"> </span>
								<a href="#SZ">
									Swaziland
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-se"> </span>
								<a href="#SE">
									Sweden
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ch"> </span>
								<a href="#CH">
									Switzerland
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-sy"> </span>
								<a href="#SY">
									Syria
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tw"> </span>
								<a href="#TW">
									Taiwan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tj"> </span>
								<a href="#TJ">
									Tajikistan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tz"> </span>
								<a href="#TZ">
									Tanzania
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-th"> </span>
								<a href="#TH">
									Thailand
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tl"> </span>
								<a href="#TL">
									Timor-Leste
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tg"> </span>
								<a href="#TG">
									Togo
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tn"> </span>
								<a href="#TN">
									Tunisia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tr"> </span>
								<a href="#TR">
									Turkey
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-tm"> </span>
								<a href="#TM">
									Turkmenistan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ug"> </span>
								<a href="#UG">
									Uganda
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ua"> </span>
								<a href="#UA">
									Ukraine
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ae"> </span>
								<a href="#AE">
									United Arab Emirates
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-gb"> </span>
								<a href="#UK">
									United Kingdom
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-us"> </span>
								<a href="#US">
									United States
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-uy"> </span>
								<a href="#UY">
									Uruguay
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-uz"> </span>
								<a href="#UZ">
									Uzbekistan
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-vu"> </span>
								<a href="#VU">
									Vanuatu
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ve"> </span>
								<a href="#VE">
									Venezuela
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-vn"> </span>
								<a href="#VN">
									Vietnam
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ye"> </span>
								<a href="#YE">
									Yemen
								</a>
							</li>
						</ul>
						<ul class="cat-list col-sm-3 col-xs-6 ">
							<li>
								<span  class="flag-icon flag-icon-zm"> </span>
								<a href="#ZM">
									Zambia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-zw"> </span>
								<a href="#ZW">
									Zimbabwe
								</a>
							</li>
						</ul>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->


<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script><script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>

<!-- include jquery autocomplete plugin  -->

<!-- <script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script> -->
<script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/usastates.js"></script>

<script type="text/javascript" src="assets/plugins/autocomplete/autocomplete-demo.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="jquery-1.9.1.min.js"></script> -->
  <script type="text/javascript">
    function fetch_select(val)
    {
       $.ajax({
       type: 'post',
       url: 'fetch_data.php',
       data: {
        get_option:val
     },
     success: function (response) {
        document.getElementById("new_select").innerHTML=response; 
     }
     });
   }
   function fetch_selecting(val){

       $.ajax({
       type: 'post',
       url: 'fetch_data.php',
       data: {
        get_option2:val
     },
     success: function (response2) {
        document.getElementById("new_select2").innerHTML=response2; 
     }
     });
    }
    </script>

</body>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</html>
