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
    <link href="../../css/upload.css" rel="stylesheet">

    <title>Upload Notes</title>
</head>
<body>
    <h1>Upload Notes</h1>
    <button class="home_button"><a href ="../index.php">Back</a></button>

    <table>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <tr><td><label for="upload">Add files:</label></td></tr>
        <tr><td><input type="file" id="upload" name="file" required><br></td></tr>
        <tr><td><label for="subject">Subject:</label><td>
            <td><select name="subject" id="subject" required>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="mathematics">Mathematics</option>
                    <option value="coding">Coding</option>
                </select></td></tr>
        <tr><td><input type="submit" name="submit" value="Upload"></td></tr>
        </form>
    <table>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    
$file_name = $_FILES['file']['name'];
$temp_name = $_FILES['file']['tmp_name'];
$folder = "files/". $file_name ; 
// $temp_name = $_FILES[$_POST['file']];
move_uploaded_file($temp_name,$folder);

include '../config.php';
$insert="insert into notes(file_name, username, subject) values('".$file_name."','".$_SESSION['username']."','".$_POST['subject']."')";
mysqli_query($con,$insert);
}
}
else{
    header('location:login/login.php');
}
?>