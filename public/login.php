<?php
include_once("../templates/header.php");
include_once("../config/db.php"); // Include the database connection

$loggedInUser = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    
    if ($stmt === false) {
        // Handle error, prepare() failed
        die("Error preparing statement: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $loggedInUser = $result->fetch_assoc();
        echo "Logged in successfully as " . htmlspecialchars($loggedInUser['username']);
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
