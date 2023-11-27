<?php
session_start();
include_once("../config/db.php");

// Initialize a variable to store the card content
$cardContent = '';
$isResultEmpty = true;

// Define the query to fetch all users and an additional query for search
$sql = "SELECT username, status FROM users;";
if (isset($_GET['search']) && $_GET['search'] != '') {
    $searchTerm = $_GET['search'];
    $sql = "SELECT username, status FROM users WHERE username LIKE '%$searchTerm%';";
}

// Execute multi query and prepare the card content
if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            if ($result->num_rows > 0) {
                $isResultEmpty = false;
                while ($row = $result->fetch_assoc()) {
                    $cardContent .= "<div class='card'>";
                    $cardContent .= "<h3>" . htmlspecialchars($row["username"]) . "</h3>";
                    $cardContent .= "<p>" . htmlspecialchars($row["status"]) . "</p>";
                    $cardContent .= "</div>";
                }
            }
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
} else {
    $cardContent = "<p>Error executing query: " . $conn->error . "</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <?php include_once("../templates/header.php"); ?>
    <?php include_once("../templates/navbar.php"); ?>

    <h2>Invited Users</h2>
    <form method="get">
        <input type="text" name="search" placeholder="Enter username" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="submit" value="Search">
    </form>

    <!-- Display the card content or a 'no results' message -->
    <!-- TODO: Add animation when a new card appears --> 
    <div class="card-container">
        <?php
        if ($isResultEmpty) {
            echo "<p>No users found.</p>";
        } else {
            echo $cardContent;
        }
        ?>
    </div>
</body>
</html>
