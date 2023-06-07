<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
</head>
<body>
    <h1>Your Assignments</h1>
</body>
</html>
<?php

require './config.php';
    $view = "select * from assignment";
    $view_result = mysqli_query($con, $view);

    
    // to display in list
    if (mysqli_num_rows($view_result) > 0) {
        echo "<table>";
            echo "<tr>";
            echo "<th>Subjects</th>";
            echo "<th>Homework</th>";
            echo "<th>Due Date</th>";
            echo "</tr>";
        
        while ($row = mysqli_fetch_assoc($view_result)){
            
            echo "<tr>";
            echo "<td>" . $row['subjects'] . "</td>";
            echo "<td>" . $row['homeworks'] . "</td>";
            echo "<td>" . $row['due'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo " <br> No assignment pending at the moment.";
    }

?>