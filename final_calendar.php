<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
  padding: 30px 25px;
  width: 30%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;

}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}



.days {
  padding: 18px 0;
  background: #eee;
  margin: 0;
  width: 30%;
  
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 20.5%;}
  .days li .active {padding: 2px;}
  .days { width:80%;margin-left:auto;margin-right:auto;}
  .month { width:80%;margin-left:auto;margin-right:auto;}  
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
  .days { width:100%;margin-left:auto;margin-right:auto;}
  .month { width:100%;margin-left:auto;margin-right:auto; }
}


.flex_container {
  display: flex;
}

.monht_box {

}
</style>
</head>
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

function print_days($days_list, $monthid, $month_name, $year) {
     $output = '<div class="month monht_box"><ul><li>';
     $output .= $month_name . '<br><span style="font-size:18px">';
     $output .= $year . '</span></li></ul></div><ul class="days">';
  foreach ($days_list as $value) {
     $output .= '<li class="day">' . $value . '</li>';
  }
  $output .= '</ul>';
  echo $output;
}

$output = '<div class="container flex_container" id="' . $year . '">';
for ($i=0; $i < $month_len; $i++) {

   $output .=  print_days(get_month_days($i+1,$year)['days_list'], 'month1', 'Jan',2015);

}
$output .= '</div>';
return $output;
}



?>


 <div>
  <?php  echo get_months_array('year2', 2020); ?>
  </div>




</body>
</html>
