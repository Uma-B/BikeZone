<?php 
session_start();

   $link=mysqli_connect("localhost","root","","bikezone");
   if (isset($_POST['BtnSubmit'])=='Submit'){
   
       $DealerId=$_SESSION['usr_id'];
       $DealerName=$_SESSION['usr_name'];
       $MobileNumber=$_POST['MobileNumber'];
       $Password=$_POST['Password'];
       $ConfirmPassword=$_POST['ConfirmPassword'];
       $Email=$_POST['Email'];
       $State=$_POST['State'];
       $City=$_POST['City'];
       $Location=$_POST['Location'];
       $PostalCode=$_POST['PostalCode'];
       $DealerBikeImage1=addslashes(file_get_contents($_FILES['image']['tmp_name']));
       $Price=$_POST['Price'];
       $Date=$_POST['Date'];

       $sql="INSERT INTO bikeservicecenter(DealerId,DealerName,MobileNumber,Email,State, City, Location, PostalCode,Image,Prize,Status, Date) values ($DealerId,'$DealerName','$MobileNumber','$Email','$State','$City','$Location','$PostalCode','{$DealerBikeImage1}','$Price','UnBlock','$Date')";
       
       $insert=mysqli_query($link, $sql);
   
       if($insert){
           ?>
<script>alert('Registered Successfully..');</script>
<script>window.open('index.php','_self')</script>;
<?php
   }
   else
   {
    
    echo mysqli_error();
   }
   
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
        function fetch_select(val)
        {
             $.ajax({
             type: 'post',
             url: 'fetch_data_scooters.php',
             data: {
              get_option3:val
         },
         success: function (response) {
            document.getElementById("new_select").innerHTML=response; 
         }
         });
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


function validateForm() {
    var x = document.forms["form1"]["ServiceCenter"].value;
    if (x == "") {
        alert("Service center name must be filled out");
        document.form1.ServiceCenter.focus();
        return false;
    }  
    var a = document.forms["form1"]["Password"].value;
    if (a == "") {
        alert("Password must be filled out");
        document.form1.Password.focus();
        return false;
    }
    if (a.length<8) {
        alert("Password should not be less than 8 characters");
        document.form1.Password.focus();
        return false;
    }   
    var b = document.forms["form1"]["ConfirmPassword"].value;
    if (b == "") {
        alert("Confirm Password must be filled out");
        document.form1.ConfirmPassword.focus();
        return false;
    } 
    if (a!==b) {
        alert("Password mismatch");
        document.form1.ConfirmPassword.focus();
        return false;
    } 
    
    var c = document.forms["form1"]["MobileNumber"].value;
    if (c == "") {
        alert("Phone number must be filled out");
        document.form1.MobileNumber.focus();
        return false;
    } 
    if (c.length<10) {
        alert("Phone number is invalid");
        document.form1.MobileNumber.focus();
        return false;
    } 
    if (c.length>20) {
        alert("Phone number is invalid");
        document.form1.MobileNumber.focus();
        return false;
    } 
    var x = document.forms["form1"]["Email"].value;
    if(x==""){
        alert("Email Id must be filled out");
        return false;
    }
     var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        document.form1.Email.focus();
        return false;
    }
    var x = document.forms["form1"]["State"].value;
    if (x == "1") {
        alert("State must be select out");
        document.form1.State.focus();
        return false;
    } 
    var x = document.forms["form1"]["City"].value;
    if (x == "1") {
        alert("City must be filled out");
        document.form1.City.focus();
        return false;
    }  
    var x = document.forms["form1"]["Location"].value;
    if (x == "") {
        alert("Location must be filled out");
        document.form1.Location.focus();
        return false;
    }  
    var x = document.forms["form1"]["PostalCode"].value;
    if (x == "") {
        alert("Postal Code must be filled out");
        document.form1.PostalCode.focus();
        return false;
    }  
    var x = document.forms["form1"]["image"].value;
    if (x == "") {
        alert("Image must be select out");
        document.form1.image.focus();
        return false;
    } 
    
    // var x = document.forms["form1"]["Price"].value;
    // if (x == "") {
    //     alert("Price must be filled out");
    //     document.form1.Price.focus();
    //     return false;
    // } 
    return true;
  }
      </script>

</head>
<body>
 <div id="wrapper">

         <?php
          //include "header.php";
         ?>
    <!-- /.header -->
    <body>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
<h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Bike
                            Ad - Service Center</strong></h2>

                        <div class="row">
                            <div class="col-sm-12">

                               <form name="form1" class="form-horizontal" enctype="multipart/form-data" action="" method="post" onSubmit="return validateForm(this);">
                                    <?php
                                        $link=mysqli_connect("localhost","root","","bikezone");
                                        if(isset($_SESSION['usr_id'])) {
                                            $UserId=$_SESSION['usr_id'];
                                                                  }
                                        $show=mysqli_query($link, "SELECT * FROM dealerregistration WHERE DealerId='$UserId'");
                                        $res=mysqli_fetch_array($show);
                                        
                                    ?>
                                        <br />
                                    
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Service center name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="ServiceCenter" class="form-control" id="Text1" placeholder="Service Center Name">
                                            
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                               
                                                <input type="password" name="Password" class="form-control" aria-label="Price" id="Text12">
                                            </div>
                                        </div>
                                        
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                
                                                <input type="password" name="ConfirmPassword" class="form-control" aria-label="Price" id="Text12">
                                            </div>
                                        </div>
                                        
                                    </div>

                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone number</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="MobileNumber" id="Text2" placeholder="Phone Number" value="">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="Email" id="Text3" placeholder="Email" value="">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">State</label>
                                         <div class="col-sm-8">
                                            <select class="form-control" name="State">
                                                <option value="1">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madya Pradesh">Madya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Orissa">Orissa</option>
                                                <option value="Puducherry">Puducherry</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Tripura">Tripura</option>
                                               <option value="Uttaranchal">Uttaranchal</option>
                                               <option value="Uttar Pradesh">Uttar Pradesh</option>
                                               <option value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-8" id="response" name="City">
                                           
                                                    <!--Response will be inserted here-->
                                                </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Location</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="Location" id="Text6" placeholder="Address" value="">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Postal Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="PostalCode" id="Text7" placeholder="PostalCode" value="">
                                            
                                        </div>
                                    </div>
                                  
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="textarea">Picture</label>
                                        <div class="col-lg-8">
                                            <div class="mb10">
                                                <input class="form-control" data-preview-file-type="text" name="image" id="image" accept="image/JPEG" type="file" id="Text9">
                                                ADS_1 in view page (pixel 400*400)
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs.</span>
                                                <input type="text" name="Price" class="form-control" aria-label="Price" id="Text12">
                                            </div>
                                        </div>
                                        
                                    </div>
                                                                         <!-- Date-->
                                 <div class="form-group row">
                                    <div class="col-sm-8">
                                       <input id="textinput-name" style="display: none;" name="Date"
                                          placeholder="Date" class="form-control input-md" value="<?php echo date("Y-m-d"); ?>" type="text">
                                    </div>
                                 </div>

                                 <!--   <div class="form-group row">1
                                        <label class="col-sm-3 col-form-label" for="textarea">Picture</label>
                                        <div class="col-lg-8">
                                            <div class="mb10">
                                                <input id="input-upload-img1" type="file" class="file" data-preview-file-type="text">
                                            </div>
                                            <div class="mb10">
                                                <input id="input-upload-img2" type="file" class="file" data-preview-file-type="text">
                                            </div>
                                            <div class="mb10">
                                                <input id="input-upload-img3" type="file" class="file" data-preview-file-type="text">
                                            </div>
                                            <div class="mb10">
                                                <input id="input-upload-img4" type="file" class="file" data-preview-file-type="text">
                                            </div>
                                            <div class="mb10">
                                                <input id="input-upload-img5" type="file" class="file" data-preview-file-type="text">
                                            </div>
                                            <p  class="form-text text-muted">
                                                Add up to 5 photos. Use a real image of your product, not catalogs
                                            </p>
                                        </div>
                                    </div>-->
   <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>

                                        <div class="col-sm-8"><input type="submit" id="button1id" name="BtnSubmit" value="Submit" id="button1id" class="btn btn-success btn-lg"></div>
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
                </div></div></div>
                
<!-- <footer class="main-footer">
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
                        </div>

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
     /.footer -->
<!-- </div> 
 --><!-- /.wrapper -->

<?php
include 'footer.php';
?>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title uppercase font-weight-bold" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
            class="sr-only">Close</span></button>
      </div>
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


<!-- include jquery file upload plugin  -->
<script src="assets/js/fileinput.min.js" type="text/javascript"></script>
<script>
    // initialize with defaults
    $("#input-upload-img1").fileinput();
    $("#input-upload-img2").fileinput();
    $("#input-upload-img3").fileinput();
    $("#input-upload-img4").fileinput();
    $("#input-upload-img5").fileinput();
</script></div>
</body>

</html>
           