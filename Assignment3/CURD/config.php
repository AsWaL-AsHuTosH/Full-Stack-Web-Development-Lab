<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'curd';

    $db = mysqli_connect($hostname, $username, $password, $db_name);
    
    if($db == false)
    {
        echo "Failed to connect with database!";
    }
?>