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
       $Year=$_POST['Year'];
       $KilometreDriven=$_POST['KilometreDriven'];
       $Transmission=$_POST['Transmission'];
       $FuelType=$_POST['FuelType'];
       $Stroke=$_POST['Stroke'];
       $EngineSize=$_POST['EngineSize'];
       $Location=$_POST['Location'];
       $PostalCode=$_POST['PostalCode'];


    $_SESSION['Keyword'] = $Keyword;
    $_SESSION['BikeCategory'] = $BikeCategory;
    $_SESSION['Brand'] = $Brand;
    $_SESSION['Model'] = $Model;
    $_SESSION['State'] = $State;
    $_SESSION['City'] = $City;
    $_SESSION['Prize_Minimum'] = $Prize_Minimum;
    $_SESSION['Prize_Maximum'] = $Prize_Maximum;
    $_SESSION['Year']=$Year;
    $_SESSION['KilometreDriven']=$KilometreDriven;
    $_SESSION['Transmission']=$Transmission;
    $_SESSION['FuelType']=$FuelType;
    $_SESSION['Stroke']=$Stroke;
    $_SESSION['EngineSize']=$EngineSize;
    $_SESSION['Location']=$Location;
    $_SESSION['PostalCode']=$PostalCode;

    header("Location: Advance_Search_Find.php");
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
        $Year="";
       $KilometreDriven="";
       $Transmission="";
       $FuelType="";
       $Stroke="";
       $EngineSize="";
       $Location="";
       $PostalCode="";
}
 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="view
    +port" content="width=device-width, initial-scale=1.0">
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
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select.form-control").change(function(){
        var selectedCountry = $(".form-control option:selected").val();
        $.ajax({
            type: "POST",
            url: "process-request.php",
            data: { country : selectedCountry } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
});
      </script>
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
                      <li><a href="bike_sale_all.php">Bike for sale</a></li>
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
                        <!-- <li class="postadd nav-item"><a class="btn btn-block   btn-border btn-post btn-danger nav-link" href="post-ads.html">Sell Your Bike</a>
                        </li> -->
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

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                       <!-- <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Bike
                            Ad</strong></h2>-->

                        <div class="row">
                            <div class="col-sm-12">

                                <form name="form1" class="form-horizontal" method="post" action="" >

                                    <div class="content-subheading"><i class="icon-user fa"></i> <strong>Advance Search</strong></div>

                                    <!-- Text input-->
                                    
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                           <input type="text" name="Keyword" id="autocomplete-ajax"
                                   class="form-control locinput input-rel searchtag-input has-icon"
                                   placeholder="Keyword Search..." value=""> 
                                           
                                             </div>
                                        <div class="col-sm-6">
                                        <select id="autocomplete-ajax" class="form-control" name="BikeCategory" >                          
                                              <option value=""> Select Bike Category</option>
                                              <option value="Used Bikes"> Used Bikes</option>
                                              <option value="New Bikes"> New Bikes</option>
                                              <option value="Scooters"> Scooters</option>
                                                  
                                             </select>
                                           
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                           <select class="form-control" name="Brand" onchange="fetch_select(this.value);" placeholder="Select   Brand">
                                               <option value=""> Select Brand  </option> 
                                                <?php
                                                include "db_connection.php";

                                                $select=mysql_query("select Brand from usedbikes UNION select Brand from dealerbikes group by Brand");
                                                while($row=mysql_fetch_array($select))
                                                {
                                                 echo "<option>".$row['Brand']."</option>";
                                                }
                                               ?>
                                             </select>
                                             
                                                     </div>
                                        <div class="col-sm-6">
                                            <select name="Model" id="new_select" class="form-control">
                                                <option value="">Select Model</option>
                                                </select>
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                          <input id="Prize Minimum" name="Prize_Minimum"
                                          placeholder="Prize Minimum" class="form-control input-md"
                                           type="text">
                                             </div>
                                        <div class="col-sm-6">
                                            <input id="Prize Maximum" name="Prize_Maximum"
                                          placeholder="Prize Maximum" class="form-control input-md"
                                       type="text">
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                           <select id="autocomplete-ajax" class="form-control " name="State" onchange="fetch_selecting(this.value);">                            
                                              <option value="">Select State</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT State FROM usedbikes UNION SELECT State FROM dealerbikes group by State");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['State']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                             </div>
                                        <div class="col-sm-6">
                                            <select id="new_select2" class="form-control " name="City">
                                                <option value="">Select City</option>                                
                                                 </select>
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                           <select id="autocomplete-ajax" class="form-control " name="Year">                            
                                              <option value="">Select Year</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT Year FROM usedbikes UNION SELECT Year FROM dealerbikes Group By Year");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['Year']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                             </div>
                                        <div class="col-sm-6">
                                            <select id="autocomplete-ajax" class="form-control " name="KilometreDriven">                            
                                              <option value="">Select Kilometre Driven</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT KilometreDriven FROM usedbikes UNION SELECT KilometreDriven FROM dealerbikes Group By KilometreDriven");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['KilometreDriven']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                           <select id="autocomplete-ajax" class="form-control " name="Transmission">                            
                                              <option value="">Select Transmission</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT Transmission FROM usedbikes UNION SELECT Transmission FROM dealerbikes Group By Transmission");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['Transmission']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                             </div>
                                        <div class="col-sm-6">
                                            <select id="autocomplete-ajax" class="form-control " name="FuelType">                            
                                              <option value="">Select Fueltype</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT FuelType FROM usedbikes UNION SELECT FuelType FROM dealerbikes Group By FuelType");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['FuelType']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                             <select id="autocomplete-ajax" class="form-control " name="Stroke">                            
                                              <option value="">Select Stroke</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT Stroke FROM usedbikes UNION SELECT Stroke FROM dealerbikes Group By Stroke");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['Stroke']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                             </div>
                                        <div class="col-sm-6">
                                             <select id="autocomplete-ajax" class="form-control " name="EngineSize">                            
                                              <option value="">Select Engine size</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT EngineSize FROM usedbikes UNION SELECT EngineSize FROM dealerbikes Group By EngineSize");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['EngineSize']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                     <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                             <select id="autocomplete-ajax" class="form-control " name="Stroke">                            
                                              <option value="">Select Stroke</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT Location FROM usedbikes UNION SELECT Location FROM dealerbikes Group By Location");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['Location']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                             </div>
                                        <div class="col-sm-6">
                                             <select id="autocomplete-ajax" class="form-control " name="PostalCode">                            
                                              <option value="">Select Postal code</option>
                                                  <?php
                                                 
                                                  $select=mysql_query("SELECT PostalCode FROM usedbikes UNION SELECT PostalCode FROM dealerbikes Group By PostalCode");
                                                  while($row=mysql_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['PostalCode']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                        </div> 
                                      </div>
                                    </div>
                                    </div>
                                    <!-- Appended checkbox -->

                                    <!-- Button  -->
                                    <div class="form-group row">
                                        <div class="container">
                                        <div class="row"> 
                                           <div class="col-sm-6">
                                              <input type="submit" name="BtnSubmit" value="Submit" id="button1id"
                                                                 class="btn btn-success btn-lg">
                                             </div>
                                      </div>
                                    </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-3 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Bike Ad</strong></h3>

                            <p> Post your free bike ads with us. </p>
                        </div>

                        <div class="card sidebar-card">
                            <div class="card-header uppercase">
                                <small><strong>How to sell quickly?</strong></small>
                            </div>
                            <div class="card-content">
                                <div class="card-body text-left">
                                    <ul class="list-check">
                                        <li> Use a brief title and description of the item</li>
                                        <li> Make sure you post in the correct category</li>
                                        <li> Add nice photos to your ad</li>
                                        <li> Put a reasonable price</li>
                                        <li> Check the item before publish</li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--/.reg-sidebar-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
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
                        &copy; Bikezone.com All Rights Reserved.<a href="http://litztech.in" target="_blank"> &nbsp; LITZ Tech Ind Pvt Ltd.</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</footer>
    <!-- /.footer -->
</div>
<!-- /.wrapper -->


<!-- Modal contactAdvertiser -->

<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class=" icon-mail-2"></i> Contact advertiser </h4>

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
            class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input class="form-control required" id="recipient-name" placeholder="Your name"
                 data-placement="top" data-trigger="manual"
                 data-content="Must be at least 3 characters long, and must only contain letters."
                 type="text">
          </div>
          <div class="form-group">
            <label for="sender-email" class="control-label">E-mail:</label>
            <input id="sender-email" type="text"
                 data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual"
                 data-placement="top" placeholder="email@you.com" class="form-control email">
          </div>
          <div class="form-group">
            <label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
            <input type="text" maxlength="60" class="form-control" id="recipient-Phone-Number">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
            <textarea class="form-control" id="message-text" placeholder="Your message here.."
                  data-placement="top" data-trigger="manual"></textarea>
          </div>
          <div class="form-group">
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
              valid. </p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success pull-right">Send message!</button>
      </div>
    </div>
  </div>
</div>

<!-- /.modal -->

<!-- Modal contactAdvertiser -->

<div class="modal fade" id="reportAdvertiser" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa icon-info-circled-alt"></i> There's something wrong with this ads?
        </h4>

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
            class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="report-reason" class="control-label">Reason:</label>
            <select name="report-reason" id="report-reason" class="form-control">
              <option value="">Select a reason</option>
              <option value="soldUnavailable">Item unavailable</option>
              <option value="fraud">Fraud</option>
              <option value="duplicate">Duplicate</option>
              <option value="spam">Spam</option>
              <option value="wrongCategory">Wrong category</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-email" class="control-label">Your E-mail:</label>
            <input type="text" name="email" maxlength="60" class="form-control" id="recipient-email">
          </div>
          <div class="form-group">
            <label for="message-text2" class="control-label">Message <span class="text-count">(300) </span>:</label>
            <textarea class="form-control" id="message-text2"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Send Report</button>
      </div>
    </div>
  </div>
</div>

<!-- /.modal -->
<!-- Modal Change City -->

<div class="modal fade modalHasList" id="select-country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
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
<!-- include jquery file upload plugin  -->
<script src="assets/js/fileinput.min.js" type="text/javascript"></script>
<script>
    // initialize with defaults
    $("#input-upload-img1").fileinput();
    $("#input-upload-img2").fileinput();
    $("#input-upload-img3").fileinput();
    $("#input-upload-img4").fileinput();
    $("#input-upload-img5").fileinput();
</script>
</body>

</html>
