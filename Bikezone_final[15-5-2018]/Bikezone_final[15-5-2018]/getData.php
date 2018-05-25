<?php
if(!empty($_POST["id"])){

    include "db_connection.php";

//Get last ID
    $lastID = $_POST['id'];

//Limit on data display
    $showLimit = 2;

//Get all rows except already displayed
    $queryAll = mysql_query("SELECT COUNT(*) as num_rows FROM usedbikes WHERE UsedBikeID < ".$lastID." ORDER BY UsedBikeID DESC");
    $rowAll = mysql_fetch_assoc($queryAll);
    $allNumRows = $rowAll['num_rows'];

//Get rows by limit except already displayed
    $query = mysql_query("SELECT * FROM usedbikes WHERE UsedBikeID < ".$lastID." ORDER BY UsedBikeID DESC LIMIT ".$showLimit);
    $num_rows= mysql_num_rows($query);
    if($num_rows > 0){
        while($row = mysql_fetch_assoc($query)){
            $postID = $row["id"]; ?>
            <div class="list-item"><h4><?php echo $row['Model']; ?></h4></div>
        <?php } ?>
        <?php if($allNumRows > $showLimit){ ?>
            <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
                <img src="loading.gif"/>
            </div>
        <?php }else{ ?>
            <div class="load-more" lastID="0">
                That's All!
            </div>
        <?php }}}
        else{ ?>
            <div class="load-more" lastID="0">
                That's All!
            </div>
            <?php
        }
    
    ?>