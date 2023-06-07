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
    <title>Todolist</title>
	<link rel = stylesheet href="../../css/todolist.css">
</head>
<body>
    <h1>To-Do List</h1>
	<button class="home_button"><a href ="../index.php">Back</a></button>
	    <form method="POST" action="todo.php">
		    <label for="new-task">Add New Task:</label><br>
	    	<input type="text" id="new-task" name="new" placeholder="New Task...." required>
		    <button type="submit">Add Task</button>
	    </form>
</body>
</html>
<?php

include '../config.php';
$view = "select * from todolist where user_id='".($_SESSION['user_id'])."'";
	$view_result = mysqli_query($con, $view);
	
	if (mysqli_num_rows($view_result) > 0) {
		echo "<table>";
		while ($row = mysqli_fetch_assoc($view_result)){
            echo "<tr>";
            echo "<td>" . $row['tasks'] . "</td>";
            echo "<td> <button><a href='delete.php?id=".$row['id']."'>Delete</a></button></td>";
            echo "</tr>";
		}
		echo "</table>";
	}
	else {
		echo "No tasks to view";
	}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$insert  = "insert into todolist(tasks,user_id) 
				values ('".($_POST['new'])."','".($_SESSION['user_id'])."')";
	$insert_result = mysqli_query($con, $insert);
}
}
else{
	header('location: ../login/login.php');
	
}

?> 
