<?php
$errors = [];

$day = isset($_POST['day']) ? (int)$_POST['day'] : 0;
$month = isset($_POST['month']) ? (int)$_POST['month'] : 0;
$year = isset($_POST['year']) ? (int)$_POST['year'] : 0;

if (empty($_POST['fname'])) $errors[] = "First name is required.";
if (empty($_POST['lname'])) $errors[] = "Last name is required.";
if (empty($_POST['father'])) $errors[] = "Father's name is required.";

if (!$day || !$month || !$year) {
    $errors[] = "Complete date of birth is required.";
} elseif (!checkdate($month, $day, $year)) {
    $errors[] = "Invalid date of birth.";
}

if (empty($_POST['mobile'])) {
    $errors[] = "Mobile number is required.";
} elseif (!preg_match('/^[0-9]{10}$/', $_POST['mobile'])) {
    $errors[] = "Mobile number must be exactly 10 digits.";
}

if ($errors) {
    foreach ($errors as $msg) {
        echo htmlspecialchars($msg) . "<br>";
    }
} else {
    echo "Registration Successful!<br>";
    echo "Name: " . htmlspecialchars($_POST['fname']) . " " . htmlspecialchars($_POST['lname']) . "<br>";
    echo "Father's Name: " . htmlspecialchars($_POST['father']) . "<br>";
    echo "DOB: " . htmlspecialchars($day) . "-" . htmlspecialchars($month) . "-" . htmlspecialchars($year) . "<br>";
    echo "Mobile: +91-" . htmlspecialchars($_POST['mobile']) . "<br>";
}