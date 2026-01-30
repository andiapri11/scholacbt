<?php
/**
 * ScholaCBT - Auto Migration Script (Fixed)
 * Use this to add session_id column without phpMyAdmin
 */
define('BASEPATH', 'foo'); 
define('ENVIRONMENT', 'production'); // Fix for database.php

require_once('application/config/database.php');

$db_config = $db['default'];

// Handle environment variables if used in database.php
$host = getenv('DB_HOST') ?: $db_config['hostname'];
$user = getenv('DB_USERNAME') ?: $db_config['username'];
$pass = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : $db_config['password'];
$name = getenv('DB_DATABASE') ?: $db_config['database'];

$mysqli = new mysqli($host, $user, $pass, $name);

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

echo "<h3>ScholaCBT Database Migration</h3>";

$result = $mysqli->query("SHOW COLUMNS FROM users LIKE 'session_id'");
if ($result->num_rows == 0) {
    if ($mysqli->query("ALTER TABLE users ADD COLUMN session_id VARCHAR(255) DEFAULT NULL")) {
        echo "<p style='color: green;'>Migration Successful: Column 'session_id' added successfully.</p>";
    } else {
        echo "<p style='color: red;'>Error adding column: " . $mysqli->error . "</p>";
    }
} else {
    echo "<p style='color: blue;'>Info: Column 'session_id' already exists. Nothing to do.</p>";
}

$mysqli->close();
echo "<hr><p>Please delete this file (migrate_db.php) after use for security reasons.</p>";
?>
