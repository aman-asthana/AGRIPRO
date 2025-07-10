<?php
session_start();

// Load environment configuration
require_once __DIR__ . '/../src/config/env.php';

// Use environment variables for database connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

$result = mysqli_query($conn,"SELECT * FROM price WHERE id = '1'");
$row = mysqli_fetch_array($result);

$result1 = mysqli_query($conn,"SELECT * FROM price WHERE id = '2'");
$row2 = mysqli_fetch_array($result1);

?>

