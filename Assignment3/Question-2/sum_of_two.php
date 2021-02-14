<html>
    <head>
        <title>SUM</title>
    </head>
    <body>
        <form method='post' action='sum_of_two.php'>
            NUMBER 1: <input type='number' name='num1' required/> </br>
            NUMBER 2: <input type='number' name='num2' required/> </br>
            <input type='submit' name='submit' value='ADD'/><br>
            <?php
                if(isset($_POST['submit']))
                {
                    $sum = $_POST['num1'] + $_POST['num2'];
                    echo "Sum = $sum";
                }
            ?>
        </form>
    </body>
</html>