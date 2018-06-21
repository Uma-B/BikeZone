<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
   header("Location: index.php");
}

include_once 'db_connection.php';

//check if form is submitted
if (isset($_POST['login'])) {

   $email = mysql_real_escape_string($_POST['email']);
   $password = mysql_real_escape_string($_POST['password']);
   $result = mysql_query("SELECT * FROM userregistration WHERE MailId = '" . $email. "' and Password = '" . $password . "' and Status = '".'Unblock'."'");

   if ($row = mysql_fetch_array($result)) {
       $_SESSION['usr_id'] = $row['UserId'];
       $_SESSION['usr_mailid'] = $row['MailId'];
       $_SESSION['usr_name'] = $row['UserName'];
       $_SESSION['usr_location'] = $row['Location'];
       header("Location: index.php");
   } else 
   {
       ?>
       <script>alert('Incorrect Email or Password!!!')</script>>
       <?php   }
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
      <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
      <!-- styles needed for carousel slider -->
      <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
      <link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
      <!-- bxSlider CSS file -->
      <link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet"/>
      <!-- session -->
      <script src="js/jquery-1.10.2.js"></script>
      
<script src="js/bootstrap.min.js"></script>
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

         function isNumberKey(evt){  
    //var e = evt || window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode
   if (charCode != 46 && charCode > 31 
  && (charCode < 48 || charCode > 57
    && ((charCode.length)==12)))
        return false;
        return true;
  }

function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
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
                        <span class="logo-icon">
                           <!-- <i class="icon icon-search-1 ln-shadow-logo "></i> -->
                        </span>
                        BIKE<span>ZONE </span> 
                     </a>
                     <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false">
                           <title>Menu</title>
                           <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/>
                        </svg>
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
                        <!-- <li><a href="category.html">Bike for sale</a></li>
                        <li><a href="">Insurance</a></li>
                        <li><a href="">Service</a></li>
                        <li><a href="">Help</a></li> -->
                     </ul>
                     <ul class="nav navbar-nav ml-auto navbar-right">
                        <!-- <li class="nav-item"><a href="category.html" class="nav-link"><i class="icon-th-thumb"></i> All Ads</a>
                           </li> -->
                        <!-- <li class="dropdown no-arrow nav-item">
                           <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
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
                        </li> -->
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
                        <div class="row">
                           <div class="col-sm-12">
           <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform" class="form-horizontal">
              <div class="content-subheading"><i class="icon-user fa"></i> <strong>User
                                    Login</strong>
                                 </div>
                                 
                              <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for=@"textinput-name">Email</label>
                                        <div class="col-sm-8">
                                       <input id="textinput-name" name="email"
                                          placeholder="Email" class="form-control input-md"
                                          required=""  type="email">
                                    </div></div>
                                

                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="textinput-name">Password</label>
                                    <div class="col-sm-8">
                                  
                                     <input id="textinput-name" name="password"
                                          placeholder="Password" class="form-control input-md"
                                          required="" type="password">
                                    </div>
                                 </div>
                  <center>
                   <div class="form-group">
                       <input type="submit" name="login" value="Login" class="btn btn-primary" /> &nbsp;&nbsp;OR &nbsp; 
                      <a href="UserRegistration.php"class="btn btn-primary">New User? </a>
                   </div>
                      <a href="forget_user.php">Forgot Password?</a>
                   </center>
           </form>
            </div>
                        </div>
                     </div>
                  </div>
           <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        <div class="col-md-3 reg-sidebar">
                     <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box">
                           <i class=" icon-picture fa fa-4x icon-color-1"></i>
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
                       
                  <!--/.reg-sidebar-->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container -->
         </div>
         <!-- /.main-container -->
      
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
                           valid. 
                        </p>
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
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title uppercase font-weight-bold" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                     class="sr-only">Close</span></button>
               </div>
               <div class="modal-body">
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
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.modal -->
      <!-- Le javascript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

      <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script><script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/vendors.min.js"></script>
      <!-- include custom script for site  -->
      <script src="assets/js/script.js"></script>
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
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
