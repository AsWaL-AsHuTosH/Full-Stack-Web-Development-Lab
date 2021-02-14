<?php

    include('config.php');
    $result = mysqli_query($db, "SELECT * FROM `users`");

    if($result == false)
    {
        echo "Invalid Query!";
    }
    else if($result->num_rows == 0)
    {
        echo "Database is empty!</br>";
    }
?>


<html>
    <head>
        <title>DATABASE</title>
        <link rel="stylesheet" href="CSS/styles.css"/>
    </head>
    <body>
        <?php if($result != false && $result->num_rows != 0): ?>
            <table class="bordered-table centered-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>GENDER</th>
                        <th>E-MAIL</th>
                        <th>CITY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
            <?php while($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td>
                        <button onclick="document.location = 'edit.php?id=<?php echo $row['id'] ?>'">EDIT</button>
                        <button onclick="document.location = 'delete.php?id=<?php echo $row['id'] ?>'">DELETE</button>
                    </td>
                </tr>
            <?php endwhile;?>
                <tr>
                    <td colspan="6" align="center">
                        <button onclick="document.location = 'add.php'">ADD USER</button>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php endif;?>
    </body>
</html>