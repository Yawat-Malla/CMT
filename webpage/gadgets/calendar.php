<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = stylesheet href="../css/calendar.css">
    <title>Calendar</title>
</head>
<body>
<?php
date_default_timezone_set('UTC');   
$month = date('m');
$year = date('Y');
$numDays = date('t', strtotime("$year-$month-01"));
$firstDay = date('N', strtotime("$year-$month-01"));

echo "<table class='calendar'>";
echo "<caption class= 'date'>" . date('F Y') . "</caption>";
echo "<tr>";
echo "<th>Mon</th>";
echo "<th>Tue</th>";
echo "<th>Wed</th>";
echo "<th>Thu</th>";
echo "<th>Fri</th>";
echo "<th>Sat</th>";
echo "<th>Sun</th>";
echo "</tr>";

$day = 1;
echo "<tr>";
for ($i = 1; $i <= 7; $i++) {
    if ($i < $firstDay) {
        echo "<td></td>";
    } else {
        echo "<td>" . $day . "</td>";
        $day++;
    }
}
echo "</tr>";

while ($day <= $numDays) {
    echo "<tr>";
    for ($i = 1; $i <= 7; $i++) {
        if ($day > $numDays) {
            echo "<td></td>";
        } else {
            echo "<td>" . $day . "</td>";
            $day++;
        }
    }
    echo "</tr>";
}

echo "</table>";
?>


</body>
</html>
