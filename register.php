<?php
session_start();
require_once 'config/db.php'; // Include your database connection file

$user_ip = $_SERVER['REMOTE_ADDR'];
$token = "674632e785e031";
$allowed_countries = ['MA', 'PS'];




$url = "https://ipinfo.io/{$user_ip}?token={$token}";
$response = file_get_contents($url);

if ($response !== false) {
    $data = json_decode($response, true);
    $country_code = $data['country'];
    if (!in_array($country_code, $allowed_countries)) {
        header("Location: index.php");
        exit;
    }
} else {
        header("Location: index.php");
        exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists
        echo "Username already exists. <a href='register.php'>Try again</a>";
    } else {
        // Insert new user into database
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        // Check if user is inserted successfully
        if ($stmt->affected_rows > 0) {
            echo "Registration successful. <a href='login.php'>Login</a>";
        } else {
            echo "Error occurred. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Register</button>
        <a  href='login.php'>Login</a>
    </form>
</body>
</html>
