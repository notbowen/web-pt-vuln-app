<?php
// Check if the user is logged in
$loggedIn = isset($_SESSION['username']);
?>

<div class="navbar">
    <a href="/">Home</a>
    <a href="view.php">View</a>
    <a href="users.php">Users</a>
    <div class="nav-right">
        <?php
        if ($loggedIn) {
            echo '<a href="#">' . htmlspecialchars($_SESSION['username']) . '</a>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </div>
</div>
