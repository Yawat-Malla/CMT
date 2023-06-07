<?php
echo "<td> <button><a href='delete.php?id=".$row['id']."'>Delete</a></button></td>";
$file_path = './files/'.$_GET['file_name'];
$file_name = basename($file_path);

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . $file_name . "\""); 

readfile($file_path);
?>
