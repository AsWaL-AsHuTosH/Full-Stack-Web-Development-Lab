<?php
    include('config.php');
    $id = $_GET['id'];
    if(mysqli_query($db, "DELETE FROM `users` WHERE `id`=$id"))
    {
        echo "Deleted Successfully!";
    }
    else
    {
        echo "Invalid Query!";
    }
?>