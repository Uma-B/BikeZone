<!DOCTYPE html>
<html>
<head>
	<title>demo</title>
	<style type="text/css">
		#postList{ 
    margin-bottom:20px;
}
.list-item {
    background-color: #F1F1F1;
    margin: 5px 15px 2px;
    padding: 2px;
    font-size: 14px;
    line-height: 1.5;
    height: 120px;
}
.list-item h4 {
    color: #0074a2;
    margin-left: 10px;
}
.load-more {
    margin: 15px 25px;
    cursor: pointer;
    padding: 10px 0;
    text-align: center;
    font-weight:bold;
}
	</style>
</head>
<body>



	<?php

	include "db_connection.php";
// Get records from the database
	$query = mysql_query("SELECT * FROM usedbikes ORDER BY UsedBikeId LIMIT 10");
$num_rows= mysql_num_rows($query);
	if($num_rows > 0){ 
		while($row = mysql_fetch_assoc($query)){
			echo $postID = $row["UsedBikeId"];

			?>
			<div class="list-item"><h4><?php echo $row['Model']; ?></h4></div>

		<?php } ?>
		<div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
			<img src="loading.gif"/>
		</div>
	<?php } ?>
</div>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(window).scroll(function(){
			/*alert('hello');*/
			var lastID = $('.load-more').attr('lastID');
			
			if( lastID != 0){

				$.ajax({
					type:'POST',
					url:'getData.php',
					data:'id='+lastID,
					beforeSend:function(){
						$('.load-more').show();
					},
					success:function(html){
						$('.load-more').remove();
						$('#postList').append(html);
					}
				});
			}
		});
	});
</script>
</body>
</html>