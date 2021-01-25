<?php
if (isset($_POST['submit'])) {
    /* 
        We only need to check if interest array is empty or not as for all the other
        fields we have set the required attribute which will not allow end user to 
        submit without filling these fields.
    */
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    $interest = $_POST['interest'] ?? null; // NULL coalescing Operator
    if (empty($interest) || sizeof($interest) < 3) {
        echo "You need to select at least three interests!";
    } else {
        echo "<style>";
        echo ".table-output{border:solid 1px; border-collapse:collapse;}";
        echo ".td-output{border:solid 1px}";
        echo ".th-output{text-align:left; border:solid 1px;}";
        echo "</style>";

        echo "<table class=\"table-output\">"; //table opening
        echo "<tbody>"; //tbody opening

        echo "<tr>";
        echo "<th class=\"th-output\">Name</th> <td class=\"td-output\">$name</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th class=\"th-output\">E-mail</th> <td class=\"td-output\">$email</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th class=\"th-output\">Contact</th> <td class=\"td-output\">$contact</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th class=\"th-output\">City</th> <td class=\"td-output\">$city</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th class=\"th-output\">course</th> <td class=\"td-output\">$course</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th class=\"th-output\">Interests</th>";
        echo "<td class=\"td-output\">";
        echo "<ul>";
        foreach ($interest as $int) {
            echo "<li>$int</li>";
        }
        echo "</ul";
        echo "</td>";
        echo "</tr>";

        echo "</tbody>"; //tbody closing
        echo "</table>"; //table closing
    }
}

?>

<html>

<head>
    <title>PHP</title>
</head>

<body>
    <form method="post" action="index.php">
        <table>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>

                <tr>
                    <td>E-mail</td>
                    <td><input type="email" name="email" required></td>
                </tr>

                <tr>
                    <td>Contact</td>
                    <td><input type="text" name="contact" required></td>
                </tr>

                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" required></td>
                </tr>

                <tr>
                    <td>Course</td>
                    <td>
                        <select name="course">
                            <option>B.Tech(C.S.E)</option>
                            <option>B.Sc(I.T)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Interests</td>
                    <td>
                        Coding<input type="checkbox" name="interest[]" value="Coding">

                        Gaming<input type="checkbox" name="interest[]" value="Gaming">

                        Reading<input type="checkbox" name="interest[]" value="Reading">

                        Cooking<input type="checkbox" name="interest[]" value="Cooking">

                        Teaching<input type="checkbox" name="interest[]" value="Teaching">
                    </td>
                </tr>
            <tbody>
        </table>
        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>

</html>