<?php
session_start();

unset($_SESSION['filterQuery']);
unset($_SESSION['filterQuery1']);
unset($_SESSION['filterQuery2']);
unset($_SESSION['fetchToSort']);
unset($_SESSION['fetchToPagination']);
unset($_SESSION['Bike_sale2']);
unset($_SESSION['Bike_sale1']);
unset($_SESSION['bike_sale_all']);
unset($_SESSION['Advance_Search2']);
unset($_SESSION['Advance_Search1']);
unset($_SESSION['Advance_Search']);
unset($_SESSION['service_search']);
unset($_SESSION['service_search_business']);
unset($_SESSION['service_search_personal']);

header("Location:index.php");
?>