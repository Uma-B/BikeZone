
<html>
    <head> 
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
             url: 'script.php',
    
         success: function (response) {
            document.getElementById("new_select").innerHTML=response; 
         }
         });

             $.ajax({
             type: 'post',
             url: 'script.php',
             data: {
              get_option:val
         },
         success: function (response2) {
            document.getElementById("new_select").innerHTML=response2; 
         }
         });

            
             $.ajax({
             type: 'post',
             url: 'script.php',
             data: {
              get_option2:val
         },
         success: function (response3) {
            document.getElementById("new_select2").innerHTML=response3; 
         }
         });
        }
    </script>
    <script src="assets/js/pace.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head><body>
<div id="wrapper">

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

 <a href="Admin_home.php">
<button style="float: right;" type="button" class="btn btn-success">Back</button>
</a>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        
                      
            <!-- /.container-fluid -->
        </nav>
    </div>

 
<!--    <div class="row"> 


    <div class="class="col-3">-->
    <style>
        .jumbotron {
           height:50px;
              background-image: url("images/csbackround.jpg");   
               background-color :rgba(226, 215, 215, 0.67);
     }
    </style>
    <br />
   <div class="container">

   <div class="search-row-wrapper">
          <div class="container ">
          
     
  <h1 style="color:white;text-align :center">Dealer Details</h1><br /><br /></div></div>

 
  <p id="new_select2"></p>
  <form action="" method="POST">
   <div class="table-responsive">    
   <table class="table table-hover" style="background-color :white">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
          <th>State</th>
          <th> City</th>
          <th>Location</th>
          <th>View More</th>
          <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
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

      $sql = "SELECT * FROM `dealerregistration`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($res = $result->fetch_assoc()) {

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
          <tr>
          <p id="new_select"></p>
            <td><?php echo $res['CompanyName'];?></td>
            <td><?php echo $res['CompanyEmail'];?></td>
            <td><?php echo $res['CompanyMobileNum'];?></td>
            <td><?php echo $res['State'];?></td>
            <td><?php echo $res['City'];?></td>
            <td><?php echo $res['Location'];?></td>
           <!--  <td onchange="fetch_select(this.value);"><?php echo $blockStatus;?></td> -->
            <!-- <td onchange="fetch_select(this.value);"><?php echo $res['UserId'];?></td> -->
<!-- this is  the query for declasr the block details 2 nd  task-->

<!-- this code is ending -->
             <td><a href="del_post.php?UserId=<?php echo $res['DealerId']; ?>">View</a></td>

            <td>
              <a href="view_dealer1.php?id=<?php echo $res['DealerId']; ?> &age=<?php echo $res['Status']; ?>">
              <input type="button" name="Block1" value="<?php echo $blockStatus?>">
            </a>
            </td>

          </tr>
      </tr>
       <?php
                    }
            } else {
                echo "0 results";
            }
            $conn->close();
      ?>

    </tbody>

  </table>
</div>
</form>
    <hr />
    <!-- <form method="post">
    <input type="submit" name="test" id="test" value="<?php echo $blockStatus?>" /><br/>
</form>-->


<!-- use this query for database value change in block or unblock  3 task     -->

    <!-- <?php
   
    if(isset($_GET['Block1']))
  
{
   
 $blockQuery =  $_GET['Block1'];
 if($blockQuery=='Block')
 {
 $sql_query="UPDATE userregistration set Status= 'Unblock' WHERE UserId=".$_GET['UserId'];
}
else{  
 $sql_query="UPDATE userregistration set Status= 'Block ' WHERE UserId=".$_GET['UserId'];
}
mysqli_query($conn,$sql_query);
header("Location: $_SERVER[PHP_SELF]");
?> -->

<!-- this is ending row of database block and unblock -->
<script>

</script>
<?php
}
?>



<script>

function Block(UserId)
{
if(confirm('Are You Sure to Block  ?'))
{
window.location.href='view_dealer.php?UserId='+UserId;
alert(+UserID)
}
}
</script>




</div><!--</div></div>-->

    
</div>
<!-- /.wrapper -->



<!-- Placed at the end of the document so the pages load faster -->

<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>

</body>

</html>
                  