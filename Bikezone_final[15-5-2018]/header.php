


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
    							<!-- <li class="dropdown-item"><a href="logout.php"><i class=" icon-logout "></i> Log out </a>
    							</li> -->
    						</ul>
    					</li>
                         <?php if (isset($_SESSION['usr_name'])) { ?>
                         <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                            <span><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                            <ul
                                    class="dropdown-menu user-menu dropdown-menu-right">
                                    <li class="dropdown-item"><a href="favourite_view.php"><i class=" icon-money "></i>Featured Ads</a>
                                </li>
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