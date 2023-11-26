<?php
include_once("../config/db.php");

echo "<h1>Registered Users</h1>";

// SQL query to select all users
$sql = "SELECT username FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'><tr><th>Username</th><th>Pwned Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["username"]) . "</td><td>" . htmlspecialchars($row["pwned_status"]) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}

$conn->close();
?>