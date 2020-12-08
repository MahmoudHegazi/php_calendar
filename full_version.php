<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
  padding: 25px 25px;
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

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
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
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}


</style>
</head>
<body>
<?php

function render_month($year,$month){
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "caldb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else {
	$result = 'full';
}


$sql = "SELECT * FROM days WHERE year = " . $year . " AND month = " . $month;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if ($row["used"]) {
        $output = '<li class="' . $row["day_class"] .' active" data-year="' . $row["year"] . 
		'" data-month="' . $row["month"] . '" data-date="' . $row["time_stamp"] . '" data-used="' .
		$row["used"] . '" data-day-name="'. $row["day_name"] .'" data-month-name="' .
		$row["month_name"]. '" data-day-short="' . $row["day_short_name"] . '" data-month-short="'. $row["month_short_name"] .'" id="day' . $row["id"] . '">'.$row["day"].'</li>';
        echo $output;
		} else {
        $output = '<li class="' . $row["day_class"] .'" data-year="' . $row["year"] . 
		'" data-month="' . $row["month"] . '" data-date="' . $row["time_stamp"] . '" data-used="' .
		$row["used"] . '" data-day-name="'. $row["day_name"] .'" data-month-name="' .
		$row["month_name"]. '" data-day-short="' . $row["day_short_name"] . '" data-month-short="'. $row["month_short_name"] .'" id="day' . $row["id"] . '">'.$row["day"].'</li>';
        echo $output;			
			
		}
    } 

    
} else {
    echo "0 results";
}

}
//echo "$month";
//print_r($day_data[1]);
?>

<div class="container">


<div class="month"> 
</div>
<ul class="days">
<?php render_month(1994,1); ?>
</ul>


<div class="month"> 
</div>
<ul class="days">
<?php render_month(1994,2); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,3); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,4); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,5); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,6); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,7); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,8); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,9); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,10); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,11); ?>
</ul>


<div class="month">
</div>
<ul class="days">
<?php render_month(1994,12); ?>
</ul>

</div>
</body>
</html>
