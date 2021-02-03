<?php
include('db_config.php');
$result = null;
$saved = false;

if (isset($_POST['submit2'])) {
    $username = $_POST['username'];
    $sql = "SELECT u.username, u.email, u.gender, u.city, s.branch, s.year FROM `users` as u, `student_detail` as s WHERE u.username= '$username' AND u.id = s.username";
    $result = mysqli_query($db, $sql);
    if ($result == false) {
        echo "Invalid Query! @4";
    }
} else if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];


    $sql = "INSERT INTO `users` (`id`, `username`, `email`, `gender`, `city`) VALUES (NULL, '$username', '$email', '$gender', '$city')";
    if (mysqli_query($db, $sql)) {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        if ($result = mysqli_query($db, $sql)) {
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $sql = "INSERT INTO `student_detail` (`id`, `username`, `branch`, `year`) VALUES (NULL, $id, '$branch', $year)";
            if (mySqli_query($db, $sql)) {
                $saved = true;
            } else {
                echo "Invalid Query! @3";
            }
        } else {
            echo "Invalid Query! @2";
        }
    } else {
        echo "Invalid Query! @1";
    }
}
?>

<html>

<head>
    <title>Form</title>

    <style>
        body {
            text-align: center;
        }

        .output-form {
            margin: auto;
        }

        .input-form {
            margin: auto;
        }

        h3 {
            text-align: center;
        }

        table {
            margin: auto;
        }

        .output-table {
            border: solid 1px;
            border-collapse: collapse;
        }

        .output-table td,
        th {
            border: solid 1px;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="input-form">
        <h3>Submit Details</h3>
        <form method="post" action="index.php">
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="username" required />
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" required />
                    </td>
                </tr>

                <tr>
                    <td>Gender</td>
                    <td>
                        Male <input type="radio" name="gender" value="Male" required />
                        Female <input type="radio" name="gender" value="Female" />
                    </td>
                </tr>

                <tr>
                    <td>City</td>
                    <td>
                        <select name="city">
                            <option value="Dehradun">Dehradun</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Jaipur">Jaipur</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Chennai">Chennai</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Kolkata">Kolkata</option>
                            <option value="Pune">Pune</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Branch</td>
                    <td>
                        <input type="text" name="branch" required />
                    </td>
                </tr>

                <tr>
                    <td>Year</td>
                    <td>
                        <input type="number" name="year" required />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="SUBMIT" />
                    </td>
                </tr>
            </table>
        </form>
        <?php if ($saved) echo "Data Saved." ?>
    </div>

    <hr />

    <div class="output-form">
        <h3>Get Details</h3>
        <form method="post" action="index.php">
            <div>
                Name <input type="text" name="username" required />
                <input type="submit" name="submit2" value="Get Details" />
            </div>
        </form>
    </div>

    <?php if (isset($_POST['submit2']) && $result != false && $result->num_rows != 0) : ?>
        <table class="output-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Branch</th>
                    <th>Year</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($details = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?php echo $details['username'] ?></td>
                        <td><?php echo $details['email'] ?></td>
                        <td><?php echo $details['gender'] ?></td>
                        <td><?php echo $details['city'] ?></td>
                        <td><?php echo $details['branch'] ?></td>
                        <td><?php echo $details['year'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if (isset($_POST['submit2']) && $result->num_rows == 0) echo "No data found!" ?>

</body>

</html>