<?php
require_once '../assets/config/dbinfo.php';

$username = htmlspecialchars($_POST['Username']);
$email = htmlspecialchars($_POST['Email']);
$password = htmlspecialchars($_POST['Password']);
$phone = htmlspecialchars($_POST['Phone']);
$sports = $_POST['Sports']; // Expecting an array ['badminton','tennis']
$level = htmlspecialchars($_POST['Level']);

$allSports = '';
if (is_array($sports)) {
    foreach ($sports as $sport) {
        $allSports .= $sport . " ";
    }
    $allSports = trim($allSports);
}

// Database connection
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the email is already registered
$stmt = $conn->prepare("SELECT userID FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO user (username, email, password, contact_info, sports, skilllevel) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $email, $hashedPassword, $phone, $allSports, $level);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        echo "User registered successfully!";
    } else {
        echo "Registration failed!";
    }
} else {
    echo "Email already registered.";
}

$stmt->close();
$conn->close();
?>
