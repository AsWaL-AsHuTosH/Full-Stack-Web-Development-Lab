<?php
    include('config.php');
    $id = $_GET['id'];
    $username = '';
    $gender = '';
    $email = '';
    $city = '';
    if(isset($_POST['update']))
    { 
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $sqlQuery = "UPDATE `users` SET `username`='$username', `gender`='$gender', `email`='$email', `city`='$city' WHERE `id`=$id";
        if(mysqli_query($db, $sqlQuery))
        {
            echo "Data Updated.";
        }
        else
        {
            echo "Invalid Query!";
        }
    }
    else
    {
        $result = mysqli_query($db, "SELECT * FROM `users` WHERE `id`=$id");
        if($result == false)
        {
            echo "Invalid Query!";
        }
        
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $gender = $row['gender'];
        $email = $row['email'];
        $city = $row['city'];
    }
?>

<html>
    <head>
        <title>UPDATE</title>
        <link rel="stylesheet" href="CSS/styles.css"/>
    </head>
    <body>
        <form method="post" action="update.php?id=<?php echo $id ?>">
            <table class="centered-table">
                <tbody>
                    <tr>
                        <td>NAME</td>
                        <td>
                            <input type="text" name="username" value=<?php echo "'$username'"?> required/>
                        </td>
                    </tr>
                    <tr>
                        <td>GENDER</td>
                        <td>
                            <input type="radio" name="gender" value="Male" required <?php if($gender=="Male") echo "checked"?>/>Male
                            <input type="radio" name="gender" value="Female" required <?php if($gender=="Female") echo "checked"?>/>Female
                        </td>
                    </tr>
                    <tr>
                        <td>E-MAIL</td>
                        <td><input type="email" name="email" value=<?php echo "'$email'"?> required/></td>
                    </tr>
                    <tr>
                        <td>CITY</td>
                        <td>
                            <select name="city">
                                <option value="Dehradun" <?php if($city=="Dehradun") echo "selected"?>>Dehradun</option>
                                <option value="Delhi" <?php if($city=="Delhi") echo "selected"?>>Delhi</option>
                                <option value="Jaipur" <?php if($city=="Jaipur") echo "selected"?>>Jaipur</option>
                                <option value="Mumbai" <?php if($city=="Mumbai") echo "selected"?>>Mumbai</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" style="width:100px;" name="update" value="UPDATE"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>