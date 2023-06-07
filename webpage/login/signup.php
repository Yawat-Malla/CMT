<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/signup.css" rel="stylesheet">
    <title>Sign up</title>
</head>
<body>
    <table>
    <button class="home_button"><a href ="./login.php">Back</a></button>
    <form method = "POST" action=signup.php>     
        <tr><td><input type="text" id = "username" placeholder= "Username or Email" name= "username"><br></td></tr>
        <tr>
        <td class="note"><br><br>Are you a teacher or student?</td>
        </tr>
        <tr>
        <td><input type="radio" name= "role" value="teacher"><div class="note">Teacher</div><br></td>
        <td><input type="radio" name= "role" value="student"><div class="note">Student</div><br></td>
        </tr>
        <tr><td><input type="password" id = "password" placeholder = "Password" name= "password" min=8></td></tr>
        <tr><td class="note"><br>Note: Password must be 8 character long<br></td>
        <tr><td><input type="password" id = "cpassword" placeholder = "Confirm Password" name= "cpassword" min=8></td></tr>
        <tr><td><br><button type="submit" class="loginbttn" name="signup">Sign up</td></tr>
    </form>
    </table>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '../config.php';
    $records1="select * from students";
    $records2="select * from teachers";
    $records_result1 = mysqli_query($con,$records1);
    $records_result2 = mysqli_query($con,$records2);
    $taken = false;
    while($row1=mysqli_fetch_assoc($records_result1)){
        if($row1['username']==$_POST['username']){
            echo"Username already taken";
            $taken == true;
            break;
        }
    }
    if(!$taken){
    while($row2=mysqli_fetch_assoc($records_result2)){
        if($row2['username']==$_POST['username']){
            echo"Username already taken";
            $taken == true;
            break;
        }
    }

    if($_POST["password"]==$_POST["cpassword"] && $taken==false){
        if($_POST['role']=="teacher"){
            $insert  = "insert into teachers(username,password) 
                     values ('".$_POST['username']."','".$_POST['password']."')";
        }
        else{
            $insert  = "insert into students(username,password) 
                     values ('".$_POST['username']."','".$_POST['password']."')";
        }

        $run_insert = mysqli_query($con,$insert);
        echo "Your account was successfully created. You can now login.";
    }
    else{
        echo "The passwords do no match.";
    }
    

}
}
?>
