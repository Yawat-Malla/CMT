<?php 
session_start();
if($_SESSION['started']==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/otherdays.css" rel="stylesheet">
    <title>Schedule</title>
</head>
<body>
<h1>Schedule</h1>
<h3 align="center"> Grade 11, Khumbutse</h3>
<button class="home_button"><a href ="/webpage/index.php">Back</a></button>
<?php

include '../config.php';
    $present_day = date('l');
    $query = "select * from schedule;";
    if($present_day!="Sunday" && $present_day!="Saturday" &&  $present_day!="Friday" ){
        $result = mysqli_query($con,$query);
        echo"<table>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['timeperiod'] . "</td>";
            if($present_day=="Monday"){
                echo "<td>".$row['Tuesday']."</td>";
            }
            elseif($present_day=="Tuesday"){
            echo "<td>".$row['Wednesday']."</td>";
            }
            elseif($present_day=="Wednesday"){
            echo "<td>".$row['Thursday']."</td>";
            }
            elseif($present_day=="Thursday"){
            echo "<td>".$row['Friday']."</td>";
            }

            echo "</tr>";
        
        }
    }
    elseif($present_day=="Sunday"){
        $result = mysqli_query($con,$query);
        echo"<table>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['Monday']."</td></tr>";
        }
    }
   else{
        echo "<br><br><br>Tomorrow is holiday.<br> ";
    }
    echo "</table>";
}
else{
    header('location:../login/login.php');
}
?>

</body> 
</html>