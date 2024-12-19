<?php
// Database connection details
$host = 'localhost';
$dbname = 'books';  // Replace with your database name
$username = 'root';              // Default XAMPP username
$password = '';                  // Default XAMPP password (empty)

// PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
