<?php
session_start();
include_once("../templates/header.php");
include_once("../templates/navbar.php");
include_once("../config/db.php");

echo "<h1>Registered Users</h1>";

// SQL query to select all users
$sql = "SELECT username, status FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'><tr><th>Username</th><th>Custom Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["username"]) . "</td><td>" . htmlspecialchars($row["status"]) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}

$conn->close();
?>