<?php
session_start();
require_once 'config/db.php'; 

// $user_ip = $_SERVER['REMOTE_ADDR'];
// $token = "674632e785e031";
// $allowed_countries = ['MA', 'PS'];




// $url = "https://ipinfo.io/{$user_ip}?token={$token}";
// $response = file_get_contents($url);

// if ($response !== false) {
//     $data = json_decode($response, true);
//     $country_code = $data['country'];
//     if (!in_array($country_code, $allowed_countries)) {
//         header("Location: index.php");
//         exit;
//     }
// } else {
//         header("Location: index.php");
//         exit;
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user from database
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // User authenticated
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // Assuming 'role' is stored in session
        if($user['role'] == "admin") {
            header("Location: admin/admin.php"); // Redirect to main page after successful login
        }
    } else {
        // Invalid username or password
        echo "Invalid username or password. <a href='login.php'>Try again</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
         <a  href='register.php'>Register</a>
    </form>
</body>
</html>
