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
    <link href="../../css/schedule.css" rel="stylesheet">
    <title>Schedule</title>
</head>
<body>
<h1>Schedule</h1>
<h3 align="center"> Grade 11, Khumbutse</h3>
<button class="home_button"><a href ="../index.php">Back</a></button>
<?php

include '../config.php';
    $present_day = date('l');
    $full_date = date("l, F j, Y");

    echo"<p>".$full_date."</p>";

    $query = "select * from schedule;";

    if($present_day!="Sunday" and $present_day!="Saturday"){
        $result = mysqli_query($con,$query);
        echo"<table>";
        
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['timeperiod'] . "</td>";
            if($present_day=="Monday"){
                echo "<td>".$row['Monday']."</td>";
            }
            elseif($present_day=="Tuesday"){
            echo "<td>".$row['Tuesday']."</td>";
            }
            elseif($present_day=="Wednesday"){
            echo "<td>".$row['Wednesday']."</td>";
            }
            elseif($present_day=="Thursday"){
            echo "<td>".$row['Thursday']."</td>";
            }
            elseif($present_day=="Friday"){
            echo "<td>".$row['Friday']."</td>";
            }
            echo "</tr>";
        
        }
        echo "</table>";
    }
    else{
        echo "It is holiday today.";
    }
}
else{
    header('location:../login/login.php');
}
?>

<button class="link_button"><a href = "otherdays.php" / >Tomorrow>> </button>

</body> 
</html>