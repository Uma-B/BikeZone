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
       Pages</a></h3>

     <div class="linkinner linkScroll scrollbar" style="height: 220px">
       <!-- <a target="_blank" href="blogs.html"> Blog</a>
       <a target="_blank" href="blog-details.html"> Blog Details</a>
        --><a target="_blank" href=""> about us</a>
       <a target="_blank" href=""> account my ads</a>
       <a target="_blank" href=""> ads details</a>

       </a>
       <!-- <a target="_blank" href=""> Contact</a>
        --><a target="_blank" href=""> Faq</a>
       <div class="dropdown">
      <span> <a target="_blank" href=""> Sign Up</a></span>
       <div class="dropdown-content">
    <p style="position:right"><a href="UserLogin.php">User Sign Up </a> 
         <a href="CompanyLogin.php">Dealer Sign Up</a></p>
  </div>
</div> 
<div class="dropdown">
       <a target="_blank" href="">Sign In<span class="label label-success " style="font-size: 10px"></span></a>
         <div class="dropdown-content">
    <p style="position:left"><a href="UserRegistration.php"> User &nbsp;&nbsp;Sign In</a></p>
        <a href="delear.php">Dealer Sign In</a></p>

  </div></div>  
     </div>
     <p class="tbtn"><i class="fa fa-angle-double-left"></i></p>
   </div>

    <style>
     .dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color:   #CCFF0000;
    min-width: 105px;
    box-shadow:white;
  position: right;
    z-index: 1;
}


.dropdown:hover .dropdown-content {
    display: block;
    text-align:right;
}
</style>
   <!--themeControll-->
<?php include "header.php"; ?>

    <div class="intro" style="background-image: url(images/bg3.jpg);">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title"> Find your next bike </h1>

                  
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form" onSubmit="return validateForm();">
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
                            $sql=mysql_query("select
                                    dealerbikes.DealerBikeId as UsedBikeId,
                                    dealerbikes.BikeCategory as BikeCategory,
                                    dealerbikes.DealerBikeImage1 as UsedBikeImage1,
                                    dealerbikes.Brand as Brand,
                                    dealerbikes.Model as Model,
                                    dealerbikes.KilometreDriven as KilometreDriven,
                                    dealerbikes.Location as Location,
                                    dealerbikes.DealerId as UserId,
                                    dealerbikes.UserName as UserName,
                                    dealerbikes.ContactNumber as ContactNumber,
                                    dealerbikes.Prize as Prize
                                  from
                                    dealerbikes ORDER BY Date DESC LIMIT 8;");
                            while ($res=mysql_fetch_array($sql)) {
                              ?>
                              <div class="item"><a href="used_bikes_view.php?filename=index&usedbikeid=<?php echo $res['UsedBikeId']; ?> &userid=<?php echo $res['UserId']; ?> &brand=<?php echo $res['Brand']; ?> &category=<?php echo $res['BikeCategory']; ?>" role="button">
                     <span class="item-carousel-thumb">
                      <?php 
                                echo '<img alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($res['UsedBikeImage1']).'"/>'
                                ?>
                     </span>
                                <span class="item-name"> <?php echo $res['Brand'];?>  </span>
                                <span class="price">  <?php echo $res['Prize'];?> </span>
                            </a>
                            </div>
                              <?php
                            }
                        ?>
                            

                            
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

                                    <h3 class="cat-title"><a href="used_bikes.php"><i class="fa fa-car ln-shadow"></i>
                                        Used Bikes <span class="count">
                                            <?php
                                            
                                            $count=mysql_query("SELECT UserId FROM usedbikes UNION SELECT DealerBikeId FROM dealerbikes");
                                            $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1; ?>
                                      </span> </a>

                                        <span data-target=".cat-id-1" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse  cat-id-1">
                                       <?php
                                        include_once 'db_connection.php';

                                        $query ="SELECT Model FROM usedbikes UNION SELECT Model FROM dealerbikes Group by Model  ";
                                        $result= mysql_query($query);

                                        while($row=mysql_fetch_array($result))
                                        {                                         
                                        ?>
                                        <li>
                                          <a href="used_bikes.php"><?php echo $row['Model']?></a>
                                        </li>
                                      <?php 
                                         }
                                      ?> 
                                    </ul>

                                </div>
               
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="cat-list">
                                     <h3 class="cat-title"><a href="new_bikes.php"><i class="fa fa-car ln-shadow"></i>
                                        New Bikes <span class="count">
                                          <?php
                                            $count=mysql_query("SELECT DealerBikeId FROM dealerbikes where BikeCategory='New Bikes'");
                                            $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1; ?></span> </a>

                                        <span data-target=".cat-id-1" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse  cat-id-1">
                                        <?php
                                        include_once 'db_connection.php';

                                        $query ="SELECT Model FROM dealerbikes where BikeCategory='New Bikes' Group by Model  ";
                                        $result= mysql_query($query);

                                        while($row=mysql_fetch_array($result))
                                        {                                         
                                        ?>
                                        <li>
                                          <a href="new_bikes.php"><?php echo $row['Model']?></a>
                                        </li>
                                      <?php 
                                         }
                                      ?> 
                                    </ul>
                                </div>
                
                            </div>
                            <div class="col-md-4 col-sm-4   last-column">
                                <div class="cat-list">
                                     <h3 class="cat-title"><a href="scooter.php"><i class="fa fa-car ln-shadow"></i>
                                        Scoooter <span class="count"><?php
                                            $count=mysql_query("SELECT DealerBikeId FROM dealerbikes where BikeCategory='Scooter'");
                                            $num_rows=mysql_num_rows($count);
                                             echo $num_rows+1; ?></span> </a>

                                        <span data-target=".cat-id-1" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse  cat-id-1">
                                          <?php
                                        include_once 'db_connection.php';

                                        $query ="SELECT Model FROM dealerbikes where BikeCategory='Scooter' Group by Model ";
                                        $result= mysql_query($query);

                                        while($row=mysql_fetch_array($result))
                                        {                                         
                                        ?>
                                        <li>
                                          <a href="scooter.php"><?php echo $row['Model']?></a>
                                        </li>
                                      <?php 
                                         }
                                      ?> 
                                    </ul>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                      <?php
                            $sql=mysql_query("SELECT * FROM bikeads ORDER BY id DESC LIMIT 1;");
                            while ($res=mysql_fetch_array($sql)) {
                              ?>

                    <div class="inner-box has-aff relative">
                        <a class="dummy-aff-img" href="">
                          <?php 
                                echo '<img class="img-responsive"  alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($res['image1']).'"/>'
                                ?> </a>


                    </div>
                </div>
                                 <!-- murali ads -->
                <div class="col-md-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box no-padding">
      <div class="inner-box-content"><a href="#">
        <?php 
                                echo '<img class="img-responsive"  alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($res['image2']).'"/>'
                                ?></a>
                            </div>
                        </div>

    <br>
                        <div class="inner-box no-padding"><?php 
                                echo '<img class="img-responsive"  alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($res['image3']).'"/>'
                                ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <?php 
       }
   ?>

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

             
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">


        </div>
    </div></div></div></div>

   <?php
include 'footer.php';
   ?>
</body>
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
  function validateForm(){
    var x1=document.forms['form']['Keyword'].value;
    var x2=document.forms['form']['BikeCategory'].value;
    var x3=document.forms['form']['Brand'].value;
    var x4=document.forms['form']['Model'].value;
    var x5=document.forms['form']['Prize_Minimum'].value;
    var x6=document.forms['form']['Prize_Maximum'].value;
    var x7=document.forms['form']['State'].value;
    var x8=document.forms['form']['City'].value;

    if(x1=="" && x2=="" && x3=="" && x4=="" && x5=="" && x6=="" && x7=="" && x8==""){
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
       url: 'fetch_data_scooters.php',
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
       url: 'fetch_data_scooters.php',
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
