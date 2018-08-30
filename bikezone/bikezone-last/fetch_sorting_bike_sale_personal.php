<?php

session_start();

$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit; 

$url=$_SERVER['HTTP_REFERER'];
      $path_parts = pathinfo($url);
     $uri=$path_parts['filename']; 


if(isset($_SESSION['fetchToSort'])) {
 $filter1 = $_SESSION['fetchToSort'];
 $filter=$_SESSION['bike_sale_all'];
    $filter2=$_SESSION['Bike_sale2'];
}


$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bikezone";
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

$value= $_GET['value'];

if($value != null){

$filterQuery = "(".$filter1.") ORDER BY Prize $value";  

$splitQuery = explode("LIMIT", $filter1);
 $split = $splitQuery[0] ." ORDER BY Prize $value LIMIT ". $splitQuery[1];
 $count=$splitQuery[0]." ORDER BY Prize $value";  
//echo "filter query in sort page: ".$filterQuery;
}

$result = $conn->query($filterQuery);
      ?>
     <div class="category-list" id="masterdiv" >
<div class="tab-box  oldList">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="nav-item">
                                  <a  href="bike_sale_all.php" class= "nav-link" role="tab" >
                                    All Ads 
                                    <span class="badge badge-secondary" style="display:inline-block">
                                    <?php
                                            $rs_result=mysqli_query($conn,$filter);
                                           $res=mysqli_num_rows($rs_result);
                                            echo  $res;
                                             ?>
                                                 
                                    </span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a  href="bike_sale_buisness.php" class= "nav-link" role="tab" >Business Ads 
                                    <span class="badge badge-secondary" style="display:inline-block">
                                    <?php
                                     $rs_result=mysqli_query($conn,$filter2);
                                           $res=mysqli_num_rows($rs_result);
                                            echo  $res;
                                               
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>
                               <li class=" active nav-item ">
                                 <a href="bike_sale_personal.php" class="nav-link" role="tab">Personal
                                    <span class="badge badge-secondary" style="display:inline-block">
                             <?php
                                             $rs_result = $conn->query($count);
                                            $res=mysqli_num_rows($rs_result);
                                             echo  $res;
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>  </ul>


                            <div class="tab-filter">
                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto" onchange="sort_by(this.value)">
                                    <option value="-1">Sort by </option>
                                    <option value="ASC">Price: Low to High</option>
                                    <option value="DESC">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view active"><!-- <i class="  icon-th"></i> --></span> <span
                                    class="compact-view"><!-- <i class=" icon-th-list  "></i> --></span> <span
                                    class="grid-view "><!-- <i class=" icon-th-large "></i> --></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <div class="adds-wrapper">
                            <div class="tab-content">

<?php
      if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
 ?>


<div >


<div class="item-list" >
   <?php
      if($row['Amount']!=""){
       
  ?>
    <div class="cornerRibbons featuredAds">
        <a href=""> Dealer Ads</a>
    </div>
    <?php
  }
    ?>
    <div class="row" >
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="used_bikes_view.php?filename=<?php echo $uri;?>&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="used_bikes_view.php?filename=<?php echo $uri;?>&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">
                <?php echo $row['Brand'].'-'.$row['Model'] ;  ?></a></h5>
            <span class="info-row"> 
                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">B </span> 
                 <span class="date">
                    <?php
                      if($row['KilometreDriven']!="0"){
                    ?>
                  <i class=" icon-clock"> </i>KM's Driven (
                  <?php 
                  echo $row['KilometreDriven']?>) - <?php
                              }
                                ?><i class="fa fa-map-marker"></i>
                  Location : <?php echo $row['Location'] ; ?></span> 
              <br><br> 
              <span class="category">Seller Name : <?php echo $row['UserName']  ?></span>

              - <span class="item-location"><i class="">
                Contact No : 
                  
              </i><?php echo $row['ContactNumber'] ?></span> </span></div>
    </div>
    <!--/.add-desc-box-->
    <div class="col-md-3 text-right  price-box">
        <h2 class="item-price">RS:-<?php echo $row['Prize']  ?></h2>
       <?php

        if (isset($_SESSION['usr_id'])) {
          $id=$_SESSION['usr_id'];
          ?>
          <a href="favourite.php?filename=<?php echo $uri;?>&UserId=<?php echo $row['UserId']; ?> &UsedBikeId=<?php echo $row['UsedBikeId']; ?> &Brand=<?php echo $row['Brand'];?> &Category=<?php echo $row['BikeCategory'];?> &Price=<?php echo $row['Prize'];?> &ContactNumber=<?php echo $row['ContactNumber'];?> &Fav_Userid=<?php echo $id;?>" class="btn btn-danger btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a>
        <?php
        }
        else{
          ?>
          <a href onclick="myFunction()" class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
        </a>
       <!--  <button onclick="myFunction()">Try it</button> -->

<script>
function myFunction() {
    alert("Please login before adding favourites");
}
</script>
        <?php
        }
        ?>
         
        </div>
    <!--/.add-desc-box-->
</div>
</div>
<?php
}
}

?>
</div>
</div>
</div>
</div>