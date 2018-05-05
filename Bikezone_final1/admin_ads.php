<?php 
session_start();


 /*  include "db_connection.php";
   if (isset($_POST['BtnSubmit'])=='Submit'){
     
       $UsedBikeImage1=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp
       $UsedBikeImage2=addslashes(file_get_contents($_FILES['image2']['tmp_name'])); //will store the image to 
       $UsedBikeImage3=addslashes(file_get_contents($_FILES['image3']['tmp_name'])); //will store the image to 
    
 
   

        $insert=mysql_query("INSERT INTO ");
   
   
       if($insert){
           ?>
<script>alert('Ads insert Successfully..');</script>
<script>window.open('Admin_home.html','_self')</script>;
<?php
   }
   else
   {
    echo mysql_error();
   ?>
<script>alert(<?php mysql_error();?>);</script>
<?php
   }
   }*/

include "db_connection.php";


    if (isset($_GET['Btn'])=='Submit'){
     
       echo $B = $_GET["Br"];
       echo $M = $_GET["Mo"];

 
   

        //$insert=mysql_query("INSERT INTO `bikemodel`(Brand,Model) VALUES ($B,'$M')");
        $insert = mysql_query("INSERT INTO `bikemodel`(`Brand`, `Model`) VALUES ('$B','$M')");
   
   
       if($insert){
           ?>
<script>alert('Ads models,brands Successfully..');</script>
<script>window.open('Admin_home.html','_self')</script>;
<?php
   }
   else
   {
    echo mysql_error();
   ?>

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



</head>
<body>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <div class="inner-box category-content">
              <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Bike Ads Images</strong></h2>

                        <div class="row">
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
                                           
                                            
                                            <p  class="form-text text-muted">
                                                Add up to 3 photos. Use a real image of your product, not catalogs
                                            </p>
                                        </div>
                        
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-lg-8">
                                          <input type="submit" id="button1id" name="BtnSubmit" value="Submit" id="button1id" class="btn btn-success btn-lg"></div>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
             </div></div>

</div>

 <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <div class="inner-box category-content">
              <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> New Bikes Models and brand </strong></h2>

                        <div class="row">
                            <div class="col-sm-12">

                                <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Brand</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="Br" id="Text3" placeholder="honda">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Model</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="Mo" id="Text4" placeholder="shine">
                                            
                                        </div>
                                    </div>
                        
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>

                                        <div class="col-sm-8"><input type="submit" id="button1id" name="Btn" value="Submit" id="button1id" class="btn btn-success btn-lg"></div>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
             </div></div>

</div>



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
           