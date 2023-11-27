<?php
session_start();
include_once("../templates/header.php");
include_once("../templates/navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Closed Beta File Viewer</title>
    <style>
        .welcome-banner h1 {
            font-size: 2.5em;
            font-weight: bold;
            margin: 0.5em 0;
            padding: 0.5em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php include_once("../templates/navbar.php"); ?>

    <div class="welcome-banner">
        <h1>Welcome to the Closed Beta File Viewer</h1>
    </div>

    <div class="container">
        <h2>About the App</h2>
        <p>
            The Closed Beta File Viewer is a revolutionary app designed to provide secure and efficient access to your files. As a part of our closed beta program, you are among the first to experience the future of file management.
        </p>

        <h2>Features</h2>
        <p>
            - Secure file viewing: Access your files securely and with ease.<br>
            - User-friendly interface: Our intuitive design ensures a smooth user experience.<br>
            - Real-time updates: Stay up-to-date with the latest enhancements during our beta phase.<br>
        </p>

        <h2>Getting Started</h2>
        <p>
            To start viewing files, navigate to the 'View' section. You can also search for other users or view all users in the 'Users' section. As a beta tester, your feedback is invaluable to us. Please don't hesitate to share your thoughts and help us improve.
        </p>

        <h2>Join the Discussion</h2>
        <p>
            Be a part of our community and join the discussion on our forums. Share tips, tricks, and get support from fellow beta testers.
        </p>
    </div>
</body>
</html>