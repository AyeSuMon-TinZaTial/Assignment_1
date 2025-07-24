<?php
$errors = [];

$day = isset($_POST['day']) ? (int)$_POST['day'] : '';
$month = isset($_POST['month']) ? (int)$_POST['month'] : '';
$year = isset($_POST['year']) ? (int)$_POST['year'] : '';

if (empty($_POST['fname'])) $errors[] = "First name is required.";
if (empty($_POST['lname'])) $errors[] = "Last name is required.";
if (empty($_POST['father'])) $errors[] = "Father's name is required.";

if (!$day || !$month || !$year) {
    $errors[] = "Day is required.";
    $errors[] = "Month is required.";
    $errors[] = "Year is required.";
} elseif (!checkdate($month, $day, $year)) {
    $errors[] = "Invalid date of birth.";
}

if (empty($_POST['mobile'])) {
    $errors[] = "Mobile number is required.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $gender = $_POST['gender'] ;
    $department = isset($_POST['department']) ? $_POST['department'] : [];

     #ASM
    $courses = htmlspecialchars($_POST['course'] ?? '');
    $city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is required.";
    }

    // Validate password
    if (empty($password) ) {
        $errors[] = "Password is required.";
    }

    // Validate gender
    if(empty($gender)) {
        $errors[] = "Gender is required.";
    }

    // Validate department (must be at least one and valid values)
    $valid_departments = ['English', 'Computer', 'Business'];
    if (empty($department)) {
        $errors[] = "Department is required.";
    } else {
        foreach ($department as $dept) {
            if (!in_array($dept, $valid_departments)) {
                $errors[] = "Invalid department selected: " . htmlspecialchars($dept);
                break;
            }
        }
    
    }
    // Validate courses
    if (empty($courses)) {
        $errors[] = "Courses are required.";
    } 
    // Validate city
    if (empty($city)) {
        $errors[] = "City is required.";
    }
    // Validate address
    if (empty($address)) {
        $errors[] = "Address is required.";
    }
}
    // Output
     if (empty($errors)) {
        
        echo "Name: " . htmlspecialchars($_POST['fname']) . " " . htmlspecialchars($_POST['lname']) . "<br>";
        echo "Father's Name: " . htmlspecialchars($_POST['father']) . "<br>";
        echo "DOB: " . htmlspecialchars($day) . "-" . htmlspecialchars($month) . "-" . htmlspecialchars($year) . "<br>";
        echo "Mobile: +91-" . htmlspecialchars($_POST['mobile']) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Gender: " . htmlspecialchars($gender) . "<br>";
        echo "Departments: " . implode(",", $department) . "<br>";
        echo "Courses: " .$courses . "<br>";
        echo "City: " . $city . "<br>";
        echo "Address: " . $address . "<br>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'> $error</p>";
        }
        echo "Name: " . htmlspecialchars($_POST['fname']) . " " . htmlspecialchars($_POST['lname']) . "<br>";
        echo "Father's Name: " . htmlspecialchars($_POST['father']) . "<br>";
        echo "DOB: " . htmlspecialchars($day) . "-" . htmlspecialchars($month) . "-" . htmlspecialchars($year) . "<br>";
        echo "Mobile: +91-" . htmlspecialchars($_POST['mobile']) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Gender: " . htmlspecialchars($gender) . "<br>";
        echo "Departments: " . implode(",", $department) . "<br>";
        echo "Courses: " .$courses . "<br>";
        echo "City: " . $city . "<br>";
        echo "Address: " . $address . "<br>";
    }



?>