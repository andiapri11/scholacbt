<?php
define('BASEPATH', 'foo'); 
define('ENVIRONMENT', 'production');

require_once('application/config/database.php');

$db_config = $db['default'];

$host = getenv('DB_HOST') ?: $db_config['hostname'];
$user = getenv('DB_USERNAME') ?: $db_config['username'];
$pass = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : $db_config['password'];
$name = getenv('DB_DATABASE') ?: $db_config['database'];

$mysqli = new mysqli($host, $user, $pass, $name);

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

echo "<h3>Jadwal 10 Row Count Checker</h3>";

$jadwal_id = 10;

// Check log_ujian
$res = $mysqli->query("SELECT COUNT(*) as cnt FROM log_ujian WHERE id_jadwal = $jadwal_id");
$row = $res->fetch_assoc();
echo "<p>log_ujian rows for jadwal $jadwal_id: <b>" . $row['cnt'] . "</b></p>";

// Check cbt_soal_siswa
$res = $mysqli->query("SELECT COUNT(*) as cnt FROM cbt_soal_siswa WHERE id_jadwal = $jadwal_id");
$row = $res->fetch_assoc();
echo "<p>cbt_soal_siswa rows for jadwal $jadwal_id: <b>" . $row['cnt'] . "</b></p>";

// Check cbt_durasi_siswa
$res = $mysqli->query("SELECT COUNT(*) as cnt FROM cbt_durasi_siswa WHERE id_jadwal = $jadwal_id");
$row = $res->fetch_assoc();
echo "<p>cbt_durasi_siswa rows for jadwal $jadwal_id: <b>" . $row['cnt'] . "</b></p>";

$mysqli->close();
?>
