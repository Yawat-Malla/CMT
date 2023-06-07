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
    <link href="../../css/notes.css" rel="stylesheet">
    <title>Notes</title>
</head>
<body>
<h1>Get notes</h1>
<button class="home_button"><a href ="../index.php">Back</a></button>
<nav>
    <form action="notes.php" method="POST">
        <input type="text" name="search" placeholder="Search by subject...">
    <button type="submit">Search</button>
    </form>
</nav>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

    require('../config.php');
    $query="select * from notes";
    $result_query= mysqli_query($con,$query);
    $found=0;
    echo "<table border=1>";
    echo "<tr><th>File Name</th><th>Subject</th><th>Uploaded by</th>";
    while($row=mysqli_fetch_assoc($result_query)){
        if($row['subject']==strtolower($_POST['search'])){
            echo"<tr>
                <td>".$row['file_name']."</td>
                <td>".$row['subject']."</td>
                <td>".$row['username']."</td>
                <td> <button><a href='download.php?file_name=".$row['file_name']."'>Download</a></button></td>
                ";
                $found = 1;
        }
    }
    if($found==0){
        echo "Sorry, no result was found for the subject.";
    }
    echo "</table>";


}
?>
<h3><a href="upload.php" style="text-decoration:none;">Upload notes >>></a></h3>
<?php
}
else{
    header('location:login/login.php');
}
?>
</body>
</html>