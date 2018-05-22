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

         
<?php
  include "header.php";
?>
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

                                <form name="form1" class="form-horizontal" method="post" action="" onSubmit="return validateForm();">

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
                                             <select id="autocomplete-ajax" class="form-control " name="Location">                            
                                              <option value="">Select Location</option>
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

<?php
  include "footer.php";
?>
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
  function validateForm(){
    var x1=document.forms['form1']['Keyword'].value;
    var x2=document.forms['form1']['BikeCategory'].value;
    var x3=document.forms['form1']['Brand'].value;
    var x4=document.forms['form1']['Model'].value;
    var x5=document.forms['form1']['Prize_Minimum'].value;
    var x6=document.forms['form1']['Prize_Maximum'].value;
    var x7=document.forms['form1']['State'].value;
    var x8=document.forms['form1']['City'].value;
    var x9=document.forms['form1']['Year'].value;
    var x10=document.forms['form1']['KilometreDriven'].value;
    var x11=document.forms['form1']['Transmission'].value;
    var x12=document.forms['form1']['FuelType'].value;
    var x13=document.forms['form1']['Stroke'].value;
    var x14=document.forms['form1']['EngineSize'].value;
    var x15=document.forms['form1']['Location'].value;
    var x16=document.forms['form1']['PostalCode'].value;

    if(x1=="" && x2=="" && x3=="" && x4=="" && x5=="" && x6=="" && x7=="" && x8=="" && x9=="" && x10=="" && x11=="" && x12=="" && x13=="" && x14=="" && x15=="" && x16==""){
      alert('please select atlease one field');
      return false;
    }
    return true;
  }
</script>
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
