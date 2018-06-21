<?php 
session_start();

// if(isset($_SESSION['usr_id'])) {
//   header("Location: index.php");
$link=mysqli_connect("localhost","root","","bikezone");
   if (isset($_POST['BtnSubmit'])=='Submit'){
       # code...
       $UserId=$_SESSION['usr_id'];
       $BikeCategory="Used Bikes";
       $Brand=$_POST['Brand'];
       $Model=$_POST['Model'];
       $Year=$_POST['Year'];
       $KilometreDriven=$_POST['KilometreDriven'];
       $Transmission=$_POST['Transmission'];
       $FuelType=$_POST['FuelType'];
       $Stroke=$_POST['Stroke'];
       $EngineSize=$_POST['EngineSize'];
       $Description=$_POST['Description'];
       $Details=$_POST['Details'];
       $Prize=$_POST['Prize'];
       $UsedBikeImage1=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp
       $UsedBikeImage2=addslashes(file_get_contents($_FILES['image2']['tmp_name'])); //will store the image to fp
       $UsedBikeImage3=addslashes(file_get_contents($_FILES['image3']['tmp_name'])); //will store the image to fp
       $UsedBikeImage4=addslashes(file_get_contents($_FILES['image4']['tmp_name'])); //will store the image to fp2
       $UserName=$_POST['UserName'];
       $ContactNumber=$_POST['ContactNumber'];
       $State=$_POST['State'];
       $City=$_POST['City'];
       $Location=$_POST['Location'];
       $PostalCode=$_POST['PostalCode'];
       $Date=$_POST['Date'];
   

       $insert=mysqli_query($link, "INSERT INTO `usedbikes`(UserId,BikeCategory,Brand, Model, Year, KilometreDriven, Transmission, FuelType, Stroke, EngineSize, Description, Details, Prize, UsedBikeImage1, UsedBikeImage2,UsedBikeImage3,UsedBikeImage4, UserName, ContactNumber, State, City, Location, PostalCode, Status, Date ) VALUES ($UserId,'Used Bikes','$Brand','$Model','$Year',$KilometreDriven,'$Transmission','$FuelType','$Stroke','$EngineSize','$Description','$Details',$Prize,'{$UsedBikeImage1}','{$UsedBikeImage2}','{$UsedBikeImage3}','{$UsedBikeImage4}','$UserName','$ContactNumber','$State','$City','$Location','$PostalCode','UnBlock','$Date')");
   
   
       if($insert){
           ?>
<script>alert('Registered Successfully..');</script>
<script>window.open('index.php','_self')</script>;
<?php
   }
   else
   {
    echo mysqli_error();
   ?>
<script>alert(<?php mysqli_error();?>);</script>
<?php
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

        function validateForm() {
    var x = document.forms["form1"]["Brand"].value;
    if (x == "1") {
        alert("Brand must be select out");
        document.form1.Brand.focus();
        return false;
    } 
    var x = document.forms["form1"]["Model"].value;
    if (x == "1") {
        alert("Model must be select out");
        document.form1.Model.focus();
        return false;
    } 
    var x = document.forms["form1"]["Year"].value;
    if (x == "") {
        alert("Year must be filled out");
        document.form1.Year.focus();
        return false;
    } 
    var x = document.forms["form1"]["KilometreDriven"].value;
    if (x == "") {
        alert("Kilometre driven must be filled out");
        document.form1.KilometreDriven.focus();
        return false;
    }
    var c = document.forms["form1"]["Transmission"].value;
    if (c == "1") {
        alert("Transmission must be filled out");
        document.form1.Transmission.focus();
        return false;
    }   
    var b = document.forms["form1"]["FuelType"].value;
    if (b == "1") {
        alert("Fuel type must be select out");
        document.form1.FuelType.focus();
        return false;
    } 
    var x = document.forms["form1"]["Stroke"].value;
    if (x == "1") {
        alert("Stroke must be select out");
        document.form1.Stroke.focus();
        return false;
    }  
    var x = document.forms["form1"]["EngineSize"].value;
    if (x == "") {
        alert("Engine size must be filled out");
        document.form1.EngineSize.focus();
        return false;
    } 
    var c = document.forms["form1"]["Description"].value;
    if (c == "") {
        alert("Description must be filled out");
        document.form1.Description.focus();
        return false;
    } 
    var x = document.forms["form1"]["Details"].value;
    if (x == "") {
        alert("Details must be filled out");
        document.form1.Details.focus();
        return false;
    } 
    var x = document.forms["form1"]["Prize"].value;
    if (x == "") {
        alert("Price must be filled out");
        document.form1.Prize.focus();
        return false;
    }  
    var x = document.forms["form1"]["image"].value;
    if (x == "") {
        alert("All images must be select out");
        document.form1.image.focus();
        return false;
    } 
    var x = document.forms["form1"]["image2"].value;
    if (x == "") {
        alert("All images must be select out");
        document.form1.image2.focus();
        return false;
    } 
    var x = document.forms["form1"]["image3"].value;
    if (x == "") {
        alert("All images must be select out");
        document.form1.image3.focus();
        return false;
    } 
    var x = document.forms["form1"]["image4"].value;
    if (x == "") {
        alert("All images must be select out");
        document.form1.image4.focus();
        return false;
    } 
    var c = document.forms["form1"]["ContactNumber"].value;
    if (c == "") {
        alert("Contact number must be filled out");
        document.form1.ContactNumber.focus();
        return false;
    } 
    if (c.length<10) {
        alert("Contact number number is invalid");
        document.form1.ContactNumber.focus();
        return false;
    } 
    if (c.length>20) {
        alert("Phone number is invalid");
        document.form1.PhoneNumber.focus();
        return false;
    } 
    var x = document.forms["form1"]["UserName"].value;
    if (x == "") {
        alert("UserName must be filled out");
        document.form1.UserName.focus();
        return false;
    }  
    
    var x = document.forms["form1"]["State"].value;
    if (x == "") {
        alert("State must be select out");
        document.form1.State.focus();
        return false;
    } 
    var x = document.forms["form1"]["City"].value;
    if (x == "") {
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
    return true;
  }
      </script>
    </script>
    <script src="assets/js/pace.min.js"></script>


</head>
<body>
 <div id="wrapper">

         <?php
            include "header.php";
         ?>
    <!-- /.header -->
    <body>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
<h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Bike
                            Ad - Customer</strong></h2>

                        <div class="row">
                            <div class="col-sm-12">

                                <form name="form1" class="form-horizontal" enctype="multipart/form-data" action="" method="post" onsubmit="return validateForm(this)">
                                       <?php

                                        if(isset($_SESSION['usr_id'])) {
                                            $UserId=$_SESSION['usr_id'];
                                        }
                                        $show=mysqli_query($link,"SELECT UserName, PhoneNumber, State, City, Location, PostalCode FROM userregistration WHERE UserId='$UserId'");
                                        $res=mysqli_fetch_array($show);
                                        
                                    ?>
                                        <br />
                                    
                                 <!--    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Bike Category</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="BikeCategory" name="BikeCategory" value="Used Bikes" disabled>
                                        </div>
                                    </div> -->
                                      <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Brand</label>
                                        <div class="col-sm-8">
                                            <select name="Brand" class="form-control" onchange="fetch_select(this.value);" >
                                              <option value="1"> Select Brand</option>
                                                  <?php
                                                 
                                                  $select=mysqli_query($link, "select Brand from bikemodel group by Brand");
                                                  while($row=mysqli_fetch_array($select))
                                                  {
                                                   echo "<option>".$row['Brand']."</option>";
                                                  }
                                                 ?>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Model</label>
                                        <div class="col-sm-8">
                                            <select name="Model" id="new_select" class="form-control">
                                              
                                                     </select>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Year</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="Text1" name="Year" placeholder="Year...">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Kilometer Driven</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="KilometreDriven" class="form-control" id="Text7" placeholder="Kilometer Driven">
                                            
                                        </div>
                                    </div>
                                     
                                        <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Transmission</label>
                                        <div class="col-sm-8">
                                            <select name="Transmission" id="Select3" class="form-control">
                                                <option value="1" selected="selected"> Select Transmission...</option>
                                                  <option value="Manual"> Manual</option>
                                                <option value="Automatic"> Automatic</option>
                                                 
                                                     </select>
                                        </div>
                                    </div>

                                        <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Fuel Type</label>
                                        <div class="col-sm-8">
                                            <select name="FuelType" id="Select4" class="form-control">
                                                <option value="1" selected="selected"> Select Fuel Type...</option>
                                                  <option value="Petrol"> Petrol</option>
                                                <option value="Diesel"> Diesel</option>
                                                 
                                                     </select>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Stroke</label>
                                        <div class="col-sm-8">
                                            <select name="Stroke" id="Select5" class="form-control">
                                                <option value="1" selected="selected"> Select Stroke Type...</option>
                                                  <option value="2 Stroke"> 2 Stroke</option>
                                                <option value="4 Stroke"> 4 Stroke</option>
                                                
                                                     </select>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label"> Engine Size</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" name="EngineSize" id="Text2" placeholder="Engine Size">
                                            
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="Description" class="form-control" id="Text4" placeholder="Description">
                                          
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Details</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="Details" class="form-control" id="Text5" placeholder="Details">
                                            
                                        </div>
                                    </div>
                                  <!--    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs.</span>
                                                <input type="text" class="form-control" aria-label="Price">
                                            </div>
                                        </div>
                                
                                    </div>-->

                                    <!-- <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Web site link</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="Text6" placeholder="Web site link">
                                            
                                        </div>
                                    </div>-->


                                       <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs.</span>
                                                <input type="number" class="form-control" aria-label="Price" name="Prize">
                                            </div>
                                        </div>
                                
                                    </div>

                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="textarea">Picture</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <div class="mb10">
                                                <input  data-preview-file-type="text" name="image2" id="image2" accept="image/JPEG" type="file">
                                                ADS_2 in view page (pixel 400*400)
                                            </div>
                                            <div class="mb10">
                                                <input class="file" data-preview-file-type="text" name="image3" id="image3" accept="image/JPEG" type="file">
                                                ADS_3 in view page (pixel 400*400)
                                            </div>
                                            <div class="mb10">
                                                <input class="file" data-preview-file-type="text" name="image4" id="image4" accept="image/JPEG" type="file">
                                                ADS_4 in view page (pixel 400*400)
                                            </div>
                                            
                                           <!--  <p  class="form-text text-muted">
                                                Add up to 3 photos. Use a real image of your product, not catalogs
                                            </p> -->
                                        </div>
                                    </div>
                                    <!--<div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs.</span>
                                                <input type="text" class="form-control" aria-label="Price">
                                            </div>
                                        </div>
                                        
                                    </div>-->

                                 <!--   <div class="form-group row">
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
                                    <!-- Text input-->
                                 <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Phone number</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="ContactNumber" id="Text5" placeholder="Phone number" value="<?php echo $res['PhoneNumber'];?>">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">User name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="UserName" id="Text3" placeholder="info2" value="<?php echo $res['UserName'];?>">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">State</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="State" id="Text3" placeholder="info2" value="<?php echo $res['State'];?>">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="City" id="Text7" placeholder="info3" value="<?php echo $res['City'];?>">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Location</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="Location" id="Text8" placeholder="info4" value="<?php echo $res['Location'];?>">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Postal Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="PostalCode" id="Text9" placeholder="info5" value="<?php echo $res['PostalCode'];?>">
                                            
                                        </div>
                                 <!-- Date-->
                                 <div class="form-group row">
                                    <div class="col-sm-8">
                                       <input id="textinput-name" style="display: none;" name="Date"
                                          placeholder="Date" class="form-control input-md" value="<?php echo date("Y-m-d"); ?>" type="text">
                                    </div>
                                 </div>
   <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>

                                        <div class="col-sm-8"><input type="submit" id="button1id" name="BtnSubmit" value="Submit" id="button1id" class="btn btn-success btn-lg"></div>
                                    </div>


                            

                            </div>
                        </form></div></div></div></div>
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
                
<!-- /.wrapper -->
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

    <script type="text/javascript">
  $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });
</script>
</script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script></div>
</body>

</html>
           