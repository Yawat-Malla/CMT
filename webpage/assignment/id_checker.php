<?php
$teacher=0;

$records1="select * from teachers";
// $records2="select * from students";
$records_result = mysqli_query($con,$records1);
// $records_result1 = mysqli_query($con,$records2);

while($row1=mysqli_fetch_assoc($records_result)){
    if($row1['username']==$_SESSION['username']){
        $teacher=1;
        break;
    }
}

// 1. if session name match with name in student table then role student is true
