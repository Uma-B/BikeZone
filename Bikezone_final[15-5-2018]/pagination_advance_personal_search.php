<!DOCTYPE html>
<html>
<head>

<body>

	<?php
    session_start();
include('db_connection.php');

$url=$_SERVER['HTTP_REFERER'];
      $path_parts = pathinfo($url);
     $uri=$path_parts['filename'];

$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;


if(isset($_SESSION['fetchToPagination'])){
  $sql1=$_SESSION['fetchToPagination'];
}

$sql2="LIMIT $start_from, $limit";


$sql=$sql1." ".$sql2;
$rs_result = mysql_query ($sql);

$_SESSION['fetchToSort']=$sql;
?>
 <div class="category-list" id="masterdiv">
<div class="tab-box  oldList">

                            <!-- Nav tabs -->
                           <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="nav-item">
                                   <a  href="Advance_Search_Find.php" class= "nav-link" role="tab" >

                                    All Ads 
                                    <span class="badge badge-secondary">
                                    <?php
                                            $count=mysql_query("SELECT (SELECT COUNT(*) FROM usedbikes Where Status='UnBlock') + (SELECT COUNT(*) FROM dealerbikes Where Status='UnBlock') as count");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['count'];
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a  href="Advance_Business_Search.php" class= "nav-link" role="tab" >Business Ads 
                                    <span class="badge badge-secondary">
                                    <?php
                                                  $count=mysql_query("SELECT COUNT(*) FROM dealerbikes as count Where Status='UnBlock'");
                                                $res=mysql_fetch_array($count);
                                             echo  $res['COUNT(*)']; 
                                    ?>
                                                 
                                    </span>
                                    </a>
                                </li>
                               <li class=" active nav-item ">
                                 <a href="Advance_Personal_Search.php" class="nav-link" role="tab">Personal
                                    <span class="badge badge-secondary">
                             <?php
                              $result=mysql_query($sql1);
                                          $res=mysql_num_rows($result);
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
while ($row = mysql_fetch_assoc($rs_result)) {  
?>  
      


<div>
<div class="item-list">
    
    <div class="row">
    <div class="col-md-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> 2 </span>
         <a href="used_bikes_view.php?filename=<?php echo $uri;?>&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">

<?php     

echo '<img class="thumbnail no-margin" alt="no img is found" src="data:image/jpeg;base64,'.base64_encode($row['UsedBikeImage1']).'"/>'

?>
        </a>
        </div>
    </div>
    
    <div class="col-sm-7 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="used_bikes_view.php?filename=<?php echo $uri;?>&usedbikeid=<?php echo $row['UsedBikeId']; ?> &userid=<?php echo $row['UserId']; ?> &brand=<?php echo $row['Brand']; ?> &category=<?php echo $row['BikeCategory']; ?>" role="button">
                <?php echo $row['Brand'].'-'.$row['Model'] ;  ?></a></h5>
            <span class="info-row"> 
                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">B </span> 

                <span class="date"><i> </i>KM's Driven (<?php echo $row['KilometreDriven']. ') - <i class="fa fa-map-marker"></i>'.$row['Location']  ?></span> 
              <br><br> 
              <span class="category">Seller Name : <?php echo $row['UserName']  ?></span>

              - <span class="item-location"><i class="">
                Contact No : 
                  
              </i><?php echo $row['ContactNumber'] ?></span> </span></div>
    </div>

    <div class="col-md-3 text-right  price-box">
        <h2 class="item-price">RS:-<?php echo $row['Prize']  ?></h2>
         <?php
        if (isset($_SESSION['usr_id'])) {
          $id=$_SESSION['usr_id'];
          ?>
          <a href="favourite.php?filename=<?php echo $uri;?>&UserId=<?php echo $row['UserId']; ?> &UsedBikeId=<?php echo $row['UsedBikeId']; ?> &Brand=<?php echo $row['Brand'];?> &Category=<?php echo $row['BikeCategory'];?> &Price=<?php echo $row['Prize'];?> &ContactNumber=<?php echo $row['ContactNumber'];?> &Fav_Userid=<?php echo $id;?>" class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Featured Ads</span>
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
 
</div>
</div>
</div>




<?php  
};  
?>
</div>
</div>
</div>  
</body>
<script type="text/javascript">
  function sort_by(value){
     jQuery('.oldList div').html('');
  jQuery('#masterdiv div').hide();
  //jQuery('#pagination').hide();
  $('#target-content').load('fetch_sorting_advance_search_personal.php?value=' + encodeURIComponent(value));
}
</script>
</html>