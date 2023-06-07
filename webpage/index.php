<?php 
session_start();
if($_SESSION['started']==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = stylesheet href="../css/index.css">
    <title>CMS</title>
   
</head>
<body>
    <nav class="navbar"> 
        <div class = "customize">
           <ul>
                <li><a href="login/logout.php">Log Out</a></li>        
            </ul>   
        </div>
        <div class="logo"><img src="/images/logo.jpg" alt="logo"></div><br>

        <ul class="nav-list">

                <li><a class= "active" href ="./schedule/schedule.php">Schedule</a></li>
                <li><a href ="./webpage/todolist/todo.php">To do list</a></li>
                <li><a href ="./webpage/assignment/assignment.php">Assignments</a></li>
                <li><a href ="./webpage/notes/notes.php">Notes</a></li>
        </ul>

        
        
        
       
    </nav>
<?php
    include 'gadgets/calendar.php';
    include 'assignment/show_assignments.php';
    echo"<br><br>";
    include 'todolist/show_todolist.php';
}
else{
    header('location:login/login.php');
}
?>
</body>
</html>
