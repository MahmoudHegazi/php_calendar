<!DOCTYPE html>
<html>
<body>
<?php
$years_list =range(1970, 2200);
$id_indexer = 0;
$year_index_id = 0;
//print_r($years_list);
$all_years_data = [];
$counters = 0;
$day_data = [];
$len_years =  count($years_list);
$output = '';
for ($year_index = 0; $year_index < $len_years; $year_index++) {
  $year_index_id += 1;
  
  $year = $years_list[$year_index];
  $month_index = 1;
  for ($month_index; $month_index <= 12; $month_index++) {
     $id_indexer += 1;
     $day_id = 'day' . $id_indexer;
     $year_data = [];
     $month = $month_index;
     $year = $years_list[$year_index];
     $days_number = cal_days_in_month(CAL_GREGORIAN,$month,$year);
     $days_list = range(1,$days_number);
     foreach($days_list as $day) {

       $day_infos = unixtojd(mktime(0,0,0,$month,$day,$year));
       $the_info = cal_from_jd($day_infos,CAL_GREGORIAN);
       
       // add your SQL add command here will enter record for each day
       $day_meta_data = [];
       $day_meta_data['month'] = $the_info['month'];
       $day_meta_data['year'] = $the_info['year'];
       $day_meta_data['day'] = $the_info['day'];
       $day_meta_data['day_name'] = $the_info['dayname'];
       $day_meta_data['month_name'] = $the_info['monthname'];
       $day_meta_data['time_stemp'] = $the_info['date'];
       $day_meta_data['day_short_name'] = $the_info['abbrevdayname'];
       $day_meta_data['month_short_name'] = $the_info['abbrevmonth'];
       $day_meta_data['dow'] = $the_info['dow'];
       $day_meta_data['day_class'] = 'day';
       $day_meta_data['day_id'] = 'day';
       
       if ($counters == 0) {
       $day_meta_data = [];
       $day_meta_data['month'] = 1;
       $day_meta_data['year'] = 1970;
       $day_meta_data['day'] = 1;
       $day_meta_data['day_name'] = 'Thursday';
       $day_meta_data['month_name'] = 'January';
       $day_meta_data['time_stemp'] = '1/1/1970';
       $day_meta_data['day_short_name'] = 'Thu';
       $day_meta_data['month_short_name'] = 'Jan';
       $day_meta_data['dow'] = 4;
       $day_meta_data['day_class'] = 'day';
       $day_meta_data['day_id'] = 'day';
       array_push($day_data, $day_meta_data);
       } else {
         array_push($day_data, $day_meta_data);
       }

       $counters += 1;
     }
   }
  }



//echo "$month";
print_r($day_data[31]);
?>

</body>
</html>
