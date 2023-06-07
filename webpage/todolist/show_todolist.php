<h1>Things to do</h1>
<br>
<?php
require './config.php';


	$view = "select * from todolist where user_id='".($_SESSION['user_id'])."'";
	$view_result = mysqli_query($con, $view);
	
	if (mysqli_num_rows($view_result) > 0) {
		echo "<table>";
		while ($row = mysqli_fetch_assoc($view_result)){
            echo "<tr>";
            echo "<td>" . $row['tasks'] . "</td>";
            echo "</tr>";
		}
		echo "</table>";
	}
	else {
		echo "No tasks to view";
	}
?>
