<?php
session_start();
if(isset($_SESSION['email'])!="admin@gmail.com") {
   header("Location: index.php");
}
?><!DOCTYPE html>
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
                     <a href="Admin_home.php" class="navbar-brand logo logo-title">
                        <span class="logo-icon">
                           <!-- <i class="icon icon-search-1 ln-shadow-logo "></i> -->
                        </span>
                        BIKE<span>ZONE </span> 
                     </a>
                   <!--   <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
                        type="button"> -->
                       <!--  <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false">
                           <title>Menu</title>
                           <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/>
                        </svg>
                     </button> -->
                  </div>
                  <div class="navbar-collapse collapse">
                  </div>
                  <!--/.nav-collapse -->
               </div>
               <!-- /.container-fluid -->
            </nav>
         </div>
         <!-- /.header -->
         <div class="search-row-wrapper">
            <div class="container ">
               <h1 style="color: white;">Admin</h1>
            </div>
         </div>
         <!-- /.search-row -->
         <div class="main-container">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 page-content col-thin-left">
                     <div class="category-list">
                        <div class="tab-box ">
                        </div>
                        <!--/.tab-box-->
                        <!--  <div class="listing-filter">
                           <div class="pull-left col-xs-6">
                             
                           </div>
                           <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                   class="list-view active"><i class="  icon-th"></i></span> <span
                                   class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                   class="grid-view "><i class=" icon-th-large "></i></span></div>
                           <div style="clear:both"></div>
                           </div> -->
                        <!--/.listing-filter-->
                        <!-- Mobile Filter bar-->
                        <!-- responsive for mobile filert uma nd nidhi -->
                        <!-- <div class="mobile-filter-bar col-xl-12  ">
                           <ul class="list-unstyled list-inline no-margin no-padding">
                              <li class="filter-toggle">
                                 <a class="">
                                 <i class="  icon-th-list"></i>
                                 Filters
                                 </a>
                              </li>
                              <li>
                                 <div class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle"> Short
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
                        </div> -->
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->
                        <div class="adds-wrapper">
                           <div class="tab-content">
                              <!--              <div class="tab-pane active" id="allAds"><div class="row">
                                 </div> -->
                              <!--/.item-list-->
                              
                              <div class="item-list">
                                 <div class="row">
                                    <div class="col-md-2 no-padding photobox">
                                       <div class="add-image"><a href="view_customer.php"><img class="thumbnail no-margin" src="images/cstm.jpg" alt="img"></a>
                                       </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-7 add-desc-box">
                                     <h2 class="add-title" style="margin-top: 70px; font-size: 38px;">  <div class="ads-details">
                                          <a href="view_customer.php"><center>
                                             View all Customer </center> </a>   
                                         
                                       </div> </h2>
                                    </div>
                                    <!--/.add-desc-box-->
                                    <div class="col-md-3 text-right  price-box">
                                      
                                    </div>
                                    <!--/.add-desc-box-->
                                 </div>
                              </div>
                              <!--/.item-list-->
                              <div class="item-list">
                                 <div class="row">
                                    <div class="col-md-2 no-padding photobox">
                                       <div class="add-image"></span> <a href="view_dealer.php"><img class="thumbnail no-margin" src="images/deal.jpg" alt="img"></a>
                                       </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-7 add-desc-box">
                                       <div class="ads-details">
                                          <h2 class="add-title"  style="margin-top: 70px; font-size: 38px;"><center><a href="view_dealer.php">
                                             View all Dealer </a></center>   
                                          </h2>
                                       </div>
                                    </div>
                                    <!--/.add-desc-box-->
                                    <div class="col-md-3 text-right  price-box">
                                       <!-- <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>View Profile</span>
                                       </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Block</span> </a> -->
                                    </div>
                                 </div>
                              </div>
                              <br>
                              <center>
                                 <a href="admin_ads.php">
                                 <button type="button" class="btn btn-success">Post Details</button>
                                 </a>
                              </center>
                              <br><br>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="row">
                        <div class="col-sm-12">
                        
                            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                           <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="textarea">Picture</label>
                                    <div class="col-lg-8">
                                        <div class="mb10">
                                            <input class="file" data-preview-file-type="text" name="image" id="image" accept="image/JPEG" type="file">
                                        </div>
                                        <div class="mb10">
                                            <input class="file" data-preview-file-type="text" name="image2" id="image2" accept="image/JPEG" type="file">
                                        </div>
                                        <div class="mb10">
                                            <input class="file" data-preview-file-type="text" name="image3" id="image3" accept="image/JPEG" type="file">
                                        </div>
                                        <div class="mb10">
                                            <input class="file" data-preview-file-type="text" name="image4"  id="image4" accept="image/JPEG" type="file">
                                        </div>
                                        
                                        <p  class="form-text text-muted">
                                            Add up to 3 photos. Use a real image of your product, not catalogs
                                        </p>
                                    </div>
                                </div>
                        -->
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <!--  <div class="col-sm-8"><input type="submit" id="button1id" name="BtnSubmit" value="Submit" id="button1id" class="btn btn-success btn-lg"></div>
                           </div> -->
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
      </div>
      </div>
      <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/vendors.min.js"></script>
      <!-- include custom script for site  -->
      <script src="assets/js/script.js"></script>
   </body>
</html>