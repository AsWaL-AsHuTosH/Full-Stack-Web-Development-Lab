<?php
    include('config.php');
    $id = $_GET['id'];
    if(isset($_GET['response']))
    {
        $response = $_GET['response'];
        if($response == 'yes')
        {
            mysqli_query($db, "DELETE FROM `users` WHERE `id`=$id");
        }
        header("Location: index.php");
        exit();
    }
?>

<html>
    <head>
        <title>DELETE</title>
    </head>
    <body>
        <center>
            <h3>Are you sure?</h3>
            <button onclick="document.location = 'delete.php?id=<?php echo $id?>&response=yes'" style="width:60px; ">YES</button>
            <button onclick="document.location = 'delete.php?id=<?php echo $id?>&response=no'" style="width:60px; ">NO</button>
        </center>
    </body>
</html>