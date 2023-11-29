<?php
include_once("../config/db.php");

header('Content-Type: application/json');

// Adjust the query to fetch only the latest entry
$query = "SELECT id, username, status FROM users ORDER BY created_at DESC LIMIT 1";
$result = mysqli_query($conn, $query);

$entry = mysqli_fetch_assoc($result);

echo json_encode($entry);
?>
