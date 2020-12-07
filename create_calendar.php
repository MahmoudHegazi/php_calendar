<!DOCTYPE html>
<html>
<body>
<?php
$years_list =range(1956, 2200);
//print_r($years_list);
$all_years_data = [];

$day_data = [];
$len_years =  count($years_list);
$output = '';
for ($year_index = 0; $year_index < $len_years; $year_index++) {
  $year = $years_list[$year_index];
  $month_index = 1;
  for ($month_index; $month_index <= 12; $month_index++) {
     $year_data = [];
     $month = $month_index;
     $year = $years_list[$year_index];
     $days_number = cal_days_in_month(CAL_GREGORIAN,$month,$year);
     $days_list = range(1,$days_number);
     $year_data['month'] = $month;
     $year_data['year'] = $year;
     $year_data['days_count'] = $days_number;
     $year_data['days_list'] = $days_list;
     //array_push($all_years_data, $year_data);
     foreach($days_list as $day) {
       $day_meta_data = [];
       $day_meta_data['month'] = $month;
       $day_meta_data['year'] = $year;
       $day_meta_data['day'] = $day;
       array_push($day_data, $day_meta_data);
     }
   }
  }




//echo "$month";
print_r($day_data);
?>

</body>
</html>
