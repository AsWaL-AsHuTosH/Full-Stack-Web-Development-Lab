<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    $interest = $_POST['interest'];
    if (empty($_POST['name'])) {
        echo "Empty 'Name' is not allowed.";
    } else if (empty($_POST['email'])) {
        echo "Empty 'Email' is not allowed.";
    } else if (empty($_POST['contact'])) {
        echo "Empty 'Contact' is not allowed.";
    } else if (empty($_POST['course'])) {
        echo "Empty 'Course' is not allowed.";
    } else if (sizeof($interest) < 3) {
        echo "At least select any 3 Interests.";
    } else {
        echo "Name : $name <br/>";
        echo "email : $email <br/>";
        echo "contact : $contact <br/>";
        echo "course : $course <br/>";
        echo "Interest : [";
        $first = true;
        foreach ($interest as $int) {
            if ($first) {
                $first = false;
            } else {
                echo ", ";
            }
            echo $int;
        }
        echo "]";
    }
}

?>

<html>

<head>
    <title>PHP</title>
</head>

<body>
    <form method="post" action="test_php.php">
        <label>Name</label> <input type="text" name="name" required> <br />

        <label>Email</label> <input type="email" name="email" required> <br />

        <label>Contact</label> <input type="text" name="contact" required> <br />

        <label>City</label> <input type="text" name="city" required> <br />

        <label>Course</label>
        <select name="course" required>
            <option>B.Tech(C.S.E)</option>
            <option>B.Sc(I.T)
            <option>
        </select> <br />

        <label>Interest:</label>

        Coding<input type="checkbox" name="interest[]" value="Coding">

        Gaming<input type="checkbox" name="interest[]" value="Gaming">

        Reading<input type="checkbox" name="interest[]" value="Reading">

        Cooking<input type="checkbox" name="interest[]" value="Cooking">

        Teaching<input type="checkbox" name="interest[]" value="Teaching"> <br />

        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>

</html>