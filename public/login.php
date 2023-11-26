<?php
session_start();
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
        $_SESSION['username'] = $username;
        header("Location: users.php");
        exit();
    } else {
        $loginError = "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
include_once("../templates/header.php");
include_once("../templates/navbar.php");
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

    <?php
    if (isset($loginError)) {
        echo "<p style='color:red;'>" . htmlspecialchars($loginError) . "</p>";
    }
    ?>
</body>
</html>
