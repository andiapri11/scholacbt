<?php
/**
 * ScholaCBT Standalone Nilai Exporter
 * Bypasses CodeIgniter to run in <2MB memory and directly pull grades.
 */
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

// Simple key for security
$secret = isset($_GET['key']) ? $_GET['key'] : '';
if ($secret !== 'schola123') {
    die("Akses ditolak. Gunakan key yang benar, contoh: ?key=schola123");
}

$kelas_id = isset($_GET['kelas']) ? intval($_GET['kelas']) : 1;
$jadwal_id = isset($_GET['jadwal']) ? intval($_GET['jadwal']) : 10;

echo "<html><head><title>Hasil Nilai Ujian</title>";
echo "<style>
body { font-family: 'Helvetica Neue', Arial, sans-serif; padding: 20px; color: #333; }
table { border-collapse: collapse; width: 100%; margin-top: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
th, td { border: 1px solid #e0e0e0; padding: 12px; text-align: left; }
th { background-color: #4CAF50; color: white; font-weight: bold; }
tr:nth-child(even) { background-color: #f9f9f9; }
tr:hover { background-color: #f1f1f1; }
h2 { color: #2E7D32; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; }
.btn { background-color: #4CAF50; color: white; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }
.btn:hover { background-color: #45a049; }
</style></head><body>";

echo "<h2>Hasil Nilai Ujian - Kelas ID: $kelas_id, Jadwal ID: $jadwal_id</h2>";

// Standalone direct query
$query = "
    SELECT 
        s.id_siswa,
        s.nama,
        s.nis,
        n.pg_benar,
        n.pg_nilai,
        n.kompleks_nilai,
        n.jodohkan_nilai,
        n.isian_nilai,
        n.essai_nilai,
        n.skor_total,
        n.dikoreksi
    FROM kelas_siswa ks
    JOIN master_siswa s ON s.id_siswa = ks.id_siswa
    LEFT JOIN cbt_nilai n ON n.id_siswa = s.id_siswa AND n.id_jadwal = $jadwal_id
    WHERE ks.id_kelas = $kelas_id
    ORDER BY s.nama ASC
";

$res = $mysqli->query($query);
if (!$res) {
    // If table names or column names differ, print the tables and schema for diagnostics
    echo "<p style='color:red;'>Query Error: " . $mysqli->error . "</p>";
    echo "<h3>Daftar Tabel:</h3>";
    $tables = $mysqli->query("SHOW TABLES");
    while($t = $tables->fetch_row()) {
        echo $t[0] . "<br>";
    }
    
    // Check master_siswa schema
    echo "<h3>Schema master_siswa:</h3>";
    $schema = $mysqli->query("DESCRIBE master_siswa");
    if ($schema) {
        while($c = $schema->fetch_assoc()) {
            echo $c['Field'] . " (" . $c['Type'] . ")<br>";
        }
    }
    die();
}

if ($res->num_rows == 0) {
    echo "<p>Tidak ada data siswa ditemukan untuk Kelas ID: $kelas_id</p>";
} else {
    echo "<table>";
    echo "<tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>PG Nilai</th>
        <th>PG2/Kompleks</th>
        <th>Jodohkan</th>
        <th>Isian</th>
        <th>Essai</th>
        <th>Total Skor</th>
        <th>Status Koreksi</th>
    </tr>";
    
    $no = 1;
    while ($row = $res->fetch_assoc()) {
        $status_koreksi = $row['dikoreksi'] == '1' ? "<span style='color:green;font-weight:bold;'>Selesai</span>" : "<span style='color:orange;'>Belum/Proses</span>";
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($row['nis'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($row['nama'] ?? '') . "</td>";
        echo "<td>" . ($row['pg_nilai'] !== null ? $row['pg_nilai'] : '-') . "</td>";
        echo "<td>" . ($row['kompleks_nilai'] !== null ? $row['kompleks_nilai'] : '-') . "</td>";
        echo "<td>" . ($row['jodohkan_nilai'] !== null ? $row['jodohkan_nilai'] : '-') . "</td>";
        echo "<td>" . ($row['isian_nilai'] !== null ? $row['isian_nilai'] : '-') . "</td>";
        echo "<td>" . ($row['essai_nilai'] !== null ? $row['essai_nilai'] : '-') . "</td>";
        echo "<td><b>" . ($row['skor_total'] !== null ? $row['skor_total'] : '-') . "</b></td>";
        echo "<td>" . $status_koreksi . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<br><button class='btn' onclick='window.print()'>Cetak / Simpan PDF</button>";
echo "</body></html>";

$mysqli->close();
?>
