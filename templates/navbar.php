<?php
// Check if the user is logged in
$loggedIn = isset($_SESSION['username']);
?>

<style>
/* Simple CSS for the navbar */
.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, sans-serif;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.nav-right {
    float: right;
}
</style>

<div class="navbar">
    <a href="view.php">View</a>
    <a href="users.php">Users</a>
    <div class="nav-right">
        <?php
        if ($loggedIn) {
            echo '<a href="#">' . htmlspecialchars($_SESSION['username']) . '</a>';
        } else {
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </div>
</div>
