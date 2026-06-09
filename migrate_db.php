<?php
/**
 * ScholaCBT - Auto Migration Script
 * Use this to add session_id column, create ci_sessions table, and add database indexes for performance
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

// 1. Create ci_sessions table if it doesn't exist
$session_table_sql = "CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` varchar(128) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL,
    PRIMARY KEY (`id`),
    KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if ($mysqli->query($session_table_sql)) {
    echo "<p style='color: green;'>Success: Table 'ci_sessions' checked/created.</p>";
} else {
    echo "<p style='color: red;'>Error creating 'ci_sessions': " . $mysqli->error . "</p>";
}

// 2. Function to safely add index
function addIndexSafe($mysqli, $table, $index_name, $columns) {
    // Check if table exists first
    $table_exists = $mysqli->query("SHOW TABLES LIKE '$table'");
    if ($table_exists->num_rows == 0) {
        echo "<p style='color: orange;'>Warning: Table '$table' does not exist. Skipping index.</p>";
        return;
    }

    $result = $mysqli->query("SHOW INDEX FROM `$table` WHERE Key_name = '$index_name'");
    if ($result->num_rows == 0) {
        $sql = "ALTER TABLE `$table` ADD INDEX `$index_name` ($columns)";
        if ($mysqli->query($sql)) {
            echo "<p style='color: green;'>Success: Index '$index_name' added to table '$table'.</p>";
        } else {
            echo "<p style='color: red;'>Error adding index '$index_name' to table '$table': " . $mysqli->error . "</p>";
        }
    } else {
        echo "<p style='color: blue;'>Info: Index '$index_name' already exists on table '$table'.</p>";
    }
}

// Add indexes on frequently joined / filtered columns
addIndexSafe($mysqli, 'log_ujian', 'idx_log_ujian_jadwal_siswa', '`id_jadwal`, `id_siswa`');
addIndexSafe($mysqli, 'log_ujian', 'idx_log_ujian_siswa', '`id_siswa`');
addIndexSafe($mysqli, 'cbt_durasi_siswa', 'idx_durasi_jadwal_siswa', '`id_jadwal`, `id_siswa`');
addIndexSafe($mysqli, 'cbt_durasi_siswa', 'idx_durasi_siswa', '`id_siswa`');
addIndexSafe($mysqli, 'cbt_nilai', 'idx_nilai_jadwal_siswa', '`id_jadwal`, `id_siswa`');
addIndexSafe($mysqli, 'cbt_nilai', 'idx_nilai_siswa', '`id_siswa`');
addIndexSafe($mysqli, 'cbt_soal_siswa', 'idx_soal_siswa_jadwal_siswa', '`id_jadwal`, `id_siswa`');
addIndexSafe($mysqli, 'cbt_soal_siswa', 'idx_soal_siswa_siswa', '`id_siswa`');

// 3. User session_id check (from original migrate_db.php)
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
echo "<hr><p>Migration completed successfully.</p>";
?>
