<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database_name = 'web';

    $db = mysqli_connect($hostname, $username, $password, $database_name);

    if($db == false)
    {
        echo "Failed to connect with database!";
    }
?>