<?php
session_start(); // Start the session
session_unset(); // Clear session variables
session_destroy(); // Destroy the session
header("Location: index1.php"); // Redirect to index.php
exit(); // Stop further script execution
?>
