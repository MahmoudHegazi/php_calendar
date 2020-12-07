<!DOCTYPE html>
<html>
<body>
<?php


function get_months_array($month_class, $year) {
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");





$month_len = count($months);

function get_month_days($month_index,$year) {
$days_in_month =cal_days_in_month(CAL_GREGORIAN,$month_index,$year);
$days_list = range(1,$days_in_month);
$list_show_string = '[' . implode(",",$days_list);
$list_show_string .= ']';
$result['days']  =  $days_list;
$result['days_list']  =  $days_list;
$result['days_string']  =  $list_show_string;
return $result;
}

$output = '<div class="container"><ul id="' . $year . '">';
for ($i=0; $i < $month_len; $i++) {
   $output .= '<li class="month_in_' . $month_class . '" data-year="' . $month_class . '">';
   $output .= $months[$i] . '<br /><br /><li><ul><li>' . get_month_days($i+1,$year)['days_string'] . '</li></ul></li></li>';
}
$output .= '</ul></div>';
echo $output;
}



?>


 <div>
  <?php  get_months_array('year2', 2020); ?>
  </div>



</body>
</html>
