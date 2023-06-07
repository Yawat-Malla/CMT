<?php

include '../config.php';
    $delete= "delete from todolist where id=".$_GET['id'];
    if ($con->query($delete)){
        header("location: todo.php");
    }
    else{
        echo "Failed to delele";

    }