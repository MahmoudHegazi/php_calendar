<!DOCTYPE html>
<html>
<body>
<?php


function get_months_array($month_class, $year) {
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");





$month_len = count($months);

function get_month_days($month_index,$year) {
$days_in_month =cal_days_in_month(CAL_GREGORIAN,$month_index,$year);
  return $days_in_month;
}

for ($i=0; $i < $month_len; $i++) {
   echo '<li class="month_in_' . $month_class . '" data-year="' . $month_class . '">' . 
   $months[$i] . ' ' . get_month_days($i+1,$year) . '</li>';
}
}



?>

<ul id="my_menu">
  <?php  get_months_array('year1', 2019); ?>
</ul>




</body>
</html>
