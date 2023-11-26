<?php
// Simple path traversal vulnerability example

$fileContent = '';
$filePath = '';

if (isset($_GET['file'])) {
    $filePath = $_GET['file']; // User-supplied input

    // Vulnerable file reading
    if (file_exists($filePath)) {
        $fileContent = file_get_contents($filePath);
    } else {
        $fileContent = "File not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View File</title>
</head>
<body>
    <h2>View File</h2>
    <form method="get">
        File Path: <input type="text" name="file">
        <input type="submit" value="View File">
    </form>

    <h3>File Content:</h3>
    <pre><?php echo htmlspecialchars($fileContent); ?></pre>
</body>
</html>
