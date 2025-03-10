<?php
// loginAPI.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // Only start the session if it's not already started
}

$username = htmlspecialchars($_POST['Username']);
$password = htmlspecialchars($_POST['Password']);
// $userID = htmlspecialchars($_POST['userID']);

require_once './conf/dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (empty($username) || empty($password)) {
    echo "All fields are required!";
} else {
    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT userID, username, password, email, contact_info, sports, skilllevel, role FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind all result fields
        $stmt->bind_result($dbUserID, $dbUsername, $dbPassword, $dbEmail, $dbContactInfo, $dbSports, $dbSkillLevel, $dbRole);
        $stmt->fetch();

        // Assuming passwords are hashed in the database
        if (password_verify($password, $dbPassword)) {
            $_SESSION['userLogin'] = true;
            $_SESSION['Username'] = $dbUsername; // Store the username in session
            $_SESSION['userID'] = $dbUserID;
            $_SESSION['email'] = $dbEmail; // Store email in session
            $_SESSION['contact_info'] = $dbContactInfo; // Store contact_info in session
            $_SESSION['sports'] = $dbSports; // Store sports in session
            $_SESSION['skilllevel'] = $dbSkillLevel;
            $_SESSION['role'] = $dbRole; // Store skilllevel in session
            // echo "Successfully login!";
            // echo $dbRole;
            echo json_encode([
                "status" => 1,
                "role" => $dbRole,
                "message" => "Login successful"
            ]);
        } else {
            echo json_encode([
                "status" => 0,
                "message" => "Password is incorrect"
            ]);
        }
    } else {
        echo json_encode([
            "status" => 0,
            "message" => "User is not registered"
        ]);
    }

    $stmt->close();
    $conn->close();
}
?>
