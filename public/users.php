<?php
session_start();
include_once("../config/db.php");

// Initialize a variable to store the table content
$tableContent = '';
$isResultEmpty = true;

// Define the query to fetch all users and an additional query for search
$sql = "SELECT username, status FROM users;";
if (isset($_GET['search']) && $_GET['search'] != '') {
    $searchTerm = $_GET['search'];
    $sql = "SELECT username, status FROM users WHERE username LIKE '%$searchTerm%';";
}

// Execute multi query and prepare the table content
if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            if ($result->num_rows > 0) {
                $isResultEmpty = false;
                $tableContent .= "<table border='1'><tr><th>Username</th><th>Status</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $tableContent .= "<tr><td>" . htmlspecialchars($row["username"]) . "</td><td>" . htmlspecialchars($row["status"]) . "</td></tr>";
                }
                $tableContent .= "</table>";
            }
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
} else {
    $tableContent = "<p>Error executing query: " . $conn->error . "</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <?php include_once("../templates/navbar.php"); ?>

    <h2>Users</h2>
    <form method="get">
        <input type="text" name="search" placeholder="Enter username" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="submit" value="Search">
    </form>

    <!-- Display the table content or a 'no results' message -->
    <?php
    if ($isResultEmpty) {
        echo "<p>No users found.</p>";
    } else {
        echo "<br>" . $tableContent;
    }
    ?>
</body>
</html>
