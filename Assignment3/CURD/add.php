<?php
    include('config.php');
    if(isset($_POST['add']))
    {
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $sqlQuery = "INSERT INTO `users` (`id`, `username`, `gender`, `email`, `city`) VALUES (NULL, '$username', '$gender', '$email', '$city')";
        if(mysqli_query($db, $sqlQuery))
        {
            header("Location: index.php");
            exit();
        }
        else
        {
            echo "Invalid Query.";
        }
    }
?>

<html>
    <head>
        <title>CREATE</title>
        <link rel="stylesheet" href="CSS/styles.css"/>
    </head>
    <body>
        <form method="post" action="add.php">
            <table class="centered-table">
                <tbody>
                    <tr>
                        <td>NAME</td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Your Name" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>GENDER</td>
                        <td>
                            <input type="radio" name="gender" value="Male" required/>Male
                            <input type="radio" name="gender" value="Female" required/>Female
                        </td>
                    </tr>
                    <tr>
                        <td>E-MAIL</td>
                        <td><input type="email" name="email" placeholder="Enter Your E-Mail" required/></td>
                    </tr>
                    <tr>
                        <td>CITY</td>
                        <td>
                            <select name="city">
                                <option value="Dehradun">Dehradun</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Jaipur">Jaipur</option>
                                <option value="Mumbai">Mumbai</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" style="width:100px;" name="add" value="ADD"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>