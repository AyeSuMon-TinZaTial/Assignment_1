<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <form action="process.php" method="post">
        Student name:
        <input type="text" name="fname" placeholder="First Name" required>
        <input type="text" name="lname" placeholder="Last Name" required>
        <br>
        Father's name:
        <input type="text" name="father" required>
        <br>
        Date of birth:
        <input type="number" name="day" min="1" max="31" placeholder="Day" required>
        <input type="number" name="month" min="1" max="12" placeholder="Month" required>
        <input type="number" name="year" min="1900" max="2025" placeholder="Year" required>
        <br>
        Mobile no.: +95
        <input type="text" name="mobile" pattern="[0-9]{10}" maxlength="10" required>
        <br>
        <input type="submit" value="Register">
    </form>
</body>
</html>