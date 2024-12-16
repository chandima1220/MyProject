<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume you have a function to validate user credentials
    if (validate_user($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
        header("Location: index.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>