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
    <link rel = stylesheet href="../../css/assignment.css">
    <title>Assignment</title>
</head>
<body>
    
<h1>Assignments</h1>
<button class="home_button"><a href ="../index.php">Back</a></button>
<?php

include '../config.php';
include 'id_checker.php';
$view = "select * from assignment";
        $view_result = mysqli_query($con, $view);
        if (mysqli_num_rows($view_result) > 0) {
            echo "<table border = 1>";
            echo "<tr>";
            echo "<th>Subjects</th>";
            echo "<th>Homework</th>";
            echo "<th>Due Date</th>";
            if($teacher==1){
            echo "<th>Status</th>";
            }
            echo "</tr>";
            
            while ($row = mysqli_fetch_assoc($view_result)){
                echo "<tr>";
                echo "<td>" . $row['subjects'] . "</td>";
                echo "<td>" . $row['homeworks'] . "</td>";
                echo "<td>" . $row['due'] . "</td>";
                if($teacher==1){
                echo "<td> <button><a href='delete.php?id=".$row['id']."'>Completed</a></button></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo " <br> No assignment pending at the moment.";
        }
        
if($teacher==1){

    echo <<<HTML5
        <table>
        <form method = "POST"  action= "assignment.php">
            <tr>
            <td><label for="subject">Select a subject</label></td>
            <td><select id="subject" name="subject" >
                    <option value="English">English</option>
                    <option value="Nepali">Nepali</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Coding">Coding</option>
                </select>
            </td>
            </tr>
            <tr>
            <td><label for="hw">Add assignment:</label></td>
            <td><input type = "text" id = "hw" name="hw" placeholder="Enter homework" required></td>
            </tr>
            <tr>
            <td><label for = "due">Set due</label></td>
            <td><input type="date" id = "due" name = "date" required></td>
            </tr>
            <tr><td><button type = "submit" class="addbttn" name = "submit">Add</button></td></tr>
        </form>
        </table>


HTML5;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if($teacher==1){
        $insert = "insert into assignment(subjects,homeworks,due)
                values('".$_POST['subject']."','".$_POST['hw']."','".$_POST['date']."')";
        $insert_result = mysqli_query($con, $insert);
        }
        else{
            echo " <br> Add assignmets to make students suffer.";
        
        }
    }
}

else{
    header('location:../login/login.php');
}
?>
</body>
</html>