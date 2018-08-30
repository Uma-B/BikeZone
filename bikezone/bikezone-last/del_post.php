<?php 

 include "db_connection.php";

    if (isset($_POST['set'])){

      $UserId=$_POST['send'];
      $murali=$_POST['x'];

      if($murali=="UnBlock")
{
  $b='Block';
}
else
{
  $b='UnBlock';
}


      echo $UserId;


      $update=mysql_query("UPDATE dealerbikes SET Status='$b' WHERE DealerBikeId='{$_POST['x1']}'");
      header("Location: del_post.php?UserId=".$UserId);
    

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <title>Bike Zone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    </script>
    <style>
        .jumbotron {
            height:50px;
   /*background-image: url("assets/img/68553634.jpg");*/   
               background-color :rgba(226, 215, 215, 0.67);

        }
    </style>
      <script src="assets/js/pace.min.js"></script>
    
<div id="wrapper">

         <div class="header">
        <nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
             role="navigation">
            <div class="container">

            <div class="navbar-identity">


                <a href="Admin_home.php" class="navbar-brand logo logo-title">
                <span class="logo-icon"><!-- <i class="icon icon-search-1 ln-shadow-logo "></i> -->
                </span>BIKE<span>ZONE </span> </a>


                <!-- <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
                        type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>


                </button> -->


             

            </div>



                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
       
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>

</head>
<body>
    
<div id="Div1">

         <div class="header">
        <nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
             role="navigation">
            <div class="container">

            <div class="navbar-identity">


                <a href="Admin_home.php" class="navbar-brand logo logo-title">
                <span class="logo-icon"><!-- <i class="icon icon-search-1 ln-shadow-logo "></i> -->
                </span>BIKE<span>ZONE </span> </a>


               <!--  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
                        type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>


                </button> -->

            </div>
<a href="view_dealer.php">
<button style="float: right;" type="button" class="btn btn-success">Back</button>
</a>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                       
            </div>
           
        </nav>
    </div>
    <style>
        .jumbotron {
               height:auto;
               padding : 5px 5px 5px 5px;
              background-image: url("images/csbackround.jpg");   
               background-color :rgba(226, 215, 215, 0.67);
     }
    </style>
    <br />

    <?php
  
      if(isset($_GET['UserId']) & !empty($_GET['UserId'])){
       $items = $_GET['UserId'];
       }
      $sql = "SELECT * FROM dealerbikes WHERE DealerId='$items'";
      $result =mysql_query($sql);

        $row=mysql_fetch_array($result);


      ?>

<div class="container">

   <div class="search-row-wrapper">
          <div class="container ">
          
      
  <h2 style="color:white;text-align :center">Custome Name : <?php echo $row['Username'];?> <br><br> Custome Post Count : 
<?php $num_rows=mysql_num_rows($result); echo $num_rows; ?>
 </h2>
 <br>
</div>
</div>



<br><br><br>
   <div class="table-responsive"> 
   <table class="table table-hover" style="background-color :white">
    <thead>
      <tr>
        <th>Category</th>
        <th>Brand</th>
        <th>Model</th>
          <th>Year</th>
          <th>K.M</th>       
          <th>Mobile</th>
          <th>State</th>
          <th>City</th>
          <th>Location</th>
          <th>price</th>        
          <th>picture</th>
          <th>Status</th>
      </tr>
    </thead>
    <tbody>
       <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bikezone";
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      if(isset($_GET['UserId']) & !empty($_GET['UserId'])){
       $items = $_GET['UserId'];
       }
      $sql = "SELECT * FROM dealerbikes WHERE DealerId='$items'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
    while($res = $result->fetch_assoc()) {

   $blockStatus= $res['Status'];


     
          ?>
          <tr>
            <td><?php echo $res['BikeCategory'];?></td>
            <td><?php echo $res['Brand'];?></td>
            <td><?php echo $res['Model'];?></td>
            <td><?php echo $res['Year'];?></td>
            <td><?php echo $res['KilometreDriven'];?></td>
            <td><?php echo $res['ContactNumber'];?></td>
            <td><?php echo $res['State'];?></td>
            <td><?php echo $res['City'];?></td>
            <td><?php echo $res['Location'];?></td>
            <td><?php echo $res['Prize'];?></td>
        

 <td><?php echo '<img alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($res['DealerBikeImage1']).'"/>'
                                ?></td>
             

           
<?php
$blockStatus= $res['Status'];

     if($blockStatus=="UnBlock")
{
  $blockStatus='Block';
}
else
{
  $blockStatus='UnBlock';
}
  ?>  

                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  onSubmit="window.location.reload()">
        <input type="hidden" name="x" value="<?php echo $res['Status']; ?>">
        <input type="hidden" name="x1" value="<?php echo $res['DealerBikeId']; ?>">
        <input type="hidden" name="send" value="<?php echo $items; ?>">
   <td>

              <input type="submit" name ="set" value="<?php echo $blockStatus ?>">
        </form>

            <!-- </a> -->
            </td>
          
          </tr>  
           <?php
                    }
            } else {
                echo "<h1>No Post</h1>";
            }
            $conn->close();
      ?>    
    </tbody>
  </table>
  
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