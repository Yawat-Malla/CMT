<?php

include '../config.php';
    $delete= "delete from assignment where id=".$_GET['id'];
    if ($con->query($delete)){
        header("location: assignment.php");
    }
    else{
        echo "Failed to delele";

    }
?>