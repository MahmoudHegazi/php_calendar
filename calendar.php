<!DOCTYPE html>
<html>
<body>
<?php
//$d=cal_days_in_month(CAL_GREGORIAN,2,1965);
//echo "There was $d days in February 1965.<br>";


function get_months_array($month_class, $year) {
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");


foreach ($months as $value) {
  echo "<li class=" . $month_class . '" data-year="'. $year .'">' . $value . '</li>';
}


}


?>

<ul id="my_menu">
  <?php echo get_months_array('year1', 2019); ?>
</ul>




</body>
</html>
